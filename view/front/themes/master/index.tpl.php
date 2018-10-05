<?php
  /**
   * Index
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>

<div <?php echo Content::pageBg();?> class="main">
  <?php include_once(THEMEBASE . '/_mainmenu.tpl.php');?>
  
  <!-- Validate page access-->
  <?php if(Content::validatePage()):?>
  <!-- Run page-->
  
  <?php echo Content::parseNewContentData($this->data->{'body' . Lang::$lang});?>
  <!-- Parse javascript -->
  <?php if ($this->data->jscode):?>
    <?php echo Validator::cleanOut(json_decode($this->data->jscode));?>
  <?php endif;?>
  <?php endif;?>
  
  <?php include_once(THEMEBASE . '/_mainfooter.tpl.php');?>
</div>
