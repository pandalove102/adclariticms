<?php
  /**
   * Gallery
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _gallery_photos.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="row gutters align-middle">
  <div class="column mobile-100 phone-100">
    <h3><?php echo Lang::$word->_MOD_GA_SUB4;?><small> // <?php echo $this->data->{'title' . Lang::$lang};?></small></h3>
  </div>
  <div class="column shrink mobile-100 phone-100">
    <div id="drag-and-drop-zone" class="wojo small secondary button uploader">
      <label><i class="icon plus alt"></i> <?php echo Lang::$word->_MOD_GA_SUB5;?>
        <input type="file" multiple name="files[]">
      </label>
    </div>
  </div>
  <div class="column shrink"> <a class="wojo small basic icon button" id="reorder"><i class="icon apps"></i></a> </div>
</div>
<div class="wojo small relaxed celled middle aligned list" id="fileList"></div>
<div class="wojo blocks" id="sortable">
  <?php if(!$this->photos):?>
  <div class="content-center"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
    <p class="wojo small thick caps text"><?php echo Lang::$word->_MOD_GA_NOPHOTO;?></p>
  </div>
  <?php else:?>
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
              <div class="small menu"> <a data-set='{"option":[{"doAction": 1, "processItem": 1,"page":"editPhoto", "editPhoto": 1,"id": <?php echo $row->id;?>}], "label":"<?php echo Lang::$word->EDIT;?>", "url":"modules_/gallery/controller.php", "parent":"#description_<?php echo $row->id;?>", "action":"replace", "modalclass":"small"}' class="item addAction"><i class="icon pencil"></i> <?php echo Lang::$word->EDIT;?></a> <a data-poster="<?php echo $row->thumb;?>" class="item <?php echo ($this->data->poster == $row->thumb) ? 'disabled' : 'poster';?>"><i class="icon <?php echo ($this->data->poster == $row->thumb) ? 'check' : 'photo' ;?>"></i> <?php echo Lang::$word->_MOD_GA_POSTER;?></a>
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
</div>