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
                <a href="HuntingLand.php">Land</a>
                <a href="Otherdeer.php">Deer</a>
            </div>
        </div>
      <li><a href="SearchLand.php">Display Information</a></li>
      <li><a href="HuntingLand.php">Insert Information</a></li>
    </ul>
</nav>
    <body>
        <div id="Searchli"> 
        <ul id="SearchList">
              <li><a href="Night.php">Display Night Pictures</a></li>
              <br>
              <li><a href="Day.php">Display Day Pictures</a></li>
              <br>
              <li><a href="Bucks.php">Display Bucks</a></li>
              <br>
              <li><a href="Otherdeer.php">Display Any other deer</a></li>
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