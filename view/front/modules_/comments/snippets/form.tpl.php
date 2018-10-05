<?php
  /**
   * Comments Form
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2017
   * @version $Id: index.tpl.php, v1.00 2017-01-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="row gutters align-center">
  <div class="columns screen-70 tablet-100 mobile-100 phone-100">
    <div class="content-center half-bottom-padding">
      <h4><?php echo Lang::$word->_MOD_CM_SUB2;?></h4>
    </div>
    <div class="wojo basic segment form">
      <form id="wojo_form" name="wojo_form" method="post">
        <div class="wojo fields">
          <div class="field">
            <label><?php echo Lang::$word->NAME;?> <i class="icon asterisk"></i></label>
            <input name="name" placeholder="<?php echo Lang::$word->NAME;?>" type="text" value="<?php if (App::Auth()->logged_in) echo App::Auth()->name;?>">
          </div>
          <?php if($conf->show_captcha):?>
          <div class="field">
            <label><?php echo Lang::$word->CAPTCHA;?> <i class="icon asterisk"></i></label>
            <div class="wojo right labeled fluid input">
              <input placeholder="<?php echo Lang::$word->CAPTCHA;?>" name="captcha" type="text">
              <span class="wojo label"><?php echo Session::captcha();?> </span></div>
          </div>
          <?php endif;?>
        </div>
        <div class="wojo fields">
          <div class="field">
            <label><?php echo Lang::$word->MESSAGE;?> <i class="icon asterisk"></i></label>
            <textarea data-counter="<?php echo $conf->char_limit;?>" class="small" id="combody" placeholder="<?php echo Lang::$word->MESSAGE;?>" name="body"></textarea>
            <p class="wojo tiny text content-right combody_counter"><?php echo Lang::$word->_MOD_CM_CHAR . ' <span class="wojo positive text">' . $conf->char_limit . ' </span>';?></p>
          </div>
        </div>
        <div class="content-center">
          <button type="button" name="doComment" class="wojo primary button"><?php echo Lang::$word->CF_SEND;?></button>
        </div>
        <input name="parent_id" type="hidden" value="<?php echo isset($this->data->id) ? $this->data->id : $this->row->id;?>">
        <input name="section" type="hidden" value="<?php echo $this->segments[0];?>">
        <input name="url" type="hidden" value="<?php echo Url::uri();?>">
      </form>
    </div>
  </div>
</div>