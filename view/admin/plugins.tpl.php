<?php
  /**
   * Plugins
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: plugins.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!Auth::hasPrivileges('manage_plugins')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<?php switch(Url::segment($this->segments)): case "edit": ?>
<!-- Start edit -->
<h3><?php echo Lang::$word->META_T28;?></h3>
<div class="wojo space divider"></div>
<ul class="wojo basic tabs">
  <?php foreach($this->langlist as $lang):?>
  <li><a style="background:<?php echo $lang->color;?>;color:#fff" data-tab="#lang_<?php echo $lang->abbr;?>"><span class="flag icon <?php echo $lang->abbr;?>"></span><?php echo $lang->name;?></a></li>
  <?php endforeach;?>
</ul>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo attached tabbed basic segment">
    <?php foreach($this->langlist as $lang):?>
    <div id="lang_<?php echo $lang->abbr;?>" class="wojo tab item">
      <div class="wojo form attached acard">
        <div class="header basic" style="background:<?php echo $lang->color;?>;color:#fff">
          <div class="wojo fields">
            <div class="field five wide">
              <label class="transparent"><?php echo Lang::$word->NAME;?> <i class="icon asterisk"></i></label>
              <div class="wojo huge transparent inverted input">
                <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" value="<?php echo $this->data->{'title_' . $lang->abbr};?>" name="title_<?php echo $lang->abbr?>">
              </div>
            </div>
            <div class="field five wide">
              <label class="transparent"><?php echo Lang::$word->DESCRIPTION;?></label>
              <div class="wojo huge transparent inverted input">
                <input type="text" placeholder="<?php echo Lang::$word->DESCRIPTION;?>" value="<?php echo $this->data->{'info_' . $lang->abbr};?>" name="info_<?php echo $lang->abbr;?>">
              </div>
            </div>
          </div>
        </div>
        <div class="content">
          <textarea class="altpost" placeholder="<?php echo Lang::$word->CONTENT;?>" name="body_<?php echo $lang->abbr;?>"><?php echo Url::out_url($this->data->{'body_' . $lang->abbr});?></textarea>
        </div>
      </div>
    </div>
    <?php endforeach;?>
    <div class="wojo attached segment form">
      <div class="wojo fields">
        <div class="field ">
          <label><?php echo Lang::$word->PLG_CLASS;?></label>
          <input type="text" placeholder="<?php echo Lang::$word->PLG_CLASS;?>" value="<?php echo $this->data->alt_class;?>" name="alt_class">
        </div>
        <div class="field">
          <label><?php echo Lang::$word->PLG_SHOWTITLE;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio small slider field">
              <input name="show_title" type="radio" value="1" <?php Validator::getChecked($this->data->show_title, 1); ?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio small slider field">
              <input name="show_title" type="radio" value="0" <?php Validator::getChecked($this->data->show_title, 0); ?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->ACTIVE;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio small slider field">
              <input name="active" type="radio" value="1" <?php Validator::getChecked($this->data->active, 1); ?>>
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio small slider field">
              <input name="active" type="radio" value="0" <?php Validator::getChecked($this->data->active, 0); ?>>
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->PAG_JSCODE;?></label>
          <textarea placeholder="<?php echo Lang::$word->PAG_JSCODE;?>" name="jscode"><?php echo json_decode($this->data->jscode);?></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="wojo big space divider"></div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/plugins");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-action="processPlugin" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->PLG_SUB2;?></button>
  </div>
  <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
</form>
<?php break;?>
<?php case "new": ?>
<!-- Start new -->
<h3><?php echo Lang::$word->META_T29;?></h3>
<div class="wojo space divider"></div>
<ul class="wojo basic tabs">
  <?php foreach($this->langlist as $lang):?>
  <li><a style="background:<?php echo $lang->color;?>;color:#fff" data-tab="#lang_<?php echo $lang->abbr;?>"><span class="flag icon <?php echo $lang->abbr;?>"></span><?php echo $lang->name;?></a></li>
  <?php endforeach;?>
</ul>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo attached tabbed basic segment">
    <?php foreach($this->langlist as $lang):?>
    <div id="lang_<?php echo $lang->abbr;?>" class="wojo tab item">
      <div class="wojo form attached acard">
        <div class="header basic" style="background:<?php echo $lang->color;?>;color:#fff">
          <div class="wojo fields">
            <div class="field five wide">
              <label class="transparent"><?php echo Lang::$word->NAME;?> <i class="icon asterisk"></i></label>
              <div class="wojo huge transparent inverted input">
                <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" name="title_<?php echo $lang->abbr?>">
              </div>
            </div>
            <div class="field five wide">
              <label class="transparent"><?php echo Lang::$word->DESCRIPTION;?></label>
              <div class="wojo huge transparent inverted input">
                <input type="text" placeholder="<?php echo Lang::$word->DESCRIPTION;?>" name="info_<?php echo $lang->abbr;?>">
              </div>
            </div>
          </div>
        </div>
        <div class="content">
          <textarea class="altpost" placeholder="<?php echo Lang::$word->CONTENT;?>" name="body_<?php echo $lang->abbr;?>"></textarea>
        </div>
      </div>
    </div>
    <?php endforeach;?>
    <div class="wojo attached segment form">
      <div class="wojo fields">
        <div class="field ">
          <label><?php echo Lang::$word->PLG_CLASS;?></label>
          <input type="text" placeholder="<?php echo Lang::$word->PLG_CLASS;?>" name="alt_class">
        </div>
        <div class="field">
          <label><?php echo Lang::$word->PLG_SHOWTITLE;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio small slider field">
              <input name="show_title" type="radio" value="1">
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio small slider field">
              <input name="show_title" type="radio" value="0" checked="checked">
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
        <div class="field">
          <label><?php echo Lang::$word->ACTIVE;?></label>
          <div class="wojo inline fields">
            <div class="wojo checkbox radio small slider field">
              <input name="active" type="radio" value="1" checked="checked">
              <label><?php echo Lang::$word->YES;?></label>
            </div>
            <div class="wojo checkbox radio small slider field">
              <input name="active" type="radio" value="0">
              <label><?php echo Lang::$word->NO;?></label>
            </div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label><?php echo Lang::$word->PAG_JSCODE;?></label>
          <textarea placeholder="<?php echo Lang::$word->PAG_JSCODE;?>" name="jscode"></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="wojo big space divider"></div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/plugins");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-action="processPlugin" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->PLG_SUB1;?></button>
  </div>
</form>
<?php break;?>
<?php default: ?>
<!-- Start default -->
<div class="row half-gutters align-middle">
  <div class="column shrink mobile-100 mobile-order-1">
    <h3><?php echo Lang::$word->PLG_TITLE;?></h3>
    <p><?php echo Lang::$word->PLG_SUB;?></p>
  </div>
  <div class="columns content-right mobile-50 mobile-content-left mobile-order-2"> <a href="<?php echo Url::url(Router::$path, "new/");?>" class="wojo small secondary button"><i class="icon plus alt"></i><?php echo Lang::$word->PLG_SUB1;?></a> </div>
  <div class="columns mobile-100 mobile-order-4">
    <div class="wojo small fluid inverted icon input">
      <input id="masterSearch" placeholder="<?php echo Lang::$word->SEARCH;?>" data-page="plugins" data-url="helper" type="text">
      <i class="icon find"></i> </div>
  </div>
</div>
<div class="half-top-padding"><?php echo Validator::alphaBits(Url::url(Router::$path), "letter", "wojo small bold text horizontal link divided list align-center");?> </div>
<div class="wojo big space divider"></div>
<?php if(!$this->data):?>
<div class="content-center"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small thick caps text"><?php echo Lang::$word->PLG_NOPLG;?></p>
</div>
<?php else:?>
<div class="row phone-block-1 mobile-block-1 tablet-block-2 screen-block-3 gutters content-center">
  <?php foreach ($this->data as $row):?>
  <?php if(Auth::checkPlugAcl($row->plugalias)):?>
  <div class="column" id="item_<?php echo $row->id;?>">
    <div class="wojo attached segment content-center"> <img src="<?php echo $row->icon ? APLUGINURL . $row->icon : SITEURL . '/assets/images/basic_plugin.svg';?>" class="wojo normal basic image" alt="">
      <div class="wojo half space divider"></div>
      <p class="wojo small bold text"><?php echo $row->{'title' . Lang::$lang};?></p>
      <div class="wojo divider"></div>
      <div class="content-left">
        <div class="row no-all-gutters">
          <div class="columns"> <a href="<?php echo Url::url(Router::$path . "/edit", $row->id);?>" class="wojo icon basic positive circular small button"><i class="icon pencil"></i></a> <a data-set='{"option":[{"<?php echo $row->plugalias ? "delete" : "trash";?>": "<?php echo $row->plugalias ? "deletePlugin" : "trashPlugin";?>","title": "<?php echo Validator::sanitize($row->{'title' . Lang::$lang}, "chars");?>","id":<?php echo $row->id;?>}],"action":"<?php echo $row->plugalias ? "delete" : "trash";?>","parent":"#item_<?php echo $row->id;?>"}' class="wojo icon basic negative small circular button action"> <i class="icon trash"></i> </a> </div>
          <?php if($row->hasconfig):?>
          <div class="columns shrink"> <a href="<?php echo Url::url(Router::$path, $row->plugalias);?>" class="wojo icon basic primary circular small button"><i class="icon cogs"></i></a> </div>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
  <?php endif;?>
  <?php endforeach;?>
</div>
<?php endif;?>
<div class="row half-gutters-mobile half-gutters-phone align-middle">
  <div class="columns shrink mobile-100 phone-100">
    <div class="wojo small thick text"><?php echo Lang::$word->TOTAL.': '.$this->pager->items_total;?> / <?php echo Lang::$word->CURPAGE.': '.$this->pager->current_page.' '.Lang::$word->OF.' '.$this->pager->num_pages;?></div>
  </div>
  <div class="columns mobile-100 phone-100 content-right mobile-content-left"><?php echo $this->pager->display_pages('small');?></div>
</div>
<?php break;?>
<?php endswitch;?>