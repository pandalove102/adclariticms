<?php
  /**
   * Gmaps
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _gmaps_edit.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h3> <?php echo Lang::$word->_MOD_GM_TITLE1;?></h3>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo segment form">
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->NAME;?> <i class="icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" value="<?php echo $this->data->name;?>" name="name">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_MOD_GM_SUB;?> <i class="icon asterisk"></i></label>
        <select name="type" class="wojo fluid dropdown">
          <?php echo Utility::loopOptionsSimpleAlt($this->mtype, $this->data->type);?>
        </select>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_MOD_GM_SUB1;?></label>
        <input data-range='{"step":1,"from":1, "to":20, "scale":[1,5,10,15,20]}' type="hidden" name="zoom" value="<?php echo $this->data->zoom;?>" class="rangeslider">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_MOD_GM_SUB1_1;?></label>
        <input data-range='{"step":1,"from":1, "to":20, "scale":[1,5,10,15,20], "isRange": true}' type="hidden" name="minmaxzoom" value="<?php echo $this->data->minmaxzoom;?>" class="rangeslider">
      </div>
    </div>
    <div class="wojo space divider"></div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_MOD_GM_SUB3;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="streetview" type="radio" value="1" <?php Validator::getChecked($this->data->streetview, 1); ?>>
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="streetview" type="radio" value="0" <?php Validator::getChecked($this->data->streetview, 0); ?>>
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_MOD_GM_SUB2;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="type_control" type="radio" value="1" <?php Validator::getChecked($this->data->type_control, 1); ?>>
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="type_control" type="radio" value="0" <?php Validator::getChecked($this->data->type_control, 0); ?>>
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->M_ADDRESS;?> <i class="icon asterisk"></i></label>
        <textarea placeholder="<?php echo Lang::$word->M_ADDRESS;?>" name="body"><?php echo $this->data->body;?></textarea>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_MOD_GM_PINS;?></label>
        <div class="scrollbox_y" style="height:180px;">
          <div class="row phone-block-1 mobile-block-2 tablet-block-3 screen-block-4 half-gutters content-center" id="pinMode">
            <?php foreach($this->pins as $row):?>
            <div class="column"> <a data-type="<?php echo $row;?>"><img src="<?php echo FMODULEURL;?>gmaps/view/images/pins/<?php echo $row;?>" alt="" class="wojo basic image<?php echo ($this->data->pin == $row) ? " highlite" :'';?>"></a> </div>
            <?php endforeach;?>
            <?php unset($row);?>
          </div>
        </div>
      </div>
    </div>
    <a class="wojo left floating tiny icon button" data-trigger="#uStyles" data-type="slideDown" data-velocity="true" ><i class="icon chevron down"></i></a>
    <div class="hide-all" id="uStyles">
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->_MOD_GM_SUB4;?></label>
          <div class="row phone-block-1 mobile-block-2 tablet-block-3 screen-block-4 gutters" id="layoutMode">
            <?php foreach($this->styles as $row):?>
            <div class="column">
              <div class="wojo boxed basic attached segment<?php echo ($this->data->layout == pathinfo($row, PATHINFO_FILENAME)) ? " selected" :'';?>"><a data-type="<?php echo pathinfo($row, PATHINFO_FILENAME);?>"><img src="<?php echo AMODULEURL;?>gmaps/view/images/styles/<?php echo $row;?>" alt=""></a> </div>
            </div>
            <?php endforeach;?>
            <?php unset($row);?>
          </div>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <div class="wojo small right action left icon input"> <i class="icon small find"></i>
          <input name="address" placeholder="<?php echo Lang::$word->_MOD_GM_SUB5;?>" type="text">
          <button type="button" name="find_address" class="wojo small basic button"><?php echo Lang::$word->FIND;?></button>
        </div>
        <div class="wojo space divider"></div>
        <div class="wojo boxed basic attached segment" id="google_map" style="height:400px"></div>
      </div>
    </div>
  </div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/modules", "gmaps/");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="modules_/gmaps" data-action="processMap" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->_MOD_GM_UPDATE;?></button>
  </div>
  <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
  <input type="hidden" name="layout" value="<?php echo $this->data->layout;?>">
  <input type="hidden" name="lat" value="<?php echo $this->data->lat;?>">
  <input type="hidden" name="lng" value="<?php echo $this->data->lng;?>">
  <input type="hidden" name="pin" value="<?php echo $this->data->pin;?>">
</form>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=<?php echo App::Core()->mapapi;?>"></script> 
<script src="<?php echo AMODULEURL;?>gmaps/view/js/gmaps.js"></script> 
<script type="text/javascript"> 
// <![CDATA[  
  $(document).ready(function() {
	  $.Gmaps({
		  url: "<?php echo AMODULEURL;?>gmaps/controller.php",
		  murl: "<?php echo AMODULEURL;?>gmaps/",
		  furl: "<?php echo FMODULEURL;?>gmaps/",
	  });
  });
// ]]>
</script>