<?php
  /**
   * Routers
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: routers.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');

  //Gallery
  $router->mount('/' . $core->modname['gallery'], function() use ($core, $router, $tpl) {
    $router->get('/', '/view/admin/modules_/gallery/@Gallery@FrontIndex');
	$router->get('/' . $core->modname['gallery-album'] . '/([a-z0-9_-]+)', '/view/admin/modules_/gallery/@Gallery@Render');

  });
  
  //Blog
  $router->mount('/' . $core->modname['blog'], function() use ($core, $router, $tpl) {
    $router->get('/', '/view/admin/modules_/blog/@Blog@FrontIndex');
	$router->get('/' . $core->modname['blog-cat'] . '/([a-z0-9_-]+)', '/view/admin/modules_/blog/@Blog@Category');
	$router->get('/' . $core->modname['blog-archive'] . '/([0-9]+)-([0-9]+)', '/view/admin/modules_/blog/@Blog@Archive');
	$router->get('/([a-z0-9_-]+)', '/view/admin/modules_/blog/@Blog@Render');
  });
  
  //Portfolio
  $router->mount('/' . $core->modname['portfolio'], function() use ($core, $router, $tpl) {
    $router->get('/', '/view/admin/modules_/portfolio/@Portfolio@FrontIndex');
	$router->get('/' . $core->modname['portfolio-cat'] . '/([a-z0-9_-]+)', '/view/admin/modules_/portfolio/@Portfolio@Category');
	$router->get('/([a-z0-9_-]+)', '/view/admin/modules_/portfolio/@Portfolio@Render');
  });
  
  //Digishop
  $router->mount('/' . $core->modname['digishop'], function() use ($core, $router, $tpl) {
    $router->get('/', '/view/admin/modules_/digishop/@Digishop@FrontIndex');
	$router->get('/' . $core->modname['digishop-checkout'], '/view/admin/modules_/digishop/@Digishop@Checkout');
	$router->get('/' . $core->modname['digishop-cat'] . '/([a-z0-9_-]+)', '/view/admin/modules_/digishop/@Digishop@Category');
	$router->get('/([a-z0-9_-]+)', '/view/admin/modules_/digishop/@Digishop@Render');
  });
  
  //Digishop history
  $router->get('/' . $core->system_slugs->account[0]->{'slug' . Lang::$lang} . '/digishop', '/view/admin/modules_/digishop/@Digishop@userHistory');
  