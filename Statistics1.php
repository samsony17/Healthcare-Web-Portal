<?php
if(isset($_POST['submit'])){
  if(!empty($_POST['scenario']))
{
$scenario=$_POST['scenario'];



  if(preg_match("/^[ A-Z 0-9]+/", $_REQUEST['search_code'])){
 $search_code=$_REQUEST['search_code'];
 
$con=mysql_connect("omega.uta.edu","sxy4836","Simple1") or die("Failed to connect with database!!!!");
mysql_select_db("sxy4836", $con); 
if($scenario==1) {
$sth = mysql_query("SELECT National_Provider_ID, Avg(Length_of_Stay)as StayLength 
 FROM Hospital where Admitting_Diagnosis_Code ='$search_code' group by National_Provider_ID LIMIT 20");
}
else if($scenario==2){
   $sh = mysql_query("SELECT p.National_Provider_ID, Mortality_Rate FROM (SELECT National_Provider_ID FROM Hospital where Admitting_Diagnosis_Code ='$search_code' 
 group by National_Provider_ID ) p INNER JOIN (SELECT ((x.a)*100/(y.b)) Mortality_Rate,x.National_Provider_ID from
  (select count(Discharge_Status)a,National_Provider_ID from Hospital where Admitting_Diagnosis_Code = '$search_code' and Discharge_Status = 2 group by National_Provider_ID )x,
  (select count(Discharge_Status)b,National_Provider_ID from Hospital where Admitting_Diagnosis_Code = '$search_code' group by National_Provider_ID)y where x.National_Provider_ID=y.National_Provider_ID ) q  on p.National_Provider_ID =q.National_Provider_ID Limit 20 ");
}
else if($scenario==3){
  $st = mysql_query("SELECT National_Provider_ID,Avg(Total_Charges) as  AverageCharges FROM Hospital where Admitting_Diagnosis_Code ='$search_code' group by National_Provider_ID LIMIT 20");
}
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      google.load("visualization", "1", {packages:["corechart"]});
      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['National_Provider_ID','Stay_Length'],
          <?php if($scenario==1){
          while($s = mysql_fetch_assoc($sth)) {
            extract($s);
            echo "['{$National_Provider_ID}',{$StayLength}],";
          }
        } 
        else if($scenario==2){
          while($r = mysql_fetch_assoc($sh)) {
            extract($r);
            echo "['{$National_Provider_ID}',{$Mortality_Rate}],";
          }
        }
        else if($scenario==3)
        {
          while($t = mysql_fetch_assoc($st)) {
            extract($t);
            echo "['{$National_Provider_ID}',{$AverageCharges}],";
          }
        }

        

        ?>
            
        ]);

        var options = {
            title: 'Graph :',
            legend:{position:'none'},
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('visualization'));

        chart.draw(data, options);
      }
        google.setOnLoadCallback(drawVisualization);
      
    </script>

    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
     
      <style>
   h1 {
    color:blue;
    font-family:'Open Sans';
    font-size:270%;
}
 h2 {
    color:#00BFFF;
    font-family:'Open Sans';
    font-size:270%;
}
 h3 {
    color:#00BFFF;
    font-family:'Open Sans';
    font-size:160%;
}
p {
    color:C0C0C0;
    font-family:'Open Sans';
    font-size:100%;
  }
    </style>
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="50">
  <nav class="navbar navbar-inverse navbar-fixed-top" id ="my-navbar" role="navigation">
  <div class="container-fluid">
<a class="navbar-brand" rel="home" href="index.html" title="Health Care">
        <img style="max-width:50px; margin-left: 0px height:75px;"
             src="img/logo.jpg" class="img-thumbnail image-responsive">
   <a class="navbar-brand" href="#"><strong>Health Care </strong></a>


  <div class="navbar-header navbar-right">
  <button type="button" class ="navbar-toggle".data-toggle="collapse".data.target="#navbar-collapse">
 <span class="icon-bar"></span>   
 <span class="icon-bar"></span> 
 <span class="icon-bar"></span> 
 <span class="icon-bar"></span> 
 </button>

 <div class="collapse navbar-collapse" id="navbar-collapse">
  <ul class ="nav navbar-nav">
  <li><a class="page-scroll"href="index.html">Home</a></li>
          <li><a class ="page-scroll" href="#contact">Contact Us</a></li>
      </ul>
    </div>
      
  </div>
  </div>
</nav>
<section id="home" >
<div class="jumbotron">
<div class="container text-center">
<h2>Health Admission Navigation Portal</h2>
<p>The Mission of the Health Care Navigation Portal is to provide patient centered, holistic health care services to Texans.</p> 
<p>Our intent is to improve the quality of life for the Texas people community.  </p>
<div class="btn-group">
<a href="index.html" class="ntm btn btn-default"> Personalise</a>
<a href="#" class="ntm btn btn-default"> Analysis</a>
<a href="Statistics.php" class="ntm btn btn-info"> Statistics</a>
</div>
</div>
</div>
</section>
</div>
  

 
   <script src="js/jquery-2.1.1.js"></script
    <script src="js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <div id="visualization" style="width: 1000px; height: 500px;"></div>
    <div class="container text-center">                  
  <ul class="pagination pagination-sm">
    <li ><a href="index.html">1</a></li>
    <li><a href="analysis.php">2</a></li>
    <li class="active"><a href="Statistics.php">3</a></li>
   </ul>
</div>
    <section id="contact">
  <div class="navbar navbar-default ">
    <div class="container text-center">
     
     <p>
       &#169; copyright Health Admission UTA 2015<br />  Contact 
        <a href="mailto:someone@example.com">Healthservices@uta.com</a>
      </p>
</div>

    </footer>
  </div>
</section>
  </body>
</html>