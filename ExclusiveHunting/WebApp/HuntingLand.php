<?php
$conn=mysqli_connect("localhost","root","","hunting");
mysqli_select_db($conn,"hunting");
?>
<!DOCTYPE html>
<html>
 <link rel = "stylesheet" href = "HuntingFormat.css" />
    <header>
  <h1>Land Information</h1>
</header>
<nav id="topNav">
    <ul>
      <li><a href="Hunting.html">HOME</a></li>
      <div class="dropdown">
    <button class="dropbtn">SEARCH LAND</button>
            <div class="dropdown-content">
                <a href="Night.php">Night Pictures</a>
                <a href="Day.php">Day Pictures</a>
                <a href="Bucks.php">Buck Pictures</a>
                <a href="Otherdeer.php">More Pictures</a>
            </div>
        </div>
      <li><a href="SearchLand.php">Display Information</a></li>
      <li><a href="HuntingLand.php">Insert Information</a></li>
    </ul>
</nav>

</html>