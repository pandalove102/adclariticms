<?php
  /**
   * Page
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: page.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<!-- Page Caption & breadcrumbs-->
<!-- 
<div id="pageCaption"<?php echo Content::pageHeading();?>>
  <div class="wojo-grid">
    <?php if($this->core->showcrumbs):?>
    <div class="wojo breadcrumb"> <?php echo Url::crumbs($this->crumbs ? $this->crumbs : $this->segments, "/", Lang::$word->HOME);?> </div>
    <?php endif;?>
    <?php if($this->data->{'caption' . Lang::$lang}):?>
    <p><?php echo $this->data->{'caption' . Lang::$lang};?></p>
    <?php endif;?>
  </div>
</div>
 -->
 
 
<!-- Page Content-->

<!-- <?php echo Content::pageBg();?> -->
<div  class="main">
  <?php include_once(THEMEBASE . '/_mainmenu.tpl.php');?>
  <!-- Validate page access-->
  <?php if(Content::validatePage()):?>
  <!-- Run page--> 
  <?php echo Content::parseContentData($this->data->{'body' . Lang::$lang});?> 
  <!-- Parse javascript -->
  <?php if ($this->data->jscode):?>
    <?php echo Validator::cleanOut(json_decode($this->data->jscode));?>
  <?php endif;?>  
  <?php endif;?>
  
  <?php if($this->data->is_comments):?>
  <?php include_once(FMODPATH . 'comments/index.tpl.php');?>
  <?php endif;?>
  
  <?php include_once(THEMEBASE . '/_mainfooter.tpl.php');?>
  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '216593245632743',
      xfbml      : true,
      version    : 'v3.0'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '216593245632743',
      cookie     : true,
      xfbml      : true,
      version    : '{latest-api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '216593245632743',
      xfbml      : true,
      version    : 'v2.10'
    });

    FB.AppEvents.logPageView();

  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   function onButtonClick() {
  // Add this to a button's onclick handler
  FB.AppEvents.logEvent("sentFriendRequest");
}


function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}
</script>

<fb:login-button 
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button>

  <div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
    

</div>
