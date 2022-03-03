<?php
ob_start();
include "init.php";
include "includeAdmin/templet/nav.php";

//  first();
$quXteamUser = $db -> prepare("SELECT * FROM xteamuser");
$quXteamUser -> execute();
$numXteamUser = $quXteamUser ->rowCount();
$allXteamUsers = $quXteamUser ->fetchAll();

 ?>
 



 <table class="table usertable">
  <thead>
    <tr>
      <th scope="col">UserId</th>
      <th scope="col">UserName</th>
      <th scope="col">UserEmail</th>
      <th scope="col">action</th>
      
    </tr>
  </thead>
  <tbody>
      <?php
      if ($numXteamUser > 0)
      {
        foreach($allXteamUsers as $XteamUser){
            echo "<tr>";
            echo "<th>$XteamUser[UserId]</th>";
            echo "<td>$XteamUser[UserName]</td>";
            echo "<td>$XteamUser[UserEmail]</td>";
            echo 
            "<td>
                <a href='#'>
                  <i class='fa-solid fa-circle-xmark'></i>
                </a>
                <a href='#'>
                  <i class='fa-solid fa-pen-clip'></i>
                </a>
             </td>";

            echo "</tr>";
        };
      }
      else {
        echo "<h1>uoy cant feth data</h1>";
      }
       ?>

  </tbody>
</table>

<?php
include "includeAdmin/templet/footer.php";
ob_end_flush();
 ?>