<?php
  /**
   * Adblock
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _adblock_edit.tpl.php, v1.00 2016-09-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h3> <?php echo Lang::$word->_MOD_AB_EDIT;?></h3>
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
                <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" value="<?php echo $this->data->{'title_' . $lang->abbr};?>" name="title_<?php echo $lang->abbr?>">
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
                <input name="start_date" type="text" placeholder="<?php echo Lang::$word->_MOD_AB_SUB10;?>" value="<?php echo $this->data->start_date;?>">
                <i class="icon date"></i> </div>
            </div>
            <div class="column">
              <div class="wojo fluid calendar left icon joint end input" id="enddate">
                <input name="end_date" type="text" placeholder="<?php echo Lang::$word->_MOD_AB_SUB11;?>" value="<?php echo $this->data->end_date;?>">
                <i class="icon date"></i> </div>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_AB_SUB1;?> <i class="icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_AB_SUB1;?>" value="<?php echo $this->data->total_views_allowed;?>" name="max_views">
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_AB_SUB2;?> <i class="icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_AB_SUB2;?>" value="<?php echo $this->data->total_clicks_allowed;?>" name="max_clicks">
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_AB_SUB3;?> <i class="icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_AB_SUB3;?>" value="<?php echo $this->data->minimum_ctr;?>" name="min_ctr">
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <?php if($this->data->image):?>
          <label><?php echo Lang::$word->_MOD_AB_SUB4;?> <i class="icon asterisk"></i></label>
          <input type="file" data-buttonText="<?php echo Lang::$word->BROWSE;?>" name="image" id="image" class="filefield">
          <div class="vertical-margin">
            <label><?php echo Lang::$word->_MOD_AB_SUB5;?> <i class="icon asterisk"></i></label>
            <input type="text" placeholder="<?php echo Lang::$word->_MOD_AB_SUB5;?>"value="<?php echo $this->data->image_link;?>" name="image_link">
          </div>
          <label><?php echo Lang::$word->_MOD_AB_SUB6;?> <i class="icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_AB_SUB6;?>"value="<?php echo $this->data->image_alt;?>" name="image_alt">
          <input type="hidden" name="html" value="">
          <?php else:?>
          <label><?php echo Lang::$word->_MOD_AB_SUB7;?> <i class="icon asterisk"></i></label>
          <textarea name="html" placeholder="<?php echo Lang::$word->_MOD_AB_SUB7;?>"><?php echo $this->data->html;?></textarea>
          <?php endif;?>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_AB_SUB4;?></label>
          <?php if($this->data->image):?>
          <img src="<?php echo  FPLUGINURL . $this->data->plugin_id . '/' . $this->data->image;?>" class="wojo normal boxed image">
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
  <div class="wojo big space divider"></div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/modules", "adblock/");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="modules_/adblock" data-action="processCampaign" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->_MOD_AB_UPDATE;?></button>
  </div>
  <input type="hidden" name="banner_type" value="<?php echo $this->data->image ? "yes" : "no";?>">
  <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
  <input type="hidden" name="plugin_id" value="<?php echo $this->data->plugin_id;?>">
</form>