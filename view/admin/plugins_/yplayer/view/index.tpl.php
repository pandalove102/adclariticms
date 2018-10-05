<?php
  /**
   * Yplayer
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
	  
  if(!Auth::checkPlugAcl('yplayer')): print Message::msgError(Lang::$word->NOACCESS); return; endif;
?>
<?php switch(Url::segment($this->segments, 3)): case "edit": ?>
<!-- Start edit -->
<h3> <?php echo Lang::$word->_PLG_YPL_TITLE2;?></h3>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo form segment">
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->NAME;?> <i class="icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" value="<?php echo $this->data->title;?>" name="title">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB11;?></label>
        <select name="playlist_type" class="wojo fluid dropdown">
          <option value="horizontal" <?php echo Validator::getSelected($this->data->layout,"horizontal");?>><?php echo Lang::$word->HORIZONTAL;?></option>
          <option value="vertical" <?php echo Validator::getSelected($this->data->layout, "vertical");?>><?php echo Lang::$word->VERTICAL;?></option>
        </select>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB20;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="mode" type="radio" value="playlist" <?php Validator::getChecked($this->row->playlist, true); ?>>
            <label><?php echo Lang::$word->_PLG_YPL_SUB3;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="mode" type="radio" value="channel" <?php Validator::getChecked($this->row->channel, true); ?>>
            <label><?php echo Lang::$word->_PLG_YPL_SUB4;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="mode" type="radio" value="videos" <?php Validator::getChecked($this->row->videos, true); ?>>
            <label><?php echo Lang::$word->_PLG_YPL_SUB6;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB21;?></label>
        <input type="text" placeholder="<?php echo Lang::$word->_PLG_YPL_SUB21;?>" value="<?php echo ($this->row->playlist ? $this->row->playlist : ($this->row->channel ? $this->row->channel : $this->row->videos));;?>" name="video_id">
        <p class="wojo small text"><?php echo Lang::$word->_PLG_YPL_SUB6_I;?></p>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB7;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="pagination" type="radio" value="1" <?php Validator::getChecked($this->row->pagination, 1); ?>>
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="pagination" type="radio" value="0" <?php Validator::getChecked($this->row->pagination, 0); ?>>
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB9;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="continuous" type="radio" value="1" <?php Validator::getChecked($this->row->continuous, 1); ?>>
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="continuous" type="radio" value="0" <?php Validator::getChecked($this->row->continuous, 0); ?>>
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB16;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="autoplay" type="radio" value="1" <?php Validator::getChecked($this->row->autoplay, 1); ?>>
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="autoplay" type="radio" value="0" <?php Validator::getChecked($this->row->autoplay, 0); ?>>
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB18;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="force_hd" type="radio" value="1" <?php Validator::getChecked($this->row->force_hd, 1); ?>>
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="force_hd" type="radio" value="0" <?php Validator::getChecked($this->row->force_hd, 0); ?>>
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB12;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="show_channel_in_playlist" type="radio" value="1" <?php Validator::getChecked($this->row->show_channel_in_playlist, 1); ?>>
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="show_channel_in_playlist" type="radio" value="0" <?php Validator::getChecked($this->row->show_channel_in_playlist, 0); ?>>
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB13;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="show_channel_in_title" type="radio" value="1" <?php Validator::getChecked($this->row->show_channel_in_title, 1); ?>>
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="show_channel_in_title" type="radio" value="0" <?php Validator::getChecked($this->row->show_channel_in_title, 0); ?>>
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB17;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="share_control" type="radio" value="1" <?php Validator::getChecked($this->row->share_control, 1); ?>>
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="share_control" type="radio" value="0" <?php Validator::getChecked($this->row->share_control, 0); ?>>
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB10;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="show_playlist" type="radio" value="1" <?php Validator::getChecked($this->row->show_playlist, 1); ?>>
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="show_playlist" type="radio" value="0" <?php Validator::getChecked($this->row->show_playlist, 0); ?>>
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB8;?></label>
        <input data-range='{"step":1,"from":1, "to":50, "scale":[0,5,10,15,20,25,50]}' type="hidden" name="max_results" value="<?php echo $this->row->max_results;?>" class="rangeslider">
      </div>
    </div>
    <h4 class="wojo header"><?php echo Lang::$word->_PLG_YPL_SUB19;?></h4>
    <div class="wojo secondary segment">
      <div class="wojo fields">
        <div class="field">
          <label>Controls BG</label>
          <div class="wojo action input">
            <input type="text" value="<?php echo $this->row->colors->controls_bg;?>" name="controls_bg" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:<?php echo $this->row->colors->controls_bg;?>" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Time Text</label>
          <div class="wojo action input">
            <input type="text" value="<?php echo $this->row->colors->time_text;?>" name="time_text" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:<?php echo $this->row->colors->time_text;?>" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Fill</label>
          <div class="wojo action input">
            <input type="text" value="<?php echo $this->row->colors->fill;?>" name="fill" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:<?php echo $this->row->colors->fill;?>" class="icon checkbox"></i></div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label>Buttons</label>
          <div class="wojo action input">
            <input type="text" value="<?php echo $this->row->colors->buttons;?>" name="buttons" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:<?php echo $this->row->colors->buttons;?>" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Buttons Hover</label>
          <div class="wojo action input">
            <input type="text" value="<?php echo $this->row->colors->buttons_hover;?>" name="buttons_hover" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:<?php echo $this->row->colors->buttons_hover;?>" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Buttons Active</label>
          <div class="wojo action input">
            <input type="text" value="<?php echo $this->row->colors->buttons_active;?>" name="buttons_active" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:<?php echo $this->row->colors->buttons_active;?>" class="icon checkbox"></i></div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label>Playlist Overlay</label>
          <div class="wojo action input">
            <input type="text" value="<?php echo $this->row->colors->playlist_overlay;?>" name="playlist_overlay" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:<?php echo $this->row->colors->playlist_overlay;?>" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Playlist Title</label>
          <div class="wojo action input">
            <input type="text" value="<?php echo $this->row->colors->playlist_title;?>" name="playlist_title" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:<?php echo $this->row->colors->playlist_title;?>" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Playlist Channel</label>
          <div class="wojo action input">
            <input type="text" value="<?php echo $this->row->colors->playlist_channel;?>" name="playlist_channel" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:<?php echo $this->row->colors->playlist_channel;?>" class="icon checkbox"></i></div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label>Video Title</label>
          <div class="wojo action input">
            <input type="text" value="<?php echo $this->row->colors->video_title;?>" name="video_title" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:<?php echo $this->row->colors->video_title;?>" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Video Channel</label>
          <div class="wojo action input">
            <input type="text" value="<?php echo $this->row->colors->video_channel;?>" name="video_channel" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:<?php echo $this->row->colors->video_channel;?>" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Bar BG</label>
          <div class="wojo action input">
            <input type="text" value="<?php echo $this->row->colors->bar_bg;?>" name="bar_bg" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:<?php echo $this->row->colors->bar_bg;?>" class="icon checkbox"></i></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/plugins", "yplayer");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="plugins_/yplayer" data-action="processPlayer" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->SAVECONFIG;?></button>
  </div>
  <input type="hidden" name="id" value="<?php echo $this->data->id;?>">
</form>
<?php break;?>
<?php case "new": ?>
<!-- Start new -->
<h3> <?php echo Lang::$word->_PLG_YPL_SUB2;?></h3>
<form method="post" id="wojo_form" name="wojo_form">
  <div class="wojo form segment">
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->NAME;?> <i class="icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" name="title">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB11;?></label>
        <select name="playlist_type" class="wojo fluid dropdown">
          <option value="horizontal" selected="selected"><?php echo Lang::$word->HORIZONTAL;?></option>
          <option value="vertical"><?php echo Lang::$word->VERTICAL;?></option>
        </select>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB20;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="mode" type="radio" value="playlist">
            <label><?php echo Lang::$word->_PLG_YPL_SUB3;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="mode" type="radio" value="channel">
            <label><?php echo Lang::$word->_PLG_YPL_SUB4;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="mode" type="radio" value="videos" checked="checked">
            <label><?php echo Lang::$word->_PLG_YPL_SUB6;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB21;?></label>
        <input type="text" placeholder="<?php echo Lang::$word->_PLG_YPL_SUB21;?>" name="video_id">
        <p class="wojo small text"><?php echo Lang::$word->_PLG_YPL_SUB6_I;?></p>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB7;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="pagination" type="radio" value="1" checked="checked">
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="pagination" type="radio" value="0">
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB9;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="continuous" type="radio" value="1" checked="checked">
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="continuous" type="radio" value="0">
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB16;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="autoplay" type="radio" value="1">
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="autoplay" type="radio" value="0" checked="checked">
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB18;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="force_hd" type="radio" value="1">
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="force_hd" type="radio" value="0" checked="checked">
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB12;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="show_channel_in_playlist" type="radio" value="1" checked="checked">
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="show_channel_in_playlist" type="radio" value="0">
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB13;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="show_channel_in_title" type="radio" value="1" checked="checked">
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="show_channel_in_title" type="radio" value="0">
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB17;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="share_control" type="radio" value="1" checked="checked">
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="share_control" type="radio" value="0">
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB10;?></label>
        <div class="wojo inline fields">
          <div class="wojo checkbox radio field">
            <input name="show_playlist" type="radio" value="1" checked="checked">
            <label><?php echo Lang::$word->YES;?></label>
          </div>
          <div class="wojo checkbox radio field">
            <input name="show_playlist" type="radio" value="0">
            <label><?php echo Lang::$word->NO;?></label>
          </div>
        </div>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->_PLG_YPL_SUB8;?></label>
        <input data-range='{"step":1,"from":1, "to":50, "scale":[0,5,10,15,20,25,50]}' type="hidden" name="max_results" value="10" class="rangeslider">
      </div>
    </div>
    <h4 class="wojo header"><?php echo Lang::$word->_PLG_YPL_SUB19;?></h4>
    <div class="wojo secondary segment">
      <div class="wojo fields">
        <div class="field">
          <label>Controls BG</label>
          <div class="wojo action input">
            <input type="text" value="rgba(0,0,0,.75)" name="controls_bg" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:rgba(0,0,0,.75)" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Time Text</label>
          <div class="wojo action input">
            <input type="text" value="#FFFFFF" name="time_text" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:#FFFFFF" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Fill</label>
          <div class="wojo action input">
            <input type="text" value="#FFFFFF" name="fill" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:#FFFFFF" class="icon checkbox"></i></div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label>Buttons</label>
          <div class="wojo action input">
            <input type="text" value="rgba(255,255,255,.5)" name="buttons" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:rgba(255,255,255,.5)" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Buttons Hover</label>
          <div class="wojo action input">
            <input type="text" value="rgba(255,255,255,1)" name="buttons_hover" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:rgba(255,255,255,1)" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Buttons Active</label>
          <div class="wojo action input">
            <input type="text" value="rgba(255,255,255,1)" name="buttons_active" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:rgba(255,255,255,1)" class="icon checkbox"></i></div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label>Playlist Overlay</label>
          <div class="wojo action input">
            <input type="text" value="rgba(0,0,0,.5)" name="playlist_overlay" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:rgba(0,0,0,.5)" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Playlist Title</label>
          <div class="wojo action input">
            <input type="text" value="#FFFFFF" name="playlist_title" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:#FFFFFF" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Playlist Channel</label>
          <div class="wojo action input">
            <input type="text" value="rgba(255, 0, 0, 0.35)" name="playlist_channel" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:rgba(255, 0, 0, 0.35)" class="icon checkbox"></i></div>
          </div>
        </div>
      </div>
      <div class="wojo fields">
        <div class="field">
          <label>Video Title</label>
          <div class="wojo action input">
            <input type="text" value="#FFFFFF" name="video_title" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:#FFFFFF" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Video Channel</label>
          <div class="wojo action input">
            <input type="text" value="rgba(255, 0, 0, 0.35)" name="video_channel" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:rgba(255, 0, 0, 0.35)" class="icon checkbox"></i></div>
          </div>
        </div>
        <div class="field">
          <label>Bar BG</label>
          <div class="wojo action input">
            <input type="text" value="rgba(255,255,255,.5)" name="bar_bg" readonly>
            <div class="wojo basic icon button" data-adv-color="true"><i style="background:rgba(255,255,255,.5)" class="icon checkbox"></i></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content-center"> <a href="<?php echo Url::url("/admin/plugins", "yplayer");?>" class="wojo button"><?php echo Lang::$word->CANCEL;?></a>
    <button type="button" data-url="plugins_/yplayer" data-action="processPlayer" name="dosubmit" class="wojo secondary button"><?php echo Lang::$word->SAVECONFIG;?></button>
  </div>
</form>
<?php break;?>
<?php default: ?>
<!-- Start default -->
<div class="row gutters align-middle">
  <div class="column mobile-100 phone-100">
    <h3><?php echo Lang::$word->_PLG_YPL_TITLE;?></h3>
    <p class="wojo small text"><?php echo Lang::$word->_PLG_YPL_SUB1;?></p>
  </div>
  <div class="column shrink mobile-100 phone-100"> <a href="<?php echo Url::url(Router::$path, "new/");?>" class="wojo small secondary button"><i class="icon plus alt"></i><?php echo Lang::$word->_PLG_YPL_NEW;?></a> </div>
</div>
<?php if(!$this->data):?>
<div class="content-center"><img src="<?php echo ADMINVIEW;?>/images/notfound.png" alt="">
  <p class="wojo small bold text vertical-padding"><?php echo Lang::$word->_PLG_YPL_NOPLAY;?></p>
</div>
<?php else:?>
<div class="row phone-block-1 mobile-block-1 tablet-block-2 screen-block-2 gutters">
  <?php foreach($this->data as $row):?>
  <div class="column content-center" id="item_<?php echo $row->id;?>">
    <div class="wojo boxed segment"> <img src="<?php echo APLUGINURL . 'yplayer/view/images/' . $row->layout;?>.png" class="wojo basic image" alt="">
      <div class="wojo half space divider"></div>
      <p class="wojo small bold text"><?php echo $row->title;?></p>
      <div class="wojo divider"></div>
      <a href="<?php echo Url::url(Router::$path . "/edit", $row->id);?>" class="wojo icon basic circular positive button"><i class="icon pencil"></i></a> <a data-set='{"option":[{"delete": "deletePlayer","title": "<?php echo Validator::sanitize($row->title, "chars");?>","id":<?php echo $row->id;?>}],"action":"delete","parent":"#item_<?php echo $row->id;?>", "url":"plugins_/yplayer"}' class="wojo icon basic negative circular button action"> <i class="icon trash"></i> </a> </div>
  </div>
  <?php endforeach;?>
</div>
<?php endif;?>
<?php break;?>
<?php endswitch;?>