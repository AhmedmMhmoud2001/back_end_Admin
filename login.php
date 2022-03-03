<?php
ob_start();
include "init.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['submit'])){
    $email =$_POST['email'];
    $UserId =$_POST['UserId'];
$quXteamUser1 = $db -> prepare("SELECT * FROM xteamuser WHERE UserEmail=? AND UserId=?");
$quXteamUser1 -> execute(array($email,$UserId));
$result =$quXteamUser1 -> rowCount();

if ($result > 0) {
    echo "exist result";
    // $UserAdmin = $quXteamUser1->fetch();
    // $_SESSION[]
    header("Location:index.php");
    exit();
}
else {
    echo "not exist result";
}
}
}









?>

<div class='container' >

<h1>Admin Login</h1>
<form action="" method ="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" autocomplete="off" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">code</label>
    <input type="password" class="form-control" name ="UserId" autocomplete="off" id="exampleInputPassword1">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

</div>
<?php
include "includeAdmin/templet/footer.php";
ob_end_flush();
?>