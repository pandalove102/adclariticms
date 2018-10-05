<?php
  /**
   * Reply Form
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2017
   * @version $Id: replyForm.tpl.php, v1.00 2017-01-05 10:12:05 gewa Exp $
   */
  define("_WOJO", true);
  require_once("../../../../../init.php");
  Bootstrap::Autoloader(array(AMODPATH . 'comments/'));
?>
<?php if(App::Comments()->public_access or App::Auth()->logged_in):?>
<div class="wojo small segment form hide-all" id="replyform">
  <?php if(App::Auth()->logged_in):?>
  <input type="hidden" name="replayname" value="<?php echo App::Auth()->uid;?>">
  <?php else:?>
  <input name="replayname" placeholder="<?php echo Lang::$word->NAME;?>" type="text">
  <?php endif;?>
  <textarea data-counter="<?php echo App::Comments()->char_limit;?>" id="replybody" placeholder="<?php echo Lang::$word->MESSAGE;?>" name="replybody"></textarea>
  <?php if(App::Comments()->show_captcha):?>
  <div class="wojo right labeled fluid input">
    <input name="captcha" placeholder="<?php echo Lang::$word->CAPTCHA;?>" type="text">
    <span class="wojo basic label"><?php echo Session::captcha();?> </span></div>
  <?php endif;?>
  <div class="half-top-padding"><p class="wojo tiny text push-right replybody_counter"><?php echo Lang::$word->_MOD_CM_CHAR . ' <span class="wojo positive text">' . App::Comments()->char_limit . '</span>';?></p>
    <button type="button" name="doReply" class="wojo tiny primary button"><?php echo Lang::$word->SUBMIT;?></button>
  </div>
</div>
<?php else:?>
<p id="pError" class="wojo small negative text"><?php echo Lang::$word->_MOD_CM_SUB1;?></p>
<?php endif;?>