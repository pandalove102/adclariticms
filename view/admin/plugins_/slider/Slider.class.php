<?php
  /**
   * Slider Class
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: slider.class.php, v1.00 2016-04-20 18:20:24 gewa Exp $
   */

  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');

  class Slider
  {

      const mTable = "plug_slider";
      const dTable = "plug_slider_data";

      private static $db;


      /**
       * Slider::__construct()
       * 
       * @return
       */
      public function __construct()
      {
          self::$db = Db::run();

      }

      /**
       * Slider::AdminIndex()
       * 
       * @return
       */
      public function AdminIndex()
      {
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "admin/";
          $tpl->data = $this->getSliders();
          $tpl->title = Lang::$word->_PLG_SL_TITLE;
          $tpl->template = 'admin/plugins_/slider/view/index.tpl.php';
      }

      /**
       * Slider::Save()
       * 
       * @return
       */
      public function Save()
      {

          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "admin/";
          $tpl->title = Lang::$word->_PLG_SL_TITLE1;
          $tpl->langlist = App::Core()->langlist;
          $tpl->animationlist = self::slideTransitions();
          $tpl->template = 'admin/plugins_/slider/view/index.tpl.php';
      }

      /**
       * Slider::Edit()
       * 
       * @param mixed $id
       * @return
       */
      public function Edit($id)
      {
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "admin/";
          $tpl->title = Lang::$word->_PLG_SL_TITLE2;
          $tpl->crumbs = ['admin', 'plugins', 'slider', 'edit'];

          if (!$row = Db::run()->first(self::mTable, null, array("id =" => $id))) {
              $tpl->template = 'admin/error.tpl.php';
              $tpl->error = DEBUG ? "Invalid ID ($id) detected [slider.class.php, ln.:" . __line__ . "]" : Lang::$word->META_ERROR;
          } else {
              $tpl->data = $row;
              $tpl->langlist = App::Core()->langlist;
              $tpl->slides = $this->getSlides($id);
              $tpl->animationlist = self::slideTransitions();
              $tpl->template = 'admin/plugins_/slider/view/index.tpl.php';
          }
      }

      /**
       * Slider::Preview()
       * 
       * @param mixed $id
       * @return
       */
      public function Preview($id)
      {
          $tpl = App::View(BASEPATH . 'view/');
          $tpl->dir = "admin/";
          $tpl->title = Lang::$word->_PLG_SL_SUB14;
          $tpl->crumbs = ['admin', 'plugins', 'slider', 'preview'];

          if (!$row = Db::run()->first(self::mTable, null, array("id" => $id))) {
              $tpl->template = 'admin/error.tpl.php';
              $tpl->error = DEBUG ? "Invalid ID ($id) detected [slider.class.php, ln.:" . __line__ . "]" : Lang::$word->META_ERROR;
          } else {
              $tpl->data = $row;
              $tpl->slides = $this->getSlides($id);
              $tpl->template = 'admin/plugins_/slider/view/index.tpl.php';
          }
      }

      /**
       * Slider::saveConfig()
       * 
       * @return
       */
      public function saveConfig()
      {

          $rules = array(
              'title' => array('required|string|min_len,3|max_len,80', Lang::$word->NAME),
              'automaticSlide' => array('required|numeric', Lang::$word->_PLG_SL_AUTOPLAY),
              'showProgressBar' => array('required|numeric', Lang::$word->_PLG_SL_PBAR),
              'pauseOnHover' => array('required|numeric', Lang::$word->_PLG_SL_PONHOVER),
              'width' => array('required|numeric|min_len,3|max_len,4', Lang::$word->_PLG_SL_WIDTHT),
			  'height' => array('required|numeric|min_len,3|max_len,3', Lang::$word->_PLG_SL_HEIGHT),
              'slidesTime' => array('required|numeric|min_len,3|max_len,4', Lang::$word->_PLG_SL_ASPEED),
              'slidesEaseIn' => array('required|numeric|min_len,3|max_len,4', Lang::$word->_PLG_SL_ANSPEED),
              'layout' => array('required|string', Lang::$word->_PLG_SL_LAYOUT),
              );

          $filters = array(
              'transition' => 'string',
			  'title' => 'string',
              );

          $validate = Validator::instance();
          $safe = $validate->doValidate($_POST, $rules);
          $safe = $validate->doFilter($_POST, $filters);

          if (empty(Message::$msgs)) {
              $settings = array(
                  'width' => $safe->width,
                  'height' => $safe->height,
				  'showProgressBar' => $safe->showProgressBar == 0 ? false : true,
                  'automaticSlide' => $safe->automaticSlide == 0 ? false : true,
                  'pauseOnHover' => $safe->pauseOnHover == 0 ? false : true,
				  'slidesTime' => $safe->slidesTime,
				  'slidesEaseIn' => $safe->slidesEaseIn,
                  'transition' => $safe->transition,
				  'layout' => $safe->layout,
				  'thumbs' => ($safe->layout == "thumbs_down" or $safe->layout == "thumbs_left" or $safe->layout == "thumbs_right") ? true : false,
                  'arrows' => ($safe->layout == "standard" or $safe->layout == "thumbs_down" or $safe->layout == "thumbs_left" or $safe->layout == "thumbs_right") ? true : false,
                  'buttons' => ($safe->layout == "standard" or $safe->layout == "dots" or $safe->layout == "dots_right" or $safe->layout == "dots_left") ? true : false,
                  );

              $data = array(
                  'title' => $safe->title,
                  'automaticSlide' => $safe->automaticSlide,
                  'showProgressBar' => $safe->showProgressBar,
                  'pauseOnHover' => $safe->pauseOnHover,
                  'slidesTime' => $safe->slidesTime,
                  'slidesEaseIn' => $safe->slidesEaseIn,
                  'transition' => $safe->transition,
                  'layout' => $safe->layout,
                  'height' => $safe->height,
                  'settings' => json_encode($settings),
                  );

              (Filter::$id) ? Db::run()->update(self::mTable, $data, array("id" => Filter::$id)) : $last_id = Db::run()->insert(self::mTable, $data)->getLastInsertId();

              if (Filter::$id) {
                  $message = Message::formatSuccessMessage($data['title'], Lang::$word->_PLG_SL_UPDATED);
                  Message::msgReply(Db::run()->affected(), 'success', $message);
                  Logger::writeLog($message);
              } else {
                  if ($last_id) {
					  // Insert new mulit plugin
					  $plugin_id = "slider/" . Utility::randomString();
					  File::makeDirectory(FPLUGPATH . $plugin_id);
					  File::copyFile(FPLUGPATH . 'slider/master.php', FPLUGPATH . $plugin_id . '/index.tpl.php');
					  
					  $pid = Db::run()->first(Plugins::mTable, array("id"), array("plugalias" => "slider"));
					  foreach (App::Core()->langlist as $i => $lang) {
						  $datam['title_' . $lang->abbr] = $safe->title;
					  }
					  $datax = array(
						  'parent_id' => $pid->id,
						  'plugin_id' => $last_id,
						  'groups' => 'slider',
						  'icon' => 'slider/thumb.png',
						  'plugalias' => $plugin_id,
						  'active' => 1,
						  );
					  Db::run()->insert(Plugins::mTable, array_merge($datam, $datax));
					  
					  
                      $message = Message::formatSuccessMessage($datam['title' . Lang::$lang], Lang::$word->_PLG_SL_ADDED);
                      $json['type'] = "success";
                      $json['title'] = Lang::$word->SUCCESS;
                      $json['message'] = $message;
                      $json['redirect'] = Url::url("/admin/plugins/slider/edit", Filter::$id ? Filter::$id : $last_id);
                      Logger::writeLog($message);
                  } else {
                      $json['type'] = "alert";
                      $json['title'] = Lang::$word->ALERT;
                      $json['message'] = Lang::$word->NOPROCCESS;
                  }
                  print json_encode($json);
              }
          } else {
              Message::msgSingleStatus();
          }
      }

      /**
       * Slider::getSliders()
       * 
       * @return
       */
      public function getSliders()
      {

          $row = self::$db->select(self::mTable)->results();
          return ($row) ? $row : 0;
      }

      /**
       * Slider::getSlides()
       * 
	   * @param mixed $id
       * @return
       */
      public function getSlides($id)
      {

          $row = self::$db->select(self::dTable, null, array("parent_id" => $id), "ORDER BY sorting")->results();
          return ($row) ? $row : 0;
      }

      /**
       * Slider::Render()
       * 
	   * @param mixed $id
       * @return
       */
      public function Render($id)
      {

          $row = self::$db->first(self::mTable, null, array("id" => $id));
          return ($row) ? $row : 0;
      }
	  
      /**
       * Slider::slideTransitions()
       * 
       * @return
       */
      public static function slideTransitions()
      {

          $html = array(
              "fade" => "fade",
              "flipX" => "flipX",
              "flipY" => "flipY",
              "flipBounceX" => "flipBounceX",
              "flipBounceY" => "flipBounceY",
              "swoop" => "swoop",
              "whirl" => "whirl",
              "shrink" => "shrink",
              "expand" => "expand",
              "bounce" => "bounce",
              "bounceUp" => "bounceUp",
              "bounceDown" => "bounceDown",
              "bounceLeft" => "bounceLeft",
              "bounceRight" => "bounceRight",
              "slideUp" => "slideUp",
              "slideDown" => "slideDown",
              "slideLeft" => "slideLeft",
              "slideRight" => "slideRight",
              "perspectiveUp" => "perspectiveUp",
              "perspectiveDown" => "perspectiveDown",
              "perspectiveLeft" => "perspectiveLeft",
              "perspectiveRight" => "perspectiveRight",
              );

          return $html;
      }
  }