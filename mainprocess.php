<!DOCTYPE html>
<html lang="en">
<head>
<title> working with bootstrap </title>
<link href="css/bootstrap.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php 

include("navigation.php");

?>  
<div class="container">
<div class="jumbotron">
 <h1>Welcome to baby names searcher </h1>
  <p>
  	This project is displaying the Popular Names by Birth Year where User can enter a year and choice like Top 10, Top 20..Top 1000 etc and the relevant names will be displayed.

  </p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>
<div class="well well-lg">
<form action="mainprocess.php" method="get">

Search by year :
<select name="yr" class="form-control">
<?php 
for($year=1944; $year<=2013; $year++)
{

  echo "<option>$year</option>";
}

?>
</select>
<br>
select the gender: 
<label class="radio-inline">
  <input type="radio" name="gender" id="inlineRadio1" value="male">Male
</label>
<label class="radio-inline">
  <input type="radio" name="gender" id="inlineRadio2" value="female"> Female
</label>
<label class="radio-inline">
  <input type="radio" name="gender" id="inlineRadio3" value="both"> Both
</label>
<br>
<br>
Search filters : <br>
<label class="checkbox-inline">
  <input type="checkbox" name="filters" id="inlineRadio3" value="10"> Top10 names
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="filters" id="inlineRadio3" value="20"> Top20 names
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="filters" id="inlineRadio3" value="50"> Top50 names
</label>
<label class="checkbox-inline">
  <input type="checkbox" name="filters" id="inlineRadio3" value="100"> Top100 names
</label>


<br><br>
<input type="submit" value="Search" class="btn btn-default">
</form>

<?php 

$yr= $_GET["yr"];

include("connect.php");

if(isset($_GET["gender"]))
{
	$gen=$_GET["gender"] ;


		babbynames($yr,$gen);

}
else
{
	babbynames($yr,"both");
}


function babbynames($year="",$gender="")
{
   if($gender!="both")
	{
		if(!isset($_GET["filters"]))
			{
				$query="select * from $gender"."_".$year;
			}
			else
			{
				
				$query="select * from $gender"."_".$year." LIMIT $_GET[filters]";
			}

		$qry= mysql_query($query)or die(mysql_error());

		$count=1;
		echo "<h3>Display of Baby names by gender: <b> $gender </b> , by year: <b>$year</b> </h3> ";
		
		echo "<div class='row'>";
		echo "<div class='col-md-6'>";
		echo '<table class="table table-hover">';
		echo "<tr><th>Ranking </th> <th>Name </th><th> No. of births</th> </tr>";
		while($row= mysql_fetch_array($qry))
		{
			echo "<tr><td>$count </td><td>$row[0] </td><td>$row[1] </td></tr>";
			$count++;
			
		}
		echo "</div> </div>";

	}
	else
	{

		$genders= array("male","female");

		foreach($genders as $gender)
		{
			if(!isset($_GET["filters"]))
			{
				$query="select * from $gender"."_".$year;
			}
			else
			{
				
				$query="select * from $gender"."_".$year." LIMIT $_GET[filters]";
			}
			$qry= mysql_query($query)or die(mysql_error());

			$count=1;
			echo "<div class='row'>";
			echo "<div class='col-md-6'>";
			echo "<h1>$gender</h1>";
			echo '<table class="table table-hover">';
			echo "<tr><th>Ranking </th> <th>Name </th><th> No. of births</th> </tr>";
				
			while($row= mysql_fetch_array($qry))
			{
				echo "<tr><td> $count</td><td>$row[0]</td><td>$row[1] </td></tr>" ;
				$count++;
				
			}
			echo '</table>';

			echo "</div>";

		echo "</div>";
		}
	}


}





?>
</div>
<script src="js/bootstrap.js">  </script>
<script src="js/jquery.min.js">  </script>


</div>

</body>
</html>




