<?php
  /**
   * Events
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _events_list.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="row half-gutters align-middle">
  <div class="column shrink mobile-100 mobile-order-1">
    <h3><?php echo Lang::$word->_MOD_EM_TITLE;?></h3>
  </div>
  <div class="columns content-right mobile-50 mobile-content-left mobile-order-2"> <a href="<?php echo Url::url(Router::$path, "new/");?>" class="wojo small secondary button"><i class="icon plus alt"></i><?php echo Lang::$word->_MOD_EM_SUB;?></a> </div>
  <div class="columns mobile-100 mobile-order-4">
    <div class="wojo small fluid inverted icon input">
      <input id="masterSearch" placeholder="<?php echo Lang::$word->SEARCH;?>" data-page="events" data-url="modules_/events/controller" type="text">
      <i class="icon find"></i> </div>
  </div>
  <div class="columns shrink mobile-50 mobile-order-3 mobile-content-right">
    <div class="wojo small icon buttons"> <a class="wojo active icon button"><i class="icon reorder"></i></a> <a href="<?php echo Url::url(Router::$path, "grid/");?>" class="wojo icon button"><i class="icon grid list"></i></a> </div>
    <a href="<?php echo Url::url(Router::$path, "calendar/");?>" class="wojo small basic icon button"><i class="icon calendar"></i></a> </div>
</div>
<div class="wojo divider"></div>
<div class="half-top-padding">
  <div class="wojo divided horizontal link list align-center">
    <div class="disabled item wojo bold text"> <?php echo Lang::$word->SORTING_O;?> </div>
    <a href="<?php echo Url::url(Router::$path);?>" class="item<?php echo Url::setActive("order", false);?>"> <?php echo Lang::$word->RESET;?> </a> <a href="<?php echo Url::url(Router::$path, "?order=title|DESC");?>" class="item<?php echo Url::setActive("order", "title");?>"> <?php echo Lang::$word->NAME;?> </a> <a href="<?php echo Url::url(Router::$path, "?order=venue|DESC");?>" class="item<?php echo Url::setActive("order", "venue");?>"> <?php echo Lang::$word->_MOD_EM_SUB1;?> </a> <a href="<?php echo Url::url(Router::$path, "?order=contact|DESC");?>" class="item<?php echo Url::setActive("order", "contact");?>"> <?php echo Lang::$word->_MOD_EM_SUB2;?> </a> <a href="<?php echo Url::url(Router::$path, "?order=ending|DESC");?>" class="item<?php echo Url::setActive("order", "ending");?>"> <?php echo Lang::$word->_MOD_EM_SUB23;?> </a>
    <div class="item"><a href="<?php echo Url::sortItems(Url::url(Router::$path), "order");?>" data-content="ASC/DESC"><i class="icon triangle unfold more link"></i></a> </div>
  </div>
</div>
<div class="half-top-padding"><?php echo Validator::alphaBits(Url::url(Router::$path), "letter", "wojo small bold text horizontal link divided list align-center");?> </div>
<div class="wojo space divider"></div>
<form method="get" id="wojo_form" action="<?php echo Url::url(Router::$path);?>" name="wojo_form">
  <div class="row align-middle vertical-gutters align-center">
    <div class="column screen-30 phone-100">
      <div class="wojo small fluid calendar left icon input" id="fromdate">
        <input name="fromdate" type="text" placeholder="<?php echo Lang::$word->FROM;?>" readonly>
        <i class="icon calendar"></i> </div>
    </div>
    <div class="column shrink phone-hide">
      <div class="wojo separator"></div>
    </div>
    <div class="column screen-30 phone-100">
      <div class="wojo small fluid calendar left icon action input" id="enddate"> <i class="calendar icon"></i>
        <input name="enddate" type="text" placeholder="<?php echo Lang::$word->TO;?>" readonly>
        <button id="doDates" class="wojo tiny basic icon button"><i class="icon find"></i></button>
      </div>
    </div>
  </div>
</form>
<?php if(!$this->data):?>
<div class="content-center"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small thick caps text"><?php echo Lang::$word->_MOD_EM_NOEVENTS;?></p>
</div>
<?php else:?>
<?php foreach($this->data as $row):?>
<div class="wojo boxed acard" id="item_<?php echo $row->id;?>">
  <div class="header">
    <div class="row horizontal-gutters">
      <div class="column">
        <p class="wojo bold medium text"> <a class="inverted" href="<?php echo Url::url(Router::$path . '/edit', $row->id);?>"><?php echo $row->title;?></a> </p>
        <p class="wojo small text"><?php echo $row->venue;?></p>
      </div>
      <div class="column shrink">
        <div class="wojo small simple label"><i class="icon phone"></i><?php echo $row->contact;?></div>
      </div>
    </div>
  </div>
  <div class="small content">
    <div class="row align-middle">
      <div class="column">
        <div class="wojo horizontal small list">
          <div class="item">
            <div class="header"> <span class="wojo caps light text"><?php echo Lang::$word->_MOD_EM_DATE_S;?></span> <span class="wojo caps text"><?php echo Date::doDate("short_date", $row->date_start);?> <?php echo Date::doTime($row->time_start);?></span> </div>
          </div>
          <div class="item">
            <div class="header"> <span class="wojo caps light text"><?php echo Lang::$word->_MOD_EM_TIME_S;?></span> <span class="wojo caps text"><?php echo Date::doDate("short_date", $row->ending);?> <?php echo Date::doTime($row->time_end);?></span> </div>
          </div>
        </div>
      </div>
      <div class="column shrink">
        <div class="wojo pointing top right dropdown"><i class="icon horizontal ellipsis link"></i>
          <div class="small menu"> <a class="item" href="<?php echo Url::url(Router::$path . '/edit', $row->id);?>"><i class="icon pencil"></i> <?php echo Lang::$word->EDIT;?></a>
            <div class="wojo basic divider"></div>
            <a data-set='{"option":[{"delete": "deleteEvent","title": "<?php echo Validator::sanitize($row->title, "chars");?>","id":<?php echo $row->id;?>}],"action":"delete","parent":"#item_<?php echo $row->id;?>","url":"modules_/events"}' class="item action"> <i class="icon trash"></i> <?php echo Lang::$word->DELETE;?></a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
<?php endif;?>
<div class="row half-gutters-mobile half-gutters-phone align-middle">
  <div class="columns shrink mobile-100 phone-100">
    <div class="wojo small thick text"><?php echo Lang::$word->TOTAL.': '.$this->pager->items_total;?> / <?php echo Lang::$word->CURPAGE.': '.$this->pager->current_page.' '.Lang::$word->OF.' '.$this->pager->num_pages;?></div>
  </div>
  <div class="columns mobile-100 phone-100 content-right mobile-content-left"><?php echo $this->pager->display_pages('small');?></div>
</div>
