<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM package WHERE CONCAT(`Packid`, `Packname`, `Category`, `Subcategory`,'Packprice') LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM package";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "travel");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>TraveManagementsystem</title>
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        
                <style>
            table,tr,th,td
            {
                border: 1px solid grey;
                width:800px;
            }
        </style>
        <link href="css/owl.carousel.css" rel='stylesheet' type='text/css'/>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
 //function hideURLbar(){ window.scrollTo(0,1); }


 </script>
<!--js-->
<script src="js/jquery.min.js"></script>

<!--/js-->
<!--animated-css-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--/animated-css-->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>

    </head>
    <body>


<div class="topnav">
<a class="active" href="index.php">Home</a>
<a href="index.php#section-2" onclick="javascript:window.open('index.php#section-2','_self')">About</a>
<a href="index.php#section-3" onclick="javascript:window.open('index.php#section-3','_self')">Gallery</a>
<a href="category.php" onclick="javascript:window.open('category.php','_self')">Category</a>
                           

  <a href="#contact">Contact</a>
  <div class="search-container">
    <form action="searchpackage1.php" method ="post">
      <input type="text" placeholder="Search.." name="valueToSearch">
      <button type="submit" name ="search"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

<br>
<div class= "row">
    <div class="col-sm-4 col-sm-push-4">

         <table class="table table-striped">
                <tr>                   
                    <th>Package Name</th>
                    <th>Package Price</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>

                    <td><?php echo $row['Packname'];?></td>
                    <td><?php echo $row['Packprice'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
      
</div>
</div>

    

<?php include('bottom.php'); ?>
        
    </body>
</html>
