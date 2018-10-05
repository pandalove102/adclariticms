<?php
  /**
   * Comments
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!Auth::checkModAcl('comments')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<?php switch(Url::segment($this->segments, 3)): case "settings": ?>
<h3> <?php echo Lang::$word->_MOD_CM_TITLE1;?></h3>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo form segment">
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_MOD_CM_SORTING;?> <i class="icon asterisk"></i></label>
        <select name="sorting" class="wojo fluid dropdown">
          <option value="DESC" <?php echo Validator::getSelected($this->data->sorting, "DESC");?>><?php echo Lang::$word->_MOD_CM_SORTING_T;?></option>
          <option value="ASC" <?php echo Validator::getSelected($this->data->sorting, "ASC");?>><?php echo Lang::$word->_MOD_CM_SORTING_B;?></option>
        </select>
      </div>
      <div class="field">
        <div class="wojo fields">
          <div class="six wide field">
            <label><?php echo Lang::$word->_MOD_CM_DATE;?> <i class="icon asterisk"></i></label>
            <select name="dateformat" class="wojo fluid dropdown">
              <?php echo Date::getShortDate($this->data->dateformat);?> <?php echo Date::getLongDate($this->data->dateformat);?>
            </select>
          </div>
          <div class="field">
            <label><?php echo Lang::$word->_MOD_CM_TSINCE;?></label>
            <div class="wojo checkbox">
              <input name="timesince" type="checkbox" value="1" <?php Validator::getChecked($this->data->timesince, 1); ?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_MOD_CM_CHAR;?> </label>
        <input data-range='{"step":10,"from":20, "to":400, "scale":[20,50,100,200,400]}' type="hidden" name="char_limit" value="<?php echo $this->data->char_limit;?>" class="rangeslider">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_MOD_CM_PERPAGE;?></label>
        <input data-range='{"step":5,"from":5, "to":50, "scale":[5,20,35,50]}' type="hidden" name="perpage" value="<?php echo $this->data->perpage;?>" class="rangeslider">
      </div>
    </div>
    <div class="wojo space divider"></div>
    <div class="wojo secondary segment">
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_CM_UNAME_R;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox small radio slider field">
              <input name="username_req" type="radio" value="1" <?php Validator::getChecked($this->data->username_req, 1); ?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox small radio slider field">
              <input name="username_req" type="radio" value="0" <?php Validator::getChecked($this->data->username_req, 0); ?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_CM_RATING;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox small radio slider field">
              <input name="rating" type="radio" value="1" <?php Validator::getChecked($this->data->rating, 1); ?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox small radio slider field">
              <input name="rating" type="radio" value="0" <?php Validator::getChecked($this->data->rating, 0); ?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_CM_CAPTCHA;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox small radio slider field">
              <input name="show_captcha" type="radio" value="1" <?php Validator::getChecked($this->data->show_captcha, 1); ?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox small radio slider field">
              <input name="show_captcha" type="radio" value="0" <?php Validator::getChecked($this->data->show_captcha, 0); ?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_CM_REG_ONLY;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox small radio slider field">
              <input name="public_access" type="radio" value="1" <?php Validator::getChecked($this->data->public_access, 1); ?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox small radio slider field">
              <input name="public_access" type="radio" value="0" <?php Validator::getChecked($this->data->public_access, 0); ?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_CM_AA;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox small radio slider field">
              <input name="auto_approve" type="radio" value="1" <?php Validator::getChecked($this->data->auto_approve, 1); ?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox small radio slider field">
              <input name="auto_approve" type="radio" value="0" <?php Validator::getChecked($this->data->auto_approve, 0); ?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->_MOD_CM_NOTIFY;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox small radio slider field">
              <input name="notify_new" type="radio" value="1" <?php Validator::getChecked($this->data->notify_new, 1); ?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox small radio slider field">
              <input name="notify_new" type="radio" value="0" <?php Validator::getChecked($this->data->notify_new, 0); ?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_MOD_CM_WORDS;?></label>
        <textarea placeholder="<?php echo Lang::$word->_MOD_CM_WORDS;?>" name="blacklist_words"><?php echo $this->data->blacklist_words;?></textarea>
      </div>
    </div>
  </div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/modules/comments");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="modules_/comments" data-action="processConfig" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->SAVECONFIG;?></button>
  </div>
</form>
<?php break;?>
<?php default: ?>
<div class="row gutters align-middle">
  <div class="column mobile-100 phone-100">
    <h3><?php echo Lang::$word->_MOD_CM_TITLE2;?></h3>
  </div>
  <div class="column shrink mobile-100 phone-100"> <a href="<?php echo Url::url(Router::$path, "settings/");?>" class="wojo small icon button"><i class="icon cog"></i> </a> </div>
</div>
<?php if(!$this->data):?>
<div class="content-center"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small thick caps text"><?php echo Lang::$word->_MOD_CM_SUB3;?></p>
</div>
<?php else:?>
<?php foreach($this->data as $row):?>
<div class="wojo boxed acard" id="item_<?php echo $row->id;?>">
  <div class="header">
    <div class="row horizontal-gutters">
      <div class="column">
        <p class="wojo bold medium text"> <?php echo ($row->uname)? $row->uname : $row->username;?> </p>
        <p class="wojo small text"><?php echo $row->body;?></p>
      </div>
      <div class="column shrink"><a data-set='{"option":[{"simpleAction": "1","action":"approve", "id":<?php echo $row->id;?>}], "url":"/modules_/comments/controller.php", "after":"remove", "parent":"#item_<?php echo $row->id;?>"}' data-content="<?php echo Lang::$word->_MOD_CM_SUB4;?>" class="wojo icon positive label simpleAction"><i class="icon check"></i></a> <a data-set='{"option":[{"delete": "deleteComment","title": "ID","id":<?php echo $row->id;?>}],"action":"delete","parent":"#item_<?php echo $row->id;?>","url":"modules_/comments"}'  class="wojo negative icon label action"><i class="icon trash"></i></a></div>
    </div>
  </div>
  <div class="small content">
    <div class="row align-middle">
      <div class="column">
        <div class="wojo horizontal small list">
          <div class="item">
            <div class="header"><span class="wojo caps text"><?php echo Date::doDate("long_date", $row->created);?> </span> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
<div class="row half-gutters-mobile half-gutters-phone align-middle">
  <div class="columns shrink mobile-100 phone-100">
    <div class="wojo small thick text"><?php echo Lang::$word->TOTAL.': '.$this->pager->items_total;?> / <?php echo Lang::$word->CURPAGE.': '.$this->pager->current_page.' '.Lang::$word->OF.' '.$this->pager->num_pages;?></div>
  </div>
  <div class="columns mobile-100 phone-100 content-right mobile-content-left"><?php echo $this->pager->display_pages('small');?></div>
</div>
<?php endif;?>
<?php break;?>
<?php endswitch;?>