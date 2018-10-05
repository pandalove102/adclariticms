<?php
  /**
   * Load Photos
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: loadPhotos.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<?php if($this->photos):?>
<?php foreach($this->photos as $row):?>
<div class="item" id="item_<?php echo $row->id;?>" data-id="<?php echo $row->id;?>">
  <div class="wojo boxed photo acard attached">
    <div class="image content-center"> <img src="<?php echo FMODULEURL . Gallery::GALDATA . $this->data->dir. '/thumbs/' . $row->thumb;?>" class="wojo basic image">
      <div class="description" id="description_<?php echo $row->id;?>">
        <div class="meta"> <span class="wojo bold large white text"><?php echo $row->{'title' . Lang::$lang};?></span>
          <p><?php echo $row->{'description' . Lang::$lang};?></p>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="row align-middle">
        <div class="column">
          <div class="wojo small labeled button">
            <div class="wojo basic tiny button"> <?php echo Lang::$word->LIKES;?> </div>
            <span class="wojo basic small left pointing label"> <?php echo $row->likes;?> </span> </div>
        </div>
        <div class="column content-right">
          <div class="wojo top right pointing dropdown"><i class="icon vertical ellipsis link"></i>
            <div class="menu"> <a data-set='{"option":[{"doAction": 1, "processItem": 1,"page":"editPhoto", "editPhoto": 1,"id": <?php echo $row->id;?>}], "label":"<?php echo Lang::$word->EDIT;?>", "url":"modules_/gallery/controller.php", "parent":"#description_<?php echo $row->id;?>", "action":"replace", "modalclass":"small"}' class="item addAction"><i class="icon pencil"></i> <?php echo Lang::$word->EDIT;?></a> <a data-set='{"option":[{"doAction": 1, "processItem": 1,"page":"editPhoto", "editPhoto": 1,"id": <?php echo $row->id;?>}], "label":"<?php echo Lang::$word->EDIT;?>", "url":"modules_/gallery", "parent":"#description_<?php echo $row->id;?>", "action":"replace", "modalclass":"small"}' class="item addAction"><i class="icon pencil"></i> <?php echo Lang::$word->EDIT;?></a>
              <div class="wojo basic divider"></div>
              <a data-set='{"option":[{"delete": "deletePhoto","title": "<?php echo $row->{'title' . Lang::$lang};?>","id":<?php echo $row->id;?>, "dir":"<?php echo $this->data->dir;?>"}],"action":"delete","parent":"#item_<?php echo $row->id;?>","url":"modules_/gallery", "redraw": ".wojo.blocks"}' class="item action"> <i class="icon trash"></i> <?php echo Lang::$word->DELETE;?></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
<?php endif;?>