<?php
  /**
   * Header
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: header.tpl.php, v1.00 2015-10-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');

  if (!App::Auth()->is_Admin()) {
	  Url::redirect(SITEURL . '/admin/login/'); 
	  exit; 
  }
		   
  if(!Auth::hasPrivileges('manage_pages')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
 ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Page Builder</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="description" content="">
<link href="<?php echo THEMEURL . '/cache/' . Cache::cssCache(array('base.css','transition.css', 'button.css', 'divider.css', 'header.css', 'icon.css', 'flag.css', 'image.css', 'label.css', 'form.css', 'input.css', 'list.css','segment.css','card.css','table.css','menu.css','dropdown.css','popup.css','statistic.css','datepicker.css','message.css','dimmer.css','modal.css','progress.css','accordion.css','item.css','feed.css','comment.css','utility.css','style.css'), THEMEBASE);?>" rel="stylesheet" type="text/css">
<link title="tablet" href="<?php echo ADMINVIEW;?>/builder/assets/tablet.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo SITEURL;?>/assets/builder/builder.css" rel="stylesheet" type="text/css" />
<script src="<?php echo SITEURL;?>/assets/jquery.js" type="text/javascript"></script>
<script src="<?php echo SITEURL;?>/assets/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo SITEURL;?>/assets/global.js" type="text/javascript"></script>
<script src="<?php echo SITEURL;?>/assets/builder/styler.js" type="text/javascript"></script>
<script src="<?php echo SITEURL;?>/assets/builder/builder.js" type="text/javascript"></script>
<script src="<?php echo SITEURL;?>/assets/builder/editor.js" type="text/javascript"></script>
<link href="<?php echo THEMEURL . '/plugins/cache/' . Cache::pluginCssCache(THEMEBASE . '/plugins');?>" rel="stylesheet" type="text/css">
<link href="<?php echo THEMEURL . '/modules/cache/' . Cache::moduleCssCache(THEMEBASE . '/modules');?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo THEMEURL . '/plugins/cache/' . Cache::pluginJsCache(THEMEBASE . '/plugins');?>"></script>
<script type="text/javascript" src="<?php echo THEMEURL . '/modules/cache/' . Cache::moduleJsCache(THEMEBASE . '/modules');?>"></script>
</head>
<body>