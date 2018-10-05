<?php
/**
 * Main menu
 *
 * @copyright 2016
 * @version $Id: _mainmenu.tpl.php, v1.00 2016-05-05 10:12:05 gewa Exp $
 */
if (! defined ( "_WOJO" ))
	die ( 'Direct access to this location is not allowed.' );
?>


<header>

	<div class="destop-header">
		<div class="menu-btn">
			<a href="javascript:;"><i class="fa fa-bars" aria-hidden="true"></i></a>
		</div>
		<div class="container">

			<div class="white-bg header-inner">

				<div class="logo-header">
					<a class="navbar-brand" href="/"> <img class="logo"
						src="/assets/images/logo.png" alt="logo" />
					</a>
				</div>
				<div class="ul-group">
					<ul class="nav navbar-nav hidden-xs">
						<li class="dropdown"><a href="#" data-toggle="dropdown"
							class="dropdown-toggle"><?php echo Lang::$word->MEN_MAIN_SERVICE;?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/page/creative/"><?php echo Lang::$word->MEN_MAIN_CREATIVE;?></a></li>
								<li><a href="/page/content-video-production/"><?php echo Lang::$word->MEN_MAIN_CONTENTVIDEOPRODUCTION;?></a></li>
								<li><a href="/page/sem-social-media/"><?php echo Lang::$word->MEN_MAIN_SEMSOCIALMEDIA;?></li>
								<li><a href="/page/performance-marketing/"><?php echo Lang::$word->MEN_MAIN_PERFORMANCEMARKETING;?></a></li>
								<li><a href="/page/ppa-ppc/"><?php echo Lang::$word->MEN_MAIN_PPAPPC;?></a></li>
								<li><a href="/page/data-utilization/"><?php echo Lang::$word->MEN_MAIN_DATAUTILIZATION;?></a></li>
								<li><a href="/page/influencer-marketing/"><?php echo Lang::$word->MEN_MAIN_INFLUNCERMARKETING;?></a></li>
								<li><a href="/page/telesale-call-center-services/"><?php echo Lang::$word->MEN_MAIN_TELESALECALLCENTERSERVICES;?></a></li>
								<li><a href="/page/lead-generation-management/"><?php echo Lang::$word->MEN_MAIN_LEADGENERATIONMANAGEMENT;?></a></li>
								<li><a href="/page/about-us/"><?php echo Lang::$word->MEN_MAIN_ABOUTUS;?></a></li>
								<li><a href="/page/join-us/"><?php echo Lang::$word->MEN_MAIN_JOINUS;?></a></li>
							</ul></li>
						<li><a href="/page/account/"><?php echo Lang::$word->MEN_MAIN_USERLOGIN;?></a></li>
						<li><a href="/page/account/"><?php echo Lang::$word->MEN_MAIN_CLIENTLOGIN;?></a></li>
					</ul>
					<ul class="cm-ul hidden-md hidden-sm hidden-lg">
						<li><a href="#"><img src="/assets/images/user.png" /></a></li>
					</ul>
					<ul class="cm-ul">
						<li><a href="mailto:someone@example.com"><img
								src="/assets/images/mail-icon.png" /></a></li>
					</ul>
					<ul class="cm-ul">
						<li><a href="#search"><img src="/assets/images/search-icon.png" /></a></li>
					</ul>
					<ul class="cm-ul">
						<li><select class="selectpicker" data-width="fit" onchange="changeLanguage(this);">
								
								<option data-value="en" <?php if(Core::$language=="en"){echo("selected");} if(Core::$language==""){echo("selected");}?>  data-content='<span  class="flag-icon flag-icon-us"></span>
									EN'>EN
								</option>
								<option data-value="vn" <?php if(Core::$language=="vn")echo("selected");?>  data-content='<span  class="flag-icon flag-icon-vn"></span>
									VN'>VN
								</option>
								<option data-value="jp" <?php if(Core::$language=="jp")echo("selected");?>  data-content='<span  class="flag-icon flag-icon-jp"></span>
									JP'>JP
								</option>
								</select>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="mobile-header">

		<div class="container">

			<div class="white-bg header-inner">
				<div class="col-xs-3">
					<div class="menu-btn-1">
						<a href="javascript:;"><i class="fa fa-bars" aria-hidden="true"></i></a>
					</div>
				</div>
				<div class="logo-header col-xs-6">
					<a class="navbar-brand" href="/"> <img class="logo"
						src="/assets/images/logo.png" alt="logo" />
					</a>
				</div>
				<div class="ul-group col-xs-3">
					<ul class="cm-ul">
						<li><select class="selectpicker" data-width="fit" onchange="changeLanguage(this);">
						
								<option <?php if(Core::$language=="en"){echo("selected");} if(Core::$language==""){echo("selected");}?>  data-value="en"  data-content='<span  class="flag-icon flag-icon-us"></span>
									EN'>EN
								</option>
								<option <?php if(Core::$language=="vn")echo("selected");?> data-value="vn"  data-content='<span  class="flag-icon flag-icon-vn"></span>
									VN'>VN
								</option>
								<option <?php if(Core::$language=="jp")echo("selected");?> data-value="jp"  data-content='<span  class="flag-icon flag-icon-jp"></span>
									JP'>JP
								</option>

						</select></li>
					</ul>
				</div>
				<div class="ul-group-home-xs col-xs-12">
					<ul>
						<li><a href="/page/account/"><?php echo Lang::$word->MEN_MAIN_USERLOGIN;?></a></li>
						<li><a href="/page/account/"><?php echo Lang::$word->MEN_MAIN_CLIENTLOGIN;?></a></li>
					</ul>


				</div>
			</div>
		</div>
	</div>

</header>