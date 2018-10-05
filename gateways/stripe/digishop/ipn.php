<?php
  /**
   * Stripe IPN
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: ipn.php, v1.00 2016-06-08 10:12:05 gewa Exp $
   */
  define("_WOJO", true);
  require_once ("../../../init.php");
  
  Bootstrap::Autoloader(array(AMODPATH . 'digishop/'));

  if (!App::Auth()->is_User())
      exit;

  ini_set('log_errors', true);
  ini_set('error_log', dirname(__file__) . '/ipn_errors.log');

  if (isset($_POST['processStripePayment'])) {
	  $rules = array(
		  'ccn' => array('required|string|min_len,16|max_len,19', Lang::$word->STR_CCN),
		  'ccm' => array('required|numeric|exact_len,2', Lang::$word->STR_CEXM),
		  'ccy' => array('required|numeric|exact_len,4', Lang::$word->STR_CEXY),
		  'cvc' => array('required|numeric|min_len,3|max_len,4', Lang::$word->STR_CCV),
		  );
			  
	  $validate = Validator::instance();
	  $safe = $validate->doValidate($_POST, $rules);

      if (!$cart = Digishop::getCart()) {
          Message::$msgs['cart'] = Lang::$word->STR_ERR0;
      }

      if (empty(Message::$msgs)) {
          require_once (BASEPATH . 'gateways/stripe/stripe.php');

          $key = Db::run()->first(Core::gTable, array("extra", "extra2"), array("name" => "stripe"));

          \Stripe\Stripe::setApiKey($key->extra);
          try {

              //Charge client
              $totals = Digishop::getCartTotal();
			  $tax = Membership::calculateTax();
			  
			  $amount = ($tax * $totals->grand + $totals->grand);
              $charge = \Stripe\Charge::create(array(
                  "amount" => round($amount * 100, 0), // amount in cents, again
                  "currency" => $key->extra2,
				  "card" => array(
                      "number" => $safe->ccn,
                      "exp_month" => $safe->ccm,
                      "exp_year" => $safe->ccy,
                      "cvc" => $safe->cvc,
					  ),
                  "description" => App::Core()->company . ' - ' . Lang::$word->CHECKOUT,
                  ));

			  foreach ($cart as $item) {
				  $dataArray[] = array(
					  'user_id' => App::Auth()->uid,
					  'item_id' => $item->pid,
					  'txn_id' => $charge['balance_transaction'],
					  'tax' => Validator::sanitize($totals->sub * $tax, "float"),
					  'amount' => Validator::sanitize($totals->grand, "float"),
					  'total' => Validator::sanitize($amount, "float"),
					  'token' => Utility::randomString(16),
					  'pp' => "Stripe",
					  'ip' => Url::getIP(),
					  'currency' => strtoupper($charge['currency']),
					  'status' => 1,
					  );
			  }

              Db::run()->insertBatch(Digishop::xTable, $dataArray);
			  
              $jn['type'] = 'success';
			  $jn['title'] = Lang::$word->SUCCESS;
              $jn['message'] = Lang::$word->STR_POK;
              print json_encode($jn);

              /* == Notify User == */
              $mailer = Mailer::sendMail();
			  $core = App::Core();
			  $etpl = Db::run()->first(Content::eTable, array("body" . Lang::$lang, "subject" . Lang::$lang), array('typeid' => 'digiNotifyUser'));
			  
			  $tpl = App::View(FMODPATH . 'digishop/snippets/'); 
			  $tpl->rows = Digishop::getCartContent();
			  $tpl->tax = $tax;
			  $tpl->totals = $totals;
			  $tpl->template = '_userNotifyTemplate.tpl.php'; 
				
			  $body = str_replace(array(
				  '[LOGO]',
				  '[NAME]',
				  '[DATE]',
				  '[COMPANY]',
				  '[SITE_NAME]',
				  '[ITEMS]',
				  '[URL]',
				  '[FB]',
				  '[TW]',
				  '[SITEURL]'), array(
				  Utility::getLogo(),
				  App::Auth()->name,
				  date('Y'),
				  $core->company,
				  $core->site_name,
				  $tpl->render(),
				  Url::url('/' . $core->system_slugs->account[0]->{'slug' . Lang::$lang}, "digishop"),
				  $core->social->facebook,
				  $core->social->twitter,
				  SITEURL), $etpl->{'body' . Lang::$lang}); 
				  
			  $msg = Swift_Message::newInstance()
					->setSubject($etpl->{'subject' . Lang::$lang})
					->setTo(array(App::Auth()->email => App::Auth()->name))
					->setFrom(array($core->site_email => $core->company))
					->setBody($body, 'text/html'
					);
			  $mailer->send($msg);

			  Db::run()->delete(Digishop::qTable, array("uid" => App::Auth()->uid));

          }
          catch (\Stripe\Error\Card $e) {
              $body = $e->getJsonBody();
              $err = $body['error'];
              $json['type'] = 'error';
              Message::$msgs['msg'] = 'Message is: ' . $err['message'] . "\n";
              Message::msgSingleStatus();
          }
      } else {
          Message::msgSingleStatus();
      }
  }