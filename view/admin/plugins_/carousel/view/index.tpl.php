<?php
  /**
   * Carousel
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!Auth::checkPlugAcl('carousel')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<?php switch(Url::segment($this->segments, 3)): case "edit": ?>
<!-- Start edit -->
<h3> <?php echo Lang::$word->_PLG_CRL_TITLE2;?></h3>
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
      <div class="wojo attached segment form">
        <div class="wojo fields">
          <div class="field">
            <textarea class="bodypost" name="body_<?php echo $lang->abbr;?>"><?php echo Url::out_url($this->data->{'body_' . $lang->abbr});?></textarea>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach;?>
    <div class="wojo attached segment form">
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_PLG_CRL_SUB11;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio field">
              <input name="dots" type="radio" value="1" <?php Validator::getChecked($this->data->dots, 1); ?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio field">
              <input name="dots" type="radio" value="0" <?php Validator::getChecked($this->data->dots, 0); ?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_PLG_CRL_SUB12;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio field">
              <input name="nav" type="radio" value="1" <?php Validator::getChecked($this->data->nav, 1); ?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio field">
              <input name="nav" type="radio" value="0" <?php Validator::getChecked($this->data->nav, 0); ?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_PLG_CRL_SUB7;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio field">
              <input name="autoplay" type="radio" value="1" <?php Validator::getChecked($this->data->autoplay, 1); ?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio field">
              <input name="autoplay" type="radio" value="0" <?php Validator::getChecked($this->data->autoplay, 0); ?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_PLG_CRL_SUB14;?> <i class="icon asterisk"></i></label>
          <div class="wojo right icon input">
            <input placeholder="4" value="<?php echo $this->settings->responsive->{1024}->items;?>" type="text" name="large">
            <i class="icon desktop"></i> </div>
          <div class="wojo right icon input">
            <input placeholder="2" value="<?php echo $this->settings->responsive->{769}->items;?>" type="text" name="medium">
            <i class="icon tablet"></i> </div>
          <div class="wojo right icon input">
            <input placeholder="1" value="<?php echo $this->settings->responsive->{0}->items;?>" type="text" name="small">
            <i class="icon smartphone"></i> </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_PLG_CRL_SUB8;?> </label>
          <div class="wojo right labeled input">
            <input placeholder="<?php echo Lang::$word->_PLG_CRL_SUB8;?>" value="<?php echo $this->data->margin;?>" type="text" name="margin">
            <div class="wojo basic label"> px </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_PLG_CRL_SUB13;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio field">
              <input name="loop" type="radio" value="1" <?php Validator::getChecked($this->settings->loop, 1); ?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio field">
              <input name="loop" type="radio" value="0" <?php Validator::getChecked($this->settings->loop, 0); ?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="wojo big space divider"></div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/plugins", "carousel");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="plugins_/carousel" data-action="processPlayer" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->SAVECONFIG;?></button>
  </div>
  <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
</form>
<?php break;?>
<?php case "new": ?>
<!-- Start new -->
<h3> <?php echo Lang::$word->_PLG_CRL_SUB2;?></h3>
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
      <div class="wojo attached segment form">
        <div class="wojo fields">
          <div class="field">
            <textarea class="bodypost" name="body_<?php echo $lang->abbr;?>"></textarea>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach;?>
    <div class="wojo attached segment form">
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_PLG_CRL_SUB11;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio field">
              <input name="dots" type="radio" value="1" checked="checked">
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio field">
              <input name="dots" type="radio" value="0">
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_PLG_CRL_SUB12;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio field">
              <input name="nav" type="radio" value="1">
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio field">
              <input name="nav" type="radio" value="0" checked="checked">
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_PLG_CRL_SUB7;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio field">
              <input name="autoplay" type="radio" value="1" checked="checked">
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio field">
              <input name="autoplay" type="radio" value="0">
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_PLG_CRL_SUB14;?> <i class="icon asterisk"></i></label>
          <div class="wojo right icon input">
            <input placeholder="4" value="1" type="text" name="large">
            <i class="icon desktop"></i> </div>
          <div class="wojo right icon input">
            <input placeholder="2" value="1" type="text" name="medium">
            <i class="icon tablet"></i> </div>
          <div class="wojo right icon input">
            <input placeholder="1" value="1" type="text" name="small">
            <i class="icon smartphone"></i> </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_PLG_CRL_SUB8;?> </label>
          <div class="wojo right labeled input">
            <input placeholder="<?php echo Lang::$word->_PLG_CRL_SUB8;?>" type="text" value="0" name="margin">
            <div class="wojo basic label"> px </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_PLG_CRL_SUB13;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio field">
              <input name="loop" type="radio" value="1">
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio field">
              <input name="loop" type="radio" value="0" checked="checked">
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="wojo big space divider"></div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/plugins", "carousel");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="plugins_/carousel" data-action="processPlayer" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->SAVECONFIG;?></button>
  </div>
</form>
<?php break;?>
<?php default: ?>
<!-- Start default -->
<div class="row gutters align-middle">
  <div class="column mobile-100 phone-100">
    <h3><?php echo Lang::$word->_PLG_CRL_TITLE;?></h3>
    <p class="wojo small text"><?php echo Lang::$word->_PLG_CRL_SUB1;?></p>
  </div>
  <div class="column shrink mobile-100 phone-100"> <a href="<?php echo Url::url(Router::$path, "new/");?>" class="wojo small secondary button"><i class="icon plus alt"></i><?php echo Lang::$word->_PLG_CRL_NEW;?></a> </div>
</div>
<?php if(!$this->data):?>
<div class="content-center"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small bold text vertical-padding"><?php echo Lang::$word->_PLG_CRL_NOPLAY;?></p>
</div>
<?php else:?>
<div class="row phone-block-1 mobile-block-1 tablet-block-2 screen-block-2 gutters">
  <?php foreach($this->data as $row):?>
  <div class="column content-center" id="item_<?php echo $row->id;?>">
    <div class="wojo boxed segment"> <img src="<?php echo APLUGINURL;?>carousel/view/images/horizontal.png" class="wojo basic image" alt="">
      <div class="wojo half space divider"></div>
      <p class="wojo small bold text"><?php echo $row->{'title' . Lang::$lang};?></p>
      <div class="wojo divider"></div>
      <a href="<?php echo Url::url(Router::$path . "/edit", $row->id);?>" class="wojo icon basic circular positive button"><i class="icon pencil"></i></a> <a data-set='{"option":[{"delete": "deletePlayer","title": "<?php echo Validator::sanitize($row->{'title' . Lang::$lang}, "chars");?>","id":<?php echo $row->id;?>}],"action":"delete","parent":"#item_<?php echo $row->id;?>", "url":"plugins_/carousel"}' class="wojo icon basic negative circular button action"> <i class="icon trash"></i> </a> </div>
  </div>
  <?php endforeach;?>
</div>
<?php endif;?>
<?php break;?>
<?php endswitch;?>