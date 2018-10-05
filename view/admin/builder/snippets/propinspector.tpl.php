<?php
  /**
   * Properties
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: propinspector.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div id="propInspector" class="clearfix">
  <div class="header">Property Inspector <a class="closeInspector"><i class="icon delete"></i></a> </div>
  <div class="element-head">Element</div>
  <div class="content"> 
    <!-- Colors -->
    <div class="wojo prop accordion" id="propColor">
      <div class="title active"> Colors <i class="dropdown icon"></i></div>
      <div class="content active">
        <div id="colorList" class="wojo relaxed divided list middle aligned">
          <div id="text-color" class="item">
            <div class="right floated content"> <a class="wojo circular small empty label text-color" style="background:#cccccc"></a> </div>
            <div class="content">Text Color</div>
          </div>
          <div id="background-color" class="item">
            <div class="right floated content"> <a class="wojo circular small empty label background-color" style="background:#cccccc"></a> </div>
            <div class="content">Background Color</div>
          </div>
          <div id="border-color" class="item">
            <div class="right floated content"> <a class="wojo circular small empty label border-color" style="background:#cccccc"></a> </div>
            <div class="content">Border Color</div>
            <input id="border-color-alt" type="hidden" name="border-color" value="#000000">
          </div>
        </div>
      </div>
    </div>
    <!-- Size -->
    <div class="wojo prop accordion" id="propSize">
      <div class="title"> Size <i class="dropdown icon"></i></div>
      <div class="content">
        <div id="sizeList">
          <div id="icon-size" class="clearfix item"> <a data-size="" class="md-icon-size">Default</a> <a data-size="tiny" class="md-icon-size">Tiny</a> <a data-size="small" class="md-icon-size">Small</a> <a data-size="large" class="md-icon-size">Large</a> <a data-size="big" class="md-icon-size">Big</a> <a data-size="huge" class="md-icon-size">Huge</a> <a data-size="massive" class="md-icon-size">Massive</a> <a data-size="gigantic" class="md-icon-size">Gigantic</a> </div>
          <div id="icon-types" class="clearfix item"> <a class="mini wojo basic fluid button wbuilder">Replace Icon</a> </div>
        </div>
      </div>
    </div>
    <!-- Border -->
    <div class="wojo prop accordion" id="propBorder">
      <div class="title"> Border Radius<i class="dropdown icon"></i></div>
      <div class="content active">
        <div id="borderList">
          <div class="half-padding">
            <div class="wojo bold text">All Corners</div>
            <input id="all-border-corners" data-range='{"step":1,"from":0, "to":100, "showScale":false, "format": "%spx"}' type="hidden" name="all" value="0" class="rangeslider">
          </div>
          <div class="wojo double divider"></div>
          <div class="half-padding">
            <div class="wojo bold text">Top Left</div>
            <input id="border-topLeft" data-range='{"step":1,"from":0, "to":100, "showScale":false, "format": "%spx"}' type="hidden" name="borderTopLeftRadius" value="0" class="rangeslider">
          </div>
          <div class="half-padding">
            <div class="wojo bold text">Top Right</div>
            <input id="border-topRight" data-range='{"step":1,"from":0, "to":100, "showScale":false, "format": "%spx"}' type="hidden" name="borderTopRightRadius" value="0" class="rangeslider">
          </div>
          <div class="half-padding">
            <div class="wojo bold text">Bottom Left</div>
            <input id="border-bottomLeft" data-range='{"step":1,"from":0, "to":100, "showScale":false, "format": "%spx"}' type="hidden" name="borderBottomLeftRadius" value="0" class="rangeslider">
          </div>
          <div class="half-padding">
            <div class="wojo bold text">Bottom Right</div>
            <input id="border-bottomRight" data-range='{"step":1,"from":0, "to":100, "showScale":false, "format": "%spx"}' type="hidden" name="borderBottomRightRadius" value="0" class="rangeslider">
          </div>
          <div class="half-padding">
            <div class="wojo bold text">Border Width</div>
            <input id="border-width" data-range='{"step":1,"from":0, "to":100, "showScale":false, "format": "%spx"}' type="hidden" name="borderWidth" value="0" class="rangeslider">
          </div>
          <div class="half-padding">
            <div class="wojo bold text">Border Style</div>
            <div class="content-center half-top-padding">
              <select id="border-style" class="wojo fluid small dropdown">
                <option value="solid">Solid</option>
                <option value="dotted">Dotted</option>
                <option value="dashed">Dashed</option>
                <option value="double">Double</option>
                <option value="none">None</option>
              </select>
            </div>
          </div>
          <div class="half-padding"><a id="border-reset" class="wojo mini basic fluid button wbuilder">Reset Border</a> </div>
        </div>
      </div>
    </div>
    
    <!-- Shadows -->
    <div class="wojo prop accordion" id="propShadow">
      <div class="title"> Box Shadow <i class="dropdown icon"></i></div>
      <div class="content">
        <div id="shadowList" class="half-padding">
          <div class="row phone-block-1 tablet-block-2 screen-block-3 gutters content-center">
            <div class="column">
              <div class="item" data-shadow="1" style="box-shadow: 0 10px 6px -6px #777;">1</div>
            </div>
            <div class="column">
              <div class="item" data-shadow="2" style="box-shadow: 0 2px 1px #777;">2</div>
            </div>
            <div class="column">
              <div class="item" data-shadow="3" style="box-shadow: 0 1px 5px rgba(0, 0, 0, 0.15);">3</div>
            </div>
            <div class="column">
              <div class="item" data-shadow="4" style="box-shadow: 0 0 4px 1px rgba(0, 0, 0, 0.3);">4</div>
            </div>
            <div class="column">
              <div class="item" data-shadow="5" style="box-shadow: 0 0 1px rgba(34, 25, 25, 0.4);">5</div>
            </div>
            <div class="column">
              <div class="item" data-shadow="6" style="box-shadow: 0 1px #FFFFFF inset, 0 1px 3px rgba(34, 25, 25, 0.4);">6</div>
            </div>
            <div class="column">
              <div class="item" data-shadow="7" style="box-shadow: 0 4px 2px -3px;">7</div>
            </div>
            <div class="column">
              <div class="item" data-shadow="8" style="box-shadow: 0 1px 5px rgba(0, 0, 0, 0.15);border-bottom: 1px solid rgba(0, 0, 0, 0.2);">8</div>
            </div>
            <div class="column">
              <div class="item" data-shadow="9" style="box-shadow: 0 1px 5px rgba(0, 0, 0, 0.46);">9</div>
            </div>
            <div class="column">
              <div class="item" data-shadow="10" style="box-shadow: 0 7px 4px #777">10</div>
            </div>
            <div class="column">
              <div class="item" data-shadow="11" style="box-shadow: 0 3px 2px #777;">11</div>
            </div>
            <div class="column">
              <div class="item" data-shadow="12" style="box-shadow: 0 0.5px 0 0 #ffffff inset, 0 1px 2px 0 #B3B3B3;">12</div>
            </div>
            <div class="column">
              <div class="item" data-shadow="13" style="box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;">13</div>
            </div>
            <div class="column">
              <div class="item" data-shadow="14" style="box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12) inset;">14</div>
            </div>
            <div class="column">
              <div class="item" data-shadow="15" style="box-shadow: 0 1px 1px 0 #C7C7C7 inset;">15</div>
            </div>
          </div>
          <div class="half-padding"><a id="shadow-reset" class="wojo mini basic fluid button wbuilder">Reset Box Shadow</a> </div>
        </div>
      </div>
    </div>
    
    <!-- Padding -->
    <div class="wojo prop accordion" id="propPadding">
      <div class="title active"> Padding <i class="dropdown icon"></i></div>
      <div class="content active">
        <div id="paddingList">
          <div class="half-padding">
            <div class="wojo bold text">All Corners</div>
            <input id="all-padding-corners" data-range='{"step":1,"from":0, "to":200, "showScale":false, "format": "%spx"}' type="hidden" name="all" value="0" class="rangeslider">
          </div>
          <div class="wojo double divider"></div>
          <div class="half-padding">
            <div class="wojo bold text">Top</div>
            <input id="paddingTop" data-range='{"step":1,"from":0, "to":200, "showScale":false, "format": "%spx"}' type="hidden" name="paddingTop" value="0" class="rangeslider">
          </div>
          <div class="half-padding">
            <div class="wojo bold text">Bottom</div>
            <input id="paddingBottom" data-range='{"step":1,"from":0, "to":200, "showScale":false, "format": "%spx"}' type="hidden" name="paddingBottom" value="0" class="rangeslider">
          </div>
          <div class="half-padding">
            <div class="wojo bold text">Left</div>
            <input id="paddingLeft" data-range='{"step":1,"from":0, "to":200, "showScale":false, "format": "%spx"}' type="hidden" name="paddingLeft" value="0" class="rangeslider">
          </div>
          <div class="half-padding">
            <div class="wojo bold text">Right</div>
            <input id="paddingRight" data-range='{"step":1,"from":0, "to":200, "showScale":false, "format": "%spx"}' type="hidden" name="paddingRight" value="0" class="rangeslider">
          </div>
          <div class="half-padding item"> <a class="wojo mini basic fluid button wbuilder padding-reset">Reset Padding</a> </div>
        </div>
      </div>
    </div>
    
    <!-- Row Margin -->
    <div class="wojo prop accordion" id="propMargin">
      <div class="title active"> Row Margin <i class="dropdown icon"></i></div>
      <div class="content active">
        <div class="half-padding">
          <div id="mButtons" class="wojo selection divided flex list align-middle">
            <div class="item">
              <div class="content">
                <div class="wojo small checkbox slider sizenone">
                  <input name="gridsize" type="radio" value="none">
                  <label>None</label>
                </div>
              </div>
              <div class="content shrink"><span class="wojo tiny basic label">0px</span></div>
            </div>
            <div class="item">
              <div class="content">
                <div class="wojo small checkbox slider sizehalf">
                  <input name="gridsize" type="radio" value="half">
                  <label>Half</label>
                </div>
              </div>
              <div class="content shrink"><span class="wojo tiny basic label">16px</span></div>
            </div>
            <div class="item">
              <div class="content">
                <div class="wojo small checkbox slider sizefull">
                  <input name="gridsize" type="radio" value="full">
                  <label>Full</label>
                </div>
              </div>
              <div class="content shrink"><span class="wojo tiny basic label">32px</span></div>
            </div>
            <div class="item">
              <div class="content">
                <div class="wojo small checkbox slider sizedouble">
                  <input name="gridsize" type="radio" value="double">
                  <label>Double</label>
                </div>
              </div>
              <div class="content shrink"><span class="wojo tiny basic label">64px</span></div>
            </div>
            <div class="item">
              <div class="content">
                <div class="wojo small checkbox slider typevertical">
                  <input name="gridtype" type="radio" value="vertical">
                  <label>Vertical</label>
                </div>
              </div>
              <div class="content shrink"><span class="wojo tiny fitted icon basic label"><i class="icon arrows vertical"></i></span></div>
            </div>
            <div class="item">
              <div class="content">
                <div class="wojo small checkbox slider typehorizontal">
                  <input name="gridtype" type="radio" value="horizontal">
                  <label>Horizontal</label>
                </div>
              </div>
              <div class="content shrink"><span class="wojo tiny fitted icon basic label"><i class="icon arrows horizontal"></i></span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Background -->
    <div class="wojo prop accordion" id="propBackground">
      <div class="title active"> Background <i class="dropdown icon"></i></div>
      <div class="content active">
        <div class="half-padding">
          <div id="bgimage"><i class="icon large black photo"></i></div>
          <div class="wojo mini basic fluid buttons"> <a id="changeBg" class="wojo button wbuilder">Change</a> <a id="clearBg" class="wojo button wbuilder">Clear</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>