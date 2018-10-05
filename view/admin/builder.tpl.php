<?php
  /**
   * Page Builder
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: builder.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<a href=".aside" id="sOpener"><i class="icon angle right"></i></a>
<?php include(ADMINBASE . "/builder/snippets/sidebar.tpl.php");?>
<div id="header" class="fixed">
  <div class="row align-middle">
    <div class="column shrink reswitch"> <a data-mode="screen" class="action"><i class="icon desktop active"></i></a><span class="wojo separator"></span> <a data-mode="tablet" class="action"><i class="icon laptop"></i></a><span class="wojo separator"></span> <a data-mode="phone" class="action"><i class="icon smartphone"></i></a> </div>
    <?php if(count($this->langlist) > 1):?>
    <div class="column"> <span class="wojo separator"></span>
      <div class="wojo small pointing dropdown transparent button wbuilder" id="langChange"> <span class="wojo text">change language </span> <i class="icon dropdown"></i>
        <div class="menu">
          <?php foreach($this->langlist as $lang):?>
          <?php if($lang->abbr == $this->segments[2]):?>
          <a data-value="<?php echo $lang->abbr;?>" class="item wbuilder"><span class="flag icon <?php echo $lang->abbr;?>"></span> <?php echo $lang->name;?></a>
          <?php else:?>
          <a href="<?php echo Url::url("/admin/builder/" . $lang->abbr, $this->segments[3]);?>" data-value="<?php echo $lang->abbr;?>" class="item wbuilder"><span class="flag icon <?php echo $lang->abbr;?>"></span> <?php echo $lang->name;?></a>
          <?php endif;?>
          <?php endforeach;?>
        </div>
        <input name="lang" type="hidden" value="<?php echo $this->segments[2];?>">
      </div>
      <span class="wojo separator"></span> </div>
    <?php endif;?>
    <div class="column shrink"> <a class="action" href="<?php echo Url::url("/admin/pages/edit", $this->segments[3]);?>"><i class="icon delete"></i> <?php echo Lang::$word->EXIT;?></a> <span class="wojo separator"></span> <a class="action save"><i class="icon floppy"></i>Save</a>
      <div class="wojo checkbox">
        <input name="langall" type="checkbox" value="1">
        <label>All Language</label>
      </div>
    </div>
  </div>
</div>
<div id="pagetitle">
  <div class="row align-middle">
    <div class="column shrink"><span class="wojo label"></span><span class="wojo label"></span><span class="wojo label"></span></div>
    <div class="column content-center"><?php echo $this->data->{'title' . Lang::$lang};?></div>
  </div>
</div>
<div id="container"> <?php echo Content::parseContentData($this->data->{'body_' . $this->segments[2]}, true);?> </div>
<?php include(ADMINBASE . "/builder/snippets/propinspector.tpl.php");?>
