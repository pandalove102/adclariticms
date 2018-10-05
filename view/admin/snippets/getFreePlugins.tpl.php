<?php
  /**
   * Edit Role
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: getFreePlugins.tpl.php, v1.00 2016-03-02 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="popplug" style="height:400px;">
  <?php if($this->data):?>
  <div data-section="<?php echo $this->section;?>" class="wojo divided relaxed selection list">
    <?php foreach($this->data as $row):?>
    <div class="item" data-id="<?php echo $row->id;?>"><?php echo $row->title;?></div>
    <?php endforeach;?>
  </div>
  <?php endif;?>
</div>
<div class="wojo double divider"></div>
<div class="content-center">
  <button class="wojo tiny button cancel"><?php echo Lang::$word->CANCEL;?></button>
  <button class="wojo tiny secondary button insert"><?php echo Lang::$word->INSERT;?></button>
</div>