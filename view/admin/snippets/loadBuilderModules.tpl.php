<?php
  /**
   * Builder Modules
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: loadBuilderModules.tpl.php, v1.00 2016-03-02 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<?php if($this->data):?>
<?php foreach($this->data as $row):?>
<div class="column">
  <div id="mod_<?php echo $row->id;?>" class="modulelist button" data-content="<?php echo htmlspecialchars($row->title);?>"> <img data-text="<?php echo htmlspecialchars($row->title);?>" data-element="module" src="<?php echo AMODULEURL . $row->icon;?>"/>
    <div class="phidden">
      <div class="column-wrap">
        <div class="column-dummy">
          <div id="newModule_<?php echo $row->id;?>" data-mode="readonly" data-module-id="<?php echo $row->parent_id;?>" data-module-module_id="<?php echo $row->id;?>" data-module-name="<?php echo htmlspecialchars($row->title);?>" data-module-alias="<?php echo $row->modalias;?>" data-module-group="<?php echo $row->modalias;?>">
            <p class="wojo bold text content-center">::<?php echo $row->title;?>::</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
<?php endif;?>