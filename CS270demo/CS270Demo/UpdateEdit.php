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
      <li><a href="SearchAll.php">Display Tables</a></li>
      <li><a href="UpdateEdit.php">Insert Data</a></li>
    </ul>
</nav>

    <body>
        <h2 style="padding-top:10%;">To update information for this table you must first enter a new Coach</h2>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            Coach Name:  <input type="text" name="coachName"/>
            <br>
            Coaching Record (W-L): <input type="text" name="cRecord"/>
            <br>
            Number of Championships won:  <input type="number" name="numChamps"/>
            <br>
            <input type="submit" value="submit" />
        <br><br><br>

         <?php
            if (isset($_POST['coachName'])) {
        // Check connection
           if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

                $coachName = mysqli_real_escape_string($conn, $_POST['coachName']);
                $cRecord = mysqli_real_escape_string($conn, $_POST['cRecord']);
                $numChamps = mysqli_real_escape_string($conn, $_POST['numChamps']);
            
        $sql = "INSERT INTO coaches ( CoachName, CoachingRecord, NumChampionships) VALUES ( '$coachName', '$cRecord', '$numChamps')";   

            
              if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            }
              ?>
        </form>
        
        <!--now create a form to enter in new information for a team -->
        
        <h2>Now you are able to enter a New Team using an existing coach!</h2>
        
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            Team Name:  <input type="text" name="teamName"/>
            <br>
             Select an existing coach for your team: 
            <select name="CoachID">
               <?php
               $res=mysqli_query($conn,"select * from Coaches order by CoachID asc");
               while($row=mysqli_fetch_array($res))
               {
               ?>
               <option><?php echo $row["CoachID"];?></option>
               <?php
               }
               ?>
               </select><br>
            Number of Championships won:  <input type="number" name="numChamps"/>
            <br>
            <input type="submit" value="submit"/>
        <br><br><br>

         <?php
            if (isset($_POST['CoachID'])) {
        // Check connection
           if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

                $teamName = mysqli_real_escape_string($conn, $_POST['teamName']);
                $coachID = mysqli_real_escape_string($conn, $_POST['CoachID']);
               $numChamps = mysqli_real_escape_string($conn, $_POST['numChamps']);
            
        $sql = "INSERT INTO teams ( TeamName, CoachID, NumChampionships) VALUES ( '$teamName', '$coachID','$numChamps')";   

            
              if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            }
              ?>
        </form>
        
        <!-- now create a form to submit a Stadium -->
        <h2 style="padding-top:3%;">You can now enter a stadium for your new team!</h2>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            Stadium Name:  <input type="text" name="StadiumName"/>
            <br>
            Stadium Location: <input type="text" name="Location"/>
            <br>
            Stadium Max Capacity:  <input type="number" name="MaxCapacity"/>
            <br>
            Select your home team:
            <select name="HomeTeam">
               <?php
               $res=mysqli_query($conn,"select * from teams order by TeamName asc");
               while($row=mysqli_fetch_array($res))
               {
               ?>
               <option><?php echo $row["TeamName"];?></option>
               <?php
               }
               ?>
               </select>
            <br>
            <input type="submit" value="submit" />
        <br><br><br>

         <?php
            if (isset($_POST['HomeTeam'])) {
        // Check connection
           if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

                $stadiumName = mysqli_real_escape_string($conn, $_POST['StadiumName']);
                $loc = mysqli_real_escape_string($conn, $_POST['Location']);
                $maxCap = mysqli_real_escape_string($conn, $_POST['MaxCapacity']);
                $team = mysqli_real_escape_string($conn, $_POST['HomeTeam']);

            
        $sql = "INSERT INTO stadium ( StadiumName, Location, MaxCapacity, HomeTeam) VALUES ( '$stadiumName', '$loc', '$maxCap', '$team')";   

            
              if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            }
              ?>
        </form>
        <!-- form to add a new player to player table-->
        <h2 style="padding-top:3%;">Fill out form below to enter a new player!</h2>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            Player Name:  <input type="text" name="pName"/>
            <br>
            Number: <input type="number" name="num"/>
            <br>
            Position:  <input type="text" name="pos"/>
            <br>
            College: <input type="text" name="college"/>
            <br>
            Select your home team: 
            <select name="teamName">
               <?php
               $res=mysqli_query($conn,"select * from teams order by TeamName asc");
               while($row=mysqli_fetch_array($res))
               {
               ?>
               <option><?php echo $row["TeamName"];?></option>
               <?php
               }
               ?>
            </select>
            <br>
            Birthday: <input type="text" name="bday"/>
            <br>
            Experience: <input type="number" name="exp"/>
            <br>
            <input type="submit" value="submit"/>
        <br><br><br>

         <?php
            if (isset($_POST['teamName'])) {
        // Check connection
           if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

                $pname = mysqli_real_escape_string($conn, $_POST['pName']);
                $num = mysqli_real_escape_string($conn, $_POST['num']);
                $pos = mysqli_real_escape_string($conn, $_POST['pos']);
                $college = mysqli_real_escape_string($conn, $_POST['college']);
                $teamName = mysqli_real_escape_string($conn, $_POST['teamName']);
                $birthday = mysqli_real_escape_string($conn, $_POST['bday']);
                $exp = mysqli_real_escape_string($conn, $_POST['exp']);

            
        $sql = "INSERT INTO players ( PlayerName, Number, Position, CollegeName, TeamID, Birthday, Experience) VALUES ( '$pname', '$num', '$pos','$college','$teamName','$birthday','$exp')";   

            
              if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            }
              ?>
        
    </body>
    
    <style>
        
        h2 {
            color: whitesmoke;
            text-align: center;
            font-size: 25px;
        }
            form {
            padding-top: 2%;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: whitesmoke;
            
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
    </style>
    
</html>