

<?php

function loginnav() {
    include('../dbConnection/conn.php');
    
    $navquery = "SELECT * FROM prop_locations";
    $navresult = mysqli_query($conn, $navquery) or die(mysqli_error($conn));
    if ((isset($_SESSION['888_roleid']) ) && (false != $_SESSION['888_roleid'])) {
        if ('4' == $_SESSION['888_roleid']) {
            echo "<div class='container-fluid'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>                        
                    </button>
                    <a class='navbar-brand' href='ownerhome.php'>Kribs</a>
                </div>
                <div class='collapse navbar-collapse' id='myNavbar'>
                    <ul class='nav navbar-nav'>
            <li class='active'><a href='ownerhome.php'>Home</a></li>
                        <li><a class='dropdown-toggle' data-toggle='dropdown' href='#'> Properties </a>
                            <ul class='dropdown-menu'>";
                                if (mysqli_num_rows($navresult) > 0) {
            echo "<li class='dropdown'>";
            while ($row = mysqli_fetch_assoc($navresult)) {

                $navtext = $row["location"];
                $navid = $row["id"];

                echo "<li><a href='properties.php?filterdata=$navid'>$navtext</a></li>";
            }
            
            echo "</ul>";
            echo "<li><a href='ownerhelp.php'>Help</a></li>";
        }

                         echo"  </ul>
                        </li>";
            echo "<ul class='nav navbar-nav navbar-right'>
                        <li><a class='dropdown-toggle' data-toggle='dropdown' href='#'><span class=' glyphicon glyphicon-user'></span> My Profile </a>
                            <ul class='dropdown-menu'>
                                <li><a href='ownerhome.php'>View Profile</a></li>
                                <li><a href='manageproperties.php'>Manage Properties</a></li>
                                <li><a href='upload.php'>Upload Properties</a></li>
                                <li><a href='viewenquirys.php'>Traveller Enquiries</a></li>
                                <li><a href='viewbookings.php'>Booking Requests</a></li>
                                <li><a href='previousbookings.php'>Manage Bookings</a></li>

                            </ul>
                        </li>
                        <li><form method='POST'>
				<li><button class='btn btn-danger' id='submit' type='submit'name='destroy'> Log Out</button></li>
			</form>
                        </li>
                    </ul>
                </div>
            </div>";
        } else if ('5' == $_SESSION['888_roleid']) {
            echo "<div class='container-fluid'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>                        
                    </button>
                    <a class='navbar-brand' href='index.php'>Kribs</a>
                </div>
                <div class='collapse navbar-collapse' id='myNavbar'>
                    <ul class='nav navbar-nav'>
                        <li class='active'><a href='index.php'>Home</a></li>
            <li><a class='dropdown-toggle' data-toggle='dropdown' href='#'> Properties </a>
                            <ul class='dropdown-menu'>";
                                if (mysqli_num_rows($navresult) > 0) {
            echo "<li class='dropdown'>";
            while ($row = mysqli_fetch_assoc($navresult)) {

                $navtext = $row["location"];
                $navid = $row["id"];

                echo "<li><a href='properties.php?filterdata=$navid'>$navtext</a></li>";
            }
            
            echo "</ul>";
            echo "<li><a href='travellerhelp.php'>Help</a></li>";
                echo "<li><a class='dropdown-toggle' data-toggle='dropdown' href='#'><span class=' glyphicon glyphicon-user'></span> My Profile </a>
                            <ul class='dropdown-menu'>
                                <li><a href='travellerhome.php'>View Profile</a></li>'
                                </ul>";
                }
                   
                           echo " </ul>
                        </li>";
                      
        
               
            echo "<ul class='nav navbar-nav navbar-right'>
                <li>   
                        <form method='POST' action='search.php' id='mysearch' >
                        <input style='margin-top:0.8em;' type='text' name='searchdata' placeholder= 'Search' />
                        <input style='font-size: 0.8em; margin-right: 2em;' class='btn' type='submit' value='Go' name='search' />
                       </form>
                       </li>
                        
                        
                        <li><form method='POST'>
				<li><button class='btn btn-danger' id='submit' type='submit'name='destroy'>log out</button></li>
			</form>
                        </li>
                    </ul>
                </div>
            </div>";
        } else if ('6' == $_SESSION['888_roleid']) {
            echo "<div class='container-fluid'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>                        
                    </button>
                    <a class='navbar-brand' href='adminhome.php'>Kribs</a>
                </div>
                <div class='collapse navbar-collapse' id='myNavbar'>
                    <ul class='nav navbar-nav'>
                        <li class='active'><a href='adminhome.php'>Home</a></li>";
           

                echo "</ul>";
            
            echo "<ul class='nav navbar-nav navbar-right'>
                        <li><a class='dropdown-toggle' data-toggle='dropdown' href='#'><span class=' glyphicon glyphicon-user'></span> Menu </a>
                            <ul class='dropdown-menu'>
                                <li><a href='adminhome.php'>Admin Home</a></li>
                                <li><a href='adminprop.php'>Properties</a></li>
                                <li><a href='adminowners.php'>Owners</a></li>
                                <li><a href='admincomments.php'>Comments & Ratings</a></li>
                                <li><a href='admintravellers.php'>Travellers</a></li>
                                <li><a href='adminmanage.php'>Manage Website</a></li>
                                <li><a href='admincommunication.php'>Communication System</a></li>
                            </ul>
                        </li>
                        <li><form method='POST'>
				<li><button class='btn btn-danger' id='submit' type='submit'name='destroy'>log out</button></li>
			</form>
                        </li>
                    </ul>
                </div>
            </div>";
        }
    }
}





function displaynav() {
    include('dbConnection/conn.php');
    $navquery = "SELECT * FROM prop_locations";
    $navresult = mysqli_query($conn, $navquery) or die(mysqli_error($conn));
    if (empty($_SESSION['888_roleid'])) {
        echo "<div class='container-fluid'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>                        
                    </button>
                    <a class='navbar-brand' href='index.php'>Kribs</a>
                </div>
                <div class='collapse navbar-collapse' id='myNavbar'>
                    <ul class='nav navbar-nav'>
                        <li class='active'><a href='index.php'>Home</a></li>
                        <li><a class='dropdown-toggle' data-toggle='dropdown' href='#'> Properties </a>
                            <ul class='dropdown-menu'>";
                                if (mysqli_num_rows($navresult) > 0) {
            echo "<li class='dropdown'>";
            while ($row = mysqli_fetch_assoc($navresult)) {

                $navtext = $row["location"];
                $navid = $row["id"];

                echo "<li><a href='properties.php?filterdata=$navid'>$navtext</a></li>";
            }
            
        

            echo "</ul>";
            echo "<li><a href='publichelp.php'>Help</a></li>";
           
        }

                         echo"  </ul>
                        </li>";
          
        echo "<ul class='nav navbar-nav navbar-right'>
             
                        <li><a class='dropdown-toggle' data-toggle='dropdown' href='#'><span class=' glyphicon glyphicon-user'></span> Sign Up</a>
                            <ul class='dropdown-menu'>
                                <li><a href='oregister.php'>Owner Register</a></li>
                                <li><a href='tregister.php'>Traveller Register</a></li>
                            </ul>
                        </li>
                        <li><a class='dropdown-toggle' data-toggle='dropdown' href='#'><span class=' glyphicon glyphicon-log-in'></span> Login</a>
                            <ul class='dropdown-menu'>
                                <li><a href='ologin.php'>Owner Log-In</a></li>
                                <li><a href='tlogin.php'>Traveller Log-In</a></li>
                                <li><a href='alogin.php'> Admin Login </a></li>
                            </ul>
                        </li>
                        <li>   
                        <form method='POST' action='search.php' id='mysearch' >
                        <input style='margin-top:0.7em;' type='text' name='searchdata' placeholder= 'Search' />
                        <input style='font-size: 0.8em;' class='btn' type='submit' value='Go' name='search' />
                       </form></li>
                    </ul>
                </div>
            </div>";
    } else if ((isset($_SESSION['888_roleid']) ) && (false != $_SESSION['888_roleid'])) {
        if ('4' == $_SESSION['888_roleid']) {
            echo "<div class='container-fluid'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>                        
                    </button>
                    <a class='navbar-brand' href='index.php'>Kribs</a>
                 <li><a class='dropdown-toggle' data-toggle='dropdown' href='#'> Properties </a>
                            <ul class='dropdown-menu'>";
                                if (mysqli_num_rows($navresult) > 0) {
            echo "<li class='dropdown'>";
            while ($row = mysqli_fetch_assoc($navresult)) {

                $navtext = $row["location"];
                $navid = $row["id"];

                echo "<li><a href='properties.php?filterdata=$navid'>$navtext</a></li>";
            }
            
        

            echo "</ul>";
            echo "<li><a href='publichelp.php'>Help</a></li>";
        }

                         echo"  </ul>
                        </li>";
                         
            echo "<ul class='nav navbar-nav navbar-right'>
                        <li><a class='dropdown-toggle' data-toggle='dropdown' href='#'><span class=' glyphicon glyphicon-user'></span> My Profile </a>
                            <ul class='dropdown-menu'>
                                <li><a href='owner/ownerhome.php'>View Profile</a></li>
                            </ul>
                        </li>
                        <li><form method='POST'>
				<li><button id='submit' type='submit'name='logout'>log out</button></li>
			</form>
                        </li>
                    </ul>
                </div>
            </div>";
        } else if ('5' == $_SESSION['888_roleid']) {
            echo "<div class='container-fluid'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>                        
                    </button>
                    <a class='navbar-brand' href='index.php'>Kribs</a>
                </div>
                <div class='collapse navbar-collapse' id='myNavbar'>
                    <ul class='nav navbar-nav'>
                        <li class='active'><a href='index.php'>Home</a></li>";
            if (mysqli_num_rows($navresult) > 0) {
                echo "<li class='dropdown'>
			<li><a href='properties.php?filterdata=featured'></a></li>";
                while ($row = mysqli_fetch_assoc($navresult)) {

                    $navtext = $row["location"];
                    $navid = $row["id"];

                    echo "<li><a href='properties.php?filterdata=$navid'>$navtext</a></li>";
                }

                echo "</ul>";
            }
            echo "<ul class='nav navbar-nav navbar-right'>
                        <li><a class='dropdown-toggle' data-toggle='dropdown' href='#'><span class=' glyphicon glyphicon-user'></span> My Profile </a>
                            <ul class='dropdown-menu'>
                                <li><a href='traveller/travellerhome.php'>View Profile</a></li>
                            </ul>
                        </li>
                        <li><form method='POST'>
				<li><button id='submit' type='submit'name='logout'>log out</button></li>
			</form>
                        </li>
                    </ul>
                </div>
            </div>";
        }
    }
}


function readproperties($filter) {
    
    include('connection/conn.php');
   
    $queryread = "SELECT property_houses.prop_id, property_houses.price, property_houses.prop_name, property_houses.image, property_houses.prop_address, property_houses.people, property_houses.bedrooms, property_houses.bathrooms, prop_locations.description
	FROM property_houses
	INNER JOIN prop_locations
	ON property_houses.type_id = prop_locations.id
        WHERE prop_locations.id in ($filter) AND hidden = 0 AND banned = 0 ";

    $result = mysqli_query($conn, $queryread) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $address = $row["prop_address"];
            $iddata = $row["prop_id"];
            $name = $row["prop_name"];
            $price = $row["price"];
            $image = $row["image"];
            $people = $row["people"];
            $bedrooms = $row["bedrooms"];
            $bathrooms = $row["bathrooms"];
            echo "<div id='seperate'>
                  <a href='limproperty.php?pro_id=$iddata'>
	              <div class='box3'><h3>$name</h3></div></a> 
                    <h4>$address</h4>
	            <div class='row'>
                     <div class='col-sm-6'>
                     <ul class='thumbnails'>

    <img height='200' width='200' src='img/$image' alt='' />
  </li>
</ul>
                      </div>
                      <div class='col-sm-6'>
                      <span class='glyphicon glyphicon-bed'> Bedrooms $bedrooms </span>
                      <span class='glyphicon glyphicon-tint'> Bathrooms $bathrooms </span>
                      <span class='glyphicon glyphicon-user'> People $people </span> </br>
                      <span class='glyphicon glyphicon-gbp'> ppn $price </span>


                  </div> 
                  </div>
          </div>";
        }
    } else  {
        echo "<h2> No Properties Available </h2>";
    }
    mysqli_close($conn);
}

function readproperties2($filter) {
    include('../connection/conn.php');
    $queryread = "SELECT property_houses.prop_id, property_houses.price, property_houses.prop_name, property_houses.image, property_houses.prop_address, property_houses.people, property_houses.bedrooms, property_houses.bathrooms, prop_locations.description
	FROM property_houses
	INNER JOIN prop_locations
	ON property_houses.type_id = prop_locations.id
        WHERE prop_locations.id in ($filter) AND hidden = 0 AND banned = 0";
   

    $result = mysqli_query($conn, $queryread) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $address = $row["prop_address"];
            $iddata = $row["prop_id"];
            $name = $row["prop_name"];
            $price = $row["price"];
            $image = $row["image"];
            $people = $row["people"];
            $bedrooms = $row["bedrooms"];
            $bathrooms = $row["bathrooms"];
            echo "<div id='seperate'>
                  <a href='viewproperty.php?pro_id=$iddata'>
	              <div class='box3'><h3>$name</h3></div></a> 
                    <p>$address</p>
	            <div class='row'>
                     <div class='col-sm-6'>
                  <img height='200' width='200' src='../img/$image' alt='' />
                      </div>
                      <div class='col-sm-6'>
                      <span class='glyphicon glyphicon-bed'> Bedrooms $bedrooms </span>
                      <span class='glyphicon glyphicon-tint'> Bathrooms $bathrooms </span>
                      <span class='glyphicon glyphicon-user'> People $people </span> </br>
                      <span class='glyphicon glyphicon-gbp'> ppn $price </span>


                      </div>   
                  </div> 
          </div>";
        }
    } else {
        echo "<h2> No Properties Available </h2>";
    }
    mysqli_close($conn);
}

function readDescription($filter) {
    include('connection/conn.php');
    $descriptread = "SELECT * FROM  prop_locations
        WHERE prop_locations.id in ($filter)";
    $descriptresult = mysqli_query($conn, $descriptread) or die(mysqli_error($conn));


    if (mysqli_num_rows($descriptresult) > 0) {
        while ($row = mysqli_fetch_assoc($descriptresult)) {
            $description = $row["description"];
            echo "<div> $description</div>";
        }
    }
}

function readDescription2($filter) {
    include('../connection/conn.php');
    $descriptread = "SELECT * FROM  prop_locations
        WHERE prop_locations.id in ($filter)";
    $descriptresult = mysqli_query($conn, $descriptread) or die(mysqli_error($conn));


    if (mysqli_num_rows($descriptresult) > 0) {
        while ($row = mysqli_fetch_assoc($descriptresult)) {
            $description = $row["description"];
            echo "<div> $description</div>";
        }
    }
}

function readTitle($filter) {
    include('connection/conn.php');
    $titleread = "SELECT * FROM  prop_locations
        WHERE prop_locations.id in ($filter)";
    $titleresult = mysqli_query($conn, $titleread) or die(mysqli_error($conn));


    if (mysqli_num_rows($titleresult) > 0) {
        while ($row = mysqli_fetch_assoc($titleresult)) {
            $title = $row["title"];
            echo "<div> <h1> $title </h1></div>";
        }
    }
}

function readTitle2($filter) {
    include('../connection/conn.php');
    $titleread = "SELECT * FROM  prop_locations
        WHERE prop_locations.id in ($filter)";
    $titleresult = mysqli_query($conn, $titleread) or die(mysqli_error($conn));


    if (mysqli_num_rows($titleresult) > 0) {
        while ($row = mysqli_fetch_assoc($titleresult)) {
            $title = $row["title"];
            echo "<div> <h1> $title </h1></div>";
        }
    }
}

