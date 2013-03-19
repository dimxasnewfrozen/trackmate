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
<!-- html5.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?php echo CSSPATH; ?>jquery-1.8.3.js"></script>
<script src="<?php echo CSSPATH; ?>bootstrap.min.js"></script>


</HEAD>

<BODY>

  <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #142933;
      }

      .form-signin {
        max-width: 300px;
        padding: 10px 29px 29px;
        margin: 0 auto 20px;
        background-color: #c2d5b9;
        border: 1px solid #70995c;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
	  	margin:0px;
        margin-bottom: 10px;
		color:#33664d;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>

 <div class="container">

      <form class="form-signin" >
        <h3 class="form-signin-heading">Trackmate Sign In</h3>
        <input type="text" name="username" class="input-block-level" placeholder="Username">
        <input type="password" name="password" class="input-block-level" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-success" style="width:100%; margin-bottom:10px;" type="submit">Sign in</button>
        <button class="btn btn-info" style="width:100%;" type="submit">Register</button>
      </form>

    </div> <!-- /container -->



</BODY>
</HTML>