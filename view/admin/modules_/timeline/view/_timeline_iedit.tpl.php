<?php
  /**
   * Timeline
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _timeline_iedit.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h3> <?php echo Lang::$word->_MOD_TML_SUB12;?></h3>
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
      <textarea class="altpost" name="body_<?php echo $lang->abbr;?>"><?php echo Url::out_url($this->data->{'body_' . $lang->abbr});?></textarea>
    </div>
    <?php endforeach;?>
    <div class="wojo attached segment form">
      <?php if($this->data->type == "iframe" ):?>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_TML_IURL;?></label>
          <div class="wojo labeled input">
            <div class="wojo basic label"> http: </div>
            <input placeholder="<?php echo Lang::$word->_MOD_TML_IURL;?>" value="<?php echo $this->data->dataurl;?>" type="text" name="dataurl">
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_TML_IHEIGHT;?></label>
          <div class="wojo right labeled input">
            <input placeholder="<?php echo Lang::$word->_MOD_TML_IHEIGHT;?>" value="<?php echo $this->data->height;?>" type="text" name="height">
            <div class="wojo basic label">px</div>
          </div>
        </div>
      </div>
      <?php else:?>
      <div class="wojo boxed acard">
        <div class="content-right header"><a class="multipick wojo small labeled primary icon button"><i class="open folder icon"></i><?php echo Lang::$word->_MOD_TML_SUB16;?></a> </div>
        <div class="content">
          <div class="row phone-block-1 mobile-block-2 tablet-block-3 screen-block-4 gutters content-center" id="sortable">
            <?php if($this->imagedata):?>
            <?php foreach($this->imagedata as $irow):?>
            <div class="column">
              <div class="wojo basic attached segment"> <img src="<?php echo UPLOADURL . '/' . $irow;?>" alt="" class="wojo normal basic image"> <a class="wojo top right small simple icon attached label remove"><i class="icon trash negative"></i></a>
                <input type="hidden" name="images[]" value="<?php echo $irow;?>">
              </div>
            </div>
            <?php endforeach;?>
            <?php endif;?>
          </div>
        </div>
      </div>
      <?php endif;?>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_TML_RMORE;?></label>
          <div class="wojo labeled input">
            <div class="wojo basic label"> http: </div>
            <input placeholder="<?php echo Lang::$word->_MOD_TML_RMORE;?>" value="<?php echo $this->data->readmore;?>" type="text" name="readmore">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="wojo big space divider"></div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/modules/timeline/items", $this->row->id);?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="modules_/timeline" data-action="processItem" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->_MOD_TML_SUB13;?></button>
  </div>
  <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
  <input type="hidden" name="type" value="<?php echo $this->data->type;?>">
  <input type="hidden" name="tid" value="<?php echo $this->data->tid;?>">
</form>