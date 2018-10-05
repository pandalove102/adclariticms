<?php
  /**
   * Membership Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _memberships_edit.tpl.php, v1.00 2016-07-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h3><?php echo Lang::$word->META_T5;?></h3>
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
            <div class="field five wide">
              <label class="transparent"><?php echo Lang::$word->NAME;?> <i class="icon asterisk"></i></label>
              <div class="wojo huge transparent inverted input">
                <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" value="<?php echo $this->data->{'title_' . $lang->abbr};?>" name="title_<?php echo $lang->abbr?>">
              </div>
            </div>
            <div class="field five wide">
              <label class="transparent"><?php echo Lang::$word->DESCRIPTION;?></label>
              <div class="wojo huge transparent inverted input">
                <input type="text" placeholder="<?php echo Lang::$word->DESCRIPTION;?>" value="<?php echo $this->data->{'description_' . $lang->abbr};?>" name="description_<?php echo $lang->abbr;?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach;?>
    <div class="wojo basic attached segment form">
      <div class="row">
        <div class="columns screen-70 tablet-70 mobile-100 phone-100 padding">
          <div class="wojo fields align-middle">
            <div class="field four wide labeled">
              <label class="content-right mobile-content-left"><?php echo Lang::$word->MEM_PRICE;?> <i class="icon asterisk"></i></label>
            </div>
            <div class="field">
              <div class="wojo labeled input">
                <div class="wojo label"><?php echo Utility::currencySymbol();?></div>
                <input type="text" placeholder="<?php echo Lang::$word->MEM_PRICE;?>" value="<?php echo $this->data->price;?>" name="price">
              </div>
            </div>
          </div>
          <div class="wojo fields align-middle">
            <div class="field four wide labeled">
              <label class="content-right mobile-content-left"><?php echo Lang::$word->MEM_DAYS;?> <i class="icon asterisk"></i></label>
            </div>
            <div class="field">
              <div class="wojo action input">
                <input type="text" placeholder="<?php echo Lang::$word->MEM_DAYS;?>" value="<?php echo $this->data->days;?>" name="days">
                <select class="wojo compact selection dropdown" name="period">
                  <?php echo Utility::loopOptionsSimpleAlt(Date::getMembershipPeriod(), $this->data->period);?>
                </select>
              </div>
            </div>
          </div>
          <div class="wojo fields align-middle">
            <div class="field four wide labeled">
              <label class="content-right mobile-content-left"><?php echo Lang::$word->MEM_PRIVATE;?></label>
            </div>
            <div class="field">
              <div class="wojo inline fields">
                <div class="wojo checkbox small radio slider field">
                  <input name="private" type="radio" value="1" <?php Validator::getChecked($this->data->private, 1); ?>>
                  <label><?php echo Lang::$word->YES;?></label>
                </div>
                <div class="wojo checkbox small radio slider field">
                  <input name="private" type="radio" value="0" <?php Validator::getChecked($this->data->private, 0); ?>>
                  <label><?php echo Lang::$word->NO;?></label>
                </div>
              </div>
            </div>
          </div>
          <div class="wojo fields align-middle">
            <div class="field four wide labeled">
              <label class="content-right mobile-content-left"><?php echo Lang::$word->MEM_REC;?></label>
            </div>
            <div class="field">
              <div class="wojo inline fields">
                <div class="wojo checkbox small radio slider field">
                  <input name="recurring" type="radio" value="1" <?php Validator::getChecked($this->data->recurring, 1); ?>>
                  <label><?php echo Lang::$word->YES;?></label>
                </div>
                <div class="wojo checkbox small radio slider field">
                  <input name="recurring" type="radio" value="0" <?php Validator::getChecked($this->data->recurring, 0); ?>>
                  <label><?php echo Lang::$word->NO;?></label>
                </div>
              </div>
            </div>
          </div>
          <div class="wojo fields align-middle">
            <div class="field four wide labeled">
              <label class="content-right mobile-content-left"><?php echo Lang::$word->PUBLISHED;?></label>
            </div>
            <div class="field">
              <div class="wojo inline fields">
                <div class="wojo checkbox small radio slider field">
                  <input name="active" type="radio" value="1" <?php Validator::getChecked($this->data->active, 1); ?>>
                  <label><?php echo Lang::$word->YES;?></label>
                </div>
                <div class="wojo checkbox small radio slider field">
                  <input name="active" type="radio" value="0" <?php Validator::getChecked($this->data->active, 0); ?>>
                  <label><?php echo Lang::$word->NO;?></label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="columns screen-30 tablet-30 mobile-100 phone-100 screen-left-divider tablet-left-divider wojo secondary bg padding">
          <input type="file" name="thumb" data-type="image" data-exist="<?php echo ($this->data->thumb) ? UPLOADURL . '/memberships/' . $this->data->thumb : UPLOADURL . '/default.png';?>" accept="image/png, image/jpeg">
        </div>
      </div>
    </div>
  </div>
  <div class="wojo big space divider"></div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/memberships");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-action="processMembership" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->MEM_SUB2;?></button>
  </div>
  <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
</form>
