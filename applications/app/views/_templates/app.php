<!doctype html>
<HTML LANG="en">
<HEAD>
<META CHARSET="utf-8" />

<!-- disable iPhone inital scale -->
<META NAME="viewport" CONTENT="width=device-width; initial-scale=1.0" />

<TITLE>Trackmate :: Logging Progress</TITLE>

<!-- main css -->
<LINK HREF="<?php echo CSSPATH; ?>bootstrap.css" REL="stylesheet" TYPE="text/css" />
<link HREF="<?php echo CSSPATH; ?>bootstrap-responsive.css" rel="stylesheet">
<LINK HREF="<?php echo CSSPATH; ?>style.css" REL="stylesheet" TYPE="text/css" />
<link HREF="<?php echo CSSPATH; ?>style-responsive.css" rel="stylesheet">
<link HREF="<?php echo CSSPATH; ?>font-awesome.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>


</HEAD>
<BODY>
 <div class="navbar navbar-inverse navbar-fixed-top">
 
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Trackmate</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Username</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    

    
<div class="container-fluid" style="margin-top:50px;">
      <h3>Mechanicville High School Track</h3>      
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span1" >
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li <?php echo ($selected == 'dashboard') ? 'class="active"' : "" ; ?>><a href="/"><i class="fa-icon-dashboard"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
                        <li <?php echo ($selected == 'record') 	  ? 'class="active"' : "" ; ?>><a href="/record"><i class="fa-icon-pencil"></i><span class="hidden-tablet"> Record Event</span></a></li>
						<li <?php echo ($selected == 'reports')   ? 'class="active"' : ""; ?>><a href="/reports"><i class="fa-icon-bar-chart"></i><span class="hidden-tablet"> Reports</span></a></li>
						<li <?php echo ($selected == 'runners')   ? 'class="active"' : ""; ?>><a href="/runners"><i class="fa-icon-group"></i><span class="hidden-tablet"> Runners</span></a></li>
						<li <?php echo ($selected == 'team') 	  ? 'class="active"' : ""; ?>><a href="/team"><i class="fa-icon-cog"></i><span class="hidden-tablet"> My Team</span></a></li>
                        <li <?php echo ($selected == 'events') 	  ? 'class="active"' : ""; ?>><a href="/events"><i class="fa-icon-wrench"></i><span class="hidden-tablet"> Events</span></a></li>
					</ul>
				</div>
			</div>
            
            
            <div id="content" class="span9" style="min-height:602px;">

			<div class="row-fluid"> 
				
				<?php echo $content; ?>
               
			</div>
			<!-- end: Content -->
			</div>
            
             <div class="span2" id="right_bar" style="min-height:602px;">
                    <div class="row-fluid">
                       Right side bar
                    </div>
					<!-- end: Content -->
			</div>
            
    	
    </div>
  </div> <!-- /container -->
  
    
	<script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-37608460-1']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    
    </script>
	<!-- html5.js for IE less than 9 -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="<?php echo JSPATH; ?>jquery-1.8.3.js"></script>
    <script src="<?php echo JSPATH; ?>bootstrap.min.js"></script>
    <script src="<?php echo JSPATH; ?>datepicker.js"></script>
    <script src="<?php echo JSPATH; ?>flot.js"></script>
    <script src="<?php echo JSPATH; ?>script.js"></script>
</BODY>
</HTML>