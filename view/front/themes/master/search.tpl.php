<?php
  /**
   * Search
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: search.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<main>
  <?php if(File::is_File(FMODPATH . 'portfolio/_search.tpl.php')):?>
  <?php include_once(FMODPATH . 'portfolio/_search.tpl.php');?>
  <?php endif;?>
  <?php if(File::is_File(FMODPATH . 'digishop/_search.tpl.php')):?>
  <?php include_once(FMODPATH . 'digishop/_search.tpl.php');?>
  <?php endif;?>
  <?php if(File::is_File(FMODPATH . 'blog/_search.tpl.php')):?>
  <?php include_once(FMODPATH . 'blog/_search.tpl.php');?>
  <?php endif;?>
  
  
  <!-- 
  <div class="wojo-grid">
    <div class="wojo huge space divider"></div>
    <h2 class="wojo center aligned header"><?php echo $this->data->{'title' . Lang::$lang};?>
      <p class="sub header"><?php echo $this->data->{'caption' . Lang::$lang};?></p>
    </h2>
    <div class="wojo huge space divider"></div>
    <form method="get" id="wojo_form" name="wojo_form">
      <div class="wojo huge fluid action input">
        <input name="keyword" placeholder="Search..." type="text">
        <button class="wojo huge icon basic button"> <i class="find icon"></i> </button>
      </div>
    </form>
    <div class="wojo huge space divider"></div>
    <?php if(!$this->keyword || strlen($this->keyword = trim($this->keyword)) == 0 || strlen($this->keyword) < 3):?>
    <?php Message::msgSingleAlert(Lang::$word->FRT_SEARCH_EMPTY2);?>
    <?php elseif(!$this->pagedata and !$this->blogdata and !$this->portadata and !$this->digidata):?>
    <?php Message::msgSingleAlert(Lang::$word->FRT_SEARCH_EMPTY . '<span class="wojo bold text">[' . $this->keyword . ']</span>' . Lang::$word->FRT_SEARCH_EMPTY1);?>
    <?php else:?>
   
    <div class="wojo relaxed divided items">
      <?php $i = 0;?>
      <?php foreach($this->pagedata as $row):?>
      <?php
	      $newbody = '';
	      $body = $row->body;
      	  $pattern = "/%%(.*?)%%/";
		  preg_match_all($pattern, $body, $matches);
		  if ($matches[1]) {
		    $body = str_replace($matches[0], '', $body);
			$string = Validator::sanitize($body, "default", 250);
			$newbody = preg_replace("|($this->keyword)|Ui", "<span class=\"wojo red small label\">$1</span>", $string);
		  }
		  $url = $row->page_type == "home" ? Url::url('') : Url::url('/' . $this->core->pageslug, $row->slug);
      ?>
      <?php $i++;?>
      <div class="item">
        <div class="content"> <a class="header" href="<?php echo $url;?>"><?php echo $i . '. ' . $row->title;?></a>
          <div class="description"><?php echo $newbody;?></div>
        </div>
      </div>
      <?php endforeach;?>
      <?php unset($row);?>
    </div>
    
    <?php if($this->portadata):?>
    <h3 class="wojo header"><?php echo ucfirst($this->core->modname['portfolio']);?>
      <p class="sub header"></p>
    </h3>
    <div class="wojo relaxed divided items">
      <?php $i = 0;?>
      <?php foreach($this->portadata as $row):?>
      <?php $i++;?>
      <div class="item">
        <div class="content"> <a class="header" href="<?php echo Url::url('/' . $this->core->modname['portfolio'], $row->slug);?>"><?php echo $i . '. ' . $row->title;?></a>
          <div class="description"><?php echo Validator::sanitize($row->body, "default", 250);?></div>
        </div>
      </div>
      <?php endforeach;?>
      <?php unset($row);?>
    </div>
    <?php endif;?>
    
   
    <?php if($this->digidata):?>
    <h3 class="wojo header"><?php echo ucfirst($this->core->modname['digishop']);?>
      <p class="sub header"></p>
    </h3>
    <div class="wojo relaxed divided items">
      <?php $i = 0;?>
      <?php foreach($this->digidata as $row):?>
      <?php $i++;?>
      <div class="item">
        <div class="content"> <a class="header" href="<?php echo Url::url('/' . $this->core->modname['digishop'], $row->slug);?>"><?php echo $i . '. ' . $row->title;?></a>
          <div class="description"><?php echo Validator::sanitize($row->body, "default", 250);?></div>
        </div>
      </div>
      <?php endforeach;?>
      <?php unset($row);?>
    </div>
    <?php endif;?>
    
    
    <?php if($this->blogdata):?>
    <h3 class="wojo header"><?php echo ucfirst($this->core->modname['blog']);?>
      <p class="sub header"></p>
    </h3>
    <div class="wojo relaxed divided items">
      <?php $i = 0;?>
      <?php foreach($this->blogdata as $row):?>
      <?php $i++;?>
      <div class="item">
        <div class="content"> <a class="header" href="<?php echo Url::url('/' . $this->core->modname['blog'], $row->slug);?>"><?php echo $i . '. ' . $row->title;?></a>
          <div class="description"><?php echo Validator::sanitize($row->body, "default", 250);?></div>
        </div>
      </div>
      <?php endforeach;?>
      <?php unset($row);?>
    </div>
    <?php endif;?>
    <?php endif;?>
    <div class="wojo huge space divider"></div>
  </div>
  
   -->
  
  
</main>