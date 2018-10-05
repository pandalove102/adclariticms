<?php
  /**
   * Manager Controller
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: managerController.php, v1.00 2016-07-05 10:12:05 gewa Exp $
   */
  define("_WOJO", true);
  require_once ("../../../init.php");

  if (!App::Auth()->is_Admin())
      exit;

  $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : null;

  switch ($action):
      /* == Get Files == */
      case "getFiles":
          $include = null;
          if ($type = Validator::notEmptyGet('exts')):
              switch ($type) {
                  case "doc":
                      $include = array("include" => array(
                              "txt",
                              "doc",
                              "docx",
                              "pdf",
                              "xls",
                              "xlsx",
                              "css",
                              "nfo"));
                      break;

                  case "pic":
                      $include = array("include" => array(
                              "jpg",
                              "jpeg",
                              "bmp",
                              "png"));
                      break;

                  case "vid":
                      $include = array("include" => array(
                              "mp4",
                              "avi",
                              "sfw",
                              "webm",
                              "ogv",
                              "mov"));
                      break;

                  case "aud":
                      $include = array("include" => array("mp3", "wav"));
                      break;

                  default:
                      $include = null;
                      break;
              }

          endif;

          $result = File::scanDirectory(File::validateDirectory(UPLOADS, Validator::get('dir')), $include, Validator::get('sorting'));
          print json_encode($result);
          break;

      /* == Remote Images == */
      case "getImages":
          $result = File::scanDirectory(UPLOADS . '/images', array("include" => array("jpg","jpeg","bmp","png","svg")), "name");
		  $list = array();
		  foreach($result['files'] as $row) :
			  $item = array(
				  'url' => UPLOADURL . '/' . $row['url'], 
				  'thumb' => UPLOADURL . '/thumbs/' . $row['name'], 
			  );
			  $list[] = $item;
		  endforeach;
		  print json_encode($list);
		  
      /* == New Folder == */
      case "newFolder":
          if (isset($_POST['name'])):
              if(File::makeDirectory(UPLOADS . '/' . Validator::sanitize($_POST['dir'] . '/' . $_POST['name'], "file"))) :
			     $json['type'] = "success";
				 else:
				 $json['error'] = "error";
			  endif;
			  print json_encode($json);
          endif;
		  
      /* == Unzip File == */
      case "unzip":
          if (isset($_POST['item'])):
		      $dir = pathinfo(UPLOADS . '/' . $_POST['item']);
              if(File::unzip(UPLOADS . '/' . $_POST['item'], $dir['dirname'])) :
			     $json['type'] = "success";
				 else:
				 $json['error'] = "error";
			  endif;
			  print json_encode($json);
          endif;
		  
      /* == Delete Files Folders == */
      case "delete":
          if (isset($_POST['items'])):
              foreach ($_POST['items'] as $item):
                  File::deleteMulti(UPLOADS . '/' . $item);
              endforeach;
			  $json['type'] = "success";
			  print json_encode($json);
          endif;

      /* == Upload == */
      case "upload":
          if (!empty($_FILES['file']['name'])):
		      $dir = File::validateDirectory(UPLOADS, Validator::post('dir')) . '/';
		      $upl = Upload::instance(App::Core()->file_size, App::Core()->file_ext);
			  $upl->process("file", $dir, false, $_FILES['file']['name'], false);
			  if (empty(Message::$msgs)):
				  $img = new Image($dir . $upl->fileInfo['fname']);
				  if ($img->originalInfo['width']):
					  try {
						  $img = new Image($dir. $upl->fileInfo['fname']);
						  $img->fitToWidth(200)->save(UPLOADS . '/thumbs/' . $upl->fileInfo['fname']);
					  }
					  catch (exception $e) {
						  Debug::AddMessage("errors", '<i>Error</i>', $e->getMessage(), "session");
					  }
					  $json['filename'] = UPLOADURL . '/' . Validator::post('dir') . '/' . $upl->fileInfo['fname'];
				  else:
					  $json['filename'] = ADMINVIEW . "/images/mime/" . $upl->fileInfo['ext'] . ".png";
				  endif;
			  $json['type'] = "success";
			  else:
				  $json['type'] = "error";
				  $json['filename'] = '';
				  $json['message'] = Message::$msgs['name'];
			  endif;
			  print json_encode($json);
          endif;
          break;
      /* == Editor Upload == */
      case "eupload":
          if (!empty($_FILES['file']['name'])):
		      $dir = UPLOADS . '/images/';
		      $upl = Upload::instance(App::Core()->file_size, App::Core()->file_ext);
			  $upl->process("file", $dir, false, $_FILES['file']['name'], false);
			  if (empty(Message::$msgs)):
				  $img = new Image($dir . $upl->fileInfo['fname']);
				  if ($img->originalInfo['width']):
					  try {
						  $img = new Image($dir. $upl->fileInfo['fname']);
						  $img->fitToWidth(200)->save(UPLOADS . '/thumbs/' . $upl->fileInfo['fname']);
					  }
					  catch (exception $e) {
						  Debug::AddMessage("errors", '<i>Error</i>', $e->getMessage(), "session");
					  }
					  $link = array("link" => UPLOADURL . '/images/' . $upl->fileInfo['fname']);
					  print json_encode($link);
				  endif;
			  else:
				  $json['type'] = "error";
				  $json['filename'] = '';
				  $json['message'] = Message::$msgs['name'];
				  print json_encode($json);
			  endif;
			  
          endif;
          break;
  endswitch;
?>