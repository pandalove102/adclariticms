<?php
  /**
   * Slider
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _slider_edit.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="row half-gutters align-middle">
  <div class="column mobile-100 phone-100">
    <h3><?php echo Lang::$word->_PLG_SL_TITLE2;?></h3>
  </div>
  <div class="column shrink mobile-100 phone-100">
    <div class="wojo small labeled button">
      <div class="wojo small button" data-velocity="true" data-type="slideDown" data-trigger="#settings"> <i class="cog icon"></i> <?php echo Lang::$word->SETTINGS;?> </div>
      <a href="<?php echo Url::url("/admin/plugins/slider/preview", $this->data->id);?>" class="wojo small basic icon label" data-content="<?php echo Lang::$word->PREVIEW;?>"> <i class="icon desktop"></i> </a> </div>
  </div>
</div>
<div id="settings" class="hide-all">
  <div class="wojo space divider"></div>
  <!-- Configuration -->
  <form method="post" id="wojo_form" name="wojo_form">
    <div class="wojo form segment">
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->NAME;?> <i class="icon asterisk"></i></label>
          <div class="wojo big transparent down input">
            <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" value="<?php echo $this->data->title;?>" name="title">
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field five wide">
          <label><?php echo Lang::$word->_PLG_SL_AUTOPLAY;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox small radio slider field">
              <input name="automaticSlide" type="radio" value="1" <?php Validator::getChecked($this->data->automaticSlide, 1);?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox small radio slider field">
              <input name="automaticSlide" type="radio" value="0" <?php Validator::getChecked($this->data->automaticSlide, 0);?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field five wide">
          <label><?php echo Lang::$word->_PLG_SL_PBAR;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox small radio slider field">
              <input name="showProgressBar" type="radio" value="1" <?php Validator::getChecked($this->data->showProgressBar, 1);?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox small radio slider field">
              <input name="showProgressBar" type="radio" value="0" <?php Validator::getChecked($this->data->showProgressBar, 0);?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field five wide">
          <label><?php echo Lang::$word->_PLG_SL_PONHOVER;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox small radio slider field">
              <input name="pauseOnHover" type="radio" value="1" <?php Validator::getChecked($this->data->pauseOnHover, 1);?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox small radio slider field">
              <input name="pauseOnHover" type="radio" value="0" <?php Validator::getChecked($this->data->pauseOnHover, 0);?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field five wide"> </div>
      </div>
      <div class="wojo fields">
        <div class="field five wide">
          <label><?php echo Lang::$word->_PLG_SL_HEIGHT;?> <i class="icon asterisk"></i></label>
          <div class="wojo right labeled input">
            <input placeholder="<?php echo Lang::$word->_PLG_SL_HEIGHT;?>" value="<?php echo $this->data->height;?>" type="text" name="height">
            <div class="wojo basic label"> px </div>
          </div>
        </div>
        <div class="field five wide">
          <label><?php echo Lang::$word->_PLG_SL_WIDTHT;?> <i class="icon asterisk"></i></label>
          <div class="wojo right labeled input">
            <input placeholder="<?php echo Lang::$word->_PLG_SL_WIDTHT;?>" value="<?php echo $this->data->width;?>" type="text" name="width">
            <div class="wojo basic label"> px </div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field five wide">
          <label><?php echo Lang::$word->_PLG_SL_ASPEED;?> <i class="icon asterisk"></i></label>
          <div class="wojo right labeled input">
            <input placeholder="<?php echo Lang::$word->_PLG_SL_ASPEED;?>" type="text" value="<?php echo $this->data->slidesTime;?>" name="slidesTime">
            <div class="wojo basic label"> ms </div>
          </div>
        </div>
        <div class="field five wide">
          <label><?php echo Lang::$word->_PLG_SL_ANSPEED;?> <i class="icon asterisk"></i></label>
          <div class="wojo right labeled input">
            <input placeholder="<?php echo Lang::$word->_PLG_SL_ANSPEED;?>" value="<?php echo $this->data->slidesEaseIn;?>" type="text" name="slidesEaseIn">
            <div class="wojo basic label"> ms </div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field five wide">
          <label><?php echo Lang::$word->_PLG_SL_ALANIM;?></label>
          <select name="transition" class="wojo fluid selection dropdown">
            <?php echo Utility::loopOptionsSimpleAlt($this->animationlist, $this->data->transition);?>
          </select>
        </div>
        <div class="field five wide">
          <div class="content-center" style="overflow:hidden"><img id="dummy" src="<?php echo APLUGINURL;?>slider/view/images/basic.png" alt=""></div>
        </div>
      </div>
      <div class="wojo divider"></div>
      <div class="row phone-block-1 tablet-block-2 screen-block-3 vertical-gutters content-center" id="layoutMode">
        <div class="column">
          <div class="wojo attached segment<?php echo ($this->data->layout == "basic") ? " active" :'';?>"><a data-type="basic"><img src="<?php echo APLUGINURL;?>slider/view/images/basic.png" alt=""></a>
            <p class="wojo small bold text half-top-padding">Basic</p>
          </div>
        </div>
        <div class="column">
          <div class="wojo attached segment<?php echo ($this->data->layout == "standard") ? " active" :'';?>"><a data-type="standard"><img src="<?php echo APLUGINURL;?>slider/view/images/standard.png" alt=""></a>
            <p class="wojo small bold text half-top-padding">Standard</p>
          </div>
        </div>
        <div class="column">
          <div class="wojo attached segment<?php echo ($this->data->layout == "dots") ? " active" :'';?>"><a data-type="dots"><img src="<?php echo APLUGINURL;?>slider/view/images/dots.png" alt=""></a>
            <p class="wojo small bold text half-top-padding">Bullets Only</p>
          </div>
        </div>
        <div class="column">
          <div class="wojo attached segment<?php echo ($this->data->layout == "dots_right") ? " active" :'';?>"><a data-type="dots_right"><img src="<?php echo APLUGINURL;?>slider/view/images/dots_right.png" alt=""></a>
            <p class="wojo small bold text half-top-padding">Vertical Bullets Right</p>
          </div>
        </div>
        <div class="column">
          <div class="wojo attached segment<?php echo ($this->data->layout == "dots_left") ? " active" :'';?>"><a data-type="dots_left"><img src="<?php echo APLUGINURL;?>slider/view/images/dots_left.png" alt=""></a>
            <p class="wojo small bold text half-top-padding">Vertical Bullets Left</p>
          </div>
        </div>
        <div class="column">
          <div class="wojo attached segment<?php echo ($this->data->layout == "thumbs") ? " active" :'';?>"><a data-type="thumbs"><img src="<?php echo APLUGINURL;?>slider/view/images/thumbs.png" alt=""></a>
            <p class="wojo small bold text half-top-padding">Thumbnails Only</p>
          </div>
        </div>
        <div class="column">
          <div class="wojo attached segment<?php echo ($this->data->layout == "thumbs_down") ? " active" :'';?>"><a data-type="thumbs_down"><img src="<?php echo APLUGINURL;?>slider/view/images/thumbs_down.png" alt=""></a>
            <p class="wojo small bold text half-top-padding">Thumbnails</p>
          </div>
        </div>
        <div class="column">
          <div class="wojo attached segment<?php echo ($this->data->layout == "thumbs_left") ? " active" :'';?>"><a data-type="thumbs_left"><img src="<?php echo APLUGINURL;?>slider/view/images/thumbs_left.png" alt=""></a>
            <p class="wojo small bold text half-top-padding">Thumbnails Left</p>
          </div>
        </div>
        <div class="column">
          <div class="wojo attached segment<?php echo ($this->data->layout == "thumbs_right") ? " active" :'';?>"><a data-type="thumbs_right"><img src="<?php echo APLUGINURL;?>slider/view/images/thumbs_right.png" alt=""></a>
            <p class="wojo small bold text half-top-padding">Thumbnails Right</p>
          </div>
        </div>
      </div>
    </div>
    <div class="wojo big space divider"></div>
    <div class="content-center"> <a href="<?php echo Url::url("/admin/plugins", "slider");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
      <button type="button" data-action="saveConfig" data-url="plugins_/slider" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->_PLG_SL_SUB8;?></button>
    </div>
    <input type="hidden" name="layout" value="<?php echo $this->data->layout;?>">
    <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
  </form>
</div>
<!-- Slides -->
<div class="scrollbox_x">
  <div class="wojo bottom attached segment" id="editable" style="width:2000px">
    <div id="slideholder" class="row half-horizontal-gutters align-middle">
      <?php if($this->slides):?>
      <?php foreach($this->slides as $rows):?>
      <div class="column shrink sortable" data-id="<?php echo $rows->id;?>">
        <div class="wojo image thumb">
          <div class="actions">
            <div class="wojo small top right pointing dropdown"><i class="icon vertical ellipsis"></i>
              <div class="wojo small menu"> <a class="item" data-set='{"mode":"prop","id":<?php echo $rows->id;?>,"type":"<?php echo $rows->mode;?>"}'> <i class="icon select"></i> <?php echo Lang::$word->PROP;?> </a> <a class="item" data-set='{"mode":"edit","id":<?php echo $rows->id;?>}'> <i class="icon note"></i> <?php echo Lang::$word->EDIT;?> </a> <a class="item" data-set='{"mode":"duplicate","id":<?php echo $rows->id;?>}'> <i class="icon copy"></i><?php echo Lang::$word->DUPLICATE;?> </a>
                <div class="wojo basic divider"></div>
                <a class="item" data-set='{"mode":"delete","id":<?php echo $rows->id;?>}'> <i class="icon negative trash"></i><?php echo Lang::$word->DELETE;?> </a> </div>
            </div>
          </div>
          <img data-id="<?php echo $rows->id;?>" src="<?php echo UPLOADURL . '/thumbs/' . basename($rows->image);?>">
          <div class="header">
            <div class="column"><span data-editable="true" data-set='{"type": "sltitle", "id":<?php echo $rows->id;?>, "url":"<?php echo APLUGINURL;?>slider/controller.php"}'><?php echo Validator::truncate($rows->title, 20);?></span></div>
          </div>
        </div>
      </div>
      <?php endforeach;?>
      <?php endif;?>
      <div id="tadd" class="column shrink content-center">
        <div class="wojo attached boxed acard half-padding"><a id="addnew" class="wojo big circular fitted icon button"><i class="icon plus"></i></a></div>
        <div class="wojo divider"></div>
        <div class="wojo small basic icon buttons" id="sortables"> <a id="reorder" class="wojo button"><i class="icon reorder"></i></a> <a id="rsave" class="wojo button disabled"><i class="icon positive check"></i></a> </div>
      </div>
    </div>
  </div>
</div>
<!-- Slide Source-->
<div class="wojo small form attached secondary bg segment padding hide-all" id="source"> <a id="closeSource" class="wojo tiny icon button"><i class="icon delete"></i></a>
  <div class="wojo fields align-middle">
    <div class="field two wide labeled">
      <label class="content-right mobile-content-left"><?php echo Lang::$word->_PLG_SL_SUB12;?> </label>
    </div>
    <div class="field shrink">
      <div class="wojo checkbox radio">
        <input name="source" type="radio" value="bg" checked="checked">
        <label></label>
      </div>
    </div>
    <div data-id="bg_asset" class="field shrink hide-all"> <a class="wojo tiny primary button bg_image"><?php echo Lang::$word->_PLG_SL_SUB13;?></a>
      <input type="hidden" name="bg_img" value="" id="bg_img">
    </div>
  </div>
  <div class="wojo fields">
    <div class="field two wide labeled">
      <label class="content-right mobile-content-left">Transparent</label>
    </div>
    <div class="field shrink">
      <div class="wojo checkbox radio">
        <input name="source" type="radio" value="tr">
        <label></label>
      </div>
    </div>
  </div>
  <div class="wojo fields">
    <div class="field two wide labeled">
      <label class="content-right mobile-content-left">Solid Color</label>
    </div>
    <div class="field shrink">
      <div class="wojo checkbox radio">
        <input name="source" type="radio" value="cl">
        <label></label>
      </div>
    </div>
    <div data-id="cl_asset" class="shrink hide-all">
      <button class="wojo tiny basic icon button"><i class="icon contrast"></i></button>
      <input type="hidden" id="bg_color" value="">
    </div>
  </div>
</div>
<!-- Slide Editor-->
<div class="wojo form">
  <div id="toolbar">
    <div class="wojo small horizontal list align-middle align-center">
      <div class="item"><a data-velocity="true" data-type="fade" data-trigger="#showTrans" class="wojo tiny basic icon button"><i class="icon chevron down"></i></a></div>
      <div class="item divider"></div>
      <div class="item"><span class="wojo small bold text"><?php echo Lang::$word->_PLG_SL_SUB9;?>:</span></div>
      <div class="item"><a class="wojo tiny basic icon button" data-velocity="true" data-trigger="#layeritems" data-type="slideDown"><i class="icon reorder"></i></a></div>
      <div class="item relative">
        <div id="layertype" class="wojo tiny dropdown selection"> <span class="wojo small text"><?php echo Lang::$word->_PLG_SL_SUB10;?></span> <i class="icon dropdown"></i>
          <div class="wojo small menu"> <a data-value="header" class="item"><?php echo Lang::$word->_PLG_SL_HEAD;?></a> <a data-value="para" class="item"><?php echo Lang::$word->_PLG_SL_PARA;?></a> <a data-value="button" class="item"><?php echo Lang::$word->_PLG_SL_BUTTON;?></a> <?php /*?><a data-value="shape" class="item"><?php echo Lang::$word->_PLG_SL_SHAPE;?></a><?php */?> <a data-value="icon" class="item"><?php echo Lang::$word->_PLG_SL_ICON;?></a> <a data-value="video" class="item"><?php echo Lang::$word->_PLG_SL_VIDEO;?></a> </div>
        </div>
        <div id="layeritems" class="absolute hide-all">
          <div class="wojo small very relaxed divided list"></div>
        </div>
      </div>
      <div class="item divider"></div>
      <div class="item">
        <div id="editables"> <a id="save" class="wojo tiny basic positive icon button disabled"><i class="icon check"></i></a> <a id="edit" class="wojo tiny basic icon button is_e"><i class="icon pencil"></i></a> <a id="crop" class="wojo tiny basic icon button is_e"><i class="icon crop"></i></a> <a id="copy" class="wojo tiny basic icon button is_e"><i class="icon copy"></i></a> <a id="trash" class="wojo tiny basic icon button is_e"><i class="icon trash"></i></a> </div>
      </div>
      <div class="item divider"></div>
      <div class="item"> <a id="saveall" data-content="Save Slide" class="wojo tiny positive icon button"><i class="icon download"></i></a></div>
    </div>
    <div class="wojo double fitted divider"></div>
    <div class="wojo tiny horizontal list align-middle align-center" id="position">
      <div class="item"><a data-type="center center" class="wojo tiny icon button align"><i class="icon align center middle"></i></a></div>
      <div class="item"><a data-type="center top" class="wojo tiny icon button align"><i class="icon align center top"></i></a></div>
      <div class="item"><a data-type="center bottom" class="wojo tiny icon button align"><i class="icon align center bottom"></i></a></div>
      <div class="item"><a data-type="left center" class="wojo tiny icon button align"><i class="icon align center left"></i></a></div>
      <div class="item"><a data-type="right center" class="wojo tiny icon button align"><i class="icon align center right"></i></a></div>
      <div class="item divider"></div>
      <div class="item"><a data-type="left top" class="wojo tiny icon button align"><i class="icon align top left"></i></a></div>
      <div class="item"><a data-type="right top" class="wojo tiny icon button align"><i class="icon align top right"></i></a></div>
      <div class="item"><a data-type="left bottom" class="wojo tiny icon button align"><i class="icon align bottom left"></i></a></div>
      <div class="item"><a data-type="right bottom" class="wojo tiny icon button align"><i class="icon align bottom right"></i></a></div>
    </div>
    <div class="hide-all" id="showTrans">
      <div class="wojo double fitted divider"></div>
      <div class="wojo horizontal list align-middle align-center">
        <div class="item"><span class="wojo small bold text"><?php echo Lang::$word->_PLG_SL_SUB11;?>:</span></div>
        <div class="item" id="animation">
          <div id="anipack" class="wojo tiny selection dropdown"> <span class="text">Select Animation</span><i class="icon dropdown"></i>
            <div class="wojo menu">
              <div class="item" data-value="none">None</div>
              <div class="item" data-value="fade">fade</div>
              <div class="item" data-value="flipX">flipX</div>
              <div class="item" data-value="flipY">flipY</div>
              <div class="item" data-value="flipBounceX">flipBounceX</div>
              <div class="item" data-value="flipBounceY">flipBounceY</div>
              <div class="item" data-value="swoop">swoop</div>
              <div class="item" data-value="whirl">whirl</div>
              <div class="item" data-value="shrink">shrink</div>
              <div class="item" data-value="expand">expand</div>
              <div class="item" data-value="bounce">bounce</div>
              <div class="item" data-value="bounceUp">bounceUp</div>
              <div class="item" data-value="bounceDown">bounceDown</div>
              <div class="item" data-value="bounceLeft">bounceLeft</div>
              <div class="item" data-value="bounceRight">bounceRight</div>
              <div class="item" data-value="slideUp">slideUp</div>
              <div class="item" data-value="slideDown">slideDown</div>
              <div class="item" data-value="slideLeft">slideLeft</div>
              <div class="item" data-value="slideRight">slideRight</div>
              <div class="item" data-value="slideUpBig">slideUpBig</div>
              <div class="item" data-value="slideDownBig">slideDownBig</div>
              <div class="item" data-value="slideLeftBig">slideLeftBig</div>
              <div class="item" data-value="slideRightBig">slideRightBig</div>
              <div class="item" data-value="perspectiveUp">perspectiveUp</div>
              <div class="item" data-value="perspectiveDown">perspectiveDown</div>
              <div class="item" data-value="perspectiveLeft">perspectiveLeft</div>
              <div class="item" data-value="perspectiveRight">perspectiveRight</div>
            </div>
            <input type="hidden" name="anitype">
          </div>
          <div class="wojo small fitted label">
            <div class="wojo small basic left icon input" style="width:80px; height:2rem">
              <input id="atime" type="text" name="time" value="2" data-content="time in miliseconds">
              <i class="clock icon"></i> </div>
          </div>
          <div class="wojo small fitted label">
            <div class="wojo small basic left icon input" style="width:80px; height:2rem">
              <input id="dtime" type="text" name="dtime" value="0" data-content="delay in miliseconds">
              <i class="stop watch icon"></i> </div>
          </div>
          <a id="play" class="wojo tiny basic primary button"><i class="icon play"></i> play</a> </div>
      </div>
    </div>
  </div>
</div>
<!-- Slide Container-->
<div id="sliderbuilder" style="height:<?php echo $this->data->height;?>px;position:relative;"></div>
<div id="temp-slide" style="display:none"></div>
<link href="<?php echo APLUGINURL;?>slider/view/css/slider.css" rel="stylesheet" type="text/css" />
<script src="<?php echo SITEURL;?>/assets/jquery-ui.min.js" type="text/javascript"></script> 
<script src="<?php echo APLUGINURL;?>slider/view/js/slider.js"></script> 
<script type="text/javascript"> 
// <![CDATA[  
  $(document).ready(function() {
      $("#sliderbuilder").Slider({
          url: "<?php echo APLUGINURL;?>slider/controller.php",
          aurl: "<?php echo ADMINVIEW;?>",
          surl: "<?php echo SITEURL;?>",
          element: "#sliderbuilder",
		  ytapi:"<?php echo App::Core()->ytapi;?>",
		  adistance:5,
          lang: {
              canBtn: "<?php echo Lang::$word->CANCEL;?>",
              updBtn: "<?php echo Lang::$word->UPDATE;?>",
              insBtn: "<?php echo Lang::$word->INSERT;?>",
              icon: "<?php echo Lang::$word->_PLG_SL_ICON;?>",
              button: "<?php echo Lang::$word->_PLG_SL_BUTTON;?>",
			  video: "<?php echo Lang::$word->_PLG_SL_VIDEO;?>",
              shape: "<?php echo Lang::$word->_PLG_SL_SHAPE;?>",
              header: "<?php echo Lang::$word->_PLG_SL_HEAD;?>",
              paragraph: "<?php echo Lang::$word->_PLG_SL_PARA;?>",
          }
      });
  });
  // ]]>
</script>