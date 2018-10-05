<?php
  /**
   * Comments
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-12-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
  
  Bootstrap::Autoloader(array(AMODPATH . 'comments/'));
  
  $pager = Paginator::instance();
  $conf = App::Comments();
  $comments = Comments::Render($this->segments[0], isset($this->data->id) ? $this->data->id : $this->row->id);
?>
<div class="wojo-grid" id="comments">
  <div class="padding">
    <h3 class="wojo center aligned header"><?php echo ($pager->items_total) ? $pager->items_total . ' ' . Lang::$word->COMMENTS : Lang::$word->_MOD_CM_SUB;?></h3>
    <div class="wojo third divider"></div>
  </div>
  <?php echo $comments;?>
  <div class="padding content-center"><?php echo $pager->display_pages();?> </div>
  <?php if($conf->public_access or App::Auth()->logged_in):?>
  <?php include(FMODPATH . 'comments/snippets/form.tpl.php');?>
  <?php else:?>
  <?php echo Message::msgSingleAlert(Lang::$word->_MOD_CM_SUB1);?>
  <?php endif;?>
</div>