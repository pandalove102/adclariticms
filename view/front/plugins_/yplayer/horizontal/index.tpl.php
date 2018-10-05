<?php
  /**
   * Yplayer
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: index.tpl.php, v1.00 2016-12-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
  
  Bootstrap::Autoloader(array(APLUGPATH . 'yplayer/'));
?>
<?php if($row = App::Yplayer()->render($data['plugin_id'])):?>
<div id="wPlayer_<?php echo $row->id;?>"></div>
<script type="text/javascript"> 
// <![CDATA[  
$(document).ready(function() {
    $("#wPlayer_<?php echo $row->id;?>").wojo_tube(<?php echo str_replace("YTKEY", App::Core()->ytapi, $row->config);?>);
});
// ]]>
</script>
<?php endif;?>