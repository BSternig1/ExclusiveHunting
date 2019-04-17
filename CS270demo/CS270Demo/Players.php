<?php
$conn=mysqli_connect("localhost","root","","nba");
mysqli_select_db($conn,"nba");
?>
<!DOCTYPE html>
<html>
 <link rel = "stylesheet" href = "NBAFormat.css" />
    <header>
  <h1>Information NBA</h1>
</header>
<nav id="topNav">
    <ul>
      <li><a href="NBA.html">HOME</a></li>
      <div class="dropdown">
    <button class="dropbtn">SEARCH NBA</button>
            <div class="dropdown-content">
                <a href="Players.php">PLAYERS</a>
                <a href="Stadiums.php">STADIUMS</a>
                <a href="Coaches.php">COACHES</a>
                <a href="Teams.php">TEAMS</a>
            </div>
        </div>
      <li><a href="SearchAll.php">All NBA</a></li>
      <li><a href="UpdateEdit.php">Add More/Your Own!</a></li>
    </ul>
</nav>

    <body>
        <div id="playerForm">
        <form style="color:whitesmoke;" name="playerForm" action="" method="get">
            Select a Player to get more information on: <br><br>
           <select name="playername">
               <?php
               $res=mysqli_query($conn,"select * from Players order by playername asc");
               while($row=mysqli_fetch_array($res))
               {
               ?>
               <option><?php echo $row["PlayerName"];?></option>
               <?php
               }
               ?>
               </select>
            <input type="submit" value="GO">
            <br><br>


        <?php        
               if (isset($_GET['playername'])) {

                $sql="SELECT * from players where PlayerName = '".$_GET['playername']."'";

                   $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    //putting query in a table
                    echo "<table border=1>";
                    echo "<tr>";
                    echo "<th>PlayerID</th>";
                    echo "<th>PlayerName</th>";
                    echo "<th>Number</th>";
                    echo "<th>Position</th>";
                    echo "<th>CollegeName</th>";
                    echo "<th>TeamID</th>";
                    echo "<th>Birthday</th>";
                    echo "<th>Experience</th>";
                   
                    echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["PLayerID"] . "</td>";
                    echo "<td>" . $row["PlayerName"] . "</td>";
                    echo "<td>" . $row["Number"] . "</td>";
                    echo "<td>" . $row["Position"] . "</td>";
                    echo "<td>" . $row["CollegeName"] . "</td>";
                    echo "<td>" . $row["TeamID"] . "</td>";
                    echo "<td>" . $row["Birthday"] . "</td>";
                    echo "<td>" . $row["Experience"] . "</td>";
                    echo "</tr>";
                }
                    echo "</table>";
            } else {
                echo "0 results";
            }
            }
        ?>
    </form>
    </div>
        
     <form style="color:whitesmoke;padding-top:3%;" method="get">
         Advanced Player Below<br><br>
    <label>Player Name</label> <br> 
    <input type="text" name="pName"/> <br>
            
    <label>Player Number</label><br>
    <input type="number" name="num"/><br>
            
    <label>Team Name</label> <br>
    <input type="text" name="tName"><br>

    <label>Experience</label> <br> 
    <input type="number" name="exp"/><br>
  
            
    <input type="submit" value="Find the Player!">
    </form>        
        
        
<?php
        if (isset($_GET['pName'])) {

        
        $pName = isset($_GET['pName']) ? $_GET['pName'] : '';
        $num = isset($_GET['num']) ? $_GET['num'] : '';
        $tname = isset($_GET['tName']) ? $_GET['tName'] : '';
        $exp = isset($_GET['exp']) ? $_GET['exp'] : '';
        
        $sql = "SELECT * FROM players WHERE(PlayerName LIKE '%$pName%') AND (Number like '%$num%') AND (TeamID like '%$tname%') AND (Experience like '$exp%')";
        
          $result = $conn->query($sql);
    
      if ($result->num_rows > 0) {
                    //putting query in a table
                    echo "<table border=1>";
                    echo "<tr>";
                    echo "<th>PlayerID</th>";
                    echo "<th>PlayerName</th>";
                    echo "<th>Number</th>";
                    echo "<th>Position</th>";
                    echo "<th>CollegeName</th>";
                    echo "<th>TeamID</th>";
                    echo "<th>Birthday</th>";
                    echo "<th>Experience</th>";
                   
                    echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["PLayerID"] . "</td>";
                    echo "<td>" . $row["PlayerName"] . "</td>";
                    echo "<td>" . $row["Number"] . "</td>";
                    echo "<td>" . $row["Position"] . "</td>";
                    echo "<td>" . $row["CollegeName"] . "</td>";
                    echo "<td>" . $row["TeamID"] . "</td>";
                    echo "<td>" . $row["Birthday"] . "</td>";
                    echo "<td>" . $row["Experience"] . "</td>";
                    echo "</tr>";
                }
                    echo "</table>";
            } else {
                echo "0 results";
            }
        }
     
    
     echo "</table></center>"; 
                       
        
    ?>
    </body>
    <style>

        form {
            padding-top: 10%;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            
        }
        table {
            background: whitesmoke;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            border-width: thick;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 20px;
            color: black;


        }
        th {
            font-size: 25px;
        }
       tr:nth-child(even) {background-color: lightgray;}
    </style>
    

</html>