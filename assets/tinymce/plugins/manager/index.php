<?php
  /**
   * File Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  define("_WOJO", true);
  require_once("../../../../init.php");
  
  if (!App::Auth()->is_Admin())
      exit;
	  
  if(!Auth::hasPrivileges('manage_files')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<!DOCTYPE html><head>
<meta charset="utf-8">
<title><?php echo Lang::$word->META_T20;?></title>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/jquery.js"></script>
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/global.js"></script>
<link href="<?php echo ADMINVIEW . '/cache/master_main.css';?>" rel="stylesheet" type="text/css" />
<div class="wojo card" id="fm">
  <div class="header">
    <div class="row">
      <div class="shrink columns">
        <div class="wojo small buttons">
          <div class="wojo secondary button uploader" id="drag-and-drop-zone">
            <label><?php echo Lang::$word->UPLOAD;?>
              <input type="file" multiple name="files[]">
            </label>
          </div>
          <div class="wojo top left pointing dropdown button"> <span class="text"><?php echo Lang::$word->FM_NEWFLD;?></span>
            <div class="menu">
              <div class="header"> <?php echo Lang::$word->FM_NEWFLD_S1;?> </div>
              <div class="wojo basic message">
                <div class="wojo tiny right labeled left input">
                  <input placeholder="<?php echo Lang::$word->FM_NEWFLD_S2;?>..." name="foldername" type="text">
                  <a id="addFolder" class="wojo basic label"> <?php echo Lang::$word->ADD;?> </a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="shrink columns half-left-padding">
        <div class="wojo small basic negative button delete"><?php echo Lang::$word->DELETE;?></div>
      </div>
      <div class="shrink columns half-left-padding">
        <div id="displyType" class="wojo basic small icon buttons"> <a data-type="table" class="wojo button active"><i class="icon reorder"></i></a> <a data-type="list" class="wojo button"><i class="icon unordered list"></i></a> <a data-type="grid" class="wojo button"><i class="icon apps"></i></a> </div>
      </div>
      <div class="columns content-right"><a id="togglePreview" class="wojo small basic icon button"><i class="icon compress"></i></a></div>
    </div>
  </div>
  <div class="wojo basic divider"></div>
  <div class="row">
    <div class="shrink columns phone-100 screen-right-divider tablet-right-divider">
      <div class="half-padding">
        <h4><?php echo Lang::$word->FM_DISPLAY;?></h4>
        <div id="ftype" class="wojo very relaxed link list"> <a data-type="all" class="item active"> <i class="icon inbox"></i>
          <div class="content">
            <div class="header"><?php echo Lang::$word->FM_ALL_F;?></div>
          </div>
          </a> <a data-type="pic" class="item"> <i class="icon photo"></i>
          <div class="content">
            <div class="header"><?php echo Lang::$word->FM_AMG_F;?></div>
          </div>
          </a> <a data-type="vid" class="item"> <i class="icon camera retro"></i>
          <div class="content">
            <div class="header"><?php echo Lang::$word->FM_VID_F;?></div>
          </div>
          </a> <a data-type="aud" class="item"> <i class="icon volume"></i>
          <div class="content">
            <div class="header"><?php echo Lang::$word->FM_AUD_F;?></div>
          </div>
          </a> <a data-type="doc" class="item"> <i class="icon files"></i>
          <div class="content">
            <div class="header"><?php echo Lang::$word->FM_DOC_F;?></div>
          </div>
          </a> </div>
        <h4><?php echo Lang::$word->FM_SORT;?></h4>
        <div class="wojo divider"></div>
        <select class="wojo small dropdown fileSort">
          <option value="name"><?php echo Lang::$word->TITLE;?></option>
          <option value="size"><?php echo Lang::$word->FM_FSIZE;?></option>
          <option value="type"><?php echo Lang::$word->TYPE;?></option>
          <option value="date"><?php echo Lang::$word->FM_LASTM;?></option>
        </select>
        <input type="hidden" name="dir" value="">
      </div>
    </div>
    <div class="phone-100 columns wojo primary bg" style="min-height:500px">
      <div class="row wojo secondary bg">
        <div class="column align-middle">
          <div id="fcrumbs" class="half-padding"><span class="wojo small bold text"><?php echo Lang::$word->HOME;?></span></div>
        </div>
        <div class="column align-middle shrink">
          <div class="half-right-padding" id="done"></div>
        </div>
      </div>
      <div id="fileList" class="wojo small attached relaxed middle aligned celled list"></div>
      <div class="wojo basic divider"></div>
      <div id="result"></div>
    </div>
    <div class="shrink columns phone-100 screen-left-divider tablet-left-divider">
      <div id="preview" class="half-padding"><img src="<?php echo ADMINVIEW;?>/images/blank.png" class="wojo medium image" alt=""> </div>
    </div>
  </div>
  <div class="footer">
    <div class="wojo small horizontal relaxed divided inverted list">
      <div class="item"><?php echo Lang::$word->FM_SPACE;?>: <span class="wojo bold text"><?php echo File::directorySize(UPLOADS, true);?></span></div>
      <div id="tsizeDir" class="item"><?php echo Lang::$word->FM_DIRS;?>: <span class="wojo bold text">0</span></div>
      <div id="tsizeFile" class="item"><?php echo Lang::$word->FM_FILES;?>: <span class="wojo bold text">0</span></div>
    </div>
  </div>
</div>
<script src="<?php echo ADMINVIEW;?>/js/manager.js"></script> 
<script type="text/javascript"> 
// <![CDATA[	
$(document).ready(function() {
	$('.wojo.dropdown').dropdown();
    $("#result").Manager({
        url: "<?php echo ADMINVIEW;?>",
        dirurl: "<?php echo UPLOADURL;?>",
		is_editor: false,
		is_mce: true,
        lang: {
            delete: "<?php echo Lang::$word->DELETE;?>",
			download: "<?php echo Lang::$word->DOWNLOAD;?>",
			insert: "<?php echo Lang::$word->INSERT;?>",
			unzip: "<?php echo Lang::$word->FM_UNZIP;?>",
			size: "<?php echo Lang::$word->FM_FSIZE;?>",
			lastm: "<?php echo Lang::$word->FM_LASTM;?>",
			items: "<?php echo strtolower(Lang::$word->ITEMS);?>",
			done: "<?php echo Lang::$word->DONE;?>",
			home: "<?php echo Lang::$word->HOME;?>",
        }
    });
});
// ]]>
</script>