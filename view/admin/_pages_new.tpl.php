<?php
  /**
   * Pages
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _pages_new.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h3><?php echo Lang::$word->PAG_SUB4;?></h3>
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
              <label class="transparent"><?php echo Lang::$word->PAG_NAME;?> <i class="icon asterisk"></i></label>
              <div class="wojo huge transparent inverted input">
                <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" name="title_<?php echo $lang->abbr?>">
              </div>
            </div>
            <div class="field five wide">
              <label class="transparent"><?php echo Lang::$word->PAG_SLUG;?></label>
              <div class="wojo huge transparent inverted input">
                <input type="text" placeholder="<?php echo Lang::$word->PAG_SLUG;?>" name="slug_<?php echo $lang->abbr;?>">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="wojo attached segment form">
        <div class="wojo fields">
          <div class="field">
            <label><?php echo Lang::$word->PAG_CAPTION;?></label>
            <input type="text" placeholder="<?php echo Lang::$word->PAG_CAPTION;?>" name="caption_<?php echo $lang->abbr;?>">
          </div>
          <div class="field">
            <label><?php echo Lang::$word->BGIMG;?></label>
            <div class="wojo action input">
              <input id="bg_<?php echo $lang->abbr;?>" placeholder="<?php echo Lang::$word->BGIMG;?>" name="custom_bg_<?php echo $lang->abbr;?>" type="text" readonly>
              <div class="wojo basic small button removebg"> <?php echo Lang::$word->REMOVE;?> </div>
              <div class="filepicker wojo icon basic button" data-parent="#bg_<?php echo $lang->abbr;?>" data-ext="images"><i class="open folder icon"></i></div>
            </div>
          </div>
        </div>
        <div class="wojo fields">
          <div class="field">
            <textarea class="bodypost" name="body_<?php echo $lang->abbr;?>"></textarea>
          </div>
        </div>
        <div class="wojo fields">
          <div class="field">
            <label><?php echo Lang::$word->METAKEYS;?></label>
            <textarea class="small" placeholder="<?php echo Lang::$word->METAKEYS;?>" name="keywords_<?php echo $lang->abbr;?>"></textarea>
          </div>
          <div class="field">
            <label><?php echo Lang::$word->METADESC;?></label>
            <textarea class="small" placeholder="<?php echo Lang::$word->METADESC;?>" name="description_<?php echo $lang->abbr;?>"></textarea>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach;?>
    <div class="wojo attached segment form">
      <div class="row gutters">
        <div class="columns screen-50 mobile-100">
          <div class="wojo block fields">
            <div class="field">
              <label><?php echo Lang::$word->PAG_ACCLVL;?></label>
              <select name="access" id="access_id" data-id="0" class="wojo fluid dropdown access_id">
                <?php echo Utility::loopOptionsSimpleAlt($this->access_list);?>
              </select>
            </div>
            <div class="field">
              <label><?php echo Lang::$word->PAG_JSCODE;?></label>
              <textarea class="small" placeholder="<?php echo Lang::$word->PAG_JSCODE;?>" name="jscode"></textarea>
            </div>
          </div>
        </div>
        <div class="columns screen-50 mobile-100">
          <div class="wojo block fields">
            <div class="field">
              <label><?php echo Lang::$word->PAG_MEMLVL;?></label>
              <div id="membership">
                <input disabled="disabled" type="text" value="<?php echo Lang::$word->PAG_NOMEM_REQ;?>" name="na">
              </div>
            </div>
            <div class="field" id="modshow">
              <input type="hidden" name="module_data" value="0">
            </div>
          </div>
        </div>
      </div>
      <div class="wojo space divider"></div>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->PUBLISHED;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio small slider field">
              <input name="active" type="radio" value="1" checked="checked">
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio small slider field">
              <input name="active" type="radio" value="0">
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->PAG_MDLCOMMENT;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio small slider field">
              <input name="is_comments" type="radio" value="1">
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio small slider field">
              <input name="is_comments" type="radio" value="0" checked="checked">
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->PAG_PGADM;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio small slider field">
              <input name="is_admin" type="radio" value="1">
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio small slider field">
              <input name="is_admin" type="radio" value="0" checked="checked">
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="wojo big space divider"></div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/pages");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-action="processPage" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->PAG_SUB4;?></button>
  </div>
</form>
<script src="<?php echo ADMINVIEW;?>/js/page.js"></script> 
<script type="text/javascript"> 
// <![CDATA[  
  $(document).ready(function() {
	  $.Page({
		  url: "<?php echo ADMINVIEW;?>/helper.php",
		  clang :"<?php echo Lang::$lang;?>",
		  lang :{
			  nomemreq :"<?php echo Lang::$word->PAG_NOMEM_REQ;?>",
		  }
	  });
  });
// ]]>
</script>