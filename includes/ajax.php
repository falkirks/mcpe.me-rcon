<?php
ob_clean();
if($_GET['cmd'] == "logout"){
	session_destroy();
	exit("<br>" . yes("You are logged out!"));
}
try{
  $Query = new SourceQuery();
  $Query->Connect( $_SESSION['s'] , $_SESSION['port'], SQ_TIMEOUT, SQ_ENGINE );
  $Query->setRconPassword($_SESSION['p']);
  $r = $Query->Rcon(trim($_GET['cmd']));
  $dictionary = array(
    '§9' => '<span class="text-primary">',
    '§c' => '<span class="text-danger">',
    '§a' => '<span class="text-success">',
    '§0' => '',
    '§o' => '<span style="font-style:italic">',
    "\n" => '</br>',
    '§r'   => '</span>' ,
);
$r = str_replace(array_keys($dictionary), $dictionary, $r);
  exit($r);
}
catch( Exception $e ){
  echo fail($e->getMessage());
}