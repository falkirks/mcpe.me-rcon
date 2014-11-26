<?php
ob_start();
session_start();
require './includes/SourceQuery/SourceQuery.class.php';
define('SQ_TIMEOUT',1);
define('SQ_ENGINE',SourceQuery::SOURCE);
function fail($err) {
    return '
	<div class="alert alert-danger" style="padding-top:15px;">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	' . $err. '
	</div>
	';
}
function yes($message) {
    return '
	<div class="alert alert-success" style="padding-top:10px;">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Congratulations!</strong> ' . $message .'
	</div>
	';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web RCON</title>

    <!-- Bootstrap -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootswatch/3.1.1/cyborg/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/login.css" rel="stylesheet">
    <link href="./assets/console.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
	if(isset($_SESSION['s']) && isset($_SESSION['p']) && isset($_SESSION['port'])){
		if(isset($_GET['cmd'])) require("./includes/ajax.php");
		else require("./includes/staticConsole.php");
	} 
	else require("./includes/login.php");
?>
<!-- All compiled plugins -->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>






