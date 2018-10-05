<?php
  /**
   * Blog Search
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-12-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
  
  Bootstrap::Autoloader(array(AMODPATH . 'blog/'));
?>
<div class="margin-bottom">
  <div class="wojo fluid icon search input"> <i class="find icon"></i>
    <input data-url="<?php echo FMODULEURL;?>" name="bfind" placeholder="<?php echo Lang::$word->SEARCH;?>..." type="text" id="blogFind">
  </div>
</div>