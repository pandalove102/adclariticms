<?php
  /**
   * Upcoming Events
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-12-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
  
  Bootstrap::Autoloader(array(APLUGPATH . 'upevent/'));
?>
<!-- Upcoming Events -->
<?php if($conf = Utility::findInArray($data['all'], "id", $data['id'])):?>
<div class="wojo primary basic plugin segment<?php echo ($conf[0]->alt_class) ? ' ' . $conf[0]->alt_class : null;?>">
  <?php if($conf[0]->show_title):?>
  <h3 class="content-center"><?php echo $conf[0]->title;?></h3>
  <?php endif;?>
  <?php if($conf[0]->body):?>
  <?php echo Url::out_url($conf[0]->body);?>
  <?php endif;?>
  <?php if($data = App::UpEvent()->Render()):?>
  <div class="wojo divided items">
    <?php foreach($data as $row):?>
    <div class="item">
      <div class="wojo basic image">
        <div class="wojo basic normal button content-center" style="border: 2px solid <?php echo $row->color;?>; box-shadow:none;">
          <p><?php echo Date::doDate("MMM", $row->date_start);?></p>
          <div class="wojo small space divider"></div>
          <p><?php echo Date::doDate("YYYY", $row->date_start);?></p>
        </div>
      </div>
      <div class="content">
        <div class="wojo bold text"><?php echo $row->title;?></div>
        <div class="meta"> <i class="icon map marker"></i> <?php echo $row->venue;?> @<?php echo Date::doTime($row->time_start);?></div>
        <div class="description"> <?php echo Url::out_url(Validator::truncate($row->body, 70));?> </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <?php unset($row);?>
  <?php endif;?>
</div>
<?php if($conf[0]->jscode):?>
<script><?php echo $conf[0]->jscode;?></script>
<?php endif;?>
<?php endif;?>