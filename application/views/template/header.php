<!DOCTYPE html>
<html>
<head>
	<title>Samuel | <?php echo $title ?></title>
	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- <link rel="icon" href="<?php echo base_url(); ?>/favicon.ico" type="image/gif"> -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sticky-footer.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">

    <?php if(!empty($css)){ foreach($css as $rows){ ?>
    <link rel="stylesheet" href="<?php echo base_url($rows) ?>"/>
    <?php }} ?>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/central.css">
  	<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
  	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <?php if(!empty($script)){ foreach($script as $rows){ ?>
        <script src="<?php echo base_url($rows) ?>"></script>
    <?php }} ?>
    
</head>
<body>

<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
      <img src="" alt="Samuel Logo">
      </a>
    </div>
    <ul class="nav navbar-nav navbar-right">
  		<li id="homeNav"><a href="<?php echo base_url("Home"); ?>">
      		<i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a>
      	</li>
      	<li id="forumsNav"><a href="<?php echo base_url("Forums"); ?>">
      		<i class="fa fa-comments" aria-hidden="true"></i>&nbsp; Forums</a>
      	</li>
      	<?php if (!$loggedIn){ ?>
      	<li id="signupNav"><a href="<?php echo base_url("SignUp"); ?>">
      		<i class="fa fa-user" aria-hidden="true"></i>&nbsp; Sign Up</a>
    		</li>
        <li class="dropdown" >
          <a class="dropdown-toggle loginDrop" data-toggle="dropdown" href="#">
            <i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; Login
          </a>
          <ul class="dropdown-menu dropdown-menu-lg">
            <p id="message" class="message-error"></p>
            <form id="loginForm">
            <div class="form-group">
              <input id="username" type="text" class="form-control" name="username" placeholder="Username"></input>
            </div>
            <div class="form-group">
              <input id="password" type="password" class="form-control" name="password" placeholder="Password"></input>
            </div>
            </form>
            <div class="form-group">
              <button onclick="login()" class="btn btn-block btn-default">Login</button>
            </div>
          </ul>
        </li>

      	<?php } else { ?>
      	<li id="accountNav" class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	        <i class="fa fa-user" aria-hidden="true"></i>&nbsp; Account
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu">
            <li class="dropdown-header"><?php echo $_SESSION['name']; ?></li>
	          <li><a href="<?php echo base_url("MyForums"); ?>">
            <i class="fa fa-comments" aria-hidden="true"></i>&nbsp; My Forums
            </a></li>
	          <li><a href="<?php echo base_url("AccountSettings"); ?>">
            <i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Settings
            </a></li>
	          <li><a href="<?php echo base_url("login/logout"); ?>">
            <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout
            </a></li>
	        </ul>
      	</li>
      <?php } ?>
    </ul>
  </div>
</nav>

<div id="loginForm" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	$("#<?php echo $activeNav; ?>").addClass("active");

  $('.dropdown a.loginDrop').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });

  function login(){
    $("#message").hide();
    if (!$("#username").val() || !$("#password").val()) {
      $("#message").text("Please enter your username and password");
      $("#message").fadeIn();
    }else{
      $.ajax({
        url: "<?php echo site_url('login/login'); ?>",
        type: 'POST',
        dataType: 'json',
        data: $('#loginForm').serialize(),
        encode:true,
        success:function(data) {
          console.log(data);
          if (!data.valid) {
            $("#message").text("Incorrect username or password");
            $("#message").fadeIn();
          }else{
            window.location.reload();
          }
        }
      });
    }
  }

</script>

<div class="container-fluid nav-margin">
<span>
  <h2>
        <?php echo $pageTitle; ?>
        <span class="page-description"><?php echo $pageDescription; ?></span>
    </h2>
</span>