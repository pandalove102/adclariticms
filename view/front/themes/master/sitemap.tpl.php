<?php
  /**
   * Sitemap
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: sitemap.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<main>
  <?php if(File::is_File(FMODPATH . 'portfolio/_sitemap.tpl.php')):?>
  <?php include_once(FMODPATH . 'portfolio/_sitemap.tpl.php');?>
  <?php endif;?>
  <?php if(File::is_File(FMODPATH . 'digishop/_sitemap.tpl.php')):?>
  <?php include_once(FMODPATH . 'digishop/_sitemap.tpl.php');?>
  <?php endif;?>
  <?php if(File::is_File(FMODPATH . 'blog/_sitemap.tpl.php')):?>
  <?php include_once(FMODPATH . 'blog/_sitemap.tpl.php');?>
  <?php endif;?>
  <div class="wojo-grid">
    <div class="wojo huge space divider"></div>
    <h2 class="wojo center aligned header"><?php echo $this->data->{'title' . Lang::$lang};?>
      <p class="sub header"><?php echo $this->data->{'caption' . Lang::$lang};?></p>
    </h2>
    <div class="wojo huge space divider"></div>
    <div class="row double-gutters">
      <div class="columns screen-50 tablet-50 mobile-100 phone-100">
        <h3 class="wojo header"><?php echo Lang::$word->ADM_PAGES;?> </h3>
        <?php if($this->pagedata):?>
        <!-- Page -->
        <div class="wojo relaxed divided list">
          <?php foreach($this->pagedata as $row):?>
          <div class="item"><i class="icon small chevron right"></i>
            <div class="content"> <a href="<?php echo Url::url('/' . $this->core->pageslug, $row->slug);?>"><?php echo $row->title;?></a></div>
          </div>
          <?php endforeach;?>
          <?php unset($row);?>
        </div>
        <?php endif;?>
        
        <!-- Portfolio -->
        <?php if($this->portadata):?>
        <h3 class="wojo header"><?php echo ucfirst($this->core->modname['portfolio']);?></h3>
        <!-- Page -->
        <div class="wojo relaxed divided list">
          <?php foreach($this->pagedata as $row):?>
          <div class="item"><i class="icon small chevron right"></i>
            <div class="content"> <a href="<?php echo Url::url('/' . $this->core->modname['portfolio'], $row->slug);?>"><?php echo $row->title;?></a></div>
          </div>
          <?php endforeach;?>
          <?php unset($row);?>
        </div>
        <?php endif;?>
      </div>
      <div class="columns screen-50 tablet-50 mobile-100 phone-100"> 
        
        <!-- Blog -->
        <?php if($this->blogdata):?>
        <h3 class="wojo header"><?php echo ucfirst($this->core->modname['blog']);?></h3>
        <!-- Page -->
        <div class="wojo relaxed divided list">
          <?php foreach($this->blogdata as $row):?>
          <div class="item"><i class="icon small chevron right"></i>
            <div class="content"> <a href="<?php echo Url::url('/' . $this->core->modname['blog'], $row->slug);?>"><?php echo $row->title;?></a></div>
          </div>
          <?php endforeach;?>
          <?php unset($row);?>
        </div>
        <?php endif;?>
        
        <!-- Digishop -->
        <?php if($this->digidata):?>
        <h3 class="wojo header"><?php echo ucfirst($this->core->modname['digishop']);?></h3>
        <!-- Page -->
        <div class="wojo relaxed divided list">
          <?php foreach($this->digidata as $row):?>
          <div class="item"><i class="icon small chevron right"></i>
            <div class="content"> <a href="<?php echo Url::url('/' . $this->core->modname['digishop'], $row->slug);?>"><?php echo $row->title;?></a></div>
          </div>
          <?php endforeach;?>
          <?php unset($row);?>
        </div>
        <?php endif;?>
      </div>
    </div>
  </div>
</main>