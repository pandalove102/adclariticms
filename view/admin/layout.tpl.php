<?php
  /**
   * Layout Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: layout.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="row half-gutters align-middle">
  <div class="column shrink mobile-100">
    <h3><?php echo Lang::$word->LMG_TITLE;?></h3>
  </div>
  <div class="columns content-right mobile-100 mobile-content-left">
<?php /*?>    <select name="page_id" class="wojo small dropdown search selection">
      <option value="0"><?php echo Lang::$word->LMG_SUB;?></option>
      <?php echo Utility::loopOptions($this->pagelist, "id", "title" . Lang::$lang, Validator::get('page_id'));?>
    </select><?php */?>
    <?php if($this->modulelist):?>
    <select name="mod_id" class="wojo small dropdown search selection">
      <option value="0"><?php echo Lang::$word->LMG_SUB1;?></option>
      <?php echo Utility::loopOptions($this->modulelist, "id", "title" . Lang::$lang, Validator::get('mod_id'));?>
    </select>
    <?php endif;?>
  </div>
</div>
<div class="wojo divider"></div>
<div class="wojo<?php echo ($this->layoutlist->page or $this->layoutlist->mod) ? null : ' readonly';?>">
  <div class="row gutters">
    <div class="column">
      <div class="wojo attached segment"> <a data-section="top" class="wojo small top left simple icon attached label pEdit"><i class="icon disabled apps"></i></a> <a data-section="top" class="wojo small top right simple basic attached label pAdd"><?php echo Lang::$word->LMG_TOP;?> <i class="icon small chevron down"></i></a>
        <ol data-position="top" class="wojo sortable celled simple">
          <?php if($topside = Utility::findInArray($this->layoutlist->row, "place", "top")):?>
          <?php foreach ($topside as $row): ?>
          <li class="item" data-id="<?php echo $row->plug_id;?>" id="item_<?php echo $row->plug_id;?>">
            <div class="handle"><i class="icon reorder"></i></div>
            <div class="content"><?php echo $row->title;?></div>
            <a class="actions"><i class="icon negative trash"></i></a> </li>
          <?php endforeach;?>
          <?php unset($row);?>
          <?php endif;?>
        </ol>
      </div>
    </div>
  </div>
  <div class="row gutters">
    <div class="column screen-40">
      <div class="wojo attached segment"><a data-section="left" class="wojo small top right simple basic attached label pAdd"><?php echo Lang::$word->LMG_LEFT;?> <i class="icon small chevron down"></i></a>
        <ol data-position="left" class="wojo sortable celled simple">
          <?php if($leftlide = Utility::findInArray($this->layoutlist->row, "place", "left")):?>
          <?php foreach ($leftlide as $row): ?>
          <li class="item" data-id="<?php echo $row->plug_id;?>" id="item_<?php echo $row->plug_id;?>">
            <div class="handle"><i class="icon reorder"></i></div>
            <div class="content"><?php echo Validator::truncate($row->title, 40);?></div>
            <a class="actions"><i class="icon negative trash"></i></a> </li>
          <?php endforeach;?>
          <?php unset($row);?>
          <?php endif;?>
        </ol>
      </div>
    </div>
    <div class="column">
      <div class="wojo attached segment secondary"><span class="wojo small top right attached label"><?php echo Lang::$word->LMG_MAIN;?></span></div>
    </div>
    <div class="column screen-40">
      <div class="wojo attached segment"><a data-section="right" class="wojo small top right simple basic attached label pAdd"><?php echo Lang::$word->LMG_RIGHT;?> <i class="icon small chevron down"></i></a>
        <ol data-position="right" class="wojo sortable celled simple">
          <?php if($rightside = Utility::findInArray($this->layoutlist->row, "place", "right")):?>
          <?php foreach ($rightside as $row): ?>
          <li class="item" data-id="<?php echo $row->plug_id;?>" id="item_<?php echo $row->plug_id;?>">
            <div class="handle"><i class="icon reorder"></i></div>
            <div class="content"><?php echo Validator::truncate($row->title, 40);?></div>
            <a class="actions"><i class="icon negative trash"></i></a> </li>
          <?php endforeach;?>
          <?php unset($row);?>
          <?php endif;?>
        </ol>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="column">
      <div class="wojo attached segment"> <a data-section="bottom" class="wojo small top left simple icon attached label pEdit"><i class="icon disabled apps"></i></a> <a data-section="bottom" class="wojo small top right simple basic attached label pAdd"><?php echo Lang::$word->LMG_BOTTOM;?> <i class="icon small chevron down"></i></a>
        <ol data-position="bottom" class="wojo sortable celled simple">
          <?php if($bottomside = Utility::findInArray($this->layoutlist->row, "place", "bottom")):?>
          <?php foreach ($bottomside as $row): ?>
          <li class="item" data-id="<?php echo $row->plug_id;?>" id="item_<?php echo $row->plug_id;?>">
            <div class="handle"><i class="icon reorder"></i></div>
            <div class="content"><?php echo $row->title;?></div>
            <a class="actions"><i class="icon negative trash"></i></a> </li>
          <?php endforeach;?>
          <?php unset($row);?>
          <?php endif;?>
        </ol>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo ADMINVIEW;?>/js/layout.js"></script> 
<script type="text/javascript"> 
// <![CDATA[	
  $(document).ready(function() {
	  $.Layout({
		  url: "<?php echo ADMINVIEW;?>",
		  lurl: "<?php echo Url::url("/admin/layout");?>",
		  page_id:<?php echo $this->layoutlist->page;?>,
		  mod_id:[<?php echo json_encode($this->layoutlist->mod);?>],
		  type:'<?php echo $this->layoutlist->type;?>',
            lang: {
                edit: "<?php echo Lang::$word->EDIT;?>",
				delete: "<?php echo Lang::$word->DELETE;?>",
            }
	  });
  });
// ]]>
</script>