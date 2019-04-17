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
        <div id="Searchli"> 
        <ul id="SearchList">
              <li><a href="StadiumList.php">Display Stadiums Table</a></li>
              <br>
              <li><a href="TeamsList.php">Display Teams Table</a></li>
              <br>
              <li><a href="CoachesList.php">Display Coaches Table</a></li>
              <br>
              <li><a href="PlayersList.php">Display Players Table</a></li>
              <br>
            </ul>
        </div>
        
    </body>
 
    <script>
       
    var navBar = $("#topNav");
var hdrHeight = $("header").height();


$(window).scroll(function() {
  if( $(this).scrollTop() > hdrHeight + 50) {
    navBar.addClass("navScrolled");
  } else {
    navBar.removeClass("navScrolled");
  }
});

    </script>
    <style>
        
        #Searchli {
            padding-top: 10%;
             
        }
        #SearchList {
            text-align: center;
            font-size: 30px;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        a:link {
            color: whitesmoke;
            text-decoration: none;
        }
        a:visited {
          color: black;
        }
        ul
    </style>
    
</html>