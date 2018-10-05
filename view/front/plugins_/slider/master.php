<?php
  /**
   * Slider
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-12-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
  
  Bootstrap::Autoloader(array(APLUGPATH . 'slider/'));
?>
<?php if($conf = App::Slider()->Render($data['plugin_id'])) :?>
<!-- Start Slider -->
<?php $data = App::Slider()->getSlides($conf->id);?>
<?php if($data):?>
<div class="wSlider wojoslider-slider wojoslider-full-width" style="max-height:<?php echo $conf->height;?>px" data-wslider='<?php echo $conf->settings;?>'>
  <div>
    <?php foreach($data as $row):?>
    <div style="
    <?php if($row->mode == "bg"):?>
        background-position: center center; 
        background-repeat: no-repeat; 
        background-size: cover;
		background-image: url(<?php echo UPLOADURL . '/' . $row->image;?>);
    <?php elseif($row->mode == "tr"):?>
    background-color: transparent; 
    <?php else:?>
        background-color: <?php echo $row->color;?>; 
    <?php endif;?>
    "
		data-in="<?php echo $conf->transition;?>"
		data-ease-in="<?php echo $conf->slidesEaseIn;?>"
		data-out="fade"
		data-ease-out="<?php echo $conf->slidesEaseIn;?>"
		data-time="<?php echo $conf->slidesTime;?>"
    >
      <?php echo Url::out_url($row->html);?> </div>
    <?php endforeach;?>
  </div>
</div>
<?php endif;?>
<?php endif;?>