<?php
  /**
   * Upcoming Event
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!Auth::checkPlugAcl('upevent')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<h3><?php echo Lang::$word->_PLG_UE_TITLE1;?></h3>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo form segment">
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_UE_SELECT;?></label>
        <select name="event_id[]" class="wojo dropdown" multiple>
          <?php if($this->events):?>
          <?php echo Utility::loopOptionsMultiple($this->events, "id", "title" . Lang::$lang, $this->data->event_id);?>
          <?php else:?>
          <option value=""><?php echo Lang::$word->_PLG_UE_NOEVENT;?></option>
          <?php endif;?>
        </select>
      </div>
    </div>
  </div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/plugins");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="plugins_/upevent" data-action="processConfig" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->SAVECONFIG;?></button>
  </div>
</form>