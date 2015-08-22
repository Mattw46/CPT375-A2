<?php
   require_once './model/model.php';
   if(!isset($_SESSION['authenticated']))
      header("location: ../index.php");
   if(!is_admin(get_userID($_SESSION['username'])))
      header("location: ../index.php");
?>
<div class="row content">
    <div class="col-xs-12" id="adminPanel">

        <h2 class="col-sm-12 center-xs">User Admin Panel</h2>

        <div class="col-xs-12">
            <p class="tableTitle">Review Auctions</p>
            <table class="auctionTable striped">
                <thead>
                <tr>
                    <th>Summary</th>
                    <th>Username</th>
                    <th>Bids</th>
                    <th>Current Winning Bid</th>
                    <th>Visable</th>
                    <th>Suspend / Allow</th>
                </tr>
                </thead>
                <tbody>
                <?php
                   $count=0;
                   $listings = getAdminListings();
                   foreach($listings as $row){
                      $count++;
                      if($row[5])
                        $visible = 'Y';
                      else
                        $visible = 'N';
                      echo '<tr id="username' . $count . '">';
                      echo '<td><a href="./job.php?listing_id=' . $row[0] . '">' . $row[1] . '</a></td>';
                      echo '<td><a href="./userdetails.php?user=' . $row[2] . '">' . $row[2] . '</a></td>';
                      echo '<td>' . $row[3] . '</td>';
                      echo '<td>$' . $row[4] . '</td>';
                      echo '<td>' . $visible . '</td>';
                      if($row[5]){
                         echo '<td class="suspend"><a href="./php/admin/admin-controller.php?listing_id=' . $row[0];
                         echo '&action=suspend" onclick="return confirm(\'Are you sure you want to suspend this listing?\');">';
                         echo 'Suspend</a></td>';
                      }
                      else{ 
                         echo '<td class="allow"><a href="./php/admin/admin-controller.php?listing_id=' . $row[0];
                         echo '&action=allow" onclick="return confirm(\'Are you sure you want to allow this listing?\');">';
                         echo 'Allow</a></td>';
                      }
                   }
                ?>
                </tbody>
            </table>
        </div>

        <div class="col-xs-12">
            <p class="tableTitle">Review User</p>
            <table class="userTable striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Signup Date</th>
                    <th>User Type</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                   $count=0;
                   $users = getAdminUsers();
                   foreach($users as $row){
                      $count++;
                      echo '<tr id="username' . $count . '">';
                      echo '<td>' . $row[0] . '</td>';
                      echo '<td><a href="./userdetails.php?user=' . $row[1] . '">' . $row[1] . '</a></td>';
                      echo '<td>' . $row[2] . '</td>';
                      echo '<td>' . $row[3] . '</td>';
                      echo '<td>' . $row[4] . '</td>'; 
                      echo '<td>' . $row[5] . '</td>'; 
                      echo '<td class="suspend"><a href="./php/admin/admin-controller.php?userid=' . $row[0];
                      echo '&action=delete" onclick="return confirm(\'Are you sure you want to permanently delete ';
                      echo $row[2] .'?\');">Delete</a></td>';
                   }
                ?>
                </tbody>
            </table>
        </div>
        <!--<form>
            <div class="col-xs-12">
                <label for="adminUserSearch">Search for user:</label>
                <input id="adminUserSearch" type="text" value="username">
                <button>SEARCH</button>
            </div>
        </form>
        <div class="col-xs-12">
            <p class="tableTitle">4 users found:</p>
            <table class="userTable striped">
                <thead>
                <tr>
                    <th>Username</th>
                </tr>
                </thead>
                <tbody>
                <tr id="username1">
                    <td><a href="#">username1</a></td>
                </tr>
                <tr id="username2">
                    <td><a href="#">username2</a></td>
                </tr>
                <tr id="username3">
                    <td><a href="#">username3</a></td>
                </tr>
                <tr id="username4">
                    <td><a href="#">username4</a></td>
                </tr>
                </tbody>
            </table>
        </div>
       -->
    </div>
</div>
