<?php
  /**
   * Twitts
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!Auth::checkPlugAcl('twitts')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<h3> <?php echo Lang::$word->_PLG_TW_TITLE;?></h3>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo form segment">
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_TW_KEY;?> <i class="icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->_PLG_TW_KEY;?>" value="<?php echo App::Twitts()->consumer_key;?>" name="consumer_key">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_TW_SECRET;?> <i class="icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->_PLG_TW_SECRET;?>" value="<?php echo App::Twitts()->consumer_secret;?>" name="consumer_secret">
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_TW_TOKEN;?> <i class="icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->_PLG_TW_TOKEN;?>" value="<?php echo App::Twitts()->access_token;?>" name="access_token">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_TW_TSECRET;?> <i class="icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->_PLG_TW_TSECRET;?>" value="<?php echo App::Twitts()->access_secret;?>" name="access_secret">
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_TW_USER;?> <i class="icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->_PLG_TW_USER;?>" value="<?php echo App::Twitts()->username;?>" name="username">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_TW_SHOW_IMG;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox small radio slider field">
            <input name="show_image" type="radio" value="1" <?php Validator::getChecked(App::Twitts()->show_image, 1); ?>>
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox small radio slider field">
            <input name="show_image" type="radio" value="0" <?php Validator::getChecked(App::Twitts()->show_image, 0); ?>>
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_TW_COUNT;?></label>
        <input data-range='{"step":1,"from":1, "to":20}' type="hidden" name="counter" value="<?php echo App::Twitts()->counter;?>" class="rangeslider">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_TW_TRANS;?></label>
        <input data-range='{"step":100,"from":100, "to":1200}' type="hidden" name="speed" value="<?php echo App::Twitts()->speed;?>" class="rangeslider">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_TW_TRANS_T;?></label>
        <input data-range='{"step":1000,"from":1000, "to":15000}' type="hidden" name="timeout" value="<?php echo App::Twitts()->timeout;?>" class="rangeslider">
      </div>
    </div>
  </div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/plugins");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="plugins_/twitts" data-action="processConfig" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->SAVECONFIG;?></button>
  </div>
</form>