<?php
  /**
   * Timeline
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _timeline_inew.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h3> <?php echo Lang::$word->_MOD_TML_SUB11;?></h3>
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
                <input type="text" placeholder="<?php echo Lang::$word->NAME;?>"  name="title_<?php echo $lang->abbr?>">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="bodyfield">
        <textarea class="altpost" name="body_<?php echo $lang->abbr;?>"></textarea>
      </div>
    </div>
    <?php endforeach;?>
    <div class="wojo attached segment form">
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_TML_SUB14;?></label>
          <select name="type" class="wojo fluid dropdown" id="tmType">
            <option value="blog_post"><?php echo Lang::$word->_MOD_TML_TYPE_B;?></option>
            <option value="iframe"><?php echo Lang::$word->_MOD_TML_TYPE_I;?></option>
            <option value="gallery"><?php echo Lang::$word->_MOD_TML_TYPE_G;?></option>
          </select>
        </div>
        <div class="field"> </div>
      </div>
      <div class="hide-all" id="iframe">
        <div class="wojo fields">
          <div class="field">
            <label><?php echo Lang::$word->_MOD_TML_IURL;?></label>
            <div class="wojo labeled input">
              <div class="wojo basic label"> http: </div>
              <input placeholder="<?php echo Lang::$word->_MOD_TML_IURL;?>" type="text" name="dataurl">
            </div>
          </div>
          <div class="field">
            <label><?php echo Lang::$word->_MOD_TML_IHEIGHT;?></label>
            <div class="wojo right labeled input">
              <input placeholder="<?php echo Lang::$word->_MOD_TML_IHEIGHT;?>" value="300" type="text" name="height">
              <div class="wojo basic label">px</div>
            </div>
          </div>
        </div>
      </div>
      <div id="imgfield">
        <div class="wojo boxed acard">
          <div class="content-right header"><a class="multipick wojo small labeled primary icon button"><i class="open folder icon"></i><?php echo Lang::$word->_MOD_TML_SUB16;?></a> </div>
          <div class="content">
            <div class="row phone-block-1 mobile-block-2 tablet-block-3 screen-block-4 gutters content-center" id="sortable"> </div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_TML_RMORE;?></label>
          <div class="wojo labeled input">
            <div class="wojo basic label"> http: </div>
            <input placeholder="<?php echo Lang::$word->_MOD_TML_RMORE;?>" type="text" name="readmore">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="wojo big space divider"></div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/modules/timeline/items", $this->row->id);?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="modules_/timeline" data-action="processItem" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->_MOD_TML_SUB17;?></button>
  </div>
  <input type="hidden" name="tid" value="<?php echo $this->row->id;?>">
</form>