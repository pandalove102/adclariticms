<?php
  /**
   * Module Index
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: mod_index.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>

<main> 
  <!-- Page Caption & breadcrumbs-->
  <div id="moduleCaption">
    <div class="wojo-grid">
      <div class="row gutters align-bottom">
        <div class="columns screen-50 tablet-50 mobile-100 phone-100">
          <?php if(isset($this->data->{'title' . Lang::$lang})):?>
          <h3 class="wojo inverted header"><?php echo $this->data->{'title' . Lang::$lang};?></h3>
          <?php endif;?>
          <?php if(isset($this->data->{'info' . Lang::$lang})):?>
          <p class="wojo white text"><?php echo $this->data->{'info' . Lang::$lang};?></p>
          <?php endif;?>
        </div>
        <?php if($this->core->showcrumbs):?>
        <div class="columns content-right screen-50 tablet-50 mobile-100 phone-100">
          <div class="wojo small breadcrumb"> <?php echo Url::crumbs($this->crumbs ? $this->crumbs : $this->segments, "/", Lang::$word->HOME);?> </div>
        </div>
        <?php endif;?>
      </div>
    </div>
  </div>
  <?php if ($this->layout->topWidget): ?>
  <!-- Top Widgets -->
  <div id="topwidget">
    <?php include(THEMEBASE . "/top_widget.tpl.php");?>
  </div>
  <!-- Top Widgets /-->
  <?php endif;?>
  <?php switch(true): case $this->layout->leftWidget and $this->layout->rightWidget: ?>
  <!-- Left and Right Layout -->
  <div class="wojo-grid">
    <div class="row horizontal-gutters">
      <div class="columns screen-20 tablet-25 mobile-100 phone-100">
        <?php include(THEMEBASE . "/left_widget.tpl.php");?>
      </div>
      <div class="columns screen-60 tablet-50 mobile-100 phone-100">
        <?php include_once(Modules::render($this->segments[0]));?>
      </div>
      <div class="columns screen-20 tablet-25 mobile-100 phone-100">
        <?php include(THEMEBASE . "/right_widget.tpl.php");?>
      </div>
    </div>
  </div>
  <!-- Left and Right Layout /-->
  <?php break;?>
  <?php case $this->layout->leftWidget: ?>
  <!-- Left Layout -->
  <div class="wojo-grid">
    <div class="row horizontal-gutters">
      <div class="columns screen-30 tablet-40 mobile-100 phone-100">
        <?php include(THEMEBASE . "/left_widget.tpl.php");?>
      </div>
      <div class="columns screen-70 tablet-60 mobile-100 phone-100">
        <?php include_once(Modules::render($this->segments[0]));?>
      </div>
    </div>
  </div>
  <!-- Left Layout /-->
  <?php break;?>
  <?php case $this->layout->rightWidget: ?>
  <!-- Right Layout -->
  <div class="wojo-grid">
    <div class="row horizontal-gutters">
      <div class="columns screen-70 tablet-60 mobile-100 phone-100">
        <?php include_once(Modules::render($this->segments[0]));?>
      </div>
      <div class="columns screen-30 tablet-40 mobile-100 phone-100">
        <?php include(THEMEBASE . "/right_widget.tpl.php");?>
      </div>
    </div>
  </div>
  <!-- Right Layout /-->
  <?php break;?>
  <?php default:?>
  <!-- Full Layout -->
  <?php include_once(Modules::render($this->segments[0]));?>
  <!-- Full Layout /-->
  <?php break;?>
  <?php endswitch;?>
  <?php if ($this->layout->bottomWidget): ?>
  <!-- Bottom Widgets -->
  <div id="bottomwidget">
    <?php include(THEMEBASE . "/bottom_widget.tpl.php");?>
  </div>
  <!-- Bottom Widgets /-->
  <?php endif;?>
</main>