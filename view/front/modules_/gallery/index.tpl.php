<?php
  /**
   * Gallery
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-12-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
  
  Bootstrap::Autoloader(array(AMODPATH . 'gallery/'));
?>
<!-- Start Gallery -->
<?php if(isset($data['module_id'])):?>
<?php $rows = App::Gallery()->getGallery($data['id']);?>
<?php if($rows):?>
<?php $data = App::Gallery()->renderSingle($rows->id);?>
<?php if($data):?>
<h2 class="wojo center aligned header"><?php echo $rows->title;?>
  <p class="sub header"><?php echo $rows->description;?></p>
</h2>
<div class="wojo huge space divider"></div>
<div class="wojo blocks" data-wblocks='{"itemWidth":<?php echo $rows->cols;?>}'>
  <?php foreach($data as $row):?>
  <?php $is_watermark = ($rows->watermark) ? 'gallery/controller.php?action=watermark&dir=' . $rows->dir. '&thumb=' . $row->thumb : Gallery::GALDATA . $rows->dir. '/' . $row->thumb;?>
  <div class="item">
    <div class="wojo fluid red card">
      <div class="wDimmer dimmable image">
        <div class="wojo color dimmer">
          <div class="content">
            <div class="center"> <a href="<?php echo FMODULEURL . $is_watermark;?>" data-title="<?php echo $row->{'description' . Lang::$lang};?>" data-gall="gallery" class="lightbox inverted"><i class="icon large circular inverted url alt"></i></a> </div>
          </div>
        </div>
        <img src="<?php echo FMODULEURL . Gallery::GALDATA . $rows->dir. '/thumbs/' . $row->thumb;?>"> </div>
      <div class="content">
        <div class="header content-center"><?php echo $row->{'title' . Lang::$lang};?></div>
        <?php if($row->{'description' . Lang::$lang}):?>
        <div class="description content-center"> <?php echo $row->{'description' . Lang::$lang};?> </div>
        <?php endif;?>
      </div>
      <?php if($rows->likes):?>
      <div class="extra content" data-gallery-like="<?php echo $row->id;?>" data-gallery-total="<?php echo $row->likes;?>"> <a class="left floated like galleryLike"> <i class="thumbs up like icon"></i> <?php echo Lang::$word->LIKE;?> </a>
        <div class="right floated"> <span class="galleryTotal"><?php echo $row->likes;?></span> <?php echo Lang::$word->LIKES;?> </div>
      </div>
      <?php endif;?>
    </div>
  </div>
  <?php endforeach;?>
</div>
<?php unset($row);?>
<?php endif;?>
<?php endif;?>
<?php else:?>
<!-- Start Galleries -->
<?php switch(Url::segment($this->segments, 1)): case $this->core->modname['gallery-album']: ?>
<!-- Start photos -->
<?php if($this->photos):?>
<div class="wojo-grid">
  <div class="wojo huge space divider"></div>
  <h2 class="wojo center aligned header"><?php echo $this->row->{'title' . Lang::$lang};?>
    <p class="sub header"><?php echo $this->row->{'description' . Lang::$lang};?></p>
  </h2>
  <div class="wojo huge space divider"></div>
  <div class="wojo blocks" data-wblocks='{"itemWidth":<?php echo $this->row->cols;?>}'>
    <?php foreach($this->photos as $row):?>
    <?php $is_watermark = ($this->row->watermark) ? 'gallery/controller.php?action=watermark&dir=' . $this->row->dir. '&thumb=' . $row->thumb : Gallery::GALDATA . $this->row->dir. '/' . $row->thumb;?>
    <div class="item">
      <div class="wojo fluid red card">
        <div class="wDimmer dimmable image">
          <div class="wojo color dimmer">
            <div class="content">
              <div class="center"> <a href="<?php echo FMODULEURL . $is_watermark;?>" data-title="<?php echo $row->{'description' . Lang::$lang};?>" data-gall="gallery" class="lightbox inverted"><i class="icon large circular inverted url alt"></i></a> </div>
            </div>
          </div>
          <img src="<?php echo FMODULEURL . Gallery::GALDATA . $this->row->dir. '/thumbs/' . $row->thumb;?>"> </div>
        <div class="content">
          <div class="header content-center"><?php echo $row->{'title' . Lang::$lang};?></div>
          <?php if($row->{'description' . Lang::$lang}):?>
          <div class="description content-center"> <?php echo $row->{'description' . Lang::$lang};?> </div>
          <?php endif;?>
        </div>
        <?php if($this->row->likes):?>
        <div class="extra content" data-gallery-like="<?php echo $row->id;?>" data-gallery-total="<?php echo $row->likes;?>"> <a class="left floated like galleryLike"> <i class="thumbs up like icon"></i> <?php echo Lang::$word->LIKE;?> </a>
          <div class="right floated"> <span class="galleryTotal"><?php echo $row->likes;?></span> <?php echo Lang::$word->LIKES;?> </div>
        </div>
        <?php endif;?>
      </div>
    </div>
    <?php endforeach;?>
  </div>
</div>
<?php endif;?>
<?php break;?>
<!-- Start default -->
<?php default: ?>
<?php if($this->rows):?>
<div class="wojo-grid">
  <div class="wojo huge space divider"></div>
  <div class="wojo blocks" data-wblocks='{"itemWidth":400, "align":"center", "gapX":64, "gapY":64}'>
    <?php foreach($this->rows as $row):?>
    <div class="item">
      <div class="wDimmer dimmable image">
        <div class="wojo color dimmer">
          <div class="content">
            <div class="center">
              <?php if($row->{'title' . Lang::$lang}):?>
              <h3 class="wojo inverted center aligned header"><?php echo $row->{'title' . Lang::$lang};?>
                <?php if($row->{'title' . Lang::$lang}):?>
                <p class="sub header"><?php echo $row->{'description' . Lang::$lang};?></p>
                <?php endif;?>
              </h3>
              <?php endif;?>
              <p class="half-padding"><a href="<?php echo Url::url("/" . $this->segments[0] . "/" . App::Core()->modname['gallery-album'], $row->{'slug' . Lang::$lang});?>"><i class="icon circular red inverted url alt link"></i></a></p>
              <div class="wojo mini inverted statistics align-center">
                <div class="statistic">
                  <div class="value"> <i class="icon thumbs up"></i> <?php echo $row->likes;?> </div>
                  <div class="label"> <?php echo Lang::$word->LIKES;?> </div>
                </div>
                <div class="statistic">
                  <div class="value"> <i class="icon photo"></i> <?php echo $row->pics;?> </div>
                  <div class="label"> <?php echo Lang::$word->_MOD_GA_PHOTOS;?> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <img src="<?php echo $row->poster ? FMODULEURL . 'gallery/data/' . $row->dir. '/thumbs/' . $row->poster : UPLOADURL . '/blank.jpg';?>" class="wojo basic image"> </div>
    </div>
    <?php endforeach;?>
  </div>
</div>
<?php endif;?>
<?php break;?>
<?php endswitch;?>
<?php endif;?>
<script type="text/javascript"> 
// <![CDATA[  
$(document).ready(function() {
    $('.wojo.blocks').on('click', '.galleryLike', function() {
        var id = $(this).parent().attr('data-gallery-like');
        var total = $(this).parent().attr('data-gallery-total');
        var score = $(this).parent().find('.galleryTotal');
        score.html(parseInt(total) + 1);
        $(this).velocity('transition.whirlOut', {
            duration: 800,
            complete: function() {
                $(this).replaceWith('<i class="icon check left floated"></i>');
                $.post("<?php echo FMODULEURL;?>gallery/controller.php", {
                    action: "like",
                    id: id
                });
            }
        });
    });
});
// ]]>
</script>