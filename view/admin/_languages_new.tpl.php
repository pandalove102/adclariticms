<?php
  /**
   * Language Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _languages_edit.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h3><?php echo Lang::$word->LG_SUB5;?></h3>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo segment form">
    <div class="wojo fields align-middle">
      <div class="field four wide labeled">
        <label class="content-right mobile-content-left"><?php echo Lang::$word->LG_NAME;?> <i class="icon asterisk"></i></label>
      </div>
      <div class="field">
        <input type="text" placeholder="<?php echo Lang::$word->LG_NAME;?>" name="name">
      </div>
    </div>
    <div class="wojo fields align-middle">
      <div class="field four wide labeled">
        <label class="content-right mobile-content-left"><?php echo Lang::$word->LG_AUTHOR;?></label>
      </div>
      <div class="field">
        <input type="text" placeholder="<?php echo Lang::$word->LG_AUTHOR;?>" name="author">
      </div>
    </div>
    <div class="wojo fields align-middle">
      <div class="field four wide labeled">
        <label class="content-right mobile-content-left"><?php echo Lang::$word->LG_COLOR;?></label>
      </div>
      <div class="field">
        <div class="wojo action input">
          <input type="text" name="color" readonly>
          <div class="wojo basic icon button" data-lang-color="true"><i class="icon checkbox"></i></div>
        </div>
      </div>
    </div>
    <div class="wojo fields align-middle">
      <div class="field four wide labeled">
        <label class="content-right mobile-content-left"><?php echo Lang::$word->LG_ABBR;?> <i class="icon asterisk"></i></label>
      </div>
      <div class="field">
        <input type="text" placeholder="<?php echo Lang::$word->LG_ABBR;?>" name="abbr">
      </div>
    </div>
  </div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/languages");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-action="processLanguage" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->LG_SUB5;?></button>
  </div>
</form>