<?php
  /**
   * Gallery
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _gallery_grid.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="row gutters align-middle">
  <div class="column mobile-100 phone-100">
    <h3><?php echo Lang::$word->_MOD_GA_TITLE;?></h3>
    <p class="wojo small text"><?php echo Lang::$word->_MOD_GA_SUB;?></p>
  </div>
  <div class="column shrink mobile-100 phone-100"> <a href="<?php echo Url::url(Router::$path, "new/");?>" class="wojo small secondary button"><i class="icon plus alt"></i> <?php echo Lang::$word->_MOD_GA_NEW;?></a> </div>
  <div class="column shrink"> <a class="wojo small basic icon button" id="reorder"><i class="icon apps"></i></a> </div>
</div>
<?php if(!$this->data):?>
<div class="content-center"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small thick caps text"><?php echo Lang::$word->_MOD_GA_NOGAL;?></p>
</div>
<?php else:?>
<div class="wojo blocks" id="sortable">
  <?php foreach($this->data as $row):?>
  <div class="item" id="item_<?php echo $row->id;?>" data-id="<?php echo $row->id;?>">
    <div class="wojo photo acard attached">
      <div class="image content-center"> <img src="<?php echo $row->poster ? FMODULEURL . 'gallery/data/' . $row->dir. '/thumbs/' . $row->poster : UPLOADURL . '/blank.jpg';?>" class="wojo basic image">
        <div class="description">
          <div class="actions">
            <div class="wojo pointing top right tiny icon dropdown button"><i class="icon horizontal ellipsis link"></i>
              <div class="small menu"> <a class="item" href="<?php echo Url::url(Router::$path, "edit/" . $row->id);?>"><i class="icon pencil"></i> <?php echo Lang::$word->EDIT;?></a>
                <div class="wojo basic divider"></div>
                <a data-set='{"option":[{"delete": "deleteGallery","title": "<?php echo Validator::sanitize($row->{'title' . Lang::$lang}, "chars");?>","id":<?php echo $row->id;?>, "dir":"<?php echo $row->dir;?>"}],"action":"delete","parent":"#item_<?php echo $row->id;?>","url":"modules_/gallery", "redraw": ".wojo.blocks"}' class="item action"> <i class="icon trash"></i> <?php echo Lang::$word->DELETE;?></a> </div>
            </div>
          </div>
          <div class="meta"> <span class="wojo bold large white text"><?php echo $row->{'title' . Lang::$lang};?></span></div>
        </div>
      </div>
      <div class="content">
        <div class="row align-middle">
          <div class="column"> <a href="<?php echo Url::url(Router::$path, "photos/" . $row->id);?>" class="wojo small labeled button">
            <div class="wojo basic tiny primary button"> <?php echo Lang::$word->_MOD_GA_PHOTOS;?> </div>
            <span class="wojo basic small left pointing primary label"> <?php echo $row->pics;?> </span> </a> </div>
          <div class="column content-right">
            <div class="wojo small labeled button">
              <div class="wojo basic tiny button"> <?php echo Lang::$word->LIKES;?> </div>
              <span class="wojo basic small left pointing label"> <?php echo $row->likes;?> </span> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
<?php endif;?>