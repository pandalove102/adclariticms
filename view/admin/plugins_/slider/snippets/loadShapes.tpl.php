<?php
  /**
   * Load Slider Shapes
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: loadShapes.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="wojo form">
  <div class="row">
    <div class="columns padding">
      <div class="shape-wrapper">
        <div class="shape-inner" style="top: 50%; left: 50%; margin-left: -100px; margin-top: -100px; width: 200px; height: 200px; padding: 0px;">
          <div id="shape" style="background-color: rgba(0, 0, 0, 0.5); padding: 0px; border-style: solid; border-width: 0px; border-color: rgba(0, 0, 0, 0.5); border-radius: 0px 0px 0px 0px;"></div>
        </div>
      </div>
    </div>
    <div class="columns shrink padding screen-left-divider wojo primary bg" style="min-width:280px">
      <h4><?php echo Lang::$word->_PLG_SL_SUB3;?></h4>
      <div class="wojo space divider"></div>
      <p class="wojo small bold text"> <?php echo Lang::$word->_PLG_SL_SUB4;?></p>
      <div class="wojo space divider"></div>
      <div class="wojo small action input">
        <input type="text" placeholder="Background Color" readonly>
        <button class="wojo small basic icon button docolors" data-color="bg"><i class="icon apps"></i></button>
      </div>
      <div class="wojo space divider"></div>
      <div class="row align-middle half-horizontal-gutters">
        <div class="column">
          <div class="wojo small action fluid input">
            <input type="text" placeholder="Border Color">
            <button class="wojo small basic icon button docolors" data-color="border"><i class="icon apps"></i></button>
          </div>
        </div>
        <div class="column shrink">
          <input class="spinner" type="number" value="1" min="0" max="20" data-spinner='{"size":"small"}' data-type="border-width">
        </div>
      </div>
      <div class="wojo space divider"></div>
      <p class="wojo small bold text"> <?php echo Lang::$word->_PLG_SL_SUB5;?></p>
      <div class="wojo space divider"></div>
      <div id="radius" class="row horizontal-gutters">
        <div class="column align-middle">
          <div class="wojo checkbox">
            <input id="radiusall" type="checkbox" value="0">
          </div>
        </div>
        <div class="column content-center">
          <div class="wojo small basic input content-center half-bottom-margin">
            <input type="text" value="0" name="radius[]">
          </div>
          <i class="icon long arrow up left"></i> </div>
        <div class="column content-center">
          <div class="wojo small basic input content-center half-bottom-margin">
            <input type="text" value="0" name="radius[]">
          </div>
          <i class="icon long arrow up right"></i></div>
        <div class="column content-center">
          <div class="wojo small basic input content-center half-bottom-margin">
            <input type="text" value="0" name="radius[]">
          </div>
          <i class="icon long arrow down right"></i> </div>
        <div class="column content-center">
          <div class="wojo small basic input content-center half-bottom-margin">
            <input type="text" value="0" name="radius[]">
          </div>
          <i class="icon long arrow down left"></i> </div>
      </div>
      <div class="wojo space divider"></div>
      <p class="wojo small bold text"> <?php echo Lang::$word->_PLG_SL_SUB6;?></p>
      <div class="wojo space divider"></div>
      <div class="row horizontal-gutters" id="wh">
        <div class="column">
          <div class="wojo tiny basic right labeled input content-center">
            <input type="text" value="200" name="width">
            <div class="wojo basic label"> px </div>
          </div>
        </div>
        <div class="column">
          <div class="wojo tiny basic right labeled input content-center">
            <input type="text" value="200" name="height">
            <div class="wojo basic label"> px </div>
          </div>
        </div>
      </div>
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

              if ($(this).data('color') === "bg") {
                  $("#shape").css("background-color", rgba);
              } else {
                  $("#shape").css({
                      "border-width": $('.spinner[data-type="border-width"]').val(),
                      "border-style": "solid",
                      "border-color": rgba
                  });
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

      $("#radius").on('change', 'input[name^=radius]', function() {
          var str = '';
          var is_all = $(this).hasClass('all_radius') ? true : false;
          $('input[name^=radius]').each(function() {
              str = str + ' ' + $(this).val() + 'px';
          });
          if (is_all) {
              $("#shape").css({
                  "border-radius": $(this).val() + 'px'
              });
          } else {
              $("#shape").css({
                  "border-radius": str
              });
          }
      });

      $("#radiusall").on('change', function() {
          var first = $("#radius .input:first");
          if ($(this).is(':checked')) {
              $("#radius .input").addClass('disabled')
              $(first).removeClass('disabled');
              $(first).next('.icon').replaceWith('<i class="icon arrows"></iv>')
              $(first).children().addClass('all_radius');
          } else {
              $("#radius .input").removeClass('disabled');
              $(first).next('.icon').replaceWith('<i class="icon long arrow up left"></i>')
              $(first).children().removeClass('all_radius');
          }
      });

      $("#wh input").on('change', function() {
          var wh = $(this).val();
          var adjust = $(this).val() / 2;
          if ($(this).prop('name') == "width") {
              $('.shape-inner').css({
                  width: wh,
                  "margin-left": -adjust
              });
          } else {
              $('.shape-inner').css({
                  height: wh,
                  "margin-top": -adjust
              });
          }
      });

      $(document).on('click', '.wojo.spinner .button', function() {
          var el = $(this).parents('.spinner').children('input');
          $("#shape").css({
              "border-width": $(el).val()
          });
      });
  });

  $(".spinner").wojoSpinner();
  $(".wojo.checkbox").checkbox();
// ]]>
</script>