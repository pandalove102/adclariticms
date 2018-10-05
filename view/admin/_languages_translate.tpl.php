<?php
  /**
   * Language Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _languages_translate.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<h3><?php echo Lang::$word->LG_TITLE1;?></h3>
<p><?php echo Lang::$word->LG_SUB2;?></p>
<div class="wojo space divider"></div>
<div class="row half-gutters align-middle">
  <div class="columns screen-50 mobile-100">
    <div class="wojo small fluid inverted icon input">
      <input id="filter" type="text" placeholder="<?php echo Lang::$word->SEARCH;?>">
      <i class="icon find"></i> </div>
  </div>
  <div class="columns screen-25 mobile-50">
    <div class="wojo small fluid selection dropdown" id="pgroup"><i class="icon dropdown"></i>
      <div class="default text"><?php echo Lang::$word->LG_RESET;?></div>
      <div class="menu">
        <div class="item" data-type="all" data-value="all"><?php echo Lang::$word->LG_SUB4;?></div>
        <?php foreach($this->sections as $rows):?>
        <div class="item" data-type="filter" data-value="<?php echo $rows;?>"><?php echo $rows;?></div>
        <?php endforeach;?>
        <?php unset($rows);?>
      </div>
      <input type="hidden" name="pgroup" value="all">
    </div>
  </div>
  <div class="columns screen-25 mobile-50">
    <div class="wojo small fluid selection dropdown" id="group"><i class="icon dropdown"></i>
      <div class="default text"><?php echo Lang::$word->LG_RESET;?></div>
      <div class="menu">
        <div class="item" data-type="all" data-value="lang.xml"><?php echo Lang::$word->LG_SUB3;?></div>
        <div class="header"><?php echo Lang::$word->PLUGINS;?></div>
        <?php foreach($this->pluglang as $rows):?>
        <div class="item" data-type="plugins" data-value="<?php echo 'plugins' . '/' . basename($rows, '.lang.plugin.xml') .'.lang.plugin.xml';?>"><?php echo ucfirst(basename($rows, '.lang.plugin.xml'));?></div>
        <?php endforeach;?>
        <?php unset($rows);?>
        <div class="header"><?php echo Lang::$word->MODULES;?></div>
        <?php foreach($this->modlang as $rows):?>
        <div class="item" data-type="modules" data-value="<?php echo 'modules' . '/' . basename($rows, '.lang.module.xml') .'.lang.module.xml';?>"><?php echo ucfirst(basename($rows, '.lang.module.xml'));?></div>
        <?php endforeach;?>
        <?php unset($rows);?>
      </div>
      <input type="hidden" name="group" value="lang.xml">
    </div>
  </div>
</div>
<div class="wojo segment">
  <?php $i = 0;?>
  <div class="wojo small divided flex list align-middle" id="editable">
    <?php foreach ($this->data as $pkey) :?>
    <?php $i++;?>
    <div class="item">
      <div class="content"><span data-editable="true" data-set='{"type": "phrase", "id": <?php echo $i;?>,"key":"<?php echo $pkey['data'];?>", "path":"lang"}'><?php echo $pkey;?></span></div>
      <div class="content shrink"><span class="wojo mini basic disabled label"><?php echo $pkey['data'];?></span></div>
    </div>
    <?php endforeach;?>
  </div>
</div>