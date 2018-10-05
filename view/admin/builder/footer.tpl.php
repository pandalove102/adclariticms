<?php
  /**
   * Footer
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: footer.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<script type="text/javascript">
    $(document).ready(function($) {
        $.Builder({
            adminPath: '<?php echo ADMINVIEW;?>/',
            sitePath: '<?php echo SITEURL;?>/',
			iconselect:'<?php echo ADMINVIEW;?>/builder/snippets/iconset.json',
			imageselect:'<?php echo ADMINVIEW;?>/managerBuilder.php',
            pagename: "<?php echo htmlspecialchars($this->data->{'title' . Lang::$lang});?>",
            lang: {
                cancel: "Cancel",
                ok: "OK"
            }
        });
});
</script>
<?php Debug::displayInfo();?>
</body></html>