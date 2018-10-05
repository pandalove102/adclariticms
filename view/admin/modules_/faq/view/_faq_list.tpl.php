<?php
  /**
   * F.A.Q.
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _faq_grid.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="row gutters align-middle">
  <div class="column shrink mobile-100 mobile-order-1">
    <h3><?php echo Lang::$word->_MOD_FAQ_TITLE;?></h3>
  </div>
  <div class="columns content-right mobile-50 mobile-content-left mobile-order-2"> <a href="<?php echo Url::url(Router::$path, "new/");?>" class="wojo small secondary button"><i class="icon plus alt"></i><?php echo Lang::$word->_MOD_FAQ_NEW;?></a> </div>
</div>
<?php if(!$this->data):?>
<div class="content-center"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small thick caps text"><?php echo Lang::$word->_MOD_FAQ_NOFAQS;?></p>
</div>
<?php else:?>
<div id="sortable">
  <?php foreach($this->data as $row):?>
  <div class="wojo boxed segment" id="item_<?php echo $row->id;?>" data-id="<?php echo $row->id;?>">
    <div class="wojo simple tiny icon top left attached label draggable"><i class="icon reorder"></i></div>
    <a data-set='{"option":[{"delete": "deleteFaq","title": "<?php echo Validator::sanitize($row->title, "chars");?>","id":<?php echo $row->id;?>}],"action":"delete","parent":"#item_<?php echo $row->id;?>","url":"modules_/faq"}' class="wojo tiny negative icon bottom right attached label action"><i class="icon trash"></i></a>
    <p class="wojo bold medium text"> <a href="<?php echo Url::url(Router::$path . '/edit', $row->id);?>"><?php echo $row->title;?></a> </p>
  </div>
  <?php endforeach;?>
</div>
<script type="text/javascript"> 
// <![CDATA[
$(document).ready(function() {
    $("#sortable").sortables({
        ghostClass: "ghost",
        handle: ".draggable",
        animation: 600,
        onUpdate: function(e) {
            var order = this.toArray();
            $.ajax({
                type: 'post',
                url: "<?php echo AMODULEURL . 'faq/controller.php';?>",
                dataType: 'json',
                data: {
                    sortFaq: 1,
                    sorting: order
                }
            });
        }
    });
});
// ]]>
</script>
<?php endif;?>
