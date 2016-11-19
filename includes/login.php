<div class="container">
      <form class="form-signin" role="form" action="index.php" method="POST">
        <h2 class="form-signin-heading">Web RCON</h2>
<?php
if(!empty($_POST)){
  if(empty($_POST['s']) || empty($_POST['p']) || empty($_POST['port'])) echo fail("All fields are required.");
  else{
try{
  $Query = new SourceQuery();
  $Query->Connect( $_POST['s'] , $_POST['port'], SQ_TIMEOUT, SQ_ENGINE );
  $Query->setRconPassword($_POST['p']);
      $_SESSION['s'] = $_POST['s'];
      $_SESSION['p'] = $_POST['p'];
      $_SESSION['port'] = $_POST['port'];
      header("Location: index.php");
}
catch( Exception $e ){
  echo fail($e->getMessage());

}
    }
  }
?>
        <input type="text" class="form-control" placeholder="Hostname"  autofocus="" name="s" required="">
        <input type="text" class="form-control" placeholder="Port" required="" value="19132" name="port">
        <input type="password" class="form-control" placeholder="Password" required="" name="p">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connect Now</button>
      </form>

    </div>