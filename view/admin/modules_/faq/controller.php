<?php
  /**
   * F.A.Q.
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: controller.php, v1.00 2015-12-05 10:12:05 gewa Exp $
   */
  define("_WOJO", true);
  require_once("../../../../init.php");
  
  if (!App::Auth()->is_Admin())
      exit;
	  
  Bootstrap::Autoloader(array(AMODPATH . 'faq/'));

  $delete = Validator::post('delete');
  $action = Validator::request('action');
  $title = Validator::post('title') ? Validator::sanitize($_POST['title']) : null;

  /* == Delete == */
  switch ($delete):
      /* == Delete Event == */
      case "deleteFaq":
          $res = Db::run()->delete(Faq::mTable, array("id" => Filter::$id));
		  
		  $message = str_replace("[NAME]", $title, Lang::$word->_MOD_FAQ_DEL_OK);
          Message::msgReply($res, 'success', $message);
		  Logger::writeLog($message);
          break;
  endswitch;
  
  /* == Actions == */
  switch ($action):
      /* == Process Event == */
      case "processFaq":
          App::Faq()->processFaq();
      break;
  endswitch;
  
   /* == Sort Custom Fields == */
  if (Validator::post('sortFaq')):
      $i = 0;
      $query = "UPDATE `" . Faq::mTable . "` SET `sorting` = CASE ";
      $idlist = '';
      foreach ($_POST['sorting'] as $item):
          $i++;
          $query .= " WHEN id = " . $item . " THEN " . $i . " ";
          $idlist .= $item . ',';
      endforeach;
      $idlist = substr($idlist, 0, -1);
      $query .= "
			  END
			  WHERE id IN (" . $idlist . ")";
      Db::run()->pdoQuery($query);
  endif;