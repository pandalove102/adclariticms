<?php
  /**
   * Sidebar
   *
   * @package Wojo Framework
   * @author wojoscripts.com
   * @copyright 2016
   * @version $Id: sidebar.tpl.php, v1.00 2016-01-08 10:12:05 gewa Exp $
   */
  if (!defined("_WOJO"))
      die('Direct access to this location is not allowed.');
?>
<div id="sidebar" class="aside">
  <div class="wojo styled accordion">
    <div class="title"> <i class="dropdown icon"></i> Grid Layout</div>
    <div class="content">
      <div class="row half-gutters screen-block-3 tablet-block-3 content-center">
        <div class="column">
          <div class="grids button" data-content="One Column"> <img data-text="One Column" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/row.png"/>
            <div class="hidden">
              <div class="wojo-grid">
                <div class="row gutters">
                  <div class="columns"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="grids button" data-content="Two Column"> <img data-text="Two Columns" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/twocols.png"/>
            <div class="hidden">
              <div class="wojo-grid">
                <div class="row gutters">
                  <div class="columns screen-50 tablet-50 mobile-100 phone-100"></div>
                  <div class="columns screen-50 tablet-50 mobile-100 phone-100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="grids button" data-content="Three Column"> <img data-text="Three Columns" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/threecols.png"/>
            <div class="hidden">
              <div class="wojo-grid">
                <div class="row gutters screen-block-3 tablet-block-3 tablet-block-1 phone-block-1">
                  <div class="columns"></div>
                  <div class="columns"></div>
                  <div class="columns"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="grids button" data-content="Four Column"> <img data-text="Four Columns" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/fourcols.png"/>
            <div class="hidden">
              <div class="wojo-grid">
                <div class="row gutters">
                  <div class="columns screen-25 tablet-50 mobile-50 phone-100"></div>
                  <div class="columns screen-25 tablet-50 mobile-50 phone-100"></div>
                  <div class="columns screen-25 tablet-50 mobile-50 phone-100"></div>
                  <div class="columns screen-25 tablet-50 mobile-50 phone-100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="grids button" data-content="Five Column"> <img data-text="Five Columns" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/fivecols.png"/>
            <div class="hidden">
              <div class="wojo-grid">
                <div class="row gutters screen-block-5 tablet-block-3 mobile-block-2 phone-block-1">
                  <div class="columns"></div>
                  <div class="columns"></div>
                  <div class="columns"></div>
                  <div class="columns"></div>
                  <div class="columns"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="grids button" data-content="Three - Seven"> <img data-text="Three - Seven" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/threeseven.png"/>
            <div class="hidden">
              <div class="wojo-grid">
                <div class="row gutters">
                  <div class="columns screen-30 tablet-40 mobile-50 phone-100"></div>
                  <div class="columns screen-70 tablet-60 mobile-50 phone-100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="grids button" data-content="Seven - Three"> <img data-text="Seven - Three" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/seventhree.png"/>
            <div class="hidden">
              <div class="wojo-grid">
                <div class="row gutters">
                  <div class="columns screen-70 tablet-60 mobile-50 phone-100"></div>
                  <div class="columns screen-30 tablet-40 mobile-50 phone-100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="grids button" data-content="Two - Six - Two"> <img data-text="Two - Six - Two" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/twosixtwo.png"/>
            <div class="hidden">
              <div class="wojo-grid">
                <div class="row gutters">
                  <div class="columns screen-20 tablet-30 mobile-30 phone-100"></div>
                  <div class="columns screen-60 tablet-40 mobile-40 phone-100"></div>
                  <div class="columns screen-20 tablet-30 mobile-30 phone-100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="title"> <i class="dropdown icon"></i> Elements </div>
    <div class="content">
      <div class="row half-gutters screen-block-3 tablet-block-3 content-center">
        <div class="column">
          <div class="elements button" data-content="Paragraph"> <img data-text="Paragraph" data-element="text" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/paragraph.png"/>
            <div class="hidden">
              <div class="column-wrap">
                <div class="column-dummy">
                  <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="elements button" data-content="Heading 1"> <img data-text="H1" data-element="text" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/h1.png"/>
            <div class="hidden">
              <div class="column-wrap">
                <div class="column-dummy">
                  <h1>Start Building Your Success With CMS pro</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="elements button" data-content="Heading 2"> <img data-text="H2" data-element="text" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/h2.png"/>
            <div class="hidden">
              <div class="column-wrap">
                <div class="column-dummy">
                  <h2>Start Building Your Success With CMS pro</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="elements button" data-content="Heading 3"> <img data-text="H3" data-element="text" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/h3.png"/>
            <div class="hidden">
              <div class="column-wrap">
                <div class="column-dummy">
                  <h3>Start Building Your Success With CMS pro</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="elements button" data-content="Button"> <img data-text="Button" data-element="button" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/button.png"/>
            <div class="hidden">
              <div class="column-wrap">
                <div class="column-dummy"> <a href="#" data-element="button" class="wojo button">Button</a> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="elements button" data-content="Image"> <img data-text="Button" data-element="image" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/image.png"/>
            <div class="hidden">
              <div class="column-wrap">
                <div class="column-dummy"> <img data-element="image" src="<?php echo ADMINVIEW;?>/builder/images/blank.png"> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="elements button" data-content="Video"> <img data-text="Video" data-element="video" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/video.png"/>
            <div class="hidden" data-set='{"type": "iframe", "frame":"//www.youtube.com/embed/P5yHEKqx86U?rel=0"}'>
              <div class="column-wrap">
                <div class="column-dummy">
                  <div class="flex-video">
                    <iframe width="560" height="315"  src="" frameborder="0" allowfullscreen=""></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="elements button" data-content="Map"> <img data-text="Map" data-element="map" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/map.png"/>
            <div class="hidden" data-set='{"type": "iframe", "frame":"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d184551.80858352187!2d-79.51814095306693!3d43.71840381095162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb90d7c63ba5%3A0x323555502ab4c477!2sToronto%2C+ON!5e0!3m2!1sen!2sca!4v1464526128333"}'>
              <div class="column-wrap">
                <div class="column-dummy">
                  <div class="flex-video">
                    <iframe width="100%" height="400" frameborder="0" class="mg1" src=""></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="elements button" data-content="Map"> <img data-text="Soundcloud" data-element="map" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/soundcloud.png"/>
            <div class="hidden" data-set='{"type": "iframe", "frame":"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/80565671&amp;auto_play=false&amp;visual=true"}'>
              <div class="column-wrap">
                <div class="column-dummy">
                  <div class="flex-video">
                    <iframe width="100%" height="450" scrolling="no" frameborder="no" src=""></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="elements button" data-content="Divider"> <img data-text="Divider" data-element="text" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/smalldivider.png"/>
            <div class="hidden">
              <div class="column-wrap">
                <div class="column-dummy">
                  <div class="wojo space divider"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="elements button" data-content="Big Divider"> <img data-text="Divider" data-element="text" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/bigdivider.png"/>
            <div class="hidden">
              <div class="column-wrap">
                <div class="column-dummy">
                  <div class="wojo big space divider"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="elements button" data-content="Huge Divider"> <img data-text="Divider" data-element="text" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/hugedivider.png"/>
            <div class="hidden">
              <div class="column-wrap">
                <div class="column-dummy">
                  <div class="wojo huge space divider"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="column">
          <div class="elements button" data-content="Contact Form"> <img data-text="Contact Form" data-element="text" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/contactform.png"/>
            <div class="hidden">
              <div class="column-wrap">
                <div class="column-dummy">
<div id="newPlugin_70001" data-mode="readonly" data-plugin-id="0" data-plugin-plugin_id="0" data-plugin-name="contact" data-plugin-alias="contact" data-plugin-group="contact">
  <?php require_once(FPLUGPATH . 'contact/index.tpl.php');?>
</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="title"> <i class="dropdown icon"></i> User Plugins </div>
    <div class="content">
      <?php if($this->plugins):?>
      <?php foreach($this->plugins as $row):?>
      <?php if(!$row->plugalias):?>
      <div class="elements button uplugin" data-content="<?php echo $row->title;?>" data-text="<?php echo Validator::truncate($row->title, 25);?>"> <?php echo Validator::truncate($row->title, 25);?>
        <div class="hidden">
          <div class="column-wrap">
            <div class="column-dummy">
              <div class="wojo plugin segment<?php if($row->alt_class):?> <?php echo $row->alt_class;?><?php endif;?>">
                <?php if($row->show_title):?>
                <h3><?php echo $row->title;?></h3>
                <?php endif;?>
                <?php echo Url::out_url($row->body);?> 
                <?php if($row->jscode):?>
                <script><?php echo $row->jscode;?></script>
                <?php endif;?>
                </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif;?>
      <?php endforeach;?>
      <?php endif;?>
    </div>
    <div class="title"> <i class="dropdown icon"></i> Intros </div>
    <div class="content"> 
      <!--Intro 0-->
      <div class="sections"> <img data-text="Section" data-element="section" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/sections/emptysection.jpg" alt=""/>
        <div class="hidden">
          <div class="section">
            <div class="row">
              <div class="columns"> </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--Intro 1-->
      <div class="sections"> <img data-text="Section" data-element="section" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/sections/intro1.jpg" alt=""/>
        <div class="hidden">
          <div class="section" style="background-image: url(<?php echo UPLOADURL;?>/images/intro1.jpg);background-size: cover;padding: 100px 0px 100px 0px;">
            <div class="wojo-grid">
              <div class="row">
                <div class="columns">
                  <h1 class="content-center wojo white text">Ultimate Blocks helps businesses like yours to achieve long-term success. </h1>
                  <p class="vertical-margin content-center wojo white text">Drag &amp; Drop HTML Page Builder</p>
                  <div class="content-center vertical-margin"> <a class="wojo white button" href="#"> <i class="icon basket"></i> Buy Now</a> <a class="white" href="#">Explore Our Product</a> </div>
                  <p class="double-vertical-padding content-center"><i class="icon circular inverted bell"></i></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Intro 2-->
      <div class="sections"> <img data-text="Section" data-element="section" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/sections/intro2.jpg" alt=""/>
        <div class="hidden" data-set='{"type": "iframe", "frame":"https://player.vimeo.com/video/146742515"}'>
          <div class="section" style="background-image: url(<?php echo UPLOADURL;?>/images/intro2.jpg);background-size: cover;padding: 100px 0px 100px 0px;">
            <div class="wojo-grid">
              <div class="row gutters">
                <div class="columns screen-content-right phone-content-center screen-50 tablet-50 mobile-100 phone-100">
                  <h1 class="wojo white text">Usability. Design. Reuse.</h1>
                  <p class="wojo bold white text">Save Up</p>
                  <p class="wojo white big bold text">40% OFF</p>
                  <p class="vertical-margin wojo white text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                  <a class="wojo positive button" href="#">Shop Now</a> </div>
                <div class="columns screen-50 tablet-50 mobile-100 phone-100">
                  <div class="flex-video">
                    <iframe width="100%" height="100%" scrolling="no" frameborder="no" src=""></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Intro 3-->
      <div class="sections"> <img data-text="Section" data-element="section" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/sections/intro3.jpg" alt=""/>
        <div class="hidden">
          <div class="section" style="background-image: url(<?php echo UPLOADURL;?>/images/intro3.jpg);background-size: cover;padding: 100px 0px 100px 0px;">
            <div class="wojo-grid">
              <div class="row gutters">
                <div class="columns screen-50 tablet-50 mobile-100 phone-100">
                  <h1 class="wojo white text">CMS PRO</h1>
                  <p class="vertical-margin wojo white large text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                  <a class="wojo basic inverted rounded button" href="#">Login</a> <a class="wojo pink rounded button" href="#">Register</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Intro 4-->
      <div class="sections"> <img data-text="Section" data-element="section" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/sections/intro4.jpg" alt=""/>
        <div class="hidden">
          <div class="section" style="background-image: url(<?php echo UPLOADURL;?>/images/intro4.jpg);background-size: cover;padding: 200px 0px 200px 0px;">
            <div class="wojo-grid">
              <div class="row gutters">
                <div class="columns content-center">
                  <h1 class="wojo white bold text" style="letter-spacing:5px"><span style="color: #3FC59D;">M</span>USCLE <span style="color: #3FC59D;">B</span>UILD <span style="color: #3FC59D;">D</span>IET</h1>
                  <p class="vertical-margin wojo white thin text" style="letter-spacing:10px">GYM CENTER &amp; FITNESS</p>
                  <a class="wojo positive button" href="#">LEARN MORE</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Intro 5-->
      <div class="sections"> <img data-text="Section" data-element="section" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/sections/intro5.jpg" alt=""/>
        <div class="hidden">
          <div class="section" style="background-image: url(<?php echo UPLOADURL;?>/images/intro5.jpg);background-size: cover;min-height:600px;">
            <div class="wojo-grid">
              <div class="row gutters">
                <div class="columns content-center">
                  <h1 class="wojo bold text">Like a Boss</h1>
                  <p class="vertical-margin wojo text">All the Lorem Ipsum generators on the Internet tend to<br>
                    repeat predefined chunks as necessary.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Intro 6-->
      <div class="sections"> <img data-text="Section" data-element="section" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/sections/intro6.jpg" alt=""/>
        <div class="hidden">
          <div class="section" style="background-image: url(<?php echo UPLOADURL;?>/images/intro6.jpg);background-size: cover;padding: 100px 0px 100px 0px;">
            <div class="wojo-grid">
              <div class="row gutters">
                <div class="columns content-center">
                  <h1 class="wojo white text">Your perfect tool for making<br>
                    websites without coding.</h1>
                  <p class="vertical-margin wojo white text">All the Lorem Ipsum generators on the Internet tend<br>
                    to repeat predefined chunks as necessary.</p>
                  <p class="vertical-margin"><a class="wojo basic positive rounded button"><i class="icon white play"></i> Watch Video</a></</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--Content 1-->
      <div class="sections"> <img data-text="Section" data-element="section" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/sections/content1.jpg" alt=""/>
        <div class="hidden">
          <div class="section" style="background-color:#7cb342;background-image: url(<?php echo UPLOADURL;?>/images/content1.jpg); background-repeat: no-repeat;background-position: 100% 50%;background-size: 50% auto;padding:50px 0px 50px 0px;">
            <div class="wojo-grid">
              <div class="row horizontal-gutters">
                <div class="columns screen-50 tablet-50 mobile-100 phone-100">
                  <h3 class="wojo white text">WE LOVE CMS PRO</h3>
                  <p class="vertical-margin wojo white text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                  <p class="vertical-margin wojo white text content-right">Made with <i class="icon heart"></i> for you.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--Content 2-->
      <div class="sections"> <img data-text="Section" data-element="section" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/sections/content2.jpg" alt=""/>
        <div class="hidden">
          <div class="section" style="background-color:#335695;padding:30px 0px 30px 0px;">
            <div class="wojo-grid">
              <div class="row">
                <div class="columns">
                  <h3 class="wojo caps white text content-center">Want to join our team</h3>
                </div>
              </div>
              <div class="row gutters align-middle">
                <div class="columns screen-70">
                  <p class="vertical-margin wojo white text" style="border-left:2px solid #fff; padding-left:32px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>
                </div>
                <div class="columns"><a class="wojo basic inverted rounded button"><span class="wojo caps text">Contact Us</span></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--Content 3-->
      <div class="sections"> <img data-text="Section" data-element="section" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/sections/content3.jpg" alt=""/>
        <div class="hidden">
          <div class="section">
            <div class="wojo-grid">
              <div class="row gutters">
                <div class="columns">
                  <div class="wojo icon message"> <i class="icon large circular black inverted users"></i>
                    <div class="content">
                      <div class="header wojo caps text"> Experience </div>
                      <p>It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                    </div>
                  </div>
                </div>
                <div class="columns">
                  <div class="wojo icon message"> <i class="icon large circular black inverted wand"></i>
                    <div class="content">
                      <div class="header wojo caps text"> Retouch Images </div>
                      <p>It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row gutters">
                <div class="columns">
                  <div class="wojo icon message"> <i class="icon large circular black inverted heart"></i>
                    <div class="content">
                      <div class="header wojo caps text"> We Love Our Clients </div>
                      <p>It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                    </div>
                  </div>
                </div>
                <div class="columns">
                  <div class="wojo icon message"> <i class="icon large circular black inverted crop"></i>
                    <div class="content">
                      <div class="header wojo caps text"> Crop </div>
                      <p>It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row gutters">
                <div class="columns">
                  <div class="wojo icon message"> <i class="icon large circular black inverted cup"></i>
                    <div class="content">
                      <div class="header wojo caps text"> Cup Painting </div>
                      <p>It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                    </div>
                  </div>
                </div>
                <div class="columns">
                  <div class="wojo icon message"> <i class="icon large circular black inverted photo"></i>
                    <div class="content">
                      <div class="header wojo caps text"> Photo Albums </div>
                      <p>It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--Content 4-->
      <div class="sections"> <img data-text="Section" data-element="section" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/sections/content4.jpg" alt=""/>
        <div class="hidden">
          <div class="section">
            <div class="wojo-grid">
              <div class="row">
                <div class="columns screen-50 tablet-50 mobile-100 phone-100">
                  <div class="wojo basic fitted segment" style="background-image: url(<?php echo UPLOADURL;?>/images/content4_1.jpg);background-size: cover;">
                    <div style="background-color: rgba(231, 76, 60, 0.8);">
                      <div class="wojo icon basic inverted message" style="background-color:rgba(0, 0, 0, 0.1);"> <i class="icon large hourglass"></i>
                        <div class="content">
                          <div class="header"> Just one second </div>
                          <p>We're fetching that content for you.</p>
                        </div>
                      </div>
                      <p class="wojo white text half-padding"> It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                      <p class="half-padding"><a href="#" class="wojo small white text">Read more +</a></p>
                    </div>
                  </div>
                </div>
                <div class="columns screen-50 tablet-50 mobile-100 phone-100">
                  <div class="wojo basic fitted segment" style="background-image: url(<?php echo UPLOADURL;?>/images/content4_2.jpg);background-size: cover;">
                    <div style="background-color: rgba(98, 177, 81, 0.8);">
                      <div class="wojo icon basic inverted message" style="background-color:rgba(0, 0, 0, 0.1);"> <i class="icon large email"></i>
                        <div class="content">
                          <div class="header"> Have you heard about our mailing list?</div>
                          <p>Get the best news in your e-mail every day.</p>
                        </div>
                      </div>
                      <p class="wojo white text half-padding"> It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                      <p class="half-padding"><a href="#" class="wojo small white text">Read more +</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--Content 5-->
      <div class="sections"> <img data-text="Section" data-element="section" class="wojo basic image" src="<?php echo ADMINVIEW;?>/builder/images/sections/content5.jpg" alt=""/>
        <div class="hidden">
          <div class="section">
            <div class="wojo-grid">
              <div class="row gutters">
                <div class="columns">
                  <h1>CMS PRO Building Blocks</h1>
                  <p class="wojo caps text"><a href="">Starter Kit</a></p>
                  <div class="wojo icon basic message"> <i class="icon big bordered inverted line chart align-self-top"></i>
                    <div class="content">
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                      <ul class="wojo list">
                        <li>List Item 1</li>
                        <li>List Item 2</li>
                        <li>List Item 3</li>
                        <li>List Item 4</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="columns">
                  <div class="wojo icon basic message"> <i class="icon large bordered inverted hourglass align-self-top"></i>
                    <div class="content">
                      <div class="header wojo caps text"> Building Blocks </div>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum.</p>
                    </div>
                  </div>
                  <div class="wojo icon basic message"> <i class="icon large bordered inverted bookmark align-self-top"></i>
                    <div class="content">
                      <div class="header wojo caps text"> Building Blocks </div>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Plugins -->
    <div class="title"> <i class="dropdown icon"></i> Plugins </div>
    <div id="cPlugins" class="content">
      <?php if($this->plugins):?>
      <div class="row half-gutters phone-block-1 tablet-block-2 screen-block-3 content-center">
        <?php foreach($this->plugins as $row):?>
        <?php if($row->plugalias):?>
        <div class="column">
          <div id="plg_<?php echo $row->id;?>" class="pluginlist button" data-content="<?php echo htmlspecialchars($row->title);?>"> <img data-text="<?php echo htmlspecialchars($row->title);?>" data-element="plugin" src="<?php echo APLUGINURL . $row->icon;?>"/>
            <div class="phidden">
              <div class="column-wrap">
                <div class="column-dummy">
                  <div id="newPlugin_<?php echo $row->id;?>" data-mode="readonly" data-plugin-id="<?php echo $row->id;?>" data-plugin-plugin_id="<?php echo $row->plugin_id;?>" data-plugin-name="<?php echo htmlspecialchars($row->title);?>" data-plugin-alias="<?php echo $row->plugalias;?>" data-plugin-group="<?php echo $row->groups;?>">
                    <p class="wojo bold text content-center">::<?php echo $row->title;?>::</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endif;?>
        <?php endforeach;?>
      </div>
      <?php endif;?>
    </div>
    
    <!--Modules -->
    <div class="title"> <i class="dropdown icon"></i> Modules </div>
    <div id="cModules" class="content">
      <?php if($this->modules):?>
      <div class="row half-gutters phone-block-1 tablet-block-2 screen-block-3 content-center">
        <?php foreach($this->modules as $row):?>
        <?php $group = explode("/", $row->modalias);?>
        <div class="column">
          <div id="mod_<?php echo $row->id;?>" class="modulelist button" data-content="<?php echo htmlspecialchars($row->title);?>"> <img data-text="<?php echo htmlspecialchars($row->title);?>" data-element="module" src="<?php echo AMODULEURL . $row->icon;?>"/>
            <div class="phidden">
              <div class="column-wrap">
                <div class="column-dummy">
                  <div id="newModule_<?php echo $row->id;?>" data-mode="readonly" data-module-id="<?php echo $row->parent_id;?>" data-module-module_id="<?php echo $row->id;?>" data-module-name="<?php echo htmlspecialchars($row->title);?>" data-module-alias="<?php echo $row->modalias;?>" data-module-group="<?php echo $group[0];?>">
                    <p class="wojo bold text content-center">::<?php echo $row->title;?>::</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>
      </div>
      <?php endif;?>
    </div>
  </div>
</div>
<?php
/*
      App::Session()->remove('debug-queries');
	  App::Session()->remove('debug-warnings');
	  App::Session()->remove('debug-errors');
	*/
	  ?>

