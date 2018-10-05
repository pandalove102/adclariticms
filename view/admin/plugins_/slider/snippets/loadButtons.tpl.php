<?php
  /**
   * Load Slider Buttons
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: loadButtons.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
  <div class="row">
    <div class="columns half-padding content-center" id="buttons">
      <div class="half-padding"><a class="wojo large button" style="box-shadow:none"><span>Button Text</span></a></div>
      <div class="half-padding"><a class="wojo rounded large button" style="box-shadow:none"><span>Button Text</span></a></div>
      <div class="half-padding"><a class="wojo button" style="box-shadow:none"><i class="icon check"></i><span>Button Text</span></a></div>
      <div class="half-padding"><a class="wojo rounded large button" style="box-shadow:none"><i class="icon check"></i><span>Button Text</span></a></div>
      <div class="half-padding"><a class="wojo circular icon large button" style="box-shadow:none"><i class="icon check"></i></a></div>
      <div class="half-padding"><a class="wojo labeled icon large button" style="box-shadow:none"> <i class="icon check"></i> <span>Button Text</span> </a></div>
      <div class="half-padding"><a class="wojo right labeled icon large button" style="box-shadow:none"> <span>Button Text</span> <i class="icon check"></i> </a></div>
    </div>
    <div class="columns shrink padding screen-left-divider wojo primary bg">
      <h4>Colors</h4>
      <div class="wojo space divider"></div>
      <p class="wojo small bold text"> Background Color </p>
      <div class="wojo space divider"></div>
      <div class="wojo small action input">
        <input type="text" placeholder="Background Color" readonly>
        <button class="wojo small basic icon button docolors" data-color="bg"><i class="icon apps"></i></button>
      </div>
      <div class="wojo space divider"></div>
      <p class="wojo small bold text"> Text Color </p>
      <div class="wojo space divider"></div>
      <div class="wojo small action input">
        <input type="text" placeholder="Text Color" readonly>
        <button class="wojo small basic icon button docolors" data-color="text"><i class="icon apps"></i></button>
      </div>
      <div class="wojo space divider"></div>
      <p class="wojo small bold text"> Icon Color </p>
      <div class="wojo space divider"></div>
      <div class="wojo small action input">
        <input type="text" placeholder="Icon Color" readonly>
        <button class="wojo small basic icon button docolors" data-color="icon"><i class="icon apps"></i></button>
      </div>
      <div class="wojo space divider"></div>
      <p class="wojo small bold text"> Button Text </p>
      <div class="wojo space divider"></div>
      <div class="wojo small fluid input">
        <input type="text" placeholder="Button Text" name="btext">
      </div>
    </div>
  </div>
<script type="text/javascript"> 
// <![CDATA[  
  $(document).ready(function() {
      $(".docolors").spectrum({
          showInput: true,
          showAlpha: true,
          move: function(color) {
              var rgba = "transparent";
              if (color) {
                  rgba = color.toRgbString();
              }
              switch ($(this).data('color')) {
                  case "bg":
                      $("#buttons .button").css("background-color", rgba);
                      break;
                  case "text":
                      $("#buttons .button").css("color", rgba);
                      break;
                  case "icon":
                      $("#buttons .button .icon").css("color", rgba);
                      break;
              }
          },
          change: function(color) {
              var rgba = "transparent";
              if (color) {
                  rgba = color.toRgbString();
              }
              $(this).prev('input').val(rgba)
              $(".icon", this).css("color", rgba);
          }
      });
	  
      $("#buttons").on('click', '.button', function(e) {
		    if($(e.target).is('i')) {
				var list = '';
            $.getJSON('<?php echo ADMINVIEW;?>/builder/snippets/iconset.json')
                .done(function(json) {
                    $.each(json.iconset, function(i, item) {
                        list += '<a class="md-icon-type inverted" title="' + item.name + '"><i class="icon ' + item.code + '"></i></a>';
                    });
					var template = '' +
						'<div class="wojo large modal" id="modalIcons">' +
						'<div class="content" style="height:600px;overflow:auto;">' + list + '</div>' +
						'</div>';
					$(template).modal('setting', 'onShow', function() {
						var $modal = $(this);
						$("#modalIcons").on('click', 'a.md-icon-type', function() {
							var icon = $(this).html();
							$("#buttons i.icon").replaceWith(icon);
							$modal.modal('hide');
						});
					}).modal('setting', 'onHidden', function() {
						$(this).remove();
					}).modal('show');
                });
			} 
		  $("#buttons .button").parent().removeClass('highlite');
		  $(this).parent().addClass('highlite');
      });
	  
      $("input[name^=btext]").on('change', function() {
          $("#buttons .button span").text($(this).val())
      });
  });
// ]]>
</script>