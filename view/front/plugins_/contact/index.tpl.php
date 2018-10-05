<?php
/**
 * Contact
 *
 * @package Wojo Framework
 * @author wojoscripts.com
 * @copyright 2016
 * @version $Id: index.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
 */
if (! defined ( "_WOJO" ))
	die ( 'Direct access to this location is not allowed.' );
?>


<form role="form" id="contact-form" class="contact-form" method="post">
	<div class="row">
		<div class="col-md-6 col-sm-6">
			<div class="form-group">
				<input type="text" class="form-control" name="name" value="<?php if (App::Auth()->is_User()) echo App::Auth()->name;?>"
					autocomplete="off" id="Name" placeholder="<?php echo Lang::$word->NAME;?>">
			</div>
		</div>
		<div class="col-md-6 col-sm-6">
			<div class="form-group">
				<input type="email" class="form-control" name="email"  value="<?php if (App::Auth()->is_User()) echo App::Auth()->email;?>"
					autocomplete="off" id="email" placeholder="<?php echo Lang::$word->M_EMAIL;?>">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<textarea class="form-control textarea" rows="3" name="notes"
					id="Message" placeholder="<?php echo Lang::$word->MESSAGE;?>"></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<button type="submit" class="btn main-btn" data-action="contactus" name="contactformsubmit"><?php echo Lang::$word->CF_SEND;?></button>
		</div>
	</div>
</form>

<form role="form" id="contact-form2" class="contact-form" method="post">
  <div class="row">
    <div class="col-md-6 col-sm-6">
      <div class="form-group">
        <input type="text" class="form-control" name="name" value="<?php if (App::Auth()->is_User()) echo App::Auth()->name;?>"
          autocomplete="off" id="Name" placeholder="<?php echo Lang::$word->NAME;?>">
      </div>
    </div>
    <div class="col-md-6 col-sm-6">
      <div class="form-group">
        <input type="email" class="form-control" name="email"  value="<?php if (App::Auth()->is_User()) echo App::Auth()->email;?>"
          autocomplete="off" id="email" placeholder="<?php echo Lang::$word->M_EMAIL;?>">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <textarea class="form-control textarea" rows="3" name="notes"
          id="Message" placeholder="<?php echo Lang::$word->MESSAGE;?>"></textarea>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <button type="submit" class="btn main-btn" data-action="contactus" name="contactformsubmit"><?php echo Lang::$word->CF_SEND;?></button>
    </div>
  </div>
</form>

<!-- 
<div class="wojo form">
  <form id="wojo_form" name="wojo_form" method="post">
    <div class="wojo block fields">
      <div class="field">
        <label><?php echo Lang::$word->NAME;?> <i class="icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->NAME;?>" value="<?php if (App::Auth()->is_User()) echo App::Auth()->name;?>" name="name">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->M_EMAIL;?> <i class="icon asterisk"></i></label>
        <input type="text" placeholder="<?php echo Lang::$word->M_EMAIL;?>" value="<?php if (App::Auth()->is_User()) echo App::Auth()->email;?>" name="email">
      </div>
    </div>
    <div class="wojo fields">
      <div class="field">
        <label><?php echo Lang::$word->M_PHONE;?> </label>
        <input type="text" placeholder="<?php echo Lang::$word->M_PHONE;?>" name="phone">
      </div>
      <div class="field">
        <label><?php echo Lang::$word->ET_SUBJECT;?> </label>
        <select name="subject" class="wojo fluid dropdown">
          <option value=""><?php echo Lang::$word->CF_SUBJECT_1;?></option>
          <option value="<?php echo Lang::$word->CF_SUBJECT_2;?>"><?php echo Lang::$word->CF_SUBJECT_2;?></option>
          <option value="<?php echo Lang::$word->CF_SUBJECT_3;?>"><?php echo Lang::$word->CF_SUBJECT_3;?></option>
          <option value="<?php echo Lang::$word->CF_SUBJECT_4;?>"><?php echo Lang::$word->CF_SUBJECT_4;?></option>
          <option value="<?php echo Lang::$word->CF_SUBJECT_5;?>"><?php echo Lang::$word->CF_SUBJECT_5;?></option>
          <option value="<?php echo Lang::$word->CF_SUBJECT_6;?>"><?php echo Lang::$word->CF_SUBJECT_6;?></option>
          <option value="<?php echo Lang::$word->CF_SUBJECT_7;?>"><?php echo Lang::$word->CF_SUBJECT_7;?></option>
        </select>
      </div>
    </div>
    <div class="wojo block fields">
      <div class="field">
        <label><?php echo Lang::$word->MESSAGE;?> <i class="icon asterisk"></i></label>
        <textarea class="small" placeholder="<?php echo Lang::$word->MESSAGE;?>" name="notes"></textarea>
      </div>
      <div class="field">
        <label><?php echo Lang::$word->CAPTCHA;?> <i class="icon asterisk"></i></label>
        <div class="wojo right labeled fluid input">
          <input name="captcha" placeholder="<?php echo Lang::$word->CAPTCHA;?>" type="text">
          <div class="wojo basic label captcha"><?php echo Session::captcha();?></div>
        </div>
      </div>
    </div>
    <div class="field">
      <button type="button" data-hide="true" data-action="processContact" name="dosubmit" class="wojo red button"><?php echo Lang::$word->CF_SEND;?></button>
    </div>
  </form>
</div>-->

