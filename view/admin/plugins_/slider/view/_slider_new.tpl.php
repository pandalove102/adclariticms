<?php
  /**
   * Slider
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _slider_new.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h3><?php echo Lang::$word->_PLG_SL_TITLE1;?></h3>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo form segment">
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->NAME;?> <i class="icon asterisk"></i></label>
        <div class="wojo big transparent down input">
          <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" name="title">
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field five wide">
        <label><?php echo Lang::$word->_PLG_SL_AUTOPLAY;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox small radio slider field">
            <input name="automaticSlide" type="radio" value="1" checked="checked">
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox small radio slider field">
            <input name="automaticSlide" type="radio" value="0">
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="field five wide">
        <label><?php echo Lang::$word->_PLG_SL_PBAR;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox small radio slider field">
            <input name="showProgressBar" type="radio" value="1" checked="checked">
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox small radio slider field">
            <input name="showProgressBar" type="radio" value="0">
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
            <input name="pauseOnHover" type="radio" value="1" checked="checked">
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox small radio slider field">
            <input name="pauseOnHover" type="radio" value="0">
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
          <input placeholder="<?php echo Lang::$word->_PLG_SL_HEIGHT;?>" value="500" type="text" name="height">
          <div class="wojo basic label"> px </div>
        </div>
      </div>
      <div class="field five wide">
        <label><?php echo Lang::$word->_PLG_SL_WIDTHT;?> <i class="icon asterisk"></i></label>
        <div class="wojo right labeled input">
          <input placeholder="<?php echo Lang::$word->_PLG_SL_WIDTHT;?>" value="1094" type="text" name="width">
          <div class="wojo basic label"> px </div>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field five wide">
        <label><?php echo Lang::$word->_PLG_SL_ASPEED;?> <i class="icon asterisk"></i></label>
        <div class="wojo right labeled input">
          <input placeholder="<?php echo Lang::$word->_PLG_SL_ASPEED;?>" type="text" value="3000" name="slidesTime">
          <div class="wojo basic label"> ms </div>
        </div>
      </div>
      <div class="field five wide">
        <label><?php echo Lang::$word->_PLG_SL_ANSPEED;?> <i class="icon asterisk"></i></label>
        <div class="wojo right labeled input">
          <input placeholder="<?php echo Lang::$word->_PLG_SL_ANSPEED;?>" value="500" type="text" name="slidesEaseIn">
          <div class="wojo basic label"> ms </div>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field five wide">
        <label><?php echo Lang::$word->_PLG_SL_ALANIM;?></label>
        <select name="transition" class="wojo fluid selection dropdown">
          <?php echo Utility::loopOptionsSimpleAlt($this->animationlist);?>
        </select>
      </div>
      <div class="field five wide">
        <div class="content-center" style="overflow:hidden"><img id="dummy" src="<?php echo APLUGINURL;?>slider/view/images/basic.png" alt=""></div>
      </div>
    </div>
    <div class="wojo divider"></div>
    <div class="row phone-block-1 tablet-block-2 screen-block-3 vertical-gutters content-center" id="layoutMode">
      <div class="column">
        <div class="wojo attached segment active"><a data-type="basic"><img src="<?php echo APLUGINURL;?>slider/view/images/basic.png" alt=""></a>
          <p class="wojo small bold text half-top-padding">Basic</p>
        </div>
      </div>
      <div class="column">
        <div class="wojo attached segment"><a data-type="standard"><img src="<?php echo APLUGINURL;?>slider/view/images/standard.png" alt=""></a>
          <p class="wojo small bold text half-top-padding">Standard</p>
        </div>
      </div>
      <div class="column">
        <div class="wojo attached segment"><a data-type="dots"><img src="<?php echo APLUGINURL;?>slider/view/images/dots.png" alt=""></a>
          <p class="wojo small bold text half-top-padding">Bullets Only</p>
        </div>
      </div>
      <div class="column">
        <div class="wojo attached segment"><a data-type="dots_right"><img src="<?php echo APLUGINURL;?>slider/view/images/dots_right.png" alt=""></a>
          <p class="wojo small bold text half-top-padding">Vertical Bullets Right</p>
        </div>
      </div>
      <div class="column">
        <div class="wojo attached segment"><a data-type="dots_left"><img src="<?php echo APLUGINURL;?>slider/view/images/dots_left.png" alt=""></a>
          <p class="wojo small bold text half-top-padding">Vertical Bullets Left</p>
        </div>
      </div>
      <div class="column">
        <div class="wojo attached segment"><a data-type="thumbs"><img src="<?php echo APLUGINURL;?>slider/view/images/thumbs.png" alt=""></a>
          <p class="wojo small bold text half-top-padding">Thumbnails Only</p>
        </div>
      </div>
      <div class="column">
        <div class="wojo attached segment"><a data-type="thumbs_down"><img src="<?php echo APLUGINURL;?>slider/view/images/thumbs_down.png" alt=""></a>
          <p class="wojo small bold text half-top-padding">Thumbnails</p>
        </div>
      </div>
      <div class="column">
        <div class="wojo attached segment"><a data-type="thumbs_left"><img src="<?php echo APLUGINURL;?>slider/view/images/thumbs_left.png" alt=""></a>
          <p class="wojo small bold text half-top-padding">Thumbnails Left</p>
        </div>
      </div>
      <div class="column">
        <div class="wojo attached segment"><a data-type="thumbs_right"><img src="<?php echo APLUGINURL;?>slider/view/images/thumbs_right.png" alt=""></a>
          <p class="wojo small bold text half-top-padding">Thumbnails Right</p>
        </div>
      </div>
    </div>
  </div>
  <div class="wojo big space divider"></div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/plugins", "slider");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-action="saveConfig" data-url="plugins_/slider" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->_PLG_SL_SUB8;?></button>
  </div>
  <input type="hidden" name="layout" value="basic">
</form>
<div id="sliderbuilder"></div>
<link href="<?php echo APLUGINURL;?>slider/view/css/slider.css" rel="stylesheet" type="text/css" />
<script src="<?php echo APLUGINURL;?>slider/view/js/slider.js"></script> 
<script type="text/javascript"> 
// <![CDATA[  
  $(document).ready(function() {
	  $("#sliderbuilder").Slider({
		  url: "<?php echo APLUGINURL;?>slider/controller.php",
		  aurl: "<?php echo ADMINVIEW;?>",
		  surl: "<?php echo SITEURL;?>",
		  slider_id: 0,
		  element:"#sliderbuilder",
            lang: {
                canBtn: "<?php echo Lang::$word->CANCEL;?>",
				updBtn: "<?php echo Lang::$word->UPDATE;?>",
				insBtn: "<?php echo Lang::$word->INSERT;?>",
				icon: "<?php echo Lang::$word->_PLG_SL_ICON;?>",
				button: "<?php echo Lang::$word->_PLG_SL_BUTTON;?>",
				shape: "<?php echo Lang::$word->_PLG_SL_SHAPE;?>",
				header: "<?php echo Lang::$word->_PLG_SL_HEAD;?>",
				paragraph: "<?php echo Lang::$word->_PLG_SL_PARA;?>",
            }
	  });
  });
// ]]>
</script>