<?php
  /**
   * Modules
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: modules.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!Auth::hasPrivileges('manage_modules')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<?php switch(Url::segment($this->segments)): case "edit": ?>
<!-- Start edit -->
<h3><?php echo Lang::$word->META_T30;?></h3>
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
              <label class="transparent"><?php echo Lang::$word->NAME;?> <i class="icon asterisk"></i></label>
              <div class="wojo huge transparent inverted input">
                <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" value="<?php echo $this->data->{'title_' . $lang->abbr};?>" name="title_<?php echo $lang->abbr?>">
              </div>
            </div>
            <div class="field five wide">
              <label class="transparent"><?php echo Lang::$word->DESCRIPTION;?></label>
              <div class="wojo huge transparent inverted input">
                <input type="text" placeholder="<?php echo Lang::$word->DESCRIPTION;?>" value="<?php echo $this->data->{'info_' . $lang->abbr};?>" name="info_<?php echo $lang->abbr;?>">
              </div>
            </div>
          </div>
        </div>
        <div class="content">
          <div class="wojo fields">
            <div class="field">
              <label><?php echo Lang::$word->METAKEYS;?></label>
              <textarea class="small" placeholder="<?php echo Lang::$word->METAKEYS;?>" name="keywords_<?php echo $lang->abbr;?>"><?php echo $this->data->{'keywords_' . $lang->abbr};?></textarea>
            </div>
            <div class="field">
              <label><?php echo Lang::$word->METADESC;?></label>
              <textarea class="small" placeholder="<?php echo Lang::$word->METADESC;?>" name="description_<?php echo $lang->abbr;?>"><?php echo $this->data->{'description_' . $lang->abbr};?></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <div class="wojo big space divider"></div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/modules");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-action="processModule" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->MDL_SUB1;?></button>
  </div>
  <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
</form>
<?php break;?>
<?php default: ?>
<!-- Start default -->
<h3><?php echo Lang::$word->MDL_TITLE;?></h3>
<p><?php echo Lang::$word->MDL_SUB;?></p>
<div class="wojo big space divider"></div>
<?php if(!$this->data):?>
<div class="content-center"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small thick caps text"><?php echo Lang::$word->MDL_NOMOD;?></p>
</div>
<?php else:?>
<div class="row phone-block-1 mobile-block-1 tablet-block-2 screen-block-3 gutters content-center">
  <?php foreach ($this->data as $row):?>
  <?php if(Auth::checkModAcl($row->modalias)):?>
  <div class="column" id="item_<?php echo $row->id;?>">
    <div class="wojo attached segment content-center"> <img src="<?php echo $row->icon ? AMODULEURL . $row->icon : SITEURL . '/assets/images/basic_plugin.svg';?>" class="wojo normal basic image" alt="">
      <div class="wojo half space divider"></div>
      <p class="wojo small bold text"><?php echo $row->{'title' . Lang::$lang};?></p>
      <div class="wojo divider"></div>
      <div class="content-left">
        <div class="row no-all-gutters">
          <div class="columns"> <a href="<?php echo Url::url(Router::$path . "/edit", $row->id);?>" class="wojo icon basic positive circular small button"><i class="icon pencil"></i></a> <a data-set='{"option":[{"delete":"deleteModule","title": "<?php echo Validator::sanitize($row->{'title' . Lang::$lang}, "chars");?>","id":<?php echo $row->id;?>}],"action":"delete","parent":"#item_<?php echo $row->id;?>"}' class="wojo icon basic negative small circular button action"> <i class="icon trash"></i> </a> </div>
          <div class="columns shrink"> <a href="<?php echo Url::url(Router::$path, $row->modalias);?>" class="wojo icon basic primary circular small button"><i class="icon cogs"></i></a> </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif;?>
  <?php endforeach;?>
</div>
<?php endif;?>
<?php break;?>
<?php endswitch;?>