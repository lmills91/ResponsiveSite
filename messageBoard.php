<?php  //code to only allow a certain number of records to be shown per page.
	$servername = "localhost";
					$username = "dwt50";
					$password = "F4EEOP";
					$dbname = "dwt50_a";
					$date=date('Y-m-d');
					
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);

	
	
	$sql = "SELECT COUNT(id) FROM forum";//  get the total number of rows
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_row($result);
	
	
	$rows = $row[0];// Here we have the total row count
	
	
	$maxNoOfRecords = 5;// This is the number of results we want displayed per page
	
	
	$lastPage = ceil($rows/$maxNoOfRecords);// This tells us the page number of our last page. ceil round up a floating point number to the nearest integer.
	
	$currentPage = 1;
	if($lastPage < 1){
		$lastPage = 1;
	}
	
	
	
	
	// Get pagenumber from URL variables if it is present, else it is = 1
	if(isset($_GET['pageNumber'])){
		$currentPage = preg_replace('#[^0-9]#','', $_GET['pageNumber']);
	}
	
	// This makes sure the current page number isn't below 1, or more than our $lastPage page
	if ($currentPage < 1) { 
	    $currentPage = 1; 
	} else if ($currentPage > $lastPage) { 
	    $currentPage = $lastPage; 
	}
	
	
	// This sets the range of rows to query for the chosen $currentPage
	$limit = 'LIMIT ' .($currentPage - 1) * $maxNoOfRecords .',' .$maxNoOfRecords;
	
	// Establish the $pageLinks variable
	$pageLinks = '';
	
	// If there is more than 1 page worth of results, generate links to other pages. If we are currently on page 1, don't show link to previous page.
	if($lastPage != 1){
		if ($currentPage > 1) {
	        $previous = $currentPage - 1;
			$pageLinks .= '<a href="'.$_SERVER['PHP_SELF'].'?pageNumber='.$previous.'"><span class="glyphicon glyphicon-chevron-left text-success"></span>Previous</a> &nbsp; &nbsp; ';
			// for loop to show page numbers which can be clicked to go to that page number, to the left of the current Page number.
			for($counter = $currentPage-4; $counter < $currentPage; $counter++){
				if($counter > 0){
			        $pageLinks .= '<a href="'.$_SERVER['PHP_SELF'].'?pageNumber='.$counter.'">'.$counter.'</a> &nbsp; ';
				}
		    }
	    }
	    
		$pageLinks .= ''.$currentPage.' &nbsp; ';	// Shows current page number without having a link associated
		
			
		for($counter = $currentPage+1; $counter <= $lastPage; $counter++){ 
			$pageLinks .= '<a href="'.$_SERVER['PHP_SELF'].'?pageNumber='.$counter.'">'.$counter.'</a> &nbsp; ';
				
		}
		
		if ($currentPage != $lastPage) {	// if current page is not the last page, create a link "next" to the next page.
	        $next = $currentPage + 1;
	        $pageLinks .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pageNumber='.$next.'">Next<span class="glyphicon glyphicon-chevron-right text-success"></span></a> ';
	    }
	}
	
	
	mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.css">

<script src="bootstrap-3.3.5-dist/jquery.min.js"></script>
<script src="bootstrap-3.3.5-dist/js/bootstrap.js"></script>


<title>1st Milngavie Guides</title>

  <script type="text/javascript">
    // Picture element HTML5 shiv
    document.createElement( "picture" );
  </script>
  
  <script type="text/javascript" src="bootstrap-3.3.5-dist/js/picturefill.js" async></script>

</head>


<body>

	
<div class="container">
	<div class="hidden-xs">
		<br><a href="default.html">
			<picture class="pull-left">
				<!--[if IE 9]><video style="display: none;"><![endif]--> <!--deals with incompatibiliity with ie9-->
						
					    					    
				<source srcset="Images/GuidesLogo.jpg" media="(min-width: 1200px)">
				<source srcset="Images/GuidesLogo-md.jpg" media="(min-width: 900px)">		
						
				<!--[if IE 9]></video><![endif]-->
						
				<img class="pull-left" srcset="Images/GuidesLogo-sm.jpg" alt="milngavie girlguiding"><!--default image-->
			</picture>

	    	
			<picture class="pull-right">
				<!--[if IE 9]><video style="display: none;"><![endif]--> <!--deals with incompatibiliity with ie9-->
						
					    					    
				<source srcset="Images/logo2.jpg" media="(min-width: 1200px)">
				<source srcset="Images/logo2-md.jpg" media="(min-width: 900px)">		
						
				<!--[if IE 9]></video><![endif]-->
						
				<img class="pull-right" srcset="Images/logo2-sm.jpg" alt="milngavie girlguiding"><!--default image-->
			</picture>
		</a>



	</div>

</div>

	


<div class="container-fluid"><!--start of navigation-->




<div class="row">

       <div class="visible-sm visible-md visible-lg">
      
      <nav class="navbar navbar-default">
          <ul class="nav navbar-nav">
        	<li><a href="default.html">Home<span class="sr-only">(current)</span></a></li>
        	<li class="dropdown">
          		<a href="gallery.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Images<span class="caret"></span></a>
          		<ul class="dropdown-menu">
            		<li><a href="dec2014.html">Sept-Dec 2014</a></li>
            		<li><a href="jun2015.html">Jan-June 2015</a></li>
            		<li><a href="dec2015.html">Sept-Dec 2015</a></li>
            		<li role="separator" class="divider"></li>
            		<li><a href="gallery.html">All Images</a></li>
          		</ul>
        	</li>
        	<li><a href="newbies.html">New Guides</a></li>
        	<li><a href="events.html">What's Happening?</a></li>
        	<li><a href="parentsArea.html">Parents Area</a></li>
        	<li><a href="messageBoard.php">Message Board</a></li>
        	<li><a href="evaluation.html">Evaluation Form</a></li>
      	</ul>

      	
     
      	<ul class="nav navbar-nav navbar-right">
          	<li class="dropdown">
          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Useful External Links<span class="caret"></span></a>

				<ul class="dropdown-menu">
            		<li><a href="https://enquiryv.girlguiding.org.uk/" target="_blank">Volunteer!</a></li>
            		<li><a href="https://enquiryym.girlguiding.org.uk/" target="_blank">Register Your Daughter</a></li>
            		<li><a href="http://www.girlguidingshop.co.uk/en-GB/Products/GirlGuides/Guides/Wear---Guides--Girlguiding/" target="_blank">Uniform</a></li>
            		<li><a href="https://www.girlguiding.org.uk/guides/gfibadge/badges/index.html" target="_blank">Badges</a></li>
            		
          		</ul>
        	</li>
      	</ul>
      	
      </nav>
    </div>




    
    <div class="visible-xs container-fluid">
    
      <nav class="navbar navbar-default navbar-fixed-top text-center">
      
          <ul class="nav navbar-nav">
        	<li><a href="default.html">Home</a></li>
        	<li class="dropdown">
          		<a href="gallery.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Images<span class="caret"></span></a>
          		<ul class="dropdown-menu">
            		<li><a href="dec2014.html">Sept-Dec 2014</a></li>
            		<li><a href="jun2015.html">Jan-June 2015</a></li>
            		<li><a href="dec2015.html">Sept-Dec 2015</a></li>
            		<li role="separator" class="divider"></li>
            		<li><a href="gallery.html">All Images</a></li>
          		</ul>
        	</li>
        	
        	<li class="dropdown">
          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More<span class="caret"></span></a>

				<ul class="dropdown-menu">
					<li><a href="newbies.html">New Guides</a></li>
            		<li><a href="parentsArea.html">Parents</a></li>
        			<li><a href="events.html">Events</a></li>
        			<li><a href="messageBoard.php">Message Board</a></li>
        			<li><a href="patrols.html">Patrols</a></li>
        			<li><a href="contact.php">Contact</a></li>

            		<li><a href="default.html#footer">Useful Links</a></li>
          		</ul>
        	</li>
        	<li><a href="evaluation.html">Evaluation</a></li>
      	</ul>


      </nav>
  
   </div>



<!--end of navbar-->

<div class="container" id="mainContent"> 
	
	<div><!--page header-->
		<br>	
		<div class="panel-banner col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
		
     		<div class="panel-heading ">
     				
     		</div>
     		
     		<div class="panel-body text-center" style="background:white;">
     			<h3 class="text-success">Message Board</h3>
     			Post feedback and/or suggestions for activities on our message board below.
     			<span class="hidden-xs"><br><br></span>
     		</div>
     		
     		<div class="panel-footer">
     			
     		</div>
     		<br><br>
     	</div>
     	
		
		<br><br>     	
     </div><!--end page header-->
	
	<div class="row col-xs-10 col-xs-offset-1">
		<p class="text-center">If you have any queries, please don't hesitate to contact us either via our<a href="contact.php" class="text-success"><b>
		 contact form</b></a> or by emailing us directly at <a class="text-success" href="mailto:1stmilngavieguides@gmail.com">1stmilngavieguides@gmail.com</a></p>
	<br>
	<br>						
	</div>
	
	<div class="row col-xs-10 col-xs-offset-1">
	
		<form method="post" action="message.php">
		
	  		<div class="form-group">
	    		<label for="userName">Title:<span class="text-danger"> *</span></label>
	    		<textarea name="userName" id="userName" class="form-control" placeholder="enter title..." required="required" rows="1"></textarea>
	  		</div>
	  		
	  		<div class="form-group">
	    		<label for="message">Comment:<span class="text-danger"> *</span></label>
	    		<textarea name="message" id="message" class="form-control" placeholder="enter comment..." required="required" rows="3">
	    		</textarea>
	   		</div>
	  		
	  		 		
	  		
	  		<div class="col-xs-offset-5 col-sm-offset-5 col-xs-2"> <!--Submit button sends answers to database-->
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>

	  		
		</form>
	<br>
	</div>
	
	<br><br>
	
	<div ><br></div>
	<div class="row col-xs-10 col-xs-offset-1" id="messages"><!--showing messages posted-->
	<br><h2 class="text-success">Messages...<br><br></h2>
	<?php
						$servername = "localhost";
						$username = "dwt50";
						$password = "F4EEOP";
						$dbname = "dwt50_a";
						$date=date('Y-m-d');
						
						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
						    die("Connection failed: " . $conn->connect_error);
						} 

						$sql = "SELECT * FROM forum ORDER BY id DESC $limit";
						$result = mysqli_query($conn, $sql);
					
						if (mysqli_num_rows($result) > 0) {
						   while($row = mysqli_fetch_assoc($result)) {
						        echo "<div class='well well-sm center-block'><p class='text-center text-success'><br>"
						        		.$row["user"]." on ".$row["date"]."<br></p><p class='text-center'>". $row["message"]."<br></p></div><br>";
					        				        	
					   		}
						} else {
	    					echo "0 results to show";
					
						}
					
					
						mysqli_close($conn);
						

				?>
				<p class="text-center">
	  				<?php 
	  					echo "Currently viewing page ". $currentPage." of ". $lastPage ; 
	  				?>

    			</p>
    
  				<div id="controls" class="center-block text-center"><?php echo $pageLinks; ?></div>
				
				
			
	
	</div><!--showing messages-->
     
</div><!--/.container mainContent-->
  
</div><!-- /.container navigation-->   
  
</div>   
   
 
     

<div id="footer" class="col-xs-10 col-xs-offset-1">
	<div class="container text-center">
	<br><br><br>
		<a href="default.html">Home|</a>
		<a href="parentsArea.html">Parents Area|</a>
		<a href="events.html">What's Happening?</a><br>
		<a href="https://enquiryv.girlguiding.org.uk/">Volunteer!|</a>
        <a href="https://enquiryym.girlguiding.org.uk/">Register Your Daughter|</a>
        <a href="messageBoard.php">Contact Us</a>
    <br>
	    <div class="text-success">
	    	&copy; Laura Mills | University of the West of Scotland<br><br>


	    </div>
	</div>		
</div><!--.container footer-->


</body>

</html>
