<?php
  /**
   * F.A.Q. Manager
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-12-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
  
  Bootstrap::Autoloader(array(AMODPATH . 'faq/'));
?>
<!-- Start F.A.Q. Manager -->
<div class="wojo header content-center">
  <h1><?php echo Lang::$word->_MOD_FAQ_SUB;?></h1>
  <div class="sub header center"><?php echo Lang::$word->_MOD_FAQ_INFO;?></div>
</div>
<div class="wojo space divider"></div>
<?php if($data = App::Faq()->Render()):?>
<?php foreach($data as $row):?>
<div class="wojo segment accordion">
  <div class="wojo large bold text title"> <i class="dropdown icon"></i> <?php echo $row->{'question' . Lang::$lang};?> </div>
  <div class="content"><?php echo $row->{'answer' . Lang::$lang};?></div>
</div>
<div class="wojo space divider"></div>
<?php endforeach;?>
<?php else:?>
<?php echo Message::msgSingleInfo(Lang::$word->_MOD_FAQ_NOFAQF);?>
<?php endif;?>