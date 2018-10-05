<?php
  /**
   * Profile
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: profile.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="wojo space divider"></div>
<div class="wojo-grid">
  <h3><?php echo Lang::$word->META_T32;?></h3>
  <div class="wojo space divider"></div>
  <div class="row gutters">
    <div class="columns shrink mobile-50 phone-100">
      <div class="wojo card">
        <div class="image"> <img src="<?php echo UPLOADURL;?>/avatars/<?php echo $this->data->avatar ? $this->data->avatar : "blank.png" ;?>" alt="" class="wojo basic image"> </div>
        <div class="content"> <a class="header"><?php echo $this->data->username;?></a>
          <div class="meta"> <span class="date"><?php echo Lang::$word->M_JOINED;?>: <?php echo Date::doDate("yyyy", $this->data->created);?></span> </div>
          <div class="meta"> <span class="date"><?php echo Lang::$word->M_LASTSEEN;?>: <?php echo Date::timesince($this->data->lastlogin);?></span> </div>
          <div class="description"><?php echo $this->data->info;?> </div>
        </div>
        <div class="extra content">
          <div class="wojo three icon buttons"> <a href="<?php echo $this->data->tw_link;?>" target="_blank" class="wojo twitter button"><i class="twitter icon"></i></a> <a href="<?php echo $this->data->fb_link;?>" target="_blank" class="wojo facebook button"><i class="facebook icon"></i></a> <a href="<?php echo $this->data->gp_link;?>" target="_blank" class="wojo google plus button"><i class="google plus icon"></i></a> </div>
        </div>
      </div>
    </div>
    <div class="columns mobile-50 phone-100"> </div>
  </div>
  <div class="wojo space divider"></div>
</div>