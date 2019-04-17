<?php
$conn=mysqli_connect("localhost","root","","nba");
mysqli_select_db($conn,"nba");
$stadname = '';
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
        <div id="TeamForm">
        <form style="color:whitesmoke;" name="teamForm" action="" method="get">
            Select a Team to get more information: <br><br>
           <select name="teamname">
               <?php
               $res=mysqli_query($conn,"select * from Teams order by teamname asc");
               while($row=mysqli_fetch_array($res))
               {
               ?>
               <option><?php echo $row["TeamName"];?></option>
               <?php
               }
               ?>
               </select>
            <input type="submit" value="GO">
            <br><br>


        <?php        
               if (isset($_GET['teamname'])) {

                $sql="SELECT * from Teams where TeamName = '".$_GET['teamname']."'";

                   $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    //putting query in a table
                    echo "<table border=1>";
                    echo "<tr>";
                    echo "<th>TeamName</th>";
                    echo "<th>CoachID</th>";
                    echo "<th>NumOfChampionships</th>";
                   
                    echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["TeamName"] . "</td>";
                    echo "<td>" . $row["CoachID"] . "</td>";
                    echo "<td>" . $row["NumChampionships"] . "</td>";
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