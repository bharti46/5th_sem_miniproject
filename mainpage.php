<!DOCTYPE html>
<html lang="en">
<head>
<title> working with bootstrap </title>
<link href="css/bootstrap.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <?php 

include("navigation.php");  //include function includes the file source to the existing file 

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
<input type="submit" value="Search" class="btn btn-default">
</form>

</div>
<script src="js/bootstrap.js">  </script>
<script src="js/jquery.min.js">  </script>


</div>

</body>
</html>
