<?php
  /**
   * Index
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.php, v1.00 2016-06-05 10:12:05 gewa Exp $
   */
  define("_WOJO", true);

  include ('init.php');
  $core = App::Core();
  $router = new Router();
  $tpl = App::View(BASEPATH . 'view/');

  //admin routes
  $router->mount('/admin', function() use ($router, $tpl) {
      //admin login
	  $router->match('GET|POST', '/login', function () use ($tpl)
	  {
		  if (App::Auth()->is_Admin()) {
			  Url::redirect(SITEURL . '/admin/'); 
			  exit; 
		  }
		  
		  $tpl->template = 'admin/login.tpl.php'; 
		  $tpl->title = Lang::$word->LOGIN; 
	  });
	  
	  //admin index
	  $router->get('/', 'Admin@Index');

	  //admin users
	  $router->mount('/users', function() use ($router, $tpl) {
		  $router->match('GET|POST', '/', 'Users@Index');
		  $router->get('/grid', 'Users@Index');
		  $router->get('/edit/(\d+)', 'Users@Edit');
		  $router->get('/new', 'Users@Save');
		  $router->get('/history/(\d+)', 'Users@History');
	  });

	  //admin account
	  $router->mount('/myaccount', function() use ($router, $tpl) {
		  $router->get('/', 'Admin@Account');
		  $router->get('/password', 'Admin@Password');
	  });

	  //admin menus
	  $router->mount('/menus', function() use ($router, $tpl) {
		  $router->get('/', 'Content@Menus');
		  $router->get('/edit/(\d+)', 'Content@MenuEdit');
	  });
	  
	  //admin pages
	  $router->mount('/pages', function() use ($router, $tpl) {
		  $router->match('GET|POST', '/', 'Content@Pages');
		  $router->get('/edit/(\d+)', 'Content@PageEdit');
		  $router->get('/new', 'Content@PageSave');
	  });

	  //admin memberships
	  $router->mount('/memberships', function() use ($router, $tpl) {
		  $router->match('GET', '/', 'Membership@Index');
		  $router->get('/history/(\d+)', 'Membership@History');
		  $router->get('/edit/(\d+)', 'Membership@Edit');
		  $router->get('/new', 'Membership@Save');
	  });

	  //admin coupons
	  $router->mount('/coupons', function() use ($router, $tpl) {
		  $router->get('/', 'Content@Coupons');
		  $router->get('/edit/(\d+)', 'Content@CouponEdit');
		  $router->get('/new', 'Content@CouponSave');
	  });
	  
	  //admin email templates
	  $router->mount('/templates', function() use ($router, $tpl) {
		  $router->get('/', 'Content@Templates');
		  $router->get('/edit/(\d+)', 'Content@TemplateEdit');
	  });

	  //admin custom fields
	  $router->mount('/fields', function() use ($router, $tpl) {
		  $router->get('/', 'Content@Fields');
		  $router->get('/edit/(\d+)', 'Content@FieldEdit');
		  $router->get('/new', 'Content@FieldSave');
	  });

	  //admin countries
	  $router->mount('/countries', function() use ($router, $tpl) {
		  $router->get('/', 'Content@Countries');
		  $router->get('/edit/(\d+)', 'Content@CountryEdit');
	  });
	  
	  //admin file manager
	  $router->get('/manager', 'File@Index');

	  //admin page builder
	  $router->get('/builder/(\w+)/(\d+)', 'Admin@Builder');

	  //admin gateways
	  $router->mount('/gateways', function() use ($router, $tpl) {
		  $router->get('/', 'Admin@Gateways');
		  $router->get('/edit/(\d+)', 'Admin@GatewayEdit');
	  });

	  //admin languages
	  $router->mount('/languages', function() use ($router, $tpl) {
		  $router->match('GET', '/', 'Lang@Index');
		  $router->get('/edit/(\d+)', 'Lang@Edit');
		  $router->get('/translate/(\d+)', 'Lang@Translate');
		  $router->get('/new', 'Lang@Save');
	  });
	  
	  //admin permissions
	  $router->mount('/permissions', function() use ($router, $tpl) {
		  $router->get('/', 'Admin@Permissions');
		  $router->get('/privileges/(\d+)', 'Admin@Privileges');
	  });

	  //admin plugins
	  $router->mount('/plugins', function() use ($router, $tpl) {
		  $router->get('/', 'Plugins@Index');
		  $router->get('/edit/(\d+)', 'Plugins@Edit');
		  $router->get('/new', 'Plugins@Save');
		  
		  //admin individual plugins
		  include_once(APLUGPATH . 'routes.php');
	  });

	  //admin modules
	  $router->mount('/modules', function() use ($router, $tpl) {
		  $router->get('/', 'Modules@Index');
		  $router->get('/edit/(\d+)', 'Modules@Edit');

		  //admin individual modules
		  include_once(AMODPATH . 'routes.php');
	  });
	  
	  //admin backup
	  $router->get('/backup', 'Admin@Backup');
	  
	  //admin system
	  $router->get('/system', 'Admin@System');

	  //admin newsletter
	  $router->get('/mailer', 'Admin@Mailer');

	  //admin layout
	  $router->get('/layout', 'Plugins@Layout');

	  //admin transactions
	  $router->match('GET|POST', '/transactions', 'Admin@Transactions');

	  //admin configuration
	  $router->get('/configuration', 'Admin@Configuration');

	  //admin trash
	  $router->get('/trash', 'Admin@Trash');
	  
	  //logout
	  $router->before('GET', '/logout', function()
	  {   
	      if(App::Auth()->logged_in) {
		     App::Auth()->logout();
	      }
		  Url::redirect(SITEURL . '/admin/');
	  });
  
  });

  /* front end routes */
  //home
  $router->match('GET|POST', '/', 'FrontController@Index');

  //pages
  $router->match('GET|POST', '/' . $core->pageslug . '/([a-z0-9_-]+)', 'FrontController@Page');
  
  
  //login page
  $router->match('GET|POST', '/' . $core->system_slugs->login[0]->{'slug' . Lang::$lang}, 'FrontController@Login');

  //register page
  $router->match('GET|POST', '/' . $core->system_slugs->register[0]->{'slug' . Lang::$lang}, 'FrontController@Register');

  //search page
  $router->match('GET|POST', '/' . $core->system_slugs->search[0]->{'slug' . Lang::$lang}, 'FrontController@Search');

  //sitemap page
  $router->match('GET|POST', '/' . $core->system_slugs->sitemap[0]->{'slug' . Lang::$lang}, 'FrontController@Sitemap');
  
  //account page
  $router->mount('/' . $core->system_slugs->account[0]->{'slug' . Lang::$lang}, function() use ($router, $tpl) {
	  $router->get('/', 'FrontController@Dashboard');
	  $router->get('/history', 'FrontController@History');
	  $router->get('/settings', 'FrontController@Settings');
	  $router->get('/validate', 'FrontController@Validate');
  });
	  
  //activation page
  $router->match('GET|POST', '/' . $core->system_slugs->activate[0]->{'slug' . Lang::$lang}, 'FrontController@Activation');

  //profile page
  $router->match('GET|POST', '/' . $core->system_slugs->profile[0]->{'slug' . Lang::$lang} . '/([a-z0-9_-]+)', 'FrontController@Profile');
  
  //modules
  include_once (FMODPATH . "routes.php");

  //logout
  $router->get('/logout', function()
  {
	  App::Auth()->logout();
	  Url::redirect(SITEURL . '/');
  });
  
  //404
  $router->set404(function () use($core, $router)
  {
      $tpl = App::View(BASEPATH . 'view/'); 
	  $tpl->dir = $router->segments[0] == "admin" ? "admin/" : "front/themes/" . $core->theme . "/";
	  $tpl->segments = $router->segments;
	  $tpl->menu = App::Content()->menuTree(true);
	  $tpl->data = null;
	  $tpl->core = $core;
	  $tpl->title = Lang::$word->META_ERROR; 
	  $tpl->keywords = null;
	  $tpl->description = null;
	  $tpl->template = $router->segments[0] == "admin" ? 'admin/404.tpl.php' : "front/themes/" . $core->theme . "/404.tpl.php"; 
	  echo $tpl->render(); 
  });

  // Maintenance mode
  if ($core->offline == 1 && !App::Auth()->is_Admin() && !preg_match("#admin/#", $_SERVER['REQUEST_URI'])) {
	  Url::redirect(SITEURL . "/maintenance.php");
	  exit;
  }
  
  // Run router
  $router->run(function () use($tpl, $router)
  {
	  $tpl->segments = $router->segments;
	  Content::$segments = $router->segments;
      echo $tpl->render(); 
  });