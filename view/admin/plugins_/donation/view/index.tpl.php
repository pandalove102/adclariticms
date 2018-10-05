<?php
  /**
   * Donation
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!Auth::checkPlugAcl('donation')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<?php switch(Url::segment($this->segments, 3)): case "edit": ?>
<!-- Start edit -->
<h3><?php echo Lang::$word->_PLG_DP_SUB4;?></h3>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo form segment">
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_DP_SUB1;?> <i class="icon asterisk"></i></label>
        <div class="wojo big transparent down input">
          <input type="text" placeholder="<?php echo Lang::$word->_PLG_DP_SUB1;?>" value="<?php echo $this->data->title;?>" name="title">
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_DP_TARGET;?> <i class="icon asterisk"></i></label>
        <div class="wojo left labeled input">
          <div class="wojo small basic label"> <?php echo Utility::currencySymbol();?> </div>
          <input type="text" placeholder="<?php echo Lang::$word->_PLG_DP_TARGET;?>" value="<?php echo $this->data->target_amount;?>" name="target_amount">
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_DP_SUB3;?> <i class="icon asterisk"></i></label>
        <select name="redirect_page" class="wojo search fluid selection dropdown">
          <?php echo Utility::loopOptions($this->pagelist, "id", "title" . Lang::$lang, $this->data->redirect_page);?>
        </select>
      </div>
    </div>
  </div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/plugins", "donation");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="plugins_/donation" data-action="processDonate" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->SAVECONFIG;?></button>
  </div>
  <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
</form>
<?php break;?>
<?php case "new": ?>
<!-- Start new -->
<h3><?php echo Lang::$word->_PLG_DP_SUB;?></h3>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo form segment">
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_DP_SUB1;?> <i class="icon asterisk"></i></label>
        <div class="wojo big transparent down input">
          <input type="text" placeholder="<?php echo Lang::$word->_PLG_DP_SUB1;?>" name="title">
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_DP_TARGET;?> <i class="icon asterisk"></i></label>
        <div class="wojo left labeled input">
          <div class="wojo small basic label"> <?php echo Utility::currencySymbol();?> </div>
          <input type="text" placeholder="<?php echo Lang::$word->_PLG_DP_TARGET;?>" name="target_amount">
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_DP_SUB2;?> <i class="icon asterisk"></i></label>
        <select name="gateways[]" class="wojo fluid multiple dropdown" multiple>
          <?php echo Utility::loopOptionsMultiple($this->gateways, "id", "name");?>
        </select>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_DP_SUB3;?> <i class="icon asterisk"></i></label>
        <select name="redirect_page" class="wojo search fluid selection dropdown">
          <?php echo Utility::loopOptions($this->pagelist, "id", "title" . Lang::$lang);?>
        </select>
      </div>
    </div>
  </div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/plugins", "donation");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="plugins_/donation" data-action="processDonate" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->SAVECONFIG;?></button>
  </div>
</form>
<?php break;?>
<?php default: ?>
<!-- Start default -->
<div class="row gutters align-middle">
  <div class="column mobile-100 phone-100">
    <h3><?php echo Lang::$word->_PLG_DP_TITLE;?></h3>
    <p class="wojo small text"><?php echo Lang::$word->_PLG_DP_INFO;?></p>
  </div>
  <div class="column shrink mobile-100 phone-100"> <a href="<?php echo Url::url(Router::$path, "new/");?>" class="wojo small secondary button"><i class="icon plus alt"></i><?php echo Lang::$word->_PLG_DP_NEW;?></a> </div>
</div>
<?php if(!$this->data):?>
<div class="content-center"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small bold text vertical-padding"><?php echo Lang::$word->_PLG_DP_NODON;?></p>
</div>
<?php else:?>
<div class="row phone-block-1 mobile-block-1 tablet-block-2 screen-block-2 gutters">
  <?php foreach($this->data as $row):?>
  <div class="column" id="item_<?php echo $row->id;?>">
    <div class="wojo boxed segment"> <a data-content="<?php echo Lang::$word->EXPORT;?>" href="<?php echo APLUGINURL;?>donation/controller.php?action=exportDonations&amp;id=<?php echo $row->id;?>" class="wojo top right simple icon attached label"><i class="icon table"></i></a>
      <h4><?php echo $row->title;?></h4>
      <p><?php echo Lang::$word->_PLG_DP_TARGET;?>: <span class="wojo negative text"><?php echo Utility::formatMoney($row->total);?></span> / <span class="wojo positive text"><?php echo Utility::formatMoney($row->target_amount);?></span></p>
      <div class="wojo divider"></div>
      <div class="content-center"> <a href="<?php echo Url::url(Router::$path . "/edit", $row->id);?>" class="wojo icon basic circular positive button"><i class="icon pencil"></i></a> <a data-set='{"option":[{"delete": "deleteDonation","title": "<?php echo Validator::sanitize($row->title, "chars");?>","id":<?php echo $row->id;?>}],"action":"delete","parent":"#item_<?php echo $row->id;?>", "url":"plugins_/donation"}' class="wojo icon basic negative circular button action"> <i class="icon trash"></i> </a> </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
<?php endif;?>
<?php break;?>
<?php endswitch;?>