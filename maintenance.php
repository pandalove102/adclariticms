<?php
  /**
   * Maintenance
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: header.tpl.php, v1.00 2015-10-05 10:12:05 gewa Exp $
   */
  define("_WOJO", true);
  include ('init.php');
  
  if(!App::Core()->offline)
  Url::redirect(SITEURL);
 ?>
<!doctype html>
<head>
<meta charset="utf-8">
<title><?php echo App::Core()->company;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="<?php echo THEMEURL . '/cache/' . Cache::cssCache(array('base.css','transition.css', 'button.css', 'divider.css', 'header.css', 'icon.css', 'flag.css', 'image.css', 'label.css', 'form.css', 'input.css', 'list.css','segment.css','card.css','table.css','menu.css','dropdown.css','popup.css','statistic.css','datepicker.css','message.css','dimmer.css','modal.css','progress.css','accordion.css','item.css','feed.css','utility.css','style.css'), THEMEBASE);?>" rel="stylesheet" type="text/css">
<link href="<?php echo SITEURL;?>/assets/css/maintenance.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo SITEURL;?>/assets/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="<?php echo SITEURL;?>/assets/jquery.js"></script>
</head>
<body>
<header>
  <div class="grad"></div>
  <div class="content-center"><a href="<?php echo SITEURL;?>/" class="logo"><?php echo (App::Core()->logo) ? '<img src="' . SITEURL . '/uploads/' . App::Core()->logo . '" alt="' . App::Core()->company . '">': App::Core()->company;?></a> </div>
</header>
<div class="wrapper">
  <div class="wojo-grid">
    <div class="wojo huge space divider"></div>
    <h2 class="content-center wojo white text"><?php echo Lang::$word->FRT_MTNC_TITLE;?></h2>
    <div class="wojo huge space divider"></div>
    <div class="content-center">
      <div id="dashboard" class="row align-center">
        <div class="columns shrink">
          <div class="dash weeks_dash">
            <div class="digit first">
              <div style="display:none" class="top">1</div>
              <div style="display:block" class="bottom">0</div>
            </div>
            <div class="digit last">
              <div style="display:none" class="top">3</div>
              <div style="display:block" class="bottom">0</div>
            </div>
            <span class="dash_title"><?php echo Lang::$word->_WEEKS;?></span> </div>
        </div>
        <div class="columns shrink">
          <div class="dash days_dash">
            <div class="digit first">
              <div style="display:none" class="top">0</div>
              <div style="display:block" class="bottom">0</div>
            </div>
            <div class="digit last">
              <div style="display:none" class="top">0</div>
              <div style="display:block" class="bottom">0</div>
            </div>
            <span class="dash_title"><?php echo Lang::$word->_DAYS;?></span> </div>
        </div>
        <div class="columns shrink">
          <div class="dash hours_dash">
            <div class="digit first">
              <div style="display:none" class="top">2</div>
              <div style="display:block" class="bottom">0</div>
            </div>
            <div class="digit last">
              <div style="display:none" class="top">3</div>
              <div style="display:block" class="bottom">0</div>
            </div>
            <span class="dash_title"><?php echo Lang::$word->_HOURS;?></span> </div>
        </div>
        <div class="columns shrink">
          <div class="dash minutes_dash">
            <div class="digit first">
              <div style="display:none" class="top">2</div>
              <div style="display:block" class="bottom">0</div>
            </div>
            <div class="digit last">
              <div style="display:none" class="top">9</div>
              <div style="display:block" class="bottom">0</div>
            </div>
            <span class="dash_title"><?php echo Lang::$word->_MINUTES;?></span> </div>
        </div>
      </div>
      <div class="wojo huge space divider"></div>
      <div class="wojo white text"> <?php echo Url::out_url(App::Core()->offline_msg);?> </div>
    </div>
  </div>
</div>
<div class="footer">
<div class="copy">Copyright &copy;<?php echo date('Y') . ' '. App::Core()->company;?> | Powered by CMS pro v.<?php echo App::Core()->wojov;?> </div>
  <div class="grad"></div>
</div>
<?php 
  $d = explode("-",App::Core()->offline_d); 
  $t = explode(":",App::Core()->offline_t);
?>
<script src="<?php echo SITEURL;?>/assets/countdown.js"></script> 
<script type="text/javascript">
$(document).ready(function () {
	$('#dashboard').countDown({
		targetDate: {
			'day': <?php echo $d[2];?>,
			'month': <?php echo $d[1];?>,
			'year': <?php echo $d[0];?>,
			'hour': <?php echo $t[0];?>,
			'min': <?php echo $t[1];?>,
			'sec': 0
		}
	});
	
        $('.logo img').each(function() {
            var $img = $(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            $.get(imgURL, function(data) {
                var $svg = $(data).find('svg');
                if (typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                if (typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass + ' replaced-svg');
                }
                $svg = $svg.removeAttr('xmlns:a');
                $img.replaceWith($svg);
            }, 'xml');

        });
});
</script>
</body>
</html>