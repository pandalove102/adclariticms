<?php
  /**
   * Custom Fields
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: customFields.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>               
<?php
  $html = '';
  switch ($data['section']):
      case "profile":
          $html .= '<div class="wojo block fields">';
          foreach ($data['data'] as $i => $row) {
              $tootltip = $row->{'tooltip' . Lang::$lang} ? ' <i data-content="' . $row->{'tooltip' . Lang::$lang} . '" class="icon question sign"></i>' : '';
              $required = $row->required ? ' <i class="icon asterisk"></i>' : '';

              $html .= '<div class="field">';
              $html .= '<label>' . $row->{'title' . Lang::$lang} . $tootltip . $required . '</label>';
              $html .= '<div class="wojo fluid transparent input">';
			  $html .= '<input name="custom_' . $row->name . '" type="text" placeholder="' . $row->{'title' . Lang::$lang} . '" value="' . ($data['id'] ? $row->field_value : '') . '">';
              $html .= '</div>';
              $html .= '<div class="wojo basic divider"></div>';
              $html .= '</div>';
          }
		  unset($row);
          $html .= '</div>';

          break;
		  
      case "portfolio":
          foreach ($data['data'] as $i => $row) {
			  $is_url = (filter_var($row->field_value, FILTER_VALIDATE_URL)) ? '<a href="' . $row->field_value . '" target="_blank">' . $row->field_value . '</a>' : $row->field_value;
			  $html .= '<div class="item">';
			  $html .= '<div class="content shrink half-right-padding"><span class="wojo thick text">' . $row->{'title' . Lang::$lang} . ':</span></div>';
			  $html .= '<div class="content">' . $is_url;
			  $html .= '</div>';
			  $html .= '</div>';
		  }
		  unset($row);
          break;
		  
      case "digishop":
          foreach ($data['data'] as $i => $row) {
			  $is_url = (filter_var($row->field_value, FILTER_VALIDATE_URL)) ? '<a href="' . $row->field_value . '" target="_blank">' . $row->field_value . '</a>' : $row->field_value;
			  $html .= '<div class="item">';
			  $html .= '<div class="content shrink half-right-padding"><span class="wojo thick text">' . $row->{'title' . Lang::$lang} . ':</span></div>';
			  $html .= '<div class="content">' . $row->field_value;
			  $html .= '</div>';
			  $html .= '</div>';
		  }
		  unset($row);
          break;
  endswitch;
  echo $html;