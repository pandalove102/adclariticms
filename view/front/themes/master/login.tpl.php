<?php
  /**
   * Login
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: login.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>

<!-- 
<div class="wojo-grid">
  <div class="wojo large space divider"></div>
  <div class="row align-center">
    <div class="columns screen-30 tablet-50 mobile-100 phone-100">
      <div id="loginform">
        <form method="post" id="login_form" name="wojo_form">
          <div class="wojo top attached segment">
            <div class="wojo space divider"></div>
            <h5 class="content-center"><?php echo Lang::$word->M_SUB19;?></h5>
            <div class="wojo big space divider"></div>
            <p class="content-center"><i class="icon big grey lock"></i></p>
            <div class="wojo big space divider"></div>
            <div class="horizontal-padding">
              <div class="wojo form">
                <div class="wojo block fields content-left">
                  <div class="field">
                    <div class="wojo fluid transparent input">
                      <input placeholder="<?php echo Lang::$word->USERNAME;?>/<?php echo Lang::$word->M_EMAIL;?>" name="email" type="text">
                      </div>
                    <div class="wojo basic divider"></div>
                  </div>
                  <div class="field">
                    <div class="wojo fluid transparent input">
                      <input placeholder="<?php echo Lang::$word->M_PASSWORD;?>" name="password" type="password">
                       </div>
                    <div class="wojo basic divider"></div>
                    <p class="wojo small text content-center half-top-padding"><a id="passreset"><?php echo Lang::$word->M_PASSWORD_RES;?>?</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button class="bottom fluid attached wojo teal button" data-action="login" name="dosubmit" type="button"><?php echo Lang::$word->LOGIN;?></button>
          <p class="content-center half-top-padding inverted"><?php echo Lang::$word->M_SUB20;?> <a href="<?php echo Url::url('/' . App::Core()->system_slugs->register[0]->{'slug' . Lang::$lang});?>" class="inverted"><?php echo Lang::$word->M_SUB21;?>.</a></p>
        </form>
      </div>
      <div id="passform" class="hide-all">
        <form method="post" id="pass_form" name="wojo_form">
          <div class="wojo top attached segment">
            <div class="wojo space divider"></div>
            <h5 class="content-center"><?php echo Lang::$word->M_SUB22;?></h5>
            <div class="wojo big space divider"></div>
            <p class="content-center"><i class="icon big grey unlock"></i></p>
            <div class="wojo big space divider"></div>
            <div class="horizontal-padding">
              <div class="wojo form">
                <div class="wojo block fields content-left">
                  <div class="field">
                    <div class="wojo fluid transparent icon input">
                      <input placeholder="<?php echo Lang::$word->M_FNAME;?>" name="fname" type="text">
                      <i class="icon red small"></i> </div>
                    <div class="wojo basic divider"></div>
                  </div>
                  <div class="field">
                    <div class="wojo fluid transparent icon input">
                      <input placeholder="<?php echo Lang::$word->M_EMAIL;?>" name="pemail" type="text">
                      <i class="icon red small"></i> </div>
                    <div class="wojo basic divider"></div>
                    <p class="wojo small text content-center half-top-padding"><a id="backto"><?php echo Lang::$word->M_SUB14;?></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button class="bottom fluid attached wojo primary button" name="passreset" type="button"><?php echo Lang::$word->SUBMIT;?></button>
          <p class="content-center half-top-padding inverted"><?php echo Lang::$word->M_SUB20;?> <a href="<?php echo Url::url('/' . App::Core()->system_slugs->register[0]->{'slug' . Lang::$lang});?>" class="inverted"><?php echo Lang::$word->M_SUB21;?>.</a></p>
        </form>
      </div>
    </div>
  </div>
</div>


 -->