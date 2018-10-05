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
 ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title><?php echo $this->title;?></title>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/jquery.js"></script>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/global.js"></script>
<?php if(in_array(Core::$language, array("ar", "he"))):?>
<link href="<?php echo ADMINVIEW . '/cache/' . Cache::cssCache(array('base_rtl.css','transition_rtl.css','dropdown_rtl.css','menu_rtl.css','image_rtl.css','button_rtl.css','message_rtl.css','list_rtl.css','table_rtl.css','datepicker_rtl.css','divider_rtl.css','form_rtl.css','input_rtl.css','icon_rtl.css','flags_rtl.css','label_rtl.css','segment_rtl.css','popup_rtl.css','dimmer_rtl.css','modal_rtl.css','progress_rtl.css','utility_rtl.css','style_rtl.css'), ADMINBASE);?>" rel="stylesheet" type="text/css" />
<?php else:?>
<link href="<?php echo ADMINVIEW . '/cache/' . Cache::cssCache(array('base.css','transition.css','dropdown.css','menu.css','image.css','button.css','message.css','list.css','table.css','datepicker.css','divider.css','form.css','input.css','icon.css','flags.css','label.css','segment.css','popup.css','dimmer.css','modal.css','progress.css','utility.css','style.css'), ADMINBASE);?>" rel="stylesheet" type="text/css" />
<?php endif;?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
</head>
<body>
<div id="mResults" class="wojo page inverted dimmer">
  <div class="padding"></div>
</div>
<div id="wrapper">
<div class="container">
<aside> <a id="mnav-alt"><i class="icon reorder"></i></a> <a href="<?php echo ADMINURL;?>/" class="logo"><?php echo (App::Core()->logo) ? '<img src="' . SITEURL . '/uploads/' . App::Core()->logo . '" alt="'.App::Core()->company . '">': App::Core()->company;?></a>
  <div class="menuwrap">
    <nav>
      <ul>
        <li<?php if (count($this->segments) == 1) echo ' class="active"';?>><a href="<?php echo ADMINURL;?>"><img src="<?php echo ADMINVIEW;?>/images/dash.svg"> <span><?php echo Lang::$word->ADM_DASH;?></span></a></li>
        <li<?php if (Utility::in_array_any(["templates","menus","pages","languages","fields","coupons"], $this->segments)) echo ' class="active"';?>><a class="collapsed"><img src="<?php echo ADMINVIEW;?>/images/content.svg"> <span><?php echo Lang::$word->ADM_CONTENT;?></span></a>
          <ul>
          <?php if (Auth::hasPrivileges('manage_menus')):?>
          <li><a<?php if (in_array("menus", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/menus");?>"><?php echo Lang::$word->ADM_MENUS;?></a></li>
          <?php endif;?>
          <?php if (Auth::hasPrivileges('manage_pages')):?>
          <li><a<?php if (in_array("pages", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/pages");?>"><?php echo Lang::$word->ADM_PAGES;?></a></li>
          <?php endif;?>
          <?php if (Auth::hasPrivileges('manage_coupons')):?>
            <li><a<?php if (in_array("coupons", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/coupons");?>"><?php echo Lang::$word->ADM_COUPONS;?></a></li>
           <?php endif;?>
 
           <?php if (Auth::hasPrivileges('manage_languages')):?>
            <li><a<?php if (in_array("languages", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/languages");?>"><?php echo Lang::$word->ADM_LNGMNG;?></a></li>
           <?php endif;?>
           
          <?php if (Auth::hasPrivileges('manage_fields')):?>
            <li><a<?php if (in_array("fields", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/fields");?>"><?php echo Lang::$word->ADM_CFIELDS;?></a></li>
           <?php endif;?>

          <?php if (Auth::hasPrivileges('manage_email')):?>
            <li><a<?php if (in_array("templates", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/templates");?>"><?php echo Lang::$word->ADM_EMTPL;?></a></li>
           <?php endif;?>
           
          </ul>
        </li>
        <li<?php if (in_array("users", $this->segments)) echo ' class="active"';?>><a href="<?php echo Url::url("/admin/users");?>"><img src="<?php echo ADMINVIEW;?>/images/users.svg"> <span><?php echo Lang::$word->ADM_USERS;?></span></a></li>
        
        <li<?php if (in_array("layout", $this->segments)) echo ' class="active"';?>><a href="<?php echo Url::url("/admin/layout");?>"><img src="<?php echo ADMINVIEW;?>/images/layout.svg"> <span><?php echo Lang::$word->ADM_LAYOUT;?></span></a></li>
        
        
        <li<?php if (in_array("memberships", $this->segments)) echo ' class="active"';?>><a href="<?php echo Url::url("/admin/memberships");?>"><img src="<?php echo ADMINVIEW;?>/images/membership.svg"> <span>Memberships</span></a></li>
        
        <li<?php if (in_array("modules", $this->segments)) echo ' class="active"';?>><a href="<?php echo Url::url("/admin/modules");?>"><img src="<?php echo ADMINVIEW;?>/images/modules.svg"> <span>Modules</span></a></li>

<?php if (Auth::hasPrivileges('manage_plugins')):?>
        <li<?php if (in_array("plugins", $this->segments)) echo ' class="active"';?>><a href="<?php echo Url::url("/admin/plugins");?>"><img src="<?php echo ADMINVIEW;?>/images/plugins.svg"> <span><?php echo Lang::$word->PLUGINS;?></span></a></li>
        <?php endif;?>
        
        <li<?php if (Utility::in_array_any(["backup", "manager", "mailer", "countries", "configuration"], $this->segments)) echo ' class="active"';?>><a class="collapsed"><img src="<?php echo ADMINVIEW;?>/images/settings.svg"> <span>Configuration</span></a>
          <ul>
            <?php if (Auth::checkAcl("owner")):?>
            <li><a<?php if (in_array("configuration", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/configuration");?>"><?php echo Lang::$word->ADM_SYSTEM;?></a></li>
            <?php endif;?>
          <?php if (Auth::hasPrivileges('manage_backup')):?>
            <li><a<?php if (in_array("backup", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/backup");?>"><?php echo Lang::$word->ADM_BACKUP;?></a></li>
            <?php endif;?>
            <?php if (Auth::hasPrivileges('manage_files')):?>
            <li><a<?php if (in_array("manager", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/manager");?>"><?php echo Lang::$word->ADM_FM;?></a></li>
            <?php endif;?>
            <?php if (Auth::hasPrivileges('manage_newsletter')):?>
            <li><a<?php if (in_array("mailer", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/mailer");?>"><?php echo Lang::$word->ADM_NEWSL;?></a></li>
            <?php endif;?>
            <?php if (Auth::hasPrivileges('manage_countries')):?>
            <li><a<?php if (in_array("countries", $this->segments)) echo ' class="active"';?> href="<?php echo Url::url("/admin/countries");?>"><?php echo Lang::$word->ADM_CNTR;?></a></li>
            <?php endif;?>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>
<main>
<div id="topbar">
<div class="row align-middle">
  <div class="column shrink"><a id="mnav"><i class="icon reorder"></i></a></div>
  <div class="column">
    <div class="wojo small breadcrumb"> <?php echo Url::crumbs($this->crumbs ? $this->crumbs : $this->segments, "//", Lang::$word->HOME);?> </div>
  </div>
  <div class="column shrink padding-right">
    <div class="wojo top right pointing dropdown"><img src="<?php echo UPLOADURL;?>/avatars/<?php echo (App::Auth()->avatar) ? App::Auth()->avatar : "blank.png";?>" alt="" class="wojo basic tiny circular image">
      <div class="menu"> <a class="item" href="<?php echo Url::url("/admin/myaccount");?>"><i class="icon note"></i><?php echo Lang::$word->M_MYACCOUNT;?></a> <a class="item" href="<?php echo Url::url("/admin/myaccount/password");?>"> <i class="icon lock"></i><?php echo Lang::$word->M_SUB2;?></a> </div>
    </div>
  </div>
  <?php if (Auth::checkAcl("owner")):?>
  <div class="column shrink padding-right">
    <div class="wojo top right pointing dropdown"><i class="icon black apps link"></i>
      <div class="menu"> <a class="item" href="<?php echo Url::url("/admin/permissions");?>"><?php echo Lang::$word->ADM_PERMS;?></a> 
      <a class="item" href="<?php echo Url::url("/admin/gateways");?>"><?php echo Lang::$word->ADM_GATE;?></a> 
      <a class="item" href="<?php echo Url::url("/admin/transactions");?>"><?php echo Lang::$word->ADM_TRANS;?></a>
      <a class="item" href="<?php echo Url::url("/admin/system");?>"><?php echo Lang::$word->ADM_SYSINFO;?></a>
      <a class="item" href="<?php echo Url::url("/admin/trash");?>"><?php echo Lang::$word->ADM_TRASH;?></a>
      </div>
    </div>
  </div>
  <?php endif;?>
  <div class="column shrink"><a href="<?php echo Url::url("/admin/logout");?>"><i class="icon black power link"></i></a></div>
</div>
</div>