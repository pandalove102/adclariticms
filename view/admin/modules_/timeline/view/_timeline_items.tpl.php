<?php
  /**
   * Timeline
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _timeline_items.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="row half-gutters align-middle">
  <div class="column shrink mobile-100 mobile-order-1">
    <h3><?php echo Lang::$word->_MOD_TML_SUB10;?></h3>
    <p><small> // <?php echo $this->row->name;?></small></p>
  </div>
  <div class="columns content-right mobile-50 mobile-content-left mobile-order-2"> <a href="<?php echo Url::url("/admin/modules/timeline/inew", $this->row->id);?>" class="wojo small secondary button"><i class="icon plus alt"></i> <?php echo Lang::$word->_MOD_TML_SUB11;?></a> </div>
  <div class="columns mobile-100 mobile-order-4">
    <div class="wojo small fluid inverted icon input">
      <input id="masterSearch" placeholder="<?php echo Lang::$word->SEARCH;?>" data-page="timeline" data-url="modules_/timeline/controller" type="text">
      <i class="icon find"></i> </div>
  </div>
</div>
<?php if(!$this->data):?>
<div class="content-center"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small thick caps text"><?php echo Lang::$word->_MOD_TML_NOITM;?></p>
</div>
<?php else:?>
<div class="wojo segment">
  <table class="wojo sorting basic table">
    <thead>
      <tr>
        <th data-sort="string"><?php echo Lang::$word->TYPE;?></th>
        <th data-sort="string"><?php echo Lang::$word->NAME;?></th>
        <th data-sort="int"><?php echo Lang::$word->CREATED;?></th>
        <th class="disabled right aligned"><?php echo Lang::$word->ACTIONS;?></th>
      </tr>
    </thead>
    <?php foreach ($this->data as $row):?>
    <tr id="item_<?php echo $row->id;?>">
      <td><span class="wojo mini label"><?php echo $row->type;?></span></td>
      <td><a href="<?php echo Url::url("/admin/modules/timeline/iedit", $row->id);?>" class="inverted"> <?php echo $row->{'title' . Lang::$lang};?></a></td>
      <td data-sort-value="<?php echo strtotime($row->created);?>"><?php echo Date::Dodate("short_date", $row->created);?></td>
      <td class="collapsing"><a href="<?php echo Url::url("/admin/modules/timeline/iedit", $this->row->id . '/' . $row->id);?>" class="wojo icon circular basic positive button"><i class="icon positive note"></i></a> <a data-set='{"option":[{"delete": "deleteItem","title": "<?php echo Validator::sanitize($row->{'title' . Lang::$lang}, "chars");?>","id":<?php echo $row->id;?>}],"action":"delete","parent":"#item_<?php echo $row->id;?>","url":"modules_/timeline"}' class="wojo icon circular basic negative button action"> <i class="icon negative trash"></i></a></td>
    </tr>
    <?php endforeach;?>
  </table>
  </table>
</div>
<?php endif;?>
<div class="row half-gutters-mobile half-gutters-phone align-middle">
  <div class="columns shrink mobile-100 phone-100">
    <div class="wojo small thick text"><?php echo Lang::$word->TOTAL.': '.$this->pager->items_total;?> / <?php echo Lang::$word->CURPAGE.': '.$this->pager->current_page.' '.Lang::$word->OF.' '.$this->pager->num_pages;?></div>
  </div>
  <div class="columns mobile-100 phone-100 content-right mobile-content-left"><?php echo $this->pager->display_pages('small');?></div>
</div>