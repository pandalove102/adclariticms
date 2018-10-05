<?php
  /**
   * File Manager Page Builder
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: managerBuilder.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  define("_WOJO", true);
  require_once("../../init.php");
	  
  if (!App::Auth()->is_Admin())
      exit;
	  
  if(!Auth::hasPrivileges('manage_files')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<div class="wojo attcahed acard" id="fm">
  <div class="header">
    <div class="row">
      <div class="shrink columns">
        <div class="wojo small basic buttons">
          <div class="wojo button uploader" id="drag-and-drop-zone">
            <label><?php echo Lang::$word->UPLOAD;?>
              <input type="file" multiple name="files[]">
            </label>
          </div>
          <div class="wojo top left pointing dropdown button"> <span class="text"><?php echo Lang::$word->FM_NEWFLD;?></span>
            <div class="menu">
              <div class="header"> <?php echo Lang::$word->FM_NEWFLD_S1;?> </div>
              <div class="wojo basic message">
                <div class="wojo small right labeled left icon input"> <i class="small icon"></i>
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
      <div class="column half-left-padding">
        <div id="displyType" class="wojo basic small icon buttons"> <a data-type="table" class="wojo button active"><i class="icon reorder"></i></a> <a data-type="list" class="wojo button"><i class="icon unordered list"></i></a> <a data-type="grid" class="wojo button"><i class="icon apps"></i></a> </div>
      </div>
      <div class="column content-right"> <a id="fInsert" class="wojo small secondary button hidden"><i class="icon download"></i> <?php echo Lang::$word->INSERT;?></a> </div>
    </div>
  </div>
  <div class="wojo basic divider"></div>
  <div class="row">
    <div class="shrink columns phone-100 screen-right-divider tablet-right-divider">
      <div class="half-padding">
        <h4><?php echo Lang::$word->FM_DISPLAY;?></h4>
        <div id="ftype" class="wojo very relaxed link list"> 
        <a data-type="all" class="item active"> <i class="icon inbox"></i>
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
  </div>
  <div class="footer">
    <div class="wojo small horizontal relaxed divided link list">
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
    $("#result").Manager({
        url: "<?php echo ADMINVIEW;?>",
        dirurl: "<?php echo UPLOADURL;?>",
		is_editor: true,
		is_mce: false,
        lang: {
            delete: "<?php echo Lang::$word->DELETE;?>",
			insert: "<?php echo Lang::$word->INSERT;?>",
			download: "<?php echo Lang::$word->DOWNLOAD;?>",
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