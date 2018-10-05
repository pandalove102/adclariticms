<?php
  /**
   * Load Slider Icons
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: loadIcons.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="row phone-block-4 tablet-block-6 screen-block-8 half-gutters content-center">
  <?php if($this->data):?>
  <?php foreach ($this->data as $row):?>
  <div class="column"> <a class="wojo basic icon fluid button"><img src="<?php echo UPLOADURL;?>/svg/<?php echo $row;?>" alt="<?php echo $row;?>"></a></div>
  <?php endforeach;?>
  <?php endif;?>
</div>