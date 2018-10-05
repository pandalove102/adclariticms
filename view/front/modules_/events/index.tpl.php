<?php
  /**
   * Event Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-12-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
  
  Bootstrap::Autoloader(array(AMODPATH . 'events/'));
?>
<!-- Start Event Manager -->
<div class="wojo header content-center">
  <h1><?php echo Lang::$word->_MOD_EM_TITLE3;?></h1>
  <div class="sub header center"><?php echo str_replace("[YEAR]", Date::doDate("yyyy", Date::today()), Lang::$word->_MOD_EM_SUB3);?></div>
</div>
<?php if($data = Utility::groupToLoop(App::Events()->render(), "month")):?>
<?php foreach($data as $date => $rows):?>
<div class="wojo bold primary caps text horizontal divider center"> <?php echo Date::doDate("MMMM YYYY", $date);?></div>
<div class="wojo divided feed">
  <?php foreach($rows as $row):?>
  <div class="wojo event">
    <div class="label">
      <div class="wojo big label content-center" style="background:<?php echo $row->color;?>;color:#fff">
        <p><?php echo Date::doDate("dd", $row->date_start);?></p>
        <p><?php echo Date::doDate("MMM", $row->date_start);?></p>
      </div>
    </div>
    <div class="content">
      <div class="summary"> <?php echo $row->title;?>
        <div class="date"> <i class="icon clock"></i> <?php echo $row->time_start;?> - <?php echo $row->time_end;?></div>
      </div>
      <div class="extra text"> <?php echo Url::out_url($row->body);?> </div>
      <div class="meta">
        <div class="wojo small horizontal divided list">
          <div class="item"> <i class="icon red calendar"></i>
            <div class="middle aligned content"> <?php echo Date::doDate("short_date", $row->date_start);?>
              <?php if($row->date_end > $row->date_start):?>
              - <?php echo Date::doDate("short_date", $row->date_end);?>
              <?php endif;?>
            </div>
          </div>
          <?php if($row->venue):?>
          <div class="item"> <i class="icon red marker"></i>
            <div class="middle aligned content"> <?php echo $row->venue;?> </div>
          </div>
          <?php endif;?>
          <?php if($row->contact_phone):?>
          <div class="item"> <i class="icon red phone"></i>
            <div class="middle aligned content"> <?php echo $row->contact_phone;?> </div>
          </div>
          <?php endif;?>
          <?php if($row->contact_person):?>
          <div class="item"> <i class="icon red microphone"></i>
            <div class="middle aligned content"> <?php echo $row->contact_person;?> </div>
          </div>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
<?php endforeach;?>
<?php else:?>
<?php echo Message::msgSingleInfo(Lang::$word->_MOD_EM_NOEVENTSF);?>
<?php endif;?>
