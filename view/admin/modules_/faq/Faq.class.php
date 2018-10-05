<?php
  /**
   * F.A.Q.
   *
   * @package wojo:cms
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: faq.class.php, v5.00 2017-03-05 10:12:05 gewa Exp $
   */
  
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');

  class Faq
  {

      const mTable = "mod_faq";
	  	  

      /**
       * Faq::__construct()
       * 
       * @return
       */
      public function __construct()
      {
	  }

      /**
       * Faq::AdminIndex()
       * 
       * @return
       */
      public function AdminIndex()
      {
		  
          $sql = "
		  SELECT 
		    id,
			question" . Lang::$lang . " AS title
		  FROM
			`" . self::mTable . "`
		  ORDER BY sorting"; 
		  
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "admin/";
          $tpl->data = Db::run()->pdoQuery($sql)->results();
          $tpl->title = Lang::$word->_MOD_FAQ_TITLE;
          $tpl->template = 'admin/modules_/faq/view/index.tpl.php';
		  
	  }

      /**
       * Faq::Edit()
       * 
       * @param int $id
       * @return
       */
      public function Edit($id)
      {
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "admin/";
          $tpl->title = Lang::$word->_MOD_FAQ_TITLE1;
          $tpl->crumbs = ['admin', 'modules', 'faq', 'edit'];

          if (!$row = Db::run()->first(self::mTable, null, array("id" => $id))) {
              $tpl->template = 'admin/error.tpl.php';
              $tpl->error = DEBUG ? "Invalid ID ($id) detected [Faq.class.php, ln.:" . __line__ . "]" : Lang::$word->META_ERROR;
          } else {
              $tpl->data = $row;
              $tpl->langlist = App::Core()->langlist;
              $tpl->template = 'admin/modules_/faq/view/index.tpl.php';
          }
      }

      /**
       * Faq::Save()
       * 
       * @return
       */
	  public function Save()
	  {
		  $tpl = App::View(BASEPATH . 'view/');
		  $tpl->dir = "admin/";
		  $tpl->title = Lang::$word->_MOD_FAQ_TITLE2;
		  $tpl->langlist = App::Core()->langlist;
		  $tpl->template = 'admin/modules_/faq/view/index.tpl.php';
	  }

      /**
       * Faq::processFaq()
       * 
       * @return
       */
      public function processFaq()
      {
		  
          foreach (App::Core()->langlist as $lang) {
              $rules['question_' . $lang->abbr] = array('required|string|min_len,3|max_len,100', Lang::$word->_MOD_FAQ_QUESTION . ' <span class="flag icon ' . $lang->abbr . '"></span>');
			  $filters['question_' . $lang->abbr] = 'string';
			  $filters['answer_' . $lang->abbr] = 'advanced_tags';
          }

          $validate = Validator::instance();
          $safe = $validate->doValidate($_POST, $rules);
		  $safe = $validate->doFilter($_POST, $filters);

          if (empty(Message::$msgs)) {
              foreach (App::Core()->langlist as $i => $lang) {
                  $data['question_' . $lang->abbr] = $safe->{'question_' . $lang->abbr};
				  $data['answer_' . $lang->abbr] = Url::in_url($safe->{'answer_' . $lang->abbr});
              }

			  (Filter::$id) ? Db::run()->update(self::mTable, $data, array("id" => Filter::$id)) : Db::run()->insert(self::mTable, $data); 
			  
			  $message = Filter::$id ? 
			  Message::formatSuccessMessage($data['question' . Lang::$lang], Lang::$word->_MOD_FAQ_UPDATED) : 
			  Message::formatSuccessMessage($data['question' . Lang::$lang], Lang::$word->_MOD_FAQ_ADDED);
			  
			  Message::msgReply(Db::run()->affected(), 'success', $message);
			  Logger::writeLog($message);
		  } else {
			  Message::msgSingleStatus();
		  }
	  }

      /**
       * Faq::Render()
       * 
       * @return
       */
      public function Render()
      {
		  
          $row = Db::run()->select(self::mTable, null, null, "ORDER BY sorting")->results();  
		  return ($row) ? $row : 0;
	  }
  }