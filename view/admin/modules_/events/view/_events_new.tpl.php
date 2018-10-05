<?php
  /**
   * Events
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _events_edit.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h3> <?php echo Lang::$word->_MOD_EM_SUB;?></h3>
<div class="wojo space divider"></div>
<ul class="wojo basic tabs">
  <?php foreach($this->langlist as $lang):?>
  <li><a style="background:<?php echo $lang->color;?>;color:#fff" data-tab="#lang_<?php echo $lang->abbr;?>"><span class="flag icon <?php echo $lang->abbr;?>"></span><?php echo $lang->name;?></a></li>
  <?php endforeach;?>
</ul>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo attached tabbed basic segment">
    <?php foreach($this->langlist as $lang):?>
    <div id="lang_<?php echo $lang->abbr;?>" class="wojo tab item">
      <div class="wojo form attached acard">
        <div class="header basic" style="background:<?php echo $lang->color;?>;color:#fff">
          <div class="wojo fields">
            <div class="field">
              <label class="transparent"><?php echo Lang::$word->NAME;?> <i class="icon asterisk"></i></label>
              <div class="wojo huge transparent inverted input">
                <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" name="title_<?php echo $lang->abbr?>">
              </div>
            </div>
            <div class="field">
              <label class="transparent"><?php echo Lang::$word->_MOD_EM_VENUE;?></label>
              <div class="wojo huge transparent inverted input">
                <input type="text" placeholder="<?php echo Lang::$word->_MOD_EM_VENUE;?>" name="venue_<?php echo $lang->abbr?>">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="wojo attached segment form">
        <div class="field">
          <textarea class="altpost" name="body_<?php echo $lang->abbr;?>"></textarea>
        </div>
      </div>
    </div>
    <?php endforeach;?>
    <div class="wojo attached segment form">
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_EM_CONTACT;?></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_EM_CONTACT;?>" name="contact_person">
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_EM_PHONE;?></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_EM_PHONE;?>" name="contact_phone">
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_EM_EMAIL;?></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_EM_EMAIL;?>" name="contact_email">
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_EM_DATE_S;?></label>
          <div class="row">
            <div class="column screen-70 tablet-70">
              <div class="wojo fluid calendar left icon joint start input" data-datepicker="true">
                <input name="date_start" type="text" placeholder="<?php echo Lang::$word->_MOD_EM_DATE_ST;?>" value="">
                <i class="icon date"></i> </div>
            </div>
            <div class="column">
              <div class="wojo fluid calendar left icon joint end input" data-timepicker="true">
                <input name="time_start" type="text" placeholder="<?php echo Lang::$word->_MOD_EM_TIME_ST;?>" value="">
                <i class="icon clock"></i> </div>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_EM_DATE_SE;?></label>
          <div class="row">
            <div class="column screen-70 tablet-70">
              <div class="wojo fluid calendar left icon joint start input" data-datepicker="true">
                <input name="date_end" type="text" placeholder="<?php echo Lang::$word->_MOD_EM_DATE_ST;?>" value="">
                <i class="icon date"></i> </div>
            </div>
            <div class="column">
              <div class="wojo fluid calendar left icon joint end input" data-timepicker="true">
                <input name="time_end" type="text" placeholder="<?php echo Lang::$word->_MOD_EM_TIME_ET;?>" value="">
                <i class="icon clock"></i> </div>
            </div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_EM_COLOUR;?></label>
          <div class="wojo action input">
            <input type="text" value="#202020" name="color" readonly>
            <div class="wojo basic icon button" data-color="true"><i class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->PUBLISHED;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox small radio slider field">
              <input name="active" type="radio" value="1" checked="checked">
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox small radio slider field">
              <input name="active" type="radio" value="0">
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="wojo big space divider"></div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/modules", "events/");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="modules_/events" data-action="processEvent" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->_MOD_EM_TITLE2;?></button>
  </div>
</form>