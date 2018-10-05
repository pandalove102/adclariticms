<?php
  /**
   * Load Slider Thumb
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: loadThumb.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="column shrink sortable" data-id="<?php echo $this->data->id;?>">
  <div class="wojo image thumb active">
    <div class="actions">
      <div class="wojo small top right pointing dropdown"><i class="icon vertical ellipsis"></i>
        <div class="wojo small menu"> <a class="item" data-set='{"mode":"prop","id":<?php echo $this->data->id;?>,"type":"<?php echo $this->data->mode;?>"}'> <i class="icon select"></i> <?php echo Lang::$word->PROP;?> </a> <a class="item" data-set='{"mode":"edit","id":<?php echo $this->data->id;?>}'> <i class="icon note"></i> <?php echo Lang::$word->EDIT;?> </a> <a class="item" data-set='{"mode":"duplicate","id":<?php echo $this->data->id;?>}'> <i class="icon copy"></i><?php echo Lang::$word->DUPLICATE;?> </a>
          <div class="wojo basic divider"></div>
          <a class="item" data-set='{"mode":"delete","id":<?php echo $this->data->id;?>}'> <i class="icon negative trash"></i><?php echo Lang::$word->DELETE;?> </a> </div>
      </div>
    </div>
    <?php switch($this->data->mode): case "tr": ?>
    <div class="checkers"></div>
    <?php break;?>
    <?php case "cl": ?>
    <div class="holder" style="background-color:<?php echo $this->data->color;?>"></div>
    <?php break;?>
    <?php default: ?>
    <img data-id="<?php echo $this->data->id;?>" src="<?php echo UPLOADURL . '/thumbs/' . basename($this->data->image);?>">
    <?php break;?>
    <?php endswitch;?>
    <div class="header">
      <div class="column"><span data-editable="true" data-set='{"type": "sltitle", "id":<?php echo $this->data->id;?>, "url":"<?php echo APLUGINURL;?>slider/controller.php"}'><?php echo Validator::truncate($this->data->title, 20);?></span></div>
    </div>
  </div>
</div>