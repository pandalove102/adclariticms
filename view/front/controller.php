<?php
  /**
   * Controller
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: controller.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  define("_WOJO", true);
  require_once("../../init.php");
	  
  $delete = Validator::post('delete');
  $trash = Validator::post('trash');
  $action = Validator::request('action');
  $restore = Validator::post('restore');
  $title = Validator::post('title') ? Validator::sanitize($_POST['title']) : null;
  
  /* == Actions == */
  switch ($action):
        /* == Login == */
      case "login":
          App::Auth()->userLogin();
      break;
	  
      /* == Admin Password Reset == */
      case "aResetPass":
          App::Admin()->passReset();
      break;
	  
      /* == User Password Reset == */
      case "uResetPass":
          App::FrontController()->passReset();
      break;

      /* == Register == */
      case "register":
          App::FrontController()->Registration();
      break;
      
      /* == Contact Us == */
      case "contactus":
      	App::FrontController()->saveContactUs();      	
      	break;

      /* == Update Profile == */
      case "profile":
	      if(!App::Auth()->is_User())
			  exit;
          App::Users()->updateProfile();
      break;

      /* == Update Avatar == */
      case "avatar":
	      if(!App::Auth()->is_User())
			  exit;
		  if (!empty($_FILES['avatar']['name'])) :
			  $avatar = File::upload("avatar", 2097152, "png,jpg,jpeg");
			  
			  $apath = UPLOADS . '/avatars/'; 
			  $img = File::process($avatar, $apath, "AVT_", false, false);
			  
			  File::deleteFile($apath . Auth::$udata->avatar);
			  try {
				  $image = new Image($apath . $img['fname']);
				  $image->thumbnail(App::Core()->avatar_w, App::Core()->avatar_h)->save($apath . $img['fname']);
				  
				  Db::run()->update(Users::mTable, array("avatar" => $img['fname']), array("id" => Auth::$udata->uid));
				  Auth::$udata->avatar = App::Session()->set('avatar', $img['fname']);
			  }
			  catch (exception $e) {
				  Debug::AddMessage("errors", '<i>Error</i>', $e->getMessage(), "session");
			  }

		  endif;
      break;
	  
      /* == Process Contact Form == */
      case "processContact":
          App::FrontController()->processContact();
      break;

      /* == Posters == */
      case "posters":
		  if (!App::Auth()->is_User())
			  exit;
		  $html = '';
		  $images = File::findFiles(THEMEBASE . '/images/userbg', array(
			  'fileTypes' => array('jpg'),
			  'level' => 0,
			  'returnType' => 'fileOnly'));
		  if ($images):
			  foreach ($images as $img):
				  $html .= '<img src="' . THEMEURL . '/images/userbg/' . $img . '" class="wojo small image">';
			  endforeach;
		  endif;
		  print $html;
      break;

      /* == Select Membership == */
      case "buyMembership":
	      if(!App::Auth()->is_User())
			  exit;
          App::Membership()->buyMembership();
      break;

      /* == Select Gateway == */
      case "selectGateway":
	      if(!App::Auth()->is_User())
			  exit;
          App::Membership()->selectGateway();
      break;
	  
      /* == Apply Coupon == */
      case "getCoupon":
	      if(!App::Auth()->is_User())
			  exit;
          App::Membership()->getCoupon();
      break;
	  
      /* == Membership Invoice == */
      case "invoice":
		  if(!App::Auth()->is_User())
			  exit;
			  
		  if($row = Users::getUserInvoice(Filter::$id)):
			  $tpl = App::View(THEMEBASE . '/snippets/'); 
			  $tpl->row = $row;
			  $tpl->user = Auth::$userdata;
			  $tpl->core = App::Core();
			  $tpl->template = 'invoice.tpl.php'; 
			  
			  $title = Validator::sanitize($row->title, "alpha");
			  
			  require_once (BASEPATH . 'lib/mPdf/mpdf.php');
			  $mpdf = new mPDF('utf-8', "A4");
			  $mpdf->SetTitle($title);
			  $mpdf->WriteHTML($tpl->render());
			  $mpdf->Output($title . ".pdf", "D");
			  exit;
		  else:
			  exit;
		  endif;
      break;
  endswitch;
  
    /* == Clear Session Temp Queries == */
  if (isset($_GET['ClearSessionQueries'])):
      App::Session()->remove('debug-queries');
	  App::Session()->remove('debug-warnings');
	  App::Session()->remove('debug-errors');
	  print 1;
  endif;