<?php
  /**
   * Memberships
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: _memberships.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="wojo center aligned header">
  <div class="content"> <?php echo Lang::$word->ADM_MEMBS;?>
    <div class="sub header"><?php echo Lang::$word->M_INFO13;?></div>
  </div>
</div>
<div class="wojo-grid">
  <div class="wojo big space divider"></div>
  <div class="wojo relaxed segment">
    <?php if($this->memberships):?>
    <div id="membershipSelect" class="row screen-block-3 tablet-block-2 mobile-block-1 phone-block-1 gutters align-center">
      <?php foreach($this->memberships as $row):?>
      <div class="column" id="item_<?php echo $row->id;?>">
        <div class="wojo attached segment content-center<?php echo Auth::$udata->membership_id == $row->id ? ' active' : null;?>">
          <?php if($row->thumb):?>
          <img src="<?php echo UPLOADURL;?>/memberships/<?php echo $row->thumb;?>" alt="">
          <?php else:?>
          <img src="<?php echo UPLOADURL;?>/memberships/default.png" alt="">
          <?php endif;?>
          <div class="wojo space divider"></div>
          <div class="wojo bold text content-center"><?php echo Utility::formatMoney($row->price);?> <?php echo $row->{'title' . Lang::$lang};?></div>
          <p class="wojo small text"><?php echo Lang::$word->MEM_REC1;?> <?php echo ($row->recurring) ? Lang::$word->YES : Lang::$word->NO;?></p>
          <p class="wojo small text"><?php echo $row->days;?>@<?php echo Date::getPeriodReadable($row->period);?></p>
          <p class="wojo tiny text"><?php echo $row->{'description' . Lang::$lang};?></p>
          <?php if(Auth::$udata->membership_id != $row->id):?>
          <p class="half-top-padding"><a class="wojo fluid button add-membership" data-id="<?php echo $row->id;?>"><?php echo ($row->price <> 0) ? Lang::$word->SELECT : Lang::$word->ACTIVATE;?></a></p>
          <?php endif;?>
        </div>
      </div>
      <?php endforeach;?>
    </div>
    <div id="mResult"></div>
    <?php endif;?>
  </div>
  <div class="wojo big space divider"></div>
</div>