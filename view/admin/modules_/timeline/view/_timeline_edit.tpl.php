<?php
  /**
   * Timeline
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _timeline_edit.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h3> <?php echo Lang::$word->_MOD_TML_SUB;?></h3>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo segment form">
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->NAME;?> <i class="icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" value="<?php echo $this->data->name;?>" name="name">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_MOD_TML_LMODE;?></label>
        <select name="colmode" class="wojo fluid dropdown">
          <?php echo Utility::loopOptionsSimpleAlt($this->layoutlist, $this->data->colmode);?>
        </select>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_MOD_TML_SUB3;?></label>
        <input data-range='{"step":5,"from":5, "to":50, "scale":[5,20,30,40,50]}' type="hidden" name="limiter" value="<?php echo $this->data->limiter;?>" class="rangeslider">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_MOD_TML_SUB4;?></label>
        <input data-range='{"step":1,"from":0, "to":20, "scale":[0,5,10,20]}' type="hidden" name="maxitems" value="<?php echo $this->data->maxitems;?>" class="rangeslider">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_MOD_TML_SUB5;?></label>
        <input data-range='{"step":1,"from":0, "to":20, "scale":[0,5,10,20]}' type="hidden" name="showmore" value="<?php echo $this->data->showmore;?>" class="rangeslider">
      </div>
    </div>
    <?php if($this->data->type == "facebook"):?>
    <div class="wojo space divider"></div>
    <div id="fbconf">
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_TML_SUB6;?> <i class="icon-append icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_TML_SUB6;?>" value="<?php echo $this->data->fbid;?>" name="fbid">
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_TML_SUB12;?> <i class="icon-append icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_TML_SUB12;?>" value="<?php echo $this->data->fbpage;?>" name="fbpage">
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_TML_SUB7;?> <i class="icon-append icon asterisk"></i></label>
          <input type="text" placeholder="<?php echo Lang::$word->_MOD_TML_SUB7;?>" value="<?php echo $this->data->fbtoken;?>" name="fbtoken">
        </div>
      </div>
    </div>
    <?php endif;?>
    <?php if($this->data->type == "rss"):?>
    <div class="wojo space divider"></div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_MOD_TML_SUB8;?> <i class="icon-append icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->_MOD_TML_SUB8;?>" value="<?php echo $this->data->rssurl;?>" name="rssurl">
      </div>
    </div>
    <?php endif;?>
  </div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/modules", "timeline/");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="modules_/timeline" data-action="processTimeline" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->_MOD_TML_SUB2;?></button>
  </div>
  <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
  <input type="hidden" name="type" value="<?php echo $this->data->type;?>">
</form>