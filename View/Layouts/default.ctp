
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>TireCore</title>
        <?$path='/coreui/gebo_admin_1.6/'?>
        <link rel="stylesheet" href="/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="/css/blue.css" id="link_theme" />
        <!-- <link rel="stylesheet" href="<?=$path?>lib/jBreadcrumbs/css/BreadCrumb.css" />-->
        <link rel="stylesheet" href="/lib/qtip2/jquery.qtip.min.css" />
        <link rel="stylesheet" href="/lib/uniform/Aristo/uniform.aristo.css" />
        <link rel="stylesheet" href="/img/splashy/splashy.css" />
        <link rel="stylesheet" href="/css/style.css" />
        <link rel="stylesheet" href="/img/flags/flags.css" />
        <link rel="stylesheet" href="/lib/sticky/sticky.css" />
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
        <!-- only needed for forms -->
        <!-- end forms only -->
        <link rel="shortcut icon" href="favicon.ico" />
		<script>
			//* hide all elements & show preloader
			document.documentElement.className += 'js';
		</script>
        <base href="http://<?=$_SERVER['HTTP_HOST']?>/" target="_blank">
    </head>
    <body class="sidebar_right">
		<div id="loading_layer" style="display:none"><img src="/img/ajax_loader.gif" alt="" /></div>
		<div id="maincontainer" class="clearfix">
			<!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="/" target="_self"><i class="icon-home icon-white"></i> 
                                <?php 
                                if(is_array($user)){
                                    echo $user['Company']['name'].' / '.$user['Location']['name'];
                                }
                                ?>
                            </a>
                            <div class="pull-left" id="globalSearch">
                                <form action="/" class="input-append" method="post" >
                                    <input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Search..." /><button type="submit" class="btn" data-toggle="modal" data-backdrop="static" href="#searchResults"><i class="icon-search"></i></button>
                                </form>
                            </div>

                            <ul class="nav user_menu pull-right">
                                <li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix">
                                        <a data-toggle="modal" data-backdrop="static" href="#myNotifications" class="label ttip_b" title="New notifications">[<span id="new-notifications">0</span>] <i class="splashy-warning"></i></a>
                                        <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">[<span id="unread-mail">0</span>] <i class="splashy-mail_light"></i></a>
                                        <a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="New tasks">[<span id="new-tasks">0</span>] <i class="splashy-calendar_week"></i></a>
                                    </div>
                                </li>
								<li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    
                                    <?
                                    $language = array(
                                        'English'=>array('name'=>'English','flag'=>'flag-us'),
                                        'Spanish'=>array('name'=>'Español','flag'=>'flag-es'),
                                        'French'=>array('name'=>'Français','flag'=>'flag-fr')
                                    );
                                    ?>
                                    <? if($user['Language']['name']): ?>
                                    <a href="#" class="dropdown-toggle nav_condensed" data-toggle="dropdown"><i class="<?=$language[$user['Language']['name']]['flag']?>"></i> <b class="caret"></b></a>
                                    <? endif; ?>
                                    <ul class="dropdown-menu">
                                    <? foreach($language as $i): ?>
                                    <li><a href="javascript:void(0)"><i class="<?=$i['flag']?>"></i> <?=$i['name']?></a></li>
                                    <? endforeach; ?>
                                    </ul>
                                </li>
                                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="/img/user_avatar.png" alt="" class="user_avatar" /> <?=$user['first_name'].' '.$user['last_name']?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
										<!--<li><a href="/">Preferences</a></li>-->
                                        <!--<li><a href="/">Change Location</a></li>-->
										<li class="divider"></li>
										<li><a href="/users/logout" target="_self">Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
							<ul class="nav" id="mobile-nav">
								<li class="dropdown">
									<a data-toggle="modal" data-backdrop="static"  href="#mainNavigation"><i class="icon-th icon-white"></i> Menu <b class="caret"></b></a>
								</li>
							</ul>
                        </div>
                    </div>
                </div>
                
                <!-- MENU -->
                <?=$this->Element('/Layouts/menu')?>
                
                <div class="modal modal-big hide fade" id="searchResults">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3><small>Search results for</small> [search term]</h3>
                    </div>
                    <div class="modal-body">
                        <!-- example data -->
                        <div class="row-fluid search_page">
                            <div class="span12">
                                <div class="well clearfix">
                                    <div class="row-fluid">
                                        <div class="pull-left">Showing 1 - 20 of 204 Results</div>
                                        <div class="pull-right">
                                            <span class="sepV_c">
                                                Sort by:
                                                <select>
                                                    <option>Name</option>
                                                    <option>Date</option>
                                                    <option>Relevance</option>
                                                </select>
                                            </span>
                                            <span class="sepV_c">
                                                View:
                                                <select>
                                                    <option>12</option>
                                                    <option>25</option>
                                                    <option>50</option>
                                                </select>
                                            </span>
                                            <span class="result_view">
                                                <a href="javascript:void(0)" class="box_trgr sepV_b"><i class="icon-th-large"></i></a>
                                                <a href="javascript:void(0)" class="list_trgr"><i class="icon-align-justify"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="search_panel clearfix">
                                    <div class="search_item clearfix">
                                        <span class="searchNb">1.</span>
                                        <div class="thumbnail pull-left">
                                            <img alt="" src="http://placehold.it/80x80/efefef">
                                        </div>
                                        <div class="search_content">
                                            <h4>
                                                <a href="javascript:void(0)" class="sepV_a">Lorem ipsum dolor sit amet</a>
                                            </h4>
                                            <p class="sepH_b item_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In euismod commodo adipiscing. Nunc lobortis mauris sit amet lectus vulputate vitae porta nulla vehicula. Curabitur in fermentum dui. Integer lobortis odio in quam faucibus ornare. Vivamus sed nulla suscipit tortor volutpat aliquam. Ut a lorem in felis faucibus tincidunt. Duis consectetur pulvinar lacus non pulvinar. Phasellus tempor nisi at sem commodo id vehicula nisl aliquam.</p>
                                            <p class="sepH_a"><strong>Lorem ipsum:</strong> dolor sit amet</p>
                                            <small>Tag 1</small>, <small>Tag 2</small>
                                        </div>
                                    </div>
                                    <div class="search_item clearfix">
                                        <span class="searchNb">2.</span>
                                        <div class="thumbnail pull-left">
                                            <img alt="" src="http://placehold.it/80x80/efefef">
                                        </div>
                                        <div class="search_content">
                                            <h4>
                                                <a href="javascript:void(0)" class="sepV_a">Lorem ipsum dolor sit amet</a>
                                                <span class="label label-info">Lorem ipsum</span>
                                            </h4>
                                            <p class="sepH_b item_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In euismod commodo adipiscing. Nunc lobortis mauris sit amet lectus vulputate vitae porta nulla vehicula. Curabitur in fermentum dui. Integer lobortis odio in quam faucibus ornare. Vivamus sed nulla suscipit tortor volutpat aliquam. Ut a lorem in felis faucibus tincidunt. Duis consectetur pulvinar lacus non pulvinar. Phasellus tempor nisi at sem commodo id vehicula nisl aliquam.</p>
                                            <p class="sepH_a"><strong>Lorem ipsum:</strong> dolor sit amet</p>
                                            <small>Tag 1</small>, <small>Tag 2</small>
                                        </div>
                                    </div>
                                    <div class="search_item clearfix">
                                        <span class="searchNb">3.</span>
                                        <div class="thumbnail pull-left">
                                            <img alt="" src="http://placehold.it/80x80/efefef">
                                        </div>
                                        <div class="search_content">
                                            <h4>
                                                <a href="javascript:void(0)" class="sepV_a">Lorem ipsum dolor sit amet</a>
                                                <span class="label label-important">Lorem ipsum</span>
                                            </h4>
                                            <p class="sepH_b item_description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In euismod commodo adipiscing. Nunc lobortis mauris sit amet lectus vulputate vitae porta nulla vehicula. Curabitur in fermentum dui. Integer lobortis odio in quam faucibus ornare. Vivamus sed nulla suscipit tortor volutpat aliquam. Ut a lorem in felis faucibus tincidunt. Duis consectetur pulvinar lacus non pulvinar. Phasellus tempor nisi at sem commodo id vehicula nisl aliquam.</p>
                                            <p class="sepH_a"><strong>Lorem ipsum:</strong> dolor sit amet</p>
                                            <small>Tag 1</small>, <small>Tag 2</small>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <div class="pagination">
                                <ul>
                                    <li><a href="#">Prev</a></li>
                                    <li class="active">
                                        <a href="#">1</a>
                                    </li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="disabled"><a href="#">...</a></li>
                                    <li><a href="#">10</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul>
                            </div>                           
                    </div>
                </div>
                <div class="modal hide fade" id="myNotifications">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3>New Notifications</h3>
                    </div>
                    <div class="modal-body">
                        <p>No notifications at this time</p>
                        <!--<table class="table table-condensed table-striped" data-provides="rowlink">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Notification</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>data here</td>
                                    <td>data here</td>
                                    <td>data here</td>
                                </tr>
                                <tr>
                                    <td>data here</td>
                                    <td>data here</td>
                                    <td>data here</td>
                                </tr>
                                <tr>
                                    <td>data here</td>
                                    <td>data here</td>
                                    <td>data here</td>
                                </tr>
                            </tbody>
                        </table>--> 
                    </div>
                    <div class="modal-footer">
                        <!--<a href="/" class="btn">Go to notifications</a>-->
                    </div>
                </div>
                <div class="modal hide fade" id="myMail">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3>New messages</h3>
                    </div>
                    <div class="modal-body">
                        <p>No messages at this time</p>
                        <!--<table class="table table-condensed table-striped" data-provides="rowlink">
                            <thead>
                                <tr>
                                    <th>Sender</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>data here</td>
                                    <td>data here</td>
                                    <td>data here</td>
                                </tr>
                                <tr>
                                    <td>data here</td>
                                    <td>data here</td>
                                    <td>data here</td>
                                </tr>
                                <tr>
                                    <td>data here</td>
                                    <td>data here</td>
                                    <td>data here</td>
                                </tr>
                            </tbody>
                        </table>-->
                    </div>
                    <div class="modal-footer">
                        <!--<a href="/" class="btn">Go to messages</a>-->
                    </div>
                </div>
                <div class="modal hide fade" id="myTasks">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3>New Tasks</h3>
                    </div>
                    <div class="modal-body">
                        <p>No tasks at this time.</p>
                        <!--<table class="table table-condensed table-striped" data-provides="rowlink">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Summary</th>
                                    <th>Due</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>data here</td>
                                    <td>data here</td>
                                    <td>data here</td>
                                </tr>
                                <tr>
                                    <td>data here</td>
                                    <td>data here</td>
                                    <td>data here</td>
                                </tr>
                                <tr>
                                    <td>data here</td>
                                    <td>data here</td>
                                    <td>data here</td>
                                </tr>
                            </tbody>
                        </table>-->
                    </div>
                    <div class="modal-footer">
                        <!--<a href="/" class="btn">Go to calendar</a>-->
                    </div>
                </div>
            </header>
            
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                    <div id="main-content">
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
                
            </div>
            
			<!-- SIDEBAR ACTIONS -->
            <? $actions = $this->Element(Inflector::pluralize(Inflector::classify($this->request->params['controller'])).'/actions'); ?>
            <? if(!preg_match('/Element Not Found:/',$actions)): ?>
                <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
                <div class="sidebar">
                    <div class="antiScroll">
                        <div class="antiscroll-inner">
                            <div class="antiscroll-content">

                                <div class="sidebar_inner">
                                    <div id="side_heading">
                                        <h4>Actions</h4>
                                    </div>
                                    <div id="side_accordion" class="accordion">
                                    <?=$actions?>
                                    </div>

                                    <div class="push"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <? endif; ?>
            <!-- end SIDEBAR -->
            
            <script src="/js/jquery-1.8.2.js"></script>
			<script src="/js/jquery.actual.min.js"></script>
			<script src="/js/jquery_cookie.min.js"></script>
			<script src="/js/bootstrap.min.js"></script>
			<script src="/js/bootstrap.plugins.min.js"></script>
			<script src="/lib/qtip2/jquery.qtip.min.js"></script>
			<!-- <script src="<?=$path?>lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script> -->
			<script src="/lib/antiscroll/antiscroll.js"></script>
			<script src="/lib/UItoTop/jquery.ui.totop.min.js"></script>
			<script src="/js/selectNav.js"></script>
			<script src="/js/gebo_common.js"></script>
            <script src="/js/core/core.js"></script>
            <script src="/js/labjs.min.js"></script>
            <script src="/lib/sticky/sticky.min.js"></script>
            <script src="/lib/uniform/jquery.uniform.min.js"></script>
            <!-- end form only -->
			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>
		</div>
	</body>
</html>