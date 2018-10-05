<?php
  /**
   * Account
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: account.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<main>
  <div id="userProfile"<?php if($uimg = Session::getCookie('CMSPRO_POSTER')):?> style="background-image: url('<?php echo THEMEURL . '/images/userbg/' . $uimg;?>')"<?php endif;?>> <a id="changePoster"><i class="icon horizontal ellipsis"></i></a>
    <div class="wojo-grid">
      <div class="half-bottom-margin">
        <input type="file" name="avatar" data-process="true" data-action="avatar" data-class="rounded" data-type="image" data-exist="<?php echo UPLOADURL;?>/avatars/<?php echo (Auth::$udata->avatar) ? Auth::$udata->avatar : "blank.png";?>" accept="image/png, image/jpeg">
      </div>
      <h5 class="wojo header inverted"><?php echo Lang::$word->WELCOMEBACK;?> <?php echo Auth::$udata->name;?>!</h5>
    </div>
  </div>
  <ul class="wojo fluid tabs">
    <li<?php if (count($this->segments) == 1) echo ' class="active"';?>><a href="<?php echo Url::url('/' . $this->url);?>"><i class="icon membership"></i><?php echo Lang::$word->ADM_MEMBS;?> </a></li>
    <li<?php if (in_array("history", $this->segments)) echo ' class="active"';?>><a href="<?php echo Url::url('/' . $this->url, "history");?>"><i class="icon history"></i><?php echo Lang::$word->HISTORY;?> </a></li>
    <li<?php if (in_array("settings", $this->segments)) echo ' class="active"';?>><a href="<?php echo Url::url('/' . $this->url, "settings");?>"><i class="icon user profile"></i><?php echo Lang::$word->SETTINGS;?> </a></li>
    <?php if(File::is_File(FMODPATH . 'digishop/_dashboard.tpl.php')):?>
    <li<?php if (in_array("digishop", $this->segments)) echo ' class="active"';?>><a href="<?php echo Url::url('/' . $this->url, "digishop");?>"><i class="icon download"></i><?php echo Lang::$word->DOWNLOADS;?> </a></li>
    <?php endif;?>
  </ul>
  <div class="wojo basic divider"></div>
  <div class="wojo big space divider"></div>
  <?php switch(Url::segment($this->segments, 1)): case "history": ?>
  <?php include_once(THEMEBASE . '/_history.tpl.php');?>
  <?php break;?>
  <?php case "settings": ?>
  <?php include_once(THEMEBASE . '/_settings.tpl.php');?>
  <?php break;?>
  <?php case "validate": ?>
  <?php include_once(THEMEBASE . '/_validate.tpl.php');?>
  <?php break;?>
  <?php case "digishop": ?>
  <?php include_once(FMODPATH . 'digishop/_dashboard.tpl.php');?>
  <?php break;?>
  <?php default: ?>
  <?php include_once(THEMEBASE . '/_memberships.tpl.php');?>
  <?php break;?>
  <?php endswitch;?>
</main>