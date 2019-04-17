<!DOCTYPE html>
<html>
 <link rel = "stylesheet" href = "NBAFormat.css" />
<header>
  <h1>NBA Coaches</h1>
</header>
<h2>Click return to go back</h2>
<!--link to return to search all page-->
    <form action="SearchAll.php">
    <input type="submit" value="RETURN" style="color: whitesmoke; background-color:green;"/>
    </form>
    
    <body>
    </body>
    
    <style>
        h2 {
            text-align: center;
            color: whitesmoke
        }
        form {
            
            text-align: center;
        }
        table {
            background-color: whitesmoke;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            border-width: thick;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 20px;


        }
        th {
            font-size: 25px;
        }
        tr:nth-child(even) {background-color: lightgray;}

    </style>
   <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nba";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
           if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        //echo "Connected successfully";
        echo "<br>";
        
        //get the form query data
        $StadiumName = "";
        $HomeTeam = ""; 
        
        //create the query
        $sql = "SELECT * FROM coaches";
        // execute the query
        $result = $conn->query($sql);
            
        //display results
        if ($result->num_rows > 0) {
                    //putting query in a table
                    echo "<table border=1>";
                    echo "<tr>";
                    echo "<th>Coach ID</th>";
                    echo "<th>Coach Name</th>";
                    echo "<th>Coaching Record</th>";
                    echo "<th>Championships Won</th>";                   
                    echo "</tr>";
            
            while($row = $result->fetch_assoc()) {
                
                echo "<tr>";
                echo "<td>" . $row["CoachID"] . "</td>";
                echo "<td>" . $row["CoachName"] . "</td>";
                echo "<td>" . $row["CoachingRecord"] . "</td>";
                echo "<td>" . $row["NumChampionships"] . "</td>";
                echo "</tr>";
            }
                    echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>
</html>