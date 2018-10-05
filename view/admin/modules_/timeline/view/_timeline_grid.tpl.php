<?php
  /**
   * Timeline
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _timeline_list.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="row gutters align-middle">
  <div class="column mobile-100 phone-100">
    <h3><?php echo Lang::$word->_MOD_TML_TITLE;?></h3>
  </div>
  <div class="column shrink mobile-100 phone-100"> <a href="<?php echo Url::url(Router::$path, "new/");?>" class="wojo small secondary button"><i class="icon plus alt"></i> <?php echo Lang::$word->_MOD_TML_NEW;?></a> </div>
</div>
<?php if(!$this->data):?>
<div class="content-center"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small thick caps text"><?php echo Lang::$word->_MOD_TML_NOTML;?></p>
</div>
<?php else:?>
<div class="row screen-block-3 tablet-block-2 mobile-block-2 mobile-block-1 phone-block-1 gutters align-center">
  <?php foreach($this->data as $row):?>
  <div class="column">
    <div class="wojo attached boxed segment" id="item_<?php echo $row->id;?>">
      <div class="content-center"><a href="<?php echo Url::url(Router::$path, "edit/" . $row->id);?>"> <img src="<?php echo AMODULEURL . 'timeline/view/images/' . $row->type . '.png';?>" class="wojo basic image"></a></div>
      <div class="wojo divider"></div>
      <div class="basic footer">
        <div class="row align-middle half-vertical-gutters no-gutters">
          <div class="columns"><a href="<?php echo Url::url(Router::$path, "edit/" . $row->id);?>"><?php echo $row->name;?></a></div>
          <div class="columns content-right">
            <div class="wojo pointing top right tiny icon dropdown"><i class="icon vertical ellipsis link"></i>
              <div class="small menu"> <a class="item" href="<?php echo Url::url(Router::$path, "edit/" . $row->id);?>"><i class="icon pencil"></i> <?php echo Lang::$word->EDIT;?></a>
                <?php if($row->type == "custom"):?>
                <a href="<?php echo Url::url(Router::$path, "items/" . $row->id);?>" class="item"><i class="icon sliders horizontal"></i><?php echo Lang::$word->ITEMS;?></a>
                <?php endif;?>
                <div class="wojo basic divider"></div>
                <a data-set='{"option":[{"delete": "deleteTimeline","title": "<?php echo Validator::sanitize($row->name, "chars");?>","id":<?php echo $row->id;?>}],"action":"delete","parent":"#item_<?php echo $row->id;?>","url":"modules_/timeline"}' class="item action"> <i class="icon negative trash"></i> <?php echo Lang::$word->DELETE;?></a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
<?php endif;?>