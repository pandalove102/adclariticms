<?php
  /**
   * Adblock
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _adblock_new.tpl.php, v1.00 2016-09-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h3> <?php echo Lang::$word->_MOD_AB_ADD;?></h3>
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
          </div>
        </div>
      </div>
    </div>
    <?php endforeach;?>
    <div class="wojo attached segment form">
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_AB_SUB;?> <i class="icon asterisk"></i></label>
          <div class="row">
            <div class="column">
              <div class="wojo fluid calendar left icon joint start input" id="fromdate">
                <input name="start_date" type="text" placeholder="<?php echo Lang::$word->_MOD_AB_SUB10;?>" value="<?php echo Date::today();?>">
                <i class="icon date"></i> </div>
            </div>
            <div class="column">
              <div class="wojo fluid calendar left icon joint end input" id="enddate">
                <input name="end_date" type="text" placeholder="<?php echo Lang::$word->_MOD_AB_SUB11;?>">
                <i class="icon date"></i> </div>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_AB_SUB1;?> <i class="icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_AB_SUB1;?>" name="max_views">
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_AB_SUB2;?> <i class="icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_AB_SUB2;?>" name="max_clicks">
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_AB_SUB3;?> <i class="icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_AB_SUB3;?>" name="min_ctr">
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_AB_SUB12;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox toggle field">
              <input name="btype" type="radio" value="yes" checked="checked">
              <label><?php echo Lang::$word->_MOD_AB_SUB4;?></label>
            </div>
            <div class="wojo checkbox toggle field">
              <input name="btype" type="radio" value="no">
              <label><?php echo Lang::$word->_MOD_AB_SUB7;?></label>
            </div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field" id="imgType">
          <label><?php echo Lang::$word->_MOD_AB_SUB4;?> <i class="icon asterisk"></i></label>
          <input type="file" data-buttonText="<?php echo Lang::$word->BROWSE;?>" name="image" id="image" class="filefield">
          <div class="vertical-margin">
            <label><?php echo Lang::$word->_MOD_AB_SUB5;?> <i class="icon asterisk"></i></label>
            <input type="text" placeholder="<?php echo Lang::$word->_MOD_AB_SUB5;?>" name="image_link">
          </div>
          <label><?php echo Lang::$word->_MOD_AB_SUB6;?> <i class="icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_AB_SUB6;?>" name="image_alt">
        </div>
        <div class="field hide-all" id="htmlType">
          <label><?php echo Lang::$word->_MOD_AB_SUB7;?> <i class="icon asterisk"></i></label>
          <textarea name="html" placeholder="<?php echo Lang::$word->_MOD_AB_SUB7;?>"></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="wojo big space divider"></div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/modules", "adblock/");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="modules_/adblock" data-action="processCampaign" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->_MOD_AB_NEW;?></button>
  </div>
  <input type="hidden" name="banner_type" value="yes">
</form>
<script type="text/javascript"> 
// <![CDATA[  
$(document).ready(function () {
    $("input[name=btype]").on('change', function() {
		if($(this).val() === "no") {
			$("#imgType").hide();
			$("#htmlType").show();
		} else {
			$("#imgType").show();
			$("#htmlType").hide();
		}
		$("input[name=banner_type]").val($(this).val())
   });
});
// ]]>
</script> 