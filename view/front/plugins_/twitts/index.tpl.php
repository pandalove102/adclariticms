<?php
  /**
   * Twitts
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-12-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
  
  Bootstrap::Autoloader(array(APLUGPATH . 'twitts/'));
?>
<?php if(App::Twitts()->username):?>
<!-- Start Latest Twitts -->
<?php $conf = Utility::findInArray($data['all'], "id", $data['id']);?>
<?php
  function twitterStyle($tweet)
  {	  
      echo '<div class="event">';
      if (App::Twitts()->show_image) {
          echo '<div class="label"><img src="' . $tweet['user']['profile_image_url'] . '" class="wojo basic image" alt=""/></div>';
      }
		echo '<div class="content">
				 <div class="summary"><a href="https://www.twitter.com/' . $tweet['user']['screen_name'] . '">#' . $tweet['user']['screen_name'] . '</a>
				   <div class="date"><a href="' . $tweet['twitter_link'] . '">' . Date::doDate('long_date', $tweet['created_at']) . '</a></div>
				 </div>
				 <div class="extra text">' . $tweet['text'] . '</div>
				 ' . ($tweet['is_retweet'] ? '<div class="meta"> Retweeted by ' . $tweet['retweeter']['name'] . ' </div>' : '');
		echo '</div>
           </div>';
  }
?>
<div class="wojo basic fitted segment<?php echo ($conf[0]->alt_class) ? ' ' . $conf[0]->alt_class : null;?>">
  <?php if($conf[0]->show_title):?>
  <h3 class="content-center"><?php echo $conf[0]->title;?></h3>
  <?php endif;?>
  <div class="wojo feed">
    <?php App::Twitts()->PrintFeed('twitterStyle');?>
  </div>
</div>
<?php endif;?>