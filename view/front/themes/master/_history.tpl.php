<?php
  /**
   * History
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _history.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="wojo center aligned header">
  <div class="content"> <?php echo Lang::$word->HISTORY;?>
    <div class="sub header"><?php echo Lang::$word->M_INFO14;?></div>
  </div>
</div>
<div class="wojo-grid">
  <?php if($this->history):?>
  <div class="wojo big space divider"></div>
  <div class="wojo relaxed segment">
    <table class="wojo basic table">
      <thead>
        <tr>
          <th><?php echo Lang::$word->NAME;?></th>
          <th><?php echo Lang::$word->MEM_ACT;?></th>
          <th><?php echo Lang::$word->MEM_EXP;?></th>
          <th><?php echo Lang::$word->MEM_REC1;?></th>
          <th class="collapsing"></th>
        </tr>
      </thead>
      <?php foreach ($this->history as $row):?>
      <tr>
        <td><?php echo $row->title;?></td>
        <td><?php echo Date::doDate("long_date", $row->activated);?></td>
        <td><?php echo Date::doDate("long_date", $row->expire);?></td>
        <td class="center aligned"><?php echo Utility::isPublished($row->recurring);?></td>
        <td class="center aligned"><a href="<?php echo FRONTVIEW;?>/controller.php?action=invoice&amp;id=<?php echo $row->tid;?>"><i class="icon download"></i></a></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
  <div class="wojo big space divider"></div>
  <?php endif;?>
</div>