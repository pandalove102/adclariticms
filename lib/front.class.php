<?php
/**
 * Front Class
 *
 * @package Wojo Framework
 * @author wojoscripts.com
 * @copyright 2016
 * @version $Id: front.class.php, v1.00 2016-04-20 18:20:24 gewa Exp $
 */
if (! defined ( "_WOJO" ))
	die ( 'Direct access to this location is not allowed.' );
class FrontController {
	
	/**
	 * FrontController::__construct()
	 *
	 * @return
	 *
	 */
	public function __construct() {
	}
	
	/**
	 * FrontController::Index()
	 *
	 * @return
	 *
	 */
	public function Index() {
		$core = App::Core ();
		$tpl = App::View ( BASEPATH . 'view/' );
		$tpl->dir = "front/themes/" . $core->theme . "/";
		$tpl->title = str_replace ( "[COMPANY]", $core->company, Lang::$word->META_T31 );
		$tpl->keywords = null;
		$tpl->description = null;
		$tpl->core = $core;
		
		if (! $row = Db::run ()->first ( Content::pTable, null, array (
				"page_type" => "home",
				"active" => 1 
		) )) {
			$tpl->template = 'front/themes/' . $core->theme . '/404.tpl.php';
			DEBUG ? Debug::AddMessage ( "errors", '<i>ERROR</i>', "Invalid page detected [front.class.php, ln.:" . __line__ . "] slug [" . $slug . "]", "session" ) : Lang::$word->META_ERROR;
		} else {
			$tpl->data = $row;
			$tpl->title = Url::formatMeta ( $tpl->data->{'title' . Lang::$lang} );
			$tpl->keywords = $row->{'keywords' . Lang::$lang};
			$tpl->description = $row->{'description' . Lang::$lang};
			$tpl->indexpage = true;
			
			Content::$pagedata = $row;
			
			$tpl->menu = App::Content ()->menuTree ( true );
			// $menu = Utility::searchForValueName("home_page", 1, "mod_slug", $tpl->menu, true);
			$tpl->template = 'front/themes/' . $core->theme . '/index.tpl.php';
			/*
			 * if($menu['mod_id'] and in_array($menu['mslug'], $core->moddir)) {
			 * $tpl->template = 'front/themes/' . $core->theme . '/mod_index.tpl.php';
			 * } else {
			 * $tpl->template = 'front/themes/' . $core->theme . '/index.tpl.php';
			 * }
			 */
		}
	}
	
	/**
	 * FrontController::Page()
	 *
	 * @return
	 *
	 */
	public function Page($slug) {
		$core = App::Core ();
		$tpl = App::View ( BASEPATH . 'view/' );
		$tpl->dir = "front/themes/" . $core->theme . "/";
		$tpl->title = str_replace ( "[COMPANY]", $core->company, Lang::$word->META_T31 );
		$tpl->keywords = null;
		$tpl->description = null;
		$tpl->menu = App::Content ()->menuTree ( true );
		$tpl->core = $core;
		
		if (! $row = Db::run ()->first ( Content::pTable, null, array (
				"slug" . Lang::$lang => $slug,
				"page_type" => "normal",
				"active" => 1 
		) )) {
			$tpl->data = null;
			$tpl->title = Lang::$word->META_ERROR;
			$tpl->template = 'front/themes/' . $core->theme . '/404.tpl.php';
			DEBUG ? Debug::AddMessage ( "errors", '<i>ERROR</i>', "Invalid page detected [front.class.php, ln.:" . __line__ . "] slug ['<b>" . $slug . "</b>']" ) : Lang::$word->META_ERROR;
		} else {
			$tpl->data = $row;
			$tpl->title = Url::formatMeta ( $tpl->data->{'title' . Lang::$lang} );
			$tpl->keywords = $row->{'keywords' . Lang::$lang};
			$tpl->description = $row->{'description' . Lang::$lang};
			$tpl->indexpage = false;
			
			$tpl->crumbs = [ 
					array (
							0 => Lang::$word->HOME,
							1 => '' 
					),
					$row->{'title' . Lang::$lang} 
			];
			Content::$pagedata = $row;
			$tpl->template = 'front/themes/' . $core->theme . '/page.tpl.php';
		}
	}
	
	/**
	 * FrontController::Login()
	 *
	 * @return
	 *
	 */
	public function Login() {
		if (App::Auth ()->is_User ()) {
			Url::redirect ( Url::url ( '/' . App::Core ()->system_slugs->account [0]->{'slug' . Lang::$lang} ) );
			exit ();
		}
		
		$core = App::Core ();
		$tpl = App::View ( BASEPATH . 'view/' );
		$tpl->dir = "front/themes/" . $core->theme . "/full/";
		$tpl->title = str_replace ( "[COMPANY]", $core->company, Lang::$word->META_T31 );
		$tpl->keywords = null;
		$tpl->description = null;
		$tpl->core = $core;
		
		if (! $row = Db::run ()->first ( Content::pTable, null, array (
				"page_type" => "login",
				"active" => 1 
		) )) {
			$tpl->data = null;
			$tpl->title = Lang::$word->META_ERROR;
			$tpl->template = 'front/themes/' . $core->theme . '/error.tpl.php';
			$tpl->error = DEBUG ? "Invalid page detected [front.class.php, ln.:" . __line__ . "]" : Lang::$word->META_ERROR;
		} else {
			$tpl->title = Url::formatMeta ( $row->{'title' . Lang::$lang} );
			$tpl->keywords = $row->{'keywords' . Lang::$lang};
			$tpl->description = $row->{'description' . Lang::$lang};
			$tpl->data = $row;
			
			$tpl->pageclass = "login";
			Content::$pagedata = $row;
			$tpl->template = 'front/themes/' . $core->theme . '/login.tpl.php';
		}
	}
	
	/**
	 * FrontController::Register()
	 *
	 * @return
	 *
	 */
	public function Register() {
		if (App::Auth ()->is_User ()) {
			Url::redirect ( Url::url ( '/' . App::Core ()->system_slugs->account [0]->{'slug' . Lang::$lang} ) );
			exit ();
		}
		
		$core = App::Core ();
		$tpl = App::View ( BASEPATH . 'view/' );
		$tpl->dir = "front/themes/" . $core->theme . "/full/";
		$tpl->title = str_replace ( "[COMPANY]", $core->company, Lang::$word->META_T31 );
		$tpl->keywords = null;
		$tpl->description = null;
		$tpl->core = $core;
		
		if (! $row = Db::run ()->first ( Content::pTable, null, array (
				"page_type" => "register",
				"active" => 1 
		) )) {
			$tpl->data = null;
			$tpl->title = Lang::$word->META_ERROR;
			$tpl->template = 'front/themes/' . $core->theme . '/error.tpl.php';
			$tpl->error = DEBUG ? "Invalid page detected [front.class.php, ln.:" . __line__ . "]" : Lang::$word->META_ERROR;
		} else {
			$tpl->title = Url::formatMeta ( $row->{'title' . Lang::$lang} );
			$tpl->keywords = $row->{'keywords' . Lang::$lang};
			$tpl->description = $row->{'description' . Lang::$lang};
			
			$tpl->data = $row;
			$tpl->pageclass = "register";
			Content::$pagedata = $row;
			$tpl->custom_fields = Content::rendertCustomFieldsFront ( '', "profile" );
			$tpl->clist = $core->enable_tax ? App::Content ()->getCountryList () : '';
			$tpl->template = 'front/themes/' . $core->theme . '/register.tpl.php';
		}
	}
	
	/**
	 * FrontController::Registration()
	 *
	 * @return
	 *
	 */
	public function Registration() {
		$rules = array (
				'fname' => array (
						'required|string|min_len,3|max_len,60',
						Lang::$word->M_FNAME 
				),
				'lname' => array (
						'required|string|min_len,3|max_len,60',
						Lang::$word->M_LNAME 
				),
				'password' => array (
						'required|string|min_len,6|max_len,20',
						Lang::$word->M_PASSWORD 
				),
				'email' => array (
						'required|email',
						Lang::$word->M_EMAIL 
				),
				'captcha' => array (
						'required|numeric|exact_len,5',
						Lang::$word->CAPTCHA 
				) 
		);
		
		$filters = array (
				'fname' => 'string',
				'lname' => 'string' 
		);
		
		if (App::Core ()->enable_tax) {
			$rules ['address'] = array (
					'required|string|min_len,3|max_len,80',
					Lang::$word->M_ADDRESS 
			);
			$rules ['city'] = array (
					'required|string|min_len,2|max_len,80',
					Lang::$word->M_CITY 
			);
			$rules ['zip'] = array (
					'required|string|min_len,3|max_len,30',
					Lang::$word->M_ZIP 
			);
			$rules ['state'] = array (
					'required|string|min_len,2|max_len,80',
					Lang::$word->M_STATE 
			);
			$rules ['country'] = array (
					'required|string|exact_len,2',
					Lang::$word->M_COUNTRY 
			);
			
			$filters = array (
					'address' => 'string',
					'city' => 'string',
					'zip' => 'string',
					'state' => 'string',
					'country' => 'string' 
			);
			
		}
		
		$validate = Validator::instance ();
		$safe = $validate->doValidate ( $_POST, $rules );
		$safe = $validate->doFilter ( $_POST, $filters );
		
		if (App::Session ()->get ( 'wcaptcha' ) != $_POST ['captcha'])
			Message::$msgs ['captcha'] = Lang::$word->CAPTCHA;
		
		if (! empty ( $safe->email )) {
			if (Auth::emailExists ( $safe->email ))
				Message::$msgs ['email'] = Lang::$word->M_EMAIL_R2;
		}
		
		Content::verifyCustomFields ( "profile" );
		
		if (empty ( Message::$msgs )) {
			$salt = '';
			$hash = App::Auth ()->create_hash ( Validator::cleanOut ( $_POST ['password'] ), $salt );
			$username = Utility::randomString ();
			$core = App::Core ();
			
			if ($core->reg_verify == 1) {
				$active = "t";
			} elseif ($core->auto_verify == 0) {
				$active = "n";
			} else {
				$active = "y";
			}
			
			$data = array (
					'username' => $username,
					'email' => $safe->email,
					'lname' => $safe->lname,
					'fname' => $safe->fname,
					'hash' => $hash,
					'salt' => $salt,
					'type' => "member",
					'token' => Utility::randNumbers (),
					'active' => $active,
					'userlevel' => 1 
			);
			
			if (App::Core ()->enable_tax) {
				$data ['address'] = $safe->address;
				$data ['city'] = $safe->city;
				$data ['state'] = $safe->state;
				$data ['zip'] = $safe->zip;
				$data ['country'] = $safe->country;
			}
			
			$last_id = Db::run ()->insert ( Users::mTable, $data )->getLastInsertId ();
			
			// Start Custom Fields
			$fl_array = Utility::array_key_exists_wildcard ( $_POST, 'custom_*', 'key-value' );
			if ($fl_array) {
				$fields = Db::run ()->select ( Content::cfTable )->results ();
				foreach ( $fields as $row ) {
					$dataArray [] = array (
							'user_id' => $last_id,
							'field_id' => $row->id,
							'field_name' => $row->name,
							'section' => "profile" 
					);
				}
				Db::run ()->insertBatch ( Content::cfdTable, $dataArray );
				
				foreach ( $fl_array as $key => $val ) {
					$cfdata ['field_value'] = Validator::sanitize ( $val );
					Db::run ()->update ( Content::cfdTable, $cfdata, array (
							"user_id" => $last_id,
							"field_name" => str_replace ( "custom_", "", $key ) 
					) );
				}
			}
			
			if ($core->reg_verify == 1) {
				$message = Lang::$word->M_INFO7;
				$json ['redirect'] = SITEURL;
				
				$mailer = Mailer::sendMail ();
				$tpl = Db::run ()->first ( Content::eTable, array (
						"body" . Lang::$lang . " as body",
						"subject" . Lang::$lang . " as subject" 
				), array (
						'typeid' => 'regMail' 
				) );
				$body = str_replace ( array (
						'[LOGO]',
						'[DATE]',
						'[COMPANY]',
						'[USERNAME]',
						'[PASSWORD]',
						'[LINK]',
						'[FB]',
						'[TW]',
						'[SITEURL]' 
				), array (
						Utility::getLogo (),
						date ( 'Y' ),
						$core->company,
						$username,
						$safe->password,
						Url::url ( '/' . $core->system_slugs->activate [0]->{'slug' . Lang::$lang}, '?token=' . $data ['token'] . '&email=' . $data ['email'] ),
						$core->social->facebook,
						$core->social->twitter,
						SITEURL 
				), $tpl->body );
				
				$msg = Swift_Message::newInstance ()->setSubject ( $tpl->subject )->setTo ( array (
						$data ['email'] => $data ['fname'] . ' ' . $data ['lname'] 
				) )->setFrom ( array (
						$core->site_email => $core->company 
				) )->setBody ( $body, 'text/html' );
				$mailer->send ( $msg );
			} elseif ($core->auto_verify == 0) {
				$message = Lang::$word->M_INFO7;
				$json ['redirect'] = SITEURL;
				
				$mailer = Mailer::sendMail ();
				$tpl = Db::run ()->first ( Content::eTable, array (
						"body" . Lang::$lang . " as body",
						"subject" . Lang::$lang . " as subject" 
				), array (
						'typeid' => 'regMailPending' 
				) );
				$body = str_replace ( array (
						'[LOGO]',
						'[DATE]',
						'[COMPANY]',
						'[USERNAME]',
						'[PASSWORD]',
						'[FB]',
						'[TW]',
						'[SITEURL]' 
				), array (
						Utility::getLogo (),
						date ( 'Y' ),
						$core->company,
						$username,
						$safe->password,
						$core->social->facebook,
						$core->social->twitter,
						SITEURL 
				), $tpl->body );
				
				$msg = Swift_Message::newInstance ()->setSubject ( $tpl->subject )->setTo ( array (
						$data ['email'] => $data ['fname'] . ' ' . $data ['lname'] 
				) )->setFrom ( array (
						$core->site_email => $core->company 
				) )->setBody ( $body, 'text/html' );
				$mailer->send ( $msg );
			} else {
				// login user
				App::Auth ()->login ( $safe->email, $safe->password );
				$message = Lang::$word->M_INFO8;
				$json ['redirect'] = Url::url ( '/' . $core->system_slugs->account [0]->{'slug' . Lang::$lang} );
				
				$mailer = Mailer::sendMail ();
				$tpl = Db::run ()->first ( Content::eTable, array (
						"body" . Lang::$lang . " as body",
						"subject" . Lang::$lang . " as subject" 
				), array (
						'typeid' => 'welcomeEmail' 
				) );
				$body = str_replace ( array (
						'[LOGO]',
						'[DATE]',
						'[LINK]',
						'[COMPANY]',
						'[USERNAME]',
						'[PASSWORD]',
						'[FB]',
						'[TW]',
						'[SITEURL]' 
				), array (
						Utility::getLogo (),
						date ( 'Y' ),
						Url::url ( "" ),
						$core->company,
						$username,
						$safe->password,
						$core->social->facebook,
						$core->social->twitter,
						SITEURL 
				), $tpl->body );
				
				$msg = Swift_Message::newInstance ()->setSubject ( $tpl->subject )->setTo ( array (
						$data ['email'] => $data ['fname'] . ' ' . $data ['lname'] 
				) )->setFrom ( array (
						$core->site_email => $core->company 
				) )->setBody ( $body, 'text/html' );
				$mailer->send ( $msg );
			}
			
			if ($core->notify_admin) {
				$mailer = Mailer::sendMail ();
				$tpl = Db::run ()->first ( Content::eTable, array (
						"body" . Lang::$lang . " as body",
						"subject" . Lang::$lang . " as subject" 
				), array (
						'typeid' => 'notifyAdmin' 
				) );
				$body = str_replace ( array (
						'[LOGO]',
						'[DATE]',
						'[EMAIL]',
						'[COMPANY]',
						'[USERNAME]',
						'[NAME]',
						'[IP]',
						'[FB]',
						'[TW]',
						'[SITEURL]' 
				), array (
						Utility::getLogo (),
						date ( 'Y' ),
						$safe->email,
						$core->company,
						$username,
						$data ['fname'] . ' ' . $data ['lname'],
						Url::getIP (),
						$core->social->facebook,
						$core->social->twitter,
						SITEURL 
				), $tpl->body );
				
				$msg = Swift_Message::newInstance ()->setSubject ( $tpl->subject )->setTo ( array (
						$core->site_email => $core->company 
				) )->setFrom ( array (
						$core->site_email => $core->company 
				) )->setBody ( $body, 'text/html' );
				$mailer->send ( $msg );
			}
			
			if (Db::run ()->affected () && $mailer) {
				$json ['type'] = 'success';
				$json ['title'] = Lang::$word->SUCCESS;
				$json ['message'] = $message;
				print json_encode ( $json );
			} else {
				$json ['type'] = 'error';
				$json ['title'] = Lang::$word->ERROR;
				$json ['message'] = Lang::$word->M_INFO11;
				print json_encode ( $json );
			}
		} else {
			Message::msgSingleStatus ();
		}
	}
	
	/**
	 * FrontController::Activation()
	 *
	 * @return
	 *
	 */
	public function Activation() {
		$core = App::Core ();
		$tpl = App::View ( BASEPATH . 'view/' );
		$tpl->dir = "front/themes/" . $core->theme . "/full/";
		$tpl->title = str_replace ( "[COMPANY]", $core->company, Lang::$word->META_T31 );
		$tpl->keywords = null;
		$tpl->description = null;
		$tpl->menu = App::Content ()->menuTree ( true );
		$tpl->core = $core;
		
		if (! $row = Db::run ()->first ( Content::pTable, null, array (
				"page_type" => "activate",
				"active" => 1 
		) )) {
			$tpl->data = null;
			$tpl->title = Lang::$word->META_ERROR;
			$tpl->template = 'front/themes/' . $core->theme . '/error.tpl.php';
			$tpl->error = DEBUG ? "Invalid page detected [front.class.php, ln.:" . __line__ . "]" : Lang::$word->META_ERROR;
		} else {
			$tpl->title = Url::formatMeta ( $row->{'title' . Lang::$lang} );
			$tpl->keywords = $row->{'keywords' . Lang::$lang};
			$tpl->description = $row->{'description' . Lang::$lang};
			
			$tpl->data = $row;
			$tpl->pageclass = "activation";
			Content::$pagedata = $row;
			$tpl->template = 'front/themes/' . $core->theme . '/activation.tpl.php';
			
			if (Validator::get ( 'token' ) and Validator::get ( 'email' )) {
				$rules = array (
						'email' => array (
								'required|email',
								Lang::$word->M_EMAIL 
						),
						'token' => array (
								'required|numeric|min_len,5|max_len,12',
								Lang::$word->M_INFO10 
						) 
				);
				
				$filters = array (
						'token' => 'string' 
				);
				
				$validate = Validator::instance ();
				$safe = $validate->doValidate ( $_GET, $rules );
				$safe = $validate->doFilter ( $_GET, $filters );
				
				if (empty ( Message::$msgs )) {
					if ($row = Db::run ()->first ( Users::mTable, array (
							"id" 
					), array (
							"email" => $safe->email,
							"token" => $safe->token 
					) )) {
						Db::run ()->update ( Users::mTable, array (
								"active" => "y",
								"token" => 0 
						), array (
								"id" => $row->id 
						) );
						Url::redirect ( Url::url ( '/' . $core->system_slugs->activate [0]->{'slug' . Lang::$lang}, "?done=true" ) );
					} else {
						Url::url ( '/' . $core->system_slugs->activate [0]->{'slug' . Lang::$lang}, "?error=true" );
					}
				} else {
					Url::url ( '/' . $core->system_slugs->activate [0]->{'slug' . Lang::$lang}, "?error=true" );
				}
			} else {
				Url::url ( '/' . $core->system_slugs->activate [0]->{'slug' . Lang::$lang}, "?error=true" );
			}
		}
	}
	
	/**
	 * FrontController::Dashboard()
	 *
	 * @return
	 *
	 */
	public function Dashboard() {
		if (! App::Auth ()->is_User ()) {
			Url::redirect ( SITEURL );
			exit ();
		}
		
		$core = App::Core ();
		$tpl = App::View ( BASEPATH . 'view/' );
		$tpl->dir = "front/themes/" . $core->theme . "/";
		$tpl->title = str_replace ( "[COMPANY]", $core->company, Lang::$word->META_T31 );
		$tpl->keywords = null;
		$tpl->description = null;
		$tpl->menu = App::Content ()->menuTree ( true );
		$tpl->core = $core;
		
		if (! $row = Db::run ()->first ( Content::pTable, null, array (
				"page_type" => "account",
				"active" => 1 
		) )) {
			$tpl->data = null;
			$tpl->title = Lang::$word->META_ERROR;
			$tpl->template = 'front/themes/' . $core->theme . '/error.tpl.php';
			$tpl->error = DEBUG ? "Invalid page detected [front.class.php, ln.:" . __line__ . "]" : Lang::$word->META_ERROR;
		} else {
			$tpl->title = Url::formatMeta ( $row->{'title' . Lang::$lang} );
			$tpl->keywords = $row->{'keywords' . Lang::$lang};
			$tpl->description = $row->{'description' . Lang::$lang};
			$tpl->memberships = Db::run ()->select ( Membership::mTable, null, array (
					"private" => 0 
			), "ORDER BY price" )->results ();
			
			$tpl->data = $row;
			$tpl->url = $core->system_slugs->account [0]->{'slug' . Lang::$lang};
			Content::$pagedata = $row;
			$tpl->template = 'front/themes/' . $core->theme . '/account.tpl.php';
		}
	}
	
	/**
	 * FrontController::Profile()
	 *
	 * @return
	 *
	 */
	public function Profile($username) {
		$core = App::Core ();
		$tpl = App::View ( BASEPATH . 'view/' );
		$tpl->dir = "front/themes/" . $core->theme . "/";
		$tpl->title = str_replace ( "[COMPANY]", $core->company, Lang::$word->META_T31 );
		$tpl->keywords = null;
		$tpl->description = null;
		$tpl->menu = App::Content ()->menuTree ( true );
		$tpl->core = $core;
		
		if (! $row = Db::run ()->first ( Users::mTable, null, array (
				"username" => $username,
				"active" => "y" 
		) )) {
			$tpl->data = null;
			$tpl->title = Lang::$word->META_ERROR;
			$tpl->template = 'front/themes/' . $core->theme . '/error.tpl.php';
			$tpl->error = DEBUG ? "Invalid user detected [front.class.php, ln.:" . __line__ . "]" : Lang::$word->META_ERROR;
		} else {
			$tpl->title = Url::formatMeta ( Lang::$word->META_T32 );
			$tpl->keywords = $username;
			$tpl->description = $row->info;
			
			$tpl->data = $row;
			// $tpl->activity = Db::run()->select(Users::aTable, null, array("user_id" => $row->id), "ORDER BY created DESC");
			$tpl->template = 'front/themes/' . $core->theme . '/profile.tpl.php';
		}
	}
	
	/**
	 * FrontController::History()
	 *
	 * @return
	 *
	 */
	public function History() {
		if (! App::Auth ()->is_User ()) {
			Url::redirect ( SITEURL );
			exit ();
		}
		
		$core = App::Core ();
		$tpl = App::View ( BASEPATH . 'view/' );
		$tpl->dir = "front/themes/" . $core->theme . "/";
		$tpl->title = str_replace ( "[COMPANY]", $core->company, Lang::$word->META_T31 );
		$tpl->keywords = null;
		$tpl->description = null;
		$tpl->menu = App::Content ()->menuTree ( true );
		$tpl->core = $core;
		
		if (! $row = Db::run ()->first ( Content::pTable, null, array (
				"page_type" => "account",
				"active" => 1 
		) )) {
			$tpl->data = null;
			$tpl->title = Lang::$word->META_ERROR;
			$tpl->template = 'front/themes/' . $core->theme . '/error.tpl.php';
			$tpl->error = DEBUG ? "Invalid page detected [front.class.php, ln.:" . __line__ . "]" : Lang::$word->META_ERROR;
		} else {
			$tpl->title = Url::formatMeta ( $row->{'title' . Lang::$lang} );
			$tpl->keywords = $row->{'keywords' . Lang::$lang};
			$tpl->description = $row->{'description' . Lang::$lang};
			$tpl->history = Stats::userHistory ( App::Auth ()->uid, 'expire' );
			
			$tpl->data = $row;
			$tpl->url = $core->system_slugs->account [0]->{'slug' . Lang::$lang};
			Content::$pagedata = $row;
			$tpl->template = 'front/themes/' . $core->theme . '/account.tpl.php';
		}
	}
	
	/**
	 * FrontController::Settings()
	 *
	 * @return
	 *
	 */
	public function Settings() {
		if (! App::Auth ()->is_User ()) {
			Url::redirect ( SITEURL );
			exit ();
		}
		
		$core = App::Core ();
		$tpl = App::View ( BASEPATH . 'view/' );
		$tpl->dir = "front/themes/" . $core->theme . "/";
		$tpl->title = str_replace ( "[COMPANY]", $core->company, Lang::$word->META_T31 );
		$tpl->keywords = null;
		$tpl->description = null;
		$tpl->menu = App::Content ()->menuTree ( true );
		$tpl->core = $core;
		
		if (! $row = Db::run ()->first ( Content::pTable, null, array (
				"page_type" => "account",
				"active" => 1 
		) )) {
			$tpl->data = null;
			$tpl->title = Lang::$word->META_ERROR;
			$tpl->template = 'front/themes/' . $core->theme . '/error.tpl.php';
			$tpl->error = DEBUG ? "Invalid page detected [front.class.php, ln.:" . __line__ . "]" : Lang::$word->META_ERROR;
		} else {
			$tpl->title = Url::formatMeta ( $row->{'title' . Lang::$lang} );
			$tpl->keywords = $row->{'keywords' . Lang::$lang};
			$tpl->description = $row->{'description' . Lang::$lang};
			$tpl->user = Db::run ()->first ( Users::mTable, null, array (
					'id' => App::Auth ()->uid 
			) );
			$tpl->data = $row;
			
			$tpl->custom_fields = Content::rendertCustomFields ( App::Auth ()->uid, "profile" );
			if ($core->enable_tax) {
				$tpl->clist = App::Content ()->getCountryList ();
			}
			$tpl->url = $core->system_slugs->account [0]->{'slug' . Lang::$lang};
			Content::$pagedata = $row;
			$tpl->template = 'front/themes/' . $core->theme . '/account.tpl.php';
		}
	}
	
	/**
	 * FrontController::Validate()
	 *
	 * @return
	 *
	 */
	public function Validate() {
		if (! App::Auth ()->is_User ()) {
			Url::redirect ( SITEURL );
			exit ();
		}
		
		$core = App::Core ();
		$tpl = App::View ( BASEPATH . 'view/' );
		$tpl->dir = "front/themes/" . $core->theme . "/";
		$tpl->title = str_replace ( "[COMPANY]", $core->company, Lang::$word->META_T31 );
		$tpl->keywords = null;
		$tpl->description = null;
		$tpl->menu = App::Content ()->menuTree ( true );
		$tpl->core = $core;
		
		if (! $row = Db::run ()->first ( Content::pTable, null, array (
				"page_type" => "account",
				"active" => 1 
		) )) {
			$tpl->data = null;
			$tpl->title = Lang::$word->META_ERROR;
			$tpl->template = 'front/themes/' . $core->theme . '/error.tpl.php';
			$tpl->error = DEBUG ? "Invalid page detected [front.class.php, ln.:" . __line__ . "]" : Lang::$word->META_ERROR;
		} else {
			$tpl->title = Url::formatMeta ( $row->{'title' . Lang::$lang} );
			$tpl->keywords = $row->{'keywords' . Lang::$lang};
			$tpl->description = $row->{'description' . Lang::$lang};
			
			$tpl->data = $row;
			$tpl->url = $core->system_slugs->account [0]->{'slug' . Lang::$lang};
			Content::$pagedata = $row;
			$tpl->template = 'front/themes/' . $core->theme . '/account.tpl.php';
		}
	}
	
	/**
	 * FrontController::Search()
	 *
	 * @return
	 *
	 */
	public function Search() {
		$core = App::Core ();
		$tpl = App::View ( BASEPATH . 'view/' );
		$tpl->dir = "front/themes/" . $core->theme . "/";
		$tpl->title = str_replace ( "[COMPANY]", $core->company, Lang::$word->META_T31 );
		$tpl->keywords = null;
		$tpl->description = null;
		$tpl->menu = App::Content ()->menuTree ( true );
		$tpl->core = $core;
		
		if (! $row = Db::run ()->first ( Content::pTable, null, array (
				"page_type" => "search",
				"active" => 1 
		) )) {
			$tpl->data = null;
			$tpl->title = Lang::$word->META_ERROR;
			$tpl->template = 'front/themes/' . $core->theme . '/error.tpl.php';
			$tpl->error = DEBUG ? "Invalid page detected [front.class.php, ln.:" . __line__ . "]" : Lang::$word->META_ERROR;
		} else {
			$tpl->title = Url::formatMeta ( $row->{'title' . Lang::$lang} );
			$tpl->keywords = $row->{'keywords' . Lang::$lang};
			$tpl->description = $row->{'description' . Lang::$lang};
			
			$tpl->data = $row;
			
			$tpl->keyword = Validator::get ( 'keyword' );
			$tpl->pagedata = $this->searchResults ( Validator::sanitize ( $tpl->keyword, "string", 20 ) );
			$tpl->blogdata = array ();
			$tpl->portadata = array ();
			$tpl->digidata = array ();
			$tpl->url = $core->system_slugs->account [0]->{'slug' . Lang::$lang};
			Content::$pagedata = $row;
			$tpl->template = 'front/themes/' . $core->theme . '/search.tpl.php';
		}
	}
	
	/**
	 * FrontController::searchResults()
	 *
	 * @param string $keyword        	
	 * @return
	 *
	 */
	public function searchResults($keyword) {
		$sql = "
		  SELECT 
			title" . Lang::$lang . " AS title,
			body" . Lang::$lang . " AS body,
			slug" . Lang::$lang . " AS slug ,
			page_type
		  FROM
			`" . Content::pTable . "` 
		  WHERE (`title" . Lang::$lang . "` LIKE '%" . $keyword . "%') OR (`body" . Lang::$lang . "` LIKE '%" . $keyword . "%')
		  AND page_type = ?
		  ORDER BY created DESC 
		  LIMIT 10;";
		
		return Db::run ()->pdoQuery ( $sql, array (
				"normal" 
		) )->results ();
	}
	
	/**
	 * FrontController::Sitemap()
	 *
	 * @return
	 *
	 */
	public function Sitemap() {
		$core = App::Core ();
		$tpl = App::View ( BASEPATH . 'view/' );
		$tpl->dir = "front/themes/" . $core->theme . "/";
		$tpl->title = str_replace ( "[COMPANY]", $core->company, Lang::$word->META_T31 );
		$tpl->keywords = null;
		$tpl->description = null;
		$tpl->menu = App::Content ()->menuTree ( true );
		$tpl->core = $core;
		
		if (! $row = Db::run ()->first ( Content::pTable, null, array (
				"page_type" => "sitemap",
				"active" => 1 
		) )) {
			$tpl->data = null;
			$tpl->title = Lang::$word->META_ERROR;
			$tpl->template = 'front/themes/' . $core->theme . '/error.tpl.php';
			$tpl->error = DEBUG ? "Invalid page detected [front.class.php, ln.:" . __line__ . "]" : Lang::$word->META_ERROR;
		} else {
			$tpl->title = Url::formatMeta ( $row->{'title' . Lang::$lang} );
			$tpl->keywords = $row->{'keywords' . Lang::$lang};
			$tpl->description = $row->{'description' . Lang::$lang};
			
			$tpl->data = $row;
			$tpl->keyword = Validator::get ( 'keyword' );
			$tpl->pagedata = Db::run ()->select ( Content::pTable, array (
					"title" . Lang::$lang . " AS title",
					"slug" . Lang::$lang . " AS slug" 
			), array (
					"page_type" => "normal",
					"active" => 1 
			) )->results ();
			$tpl->blogdata = array ();
			$tpl->portadata = array ();
			$tpl->digidata = array ();
			$tpl->url = $core->system_slugs->account [0]->{'slug' . Lang::$lang};
			Content::$pagedata = $row;
			$tpl->template = 'front/themes/' . $core->theme . '/sitemap.tpl.php';
		}
	}
	
	/**
	 * FrontController::processContact()
	 *
	 * @return
	 *
	 */
	public function processContact() {
		$rules = array (
				'name' => array (
						'required|string|min_len,3|max_len,60',
						Lang::$word->NAME 
				),
				'notes' => array (
						'required|string|min_len,15|max_len,400',
						Lang::$word->MESSAGE 
				),
				'email' => array (
						'required|email',
						Lang::$word->M_EMAIL 
				),
				'captcha' => array (
						'required|numeric|exact_len,5',
						Lang::$word->CAPTCHA 
				) 
		);
		
		$filters = array (
				'subject' => 'trim|string',
				'notes' => 'trim|string',
				'phone' => 'trim|string' 
		);
		
		if (App::Session ()->get ( 'wcaptcha' ) != $_POST ['captcha'])
			Message::$msgs ['captcha'] = Lang::$word->CAPTCHA;
		
		$validate = Validator::instance ();
		$safe = $validate->doValidate ( $_POST, $rules );
		$safe = $validate->doFilter ( $_POST, $filters );
		
		if (empty ( Message::$msgs )) {
			$tpl = Db::run ()->first ( Content::eTable, array (
					"body" . Lang::$lang . " as ebody",
					"subject" . Lang::$lang . " as esubject" 
			), array (
					'typeid' => 'contact' 
			) );
			$mailer = Mailer::sendMail ();
			$core = App::Core ();
			
			$body = str_replace ( array (
					'[LOGO]',
					'[EMAIL]',
					'[NAME]',
					'[MAILSUBJECT]',
					'[PHONE]',
					'[MESSAGE]',
					'[IP]',
					'[DATE]',
					'[COMPANY]',
					'[FB]',
					'[TW]',
					'[SITEURL]' 
			), array (
					Utility::getLogo (),
					$safe->email,
					$safe->name,
					$safe->subject,
					$safe->phone,
					$safe->notes,
					Url::getIP (),
					date ( 'Y' ),
					$core->company,
					$core->social->facebook,
					$core->social->twitter,
					SITEURL 
			), $tpl->ebody );
			
			$msg = Swift_Message::newInstance ()->setSubject ( $tpl->esubject )->setFrom ( array (
					$safe->email => $safe->name 
			) )->setTo ( array (
					$core->site_email => $core->company 
			) )->setBody ( $body, 'text/html' );
			
			if ($mailer->send ( $msg )) {
				$json ['type'] = 'success';
				$json ['title'] = Lang::$word->SUCCESS;
				$json ['message'] = Lang::$word->CF_OK;
			} else {
				$json ['type'] = 'error';
				$json ['title'] = Lang::$word->ERROR;
				$json ['message'] = Lang::$word->CF_ERR;
			}
			print json_encode ( $json );
		} else {
			Message::msgSingleStatus ();
		}
	}
	
	/**
	 * FrontController::passReset()
	 *
	 * @return
	 *
	 */
	public function passReset() {
		$rules = array (
				'email' => array (
						'required|email',
						Lang::$word->M_EMAIL 
				),
				'fname' => array (
						'required|string',
						Lang::$word->M_FNAME 
				) 
		);
		
		$validate = Validator::instance ();
		$safe = $validate->doValidate ( $_POST, $rules );
		
		if (! empty ( $safe->email ) and ! empty ( $safe->fname )) {
			if ($row = Db::run ()->first ( Users::mTable, array (
					"email",
					"fname",
					"lname",
					"username" 
			), array (
					'email' => $safe->email,
					"type" => "member" 
			) )) {
				if (Validator::sanitize ( $row->fname ) != Validator::sanitize ( $safe->fname )) {
					Message::$msgs ['fname'] = Lang::$word->LOGIN_R5;
					$json ['type'] = 'error';
				}
			} else {
				Message::$msgs ['email'] = Lang::$word->LOGIN_R5;
				$json ['type'] = 'error';
			}
		}
		
		if (empty ( Message::$msgs )) {
			$row = Db::run ()->first ( Users::mTable, array (
					"email",
					"fname",
					"lname",
					"id" 
			), array (
					"email" => $safe->email,
					"type" => "member" 
			) );
			$salt = '';
			$pass = substr ( md5 ( uniqid ( rand (), true ) ), 0, 10 );
			$data = array (
					'hash' => App::Auth ()->create_hash ( $pass, $salt ),
					'salt' => $salt 
			);
			
			$mailer = Mailer::sendMail ();
			$tpl = Db::run ()->first ( Content::eTable, array (
					"body" . Lang::$lang . " as body",
					"subject" . Lang::$lang . " as subject" 
			), array (
					'typeid' => 'userPassReset' 
			) );
			
			$body = str_replace ( array (
					'[LOGO]',
					'[NAME]',
					'[DATE]',
					'[COMPANY]',
					'[PASSWORD]',
					'[LINK]',
					'[IP]',
					'[FB]',
					'[TW]',
					'[SITEURL]' 
			), array (
					Utility::getLogo (),
					$row->fname . ' ' . $row->lname,
					date ( 'Y' ),
					App::Core ()->company,
					$pass,
					Url::url ( '/' . App::Core ()->system_slugs->login [0]->{'slug' . Lang::$lang} ),
					Url::getIP (),
					App::Core ()->social->facebook,
					App::Core ()->social->twitter,
					SITEURL 
			), $tpl->body );
			
			$msg = Swift_Message::newInstance ()->setSubject ( $tpl->subject )->setTo ( array (
					$row->email => $row->fname . ' ' . $row->lname 
			) )->setFrom ( array (
					App::Core ()->site_email => App::Core ()->company 
			) )->setBody ( $body, 'text/html' );
			
			Db::run ()->update ( Users::mTable, $data, array (
					'id' => $row->id 
			) );
			Message::msgReply ( $mailer->send ( $msg ), 'success', Lang::$word->M_PASSWORD_RES_D );
		} else {
			$json ['type'] = "error";
			print json_encode ( $json );
		}
	}
	
	/**
	 * FrontController::passReset()
	 *
	 * @return
	 *
	 */
	
	public function saveContactUs() {
			
		
		
		$rules = array (
				'fname' => array (
						'required|string|min_len,3|max_len,60',
						Lang::$word->NAME 
				),				
				'email' => array (
						'required|email',
						Lang::$word->M_EMAIL 
				),
				'notes' => array (
						'required|notes',
						Lang::$word->MESSAGE
				)
		);
		
		/*$filters = array (
				'subject' => 'trim|string',
				'notes' => 'trim|string',
				'phone' => 'trim|string' 
		);*/
		
		/*if (App::Session ()->get ( 'wcaptcha' ) != $_POST ['captcha'])
			Message::$msgs ['captcha'] = Lang::$word->CAPTCHA;*/
		
		$validate = Validator::instance ();
		$safe = $validate->doValidate ( $_POST, $rules );
		//$safe = $validate->doFilter ( $_POST, $filters );
		
		if (empty ( Message::$msgs )) {
			$tpl = Db::run ()->first ( Content::eTable, array (
					"body" . Lang::$lang . " as ebody",
					"subject" . Lang::$lang . " as esubject"
			), array (
					'typeid' => 'contact' 
			) );
			$mailer = Mailer::sendMail ();
			$core = App::Core ();
			
			$body = str_replace ( array (
					'[LOGO]',
					'[EMAIL]',
					'[NAME]',
					'[MAILSUBJECT]',
					//'[PHONE]',
					'[MESSAGE]',
					'[IP]',
					'[DATE]',
					'[COMPANY]',
					'[FB]',
					'[TW]',
					'[SITEURL]' 
			), array (
					Utility::getLogo (),
					$safe->email,
					$safe->name,
					//$safe->subject,
					"Contact US",
					//$safe->phone,
					//"0972032005",
					$safe->notes,
					Url::getIP (),
					date ( 'Y' ),
					$core->company,
					$core->social->facebook,
					$core->social->twitter,
					SITEURL 
			), $tpl->ebody );
			
			$msg = Swift_Message::newInstance ()->setSubject ( $tpl->esubject )->setFrom ( array (
					$safe->email => $safe->name 
			) )->setTo ( array (
					$core->site_email => $core->company 
			) )->setBody ( $body, 'text/html' );
			
			if ($mailer->send ( $msg )) {
				$json ['type'] = 'success';
				$json ['title'] = Lang::$word->SUCCESS;
				$json ['message'] = Lang::$word->CF_OK;
			} else {
				$json ['type'] = 'error';
				$json ['title'] = Lang::$word->ERROR;
				$json ['message'] = Lang::$word->CF_ERR;
			}
			print json_encode ( $json );
		} else {
			Message::msgSingleStatus ();
		}
	}
}