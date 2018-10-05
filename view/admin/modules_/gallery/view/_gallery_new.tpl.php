<?php
  /**
   * Gallery
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _gallery_new.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h3> <?php echo Lang::$word->_MOD_GA_NEW;?></h3>
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
                <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" name="title_<?php echo $lang->abbr?>">
              </div>
            </div>
            <div class="field five wide">
              <label class="transparent"><?php echo Lang::$word->ITEMSLUG;?></label>
              <div class="wojo huge transparent inverted input">
                <input type="text" placeholder="<?php echo Lang::$word->ITEMSLUG;?>" name="slug_<?php echo $lang->abbr?>">
              </div>
            </div>
          </div>
          <div class="wojo fields">
            <div class="field">
              <label class="transparent"><?php echo Lang::$word->DESCRIPTION;?></label>
              <div class="wojo huge transparent inverted input">
                <input type="text" placeholder="<?php echo Lang::$word->DESCRIPTION;?>" name="description_<?php echo $lang->abbr?>">
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
          <label><?php echo Lang::$word->_MOD_GA_THUMBW;?> <i class="icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_GA_THUMBW;?>"  name="thumb_w">
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_GA_THUMBH;?> <i class="icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_GA_THUMBH;?>" name="thumb_h">
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_GA_COLS;?> <i class="icon asterisk"></i></label>
          <input data-range='{"step":50,"from":100, "to":600, "scale":[100,300,600], "format": "%spx"}' type="hidden" name="cols" value="300" class="rangeslider">
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_GA_WMARK;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox small radio slider field">
              <input name="watermark" type="radio" value="1">
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox small radio slider field">
              <input name="watermark" type="radio" value="0" checked="checked">
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_GA_LIKE;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox small radio slider field">
              <input name="likes" type="radio" value="1" checked="checked">
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox small radio slider field">
              <input name="likes" type="radio" value="0">
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_GA_RESIZE_THE;?></label>
          <select name="resize" class="wojo fluid dropdown">
            <option value="thumbnail">Thumbnail</option>
            <option value="resize">Resize</option>
            <option value="bestFit">Best Fit</option>
            <option value="fitToHeight">Fit to Height</option>
            <option value="fitToWidth">Fit to Width</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="wojo big space divider"></div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/modules", "gallery");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="modules_/gallery"  data-action="processGallery" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->_MOD_GA_SUB3;?></button>
  </div>
</form>