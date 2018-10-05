<?php
  /**
   * Edit Photo
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: editPhoto.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<ul class="wojo basic tabs align-center">
  <?php foreach($this->langlist as $lang):?>
  <li><a style="background:<?php echo $lang->color;?>;color:#fff" data-tab="#lang_<?php echo $lang->abbr;?>"><span class="flag icon <?php echo $lang->abbr;?>"></span><?php echo $lang->name;?></a></li>
  <?php endforeach;?>
</ul>
<form method="post" id="modal_form" name="modal_form">
  <div class="wojo small form bottom attached segment">
    <?php foreach($this->langlist as $lang):?>
    <div id="lang_<?php echo $lang->abbr;?>" class="wojo tab item">
      <div class="wojo block fields">
        <div class="field">
          <label><?php echo Lang::$word->NAME;?></label>
          <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" value="<?php echo $this->data->{'title_' . $lang->abbr};?>" name="title_<?php echo $lang->abbr?>">
        </div>
        <div class="field">
          <label><?php echo Lang::$word->DESCRIPTION;?></label>
          <textarea type="text" placeholder="<?php echo Lang::$word->DESCRIPTION;?>" name="description_<?php echo $lang->abbr?>"><?php echo $this->data->{'description_' . $lang->abbr};?></textarea>
        </div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
</form>
<script type="text/javascript"> 
// <![CDATA[  
$(document).ready(function () {
	$(".wojo.tab.item").hide();
	$(".wojo.tab.item:first").show();
	$(".wojo.tabs:not(.responsive) a:first").parent().addClass('active');
	$(".wojo.tabs:not(.responsive) a").on('click', function() {
		$(".wojo.tabs:not(.responsive) li").removeClass("active");
		$(this).parent().addClass("active");
		$(".wojo.tab.item").hide();
		var activeTab = $(this).data("tab");
		if($(activeTab).is(':first-child')) {
			$(activeTab).parent().addClass('tabbed');
		} else {
			$(activeTab).parent().removeClass('tabbed');
		}
		$(activeTab).show();
		return false;
	});
});
// ]]>
</script>
