<?php
  /**
   * Register
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: register.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div class="wojo-grid">
  <div class="wojo space divider"></div>
  <div class="row align-center">
    <div class="columns screen-40 tablet-60 mobile-100 phone-100">
      <form method="post" id="login_form" name="wojo_form">
        <div class="wojo top attached segment">
          <div class="wojo space divider"></div>
          <h5 class="content-center"><?php echo Lang::$word->M_SUB23;?></h5>
          <div class="wojo big space divider"></div>
          <p class="content-center"><i class="icon big grey rounded user"></i></p>
          <div class="wojo big space divider"></div>
          <div class="wojo form">
            <div class="wojo block fields">
              <div class="field">
                <label><?php echo Lang::$word->M_EMAIL;?> <i class="icon asterisk"></i></label>
                <div class="wojo fluid transparent input">
                  <input name="email" type="text">
                </div>
                <div class="wojo basic divider"></div>
              </div>
              <div class="field">
                <label><?php echo Lang::$word->M_PASSWORD;?> <i class="icon asterisk"></i></label>
                <div class="wojo fluid transparent input">
                  <input type="password" name="password">
                </div>
                <div class="wojo basic divider"></div>
              </div>
            </div>
            <div class="wojo fields">
              <div class="field">
                <label><?php echo Lang::$word->M_FNAME;?> <i class="icon asterisk"></i></label>
                <div class="wojo fluid transparent input">
                  <input type="text"  name="fname">
                </div>
                <div class="wojo basic divider"></div>
              </div>
              <div class="field">
                <label><?php echo Lang::$word->M_LNAME;?> <i class="icon asterisk"></i></label>
                <div class="wojo fluid transparent input">
                  <input type="text" name="lname">
                </div>
                <div class="wojo basic divider"></div>
              </div>
            </div>
            <?php echo $this->custom_fields;?>
            <?php if($this->core->enable_tax):?>
            <div class="wojo block fields">
              <div class="field">
                <label><?php echo Lang::$word->M_ADDRESS;?> <i class="icon asterisk"></i></label>
                <div class="wojo fluid transparent input">
                  <input type="text" name="address">
                </div>
                <div class="wojo basic divider"></div>
              </div>
            </div>
            <div class="wojo fields">
              <div class="field">
                <label><?php echo Lang::$word->M_CITY;?> <i class="icon asterisk"></i></label>
                <div class="wojo fluid transparent input">
                  <input type="text" name="city">
                </div>
                <div class="wojo basic divider"></div>
              </div>
              <div class="field">
                <label><?php echo Lang::$word->M_STATE;?> <i class="icon asterisk"></i></label>
                <div class="wojo fluid transparent input">
                  <input type="text" name="state">
                </div>
                <div class="wojo basic divider"></div>
              </div>
            </div>
            <div class="wojo block fields">
              <div class="field">
                <label> <?php echo Lang::$word->M_ZIP;?> <?php echo Lang::$word->M_COUNTRY;?> <i class="icon asterisk"></i></label>
                <div class="wojo action fluid transparent input">
                  <input type="text" name="zip">
                  <select class="wojo search transparent selection dropdown" name="country">
                    <?php echo Utility::loopOptions($this->clist, "abbr", "name");?>
                  </select>
                </div>
                <div class="wojo basic divider"></div>
              </div>
            </div>
            <?php endif;?>
            <div class="field">
              <label><?php echo Lang::$word->CAPTCHA;?> <i class="icon asterisk"></i></label>
              <div class="wojo right labeled fluid transparent input">
                <input name="captcha" type="text">
                <?php echo Session::captcha();?> </div>
              <div class="wojo basic divider"></div>
            </div>
          </div>
        </div>
        <button class="bottom fluid attached wojo teal button" data-action="register" name="dosubmit" type="button"><?php echo Lang::$word->M_SUB24;?></button>
      </form>
      <div class="wojo space divider"></div>
      <p class="content-center half-top-padding inverted"><a href="<?php echo Url::url('/' . $this->core->system_slugs->login[0]->{'slug' . Lang::$lang});?>" class="inverted"><?php echo Lang::$word->M_SUB19;?>.</a></p>
      <div class="wojo huge space divider"></div>
    </div>
  </div>
</div>