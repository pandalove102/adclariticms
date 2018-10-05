<?php
  /**
   * Membership Error
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: membershipError.tpl.php, v1.00 2016-06-02 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="wojo-grid">
  <div class="double-padding">
    <h1><?php echo Lang::$word->FRT_MERROR;?></h1>
    <div class="row">
      <div class="columns">
        <p class="wojo large text"><?php echo Lang::$word->FRT_MERROR_2;?></p>
        <?php if($data):?>
        <ul class="wojo big list">
          <?php foreach ($data as $row):?>
          <li><?php echo $row->title;?></li>
          <?php endforeach;?>
        </ul>
        <?php endif;?>
      </div>
      <div class="columns"><img src="<?php echo THEMEURL;?>/images/sorry.jpg" alt="" class="wojo boxed image"></div>
    </div>
  </div>
</div>