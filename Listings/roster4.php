<?php
include("php/n413connect.php");

$query = "SELECT id, first_name, last_name, photo from class_roster2";
$result = mysqli_query($link, $query);

$students = Array();
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
	
	$students[] = Array( 	"id" => $row["id"],
							"first_name" => $row["first_name"],
							"last_name" => $row["last_name"],
							"photo" => $row["photo"] );
}
?>

<DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/n413_roster.css" rel="stylesheet">
		<script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <title>Student Roster</title>
        <script type="text/javascript">
			function click_me(id){
				alert("The Price of this herb is "+id);
			}
		</script>
    </head>
    
    <body>
    	<!-- BEGIN Bootstrap Navbar -->
    	<nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Auction House</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">Listings</a></li>
                <li><a href="#contact">Undercuts</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
        <!-- END Bootstrap Navbar -->
        <div class="container">
          <div class="row">
            <div class="col-xs-2"></div> <!-- 2-column spacer -->
            <div class="col-xs-10"> <!-- column for content -->
    <?php
    foreach ($students as $student){
        echo '
				<div id="student_'.$student["id"].'" class="student" onclick="javascript:click_me(\''.$student["id"].'\');">
					<img src="'.$student["photo"].'" height="30"> '.$student["first_name"].' '.$student["last_name"].'
				</div>';
    }
    ?>
    		</div> <!-- /col-xs-10 -->
    	  </div> <!-- /.row -->
    	</div>  <!-- /.container -->
    </body>
</html>