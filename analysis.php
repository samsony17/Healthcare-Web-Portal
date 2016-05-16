<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthCareAnaylsis</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Optional theme -->
<script type="text/javascript" src="jquery-1.3.2.js" 
var $rows = $('#table tr');
$('#search').keyup(function() {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
   <style>
       table { 
        
            table-layout: auto;
            width: 100%;

}
       

        td img {
            height:10mm;
        }
        th {
    text-align: center;
    vertical-align: inherit;
      border-spacing: 20px;
}

        td {
            width: 30mm;
            height:21.2mm;
            padding: 0 1mm 0 1mm;
            font-style: bold;
            text-align: center; 
            vertical-align:middle;
            padding: 6px;
        }


        tr    { 
            page-break-after:auto;
            page-break-inside:avoid; 
            height:21.2mm;
            margin:0;
            padding:0;
            page-break-inside:avoid;             
        }

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
.highlightrow:hover td
{
  background-color: Black;
  color: white;
  cursor: pointer;
}
    </style>
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="50">
  <nav class="navbar navbar-inverse navbar-fixed-top " id ="my-navbar" role="navigation">
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
  <li><a class="page-scroll"href="#home">Home</a></li>
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
<a href="analysis.php" class="ntm btn btn-info"> Analysis</a>
<a href="Statistics.php" class="ntm btn btn-default"> Statistics</a>
</div>
</div>
</div>
</section>
</div>

<?php


if(preg_match("/^[ A-Z 0-9]+/", $_REQUEST['search_code'])){
 $search_code=$_REQUEST['search_code'];
 
 $db= mysql_connect('omega.uta.edu','sxy4836','Simple1');
$mydb =mysql_select_db('sxy4836');


}
?>

<div class="table-responsive">
  <table id ="table "class="table table-hover">
    <thead>
  <table  cellspacing="1" cellpadding="1"  border-spacing: 20px;>
    <tr> 
   
      <th>National Provider ID</th>
      <th>#</th>
      <th>Stay Length</th>
      <th>Mortality Rate </th>
      <th>Age</th>
      <th>Type of Admission</th>
      <th>Average Charges</th>
      <th>Rating</th>

</tr>
</thead>
<tbody>
<?php

$row_ctr = 1;

$sql =mysql_query("SELECT p.National_Provider_ID,PatientAdmissions ,StayLength, Age, Sex,Type_of_Admission,AverageCharges, Mortality_Rate FROM (SELECT National_Provider_ID, count(National_Provider_ID)as PatientAdmissions,Avg (Length_of_Stay)as StayLength, 
Avg(Total_Charges)as AverageCharges, Sex, Age ,Type_of_Admission FROM Hospital where Admitting_Diagnosis_Code ='$search_code' 
 group by National_Provider_ID order by PatientAdmissions DESC ) p INNER JOIN (SELECT ((x.a)*100/(y.b)) Mortality_Rate,x.National_Provider_ID from
  (select count(Discharge_Status)a,National_Provider_ID from Hospital where Admitting_Diagnosis_Code = '$search_code' and Discharge_Status = 2 group by National_Provider_ID )x,
  (select count(Discharge_Status)b,National_Provider_ID from Hospital where Admitting_Diagnosis_Code = '$search_code' group by National_Provider_ID)y where x.National_Provider_ID=y.National_Provider_ID ) q  on p.National_Provider_ID =q.National_Provider_ID Limit 20 ");


while($r = mysql_fetch_assoc($sql))
{
  $Mortality = array($r['Mortality_Rate']);
  $Length=array($r['StayLength']);
  for( $y = 0 ; $y < count($Length) ; $y++ ){
for( $i = 0 ; $i < count($Mortality) ; $i++ ){

if(($Length[$y]<2)&&($Mortality[$i]<5.0)){
  $Rating = 5;

$HTML = "";

for( $i=0; $i<$Rating; $i++ ){
    $HTML .= "<img src=img/star.png alt='Whole Star' width='24' height='24'>";
}

}
else if(($Length[$y]<5.0)&&($Mortality[$i]<10.0)){
  $Rating =4;

$HTML = "";

for( $i=0; $i<$Rating; $i++ ){
    $HTML .= "<img src=img/star.png alt='Whole Star' width='24' height='24'>";
}

}
else if(($Length[$y]>5.0)&&($Mortality[$i]<15.0)){
  $Rating =3;

$HTML = "";

for( $i=0; $i<$Rating; $i++ ){
    $HTML .= "<img src=img/star.png alt='Whole Star' width='24' height='24'>";
}

}
else if(($Length[$y]>12.0)&&($Mortality[$i]<40.0)){
  $Rating =2;

$HTML = "";

for( $i=0; $i<$Rating; $i++ ){
    $HTML .= "<img src=img/star.png alt='Whole Star' width='24' height='24'>";
}

}
else 
  $Rating =1;

$HTML = "";

for( $i=0; $i<$Rating; $i++ ){
    $HTML .= "<img src=img/star.png alt='Whole Star' width='24' height='24'>";
}
}
}
  
    if (($row_ctr % 2) == 0) 
      $alternate = "even";
  else $alternate = "odd";
  echo "<tr class='highlightrow'>";
  echo "<td class='$alternate'>".$r['National_Provider_ID']."</td>";
  echo "<td class='$alternate'>".$r['PatientAdmissions']."</td>";
  echo "<td class='$alternate'>".$r['StayLength']."</td>";
   echo "<td class='$alternate'>".$r['Mortality_Rate']."</td>";
    echo "<td class='$alternate'>".$r['Age']."</td>";
    // echo "<td class='$alternate'>".$Diagnosis['Sex']."</td>";
      echo "<td class='$alternate'>".$r['Type_of_Admission']."</td>";
  echo "<td class='$alternate'>".$r['AverageCharges']."</td>";
  echo"<td class='$alternate' >" .$HTML."</td>";
  echo "</tr>";
  $row_ctr +=1;
}

?>
</tbody>
</table>
</div>


<div class="container text-center">                  
  <ul class="pagination pagination-sm">
    <li ><a href="index.html">1</a></li>
    <li class="active"><a href="analysis.php">2</a></li>
    <li><a href="Statistics.php">3</a></li>
   </ul>
</div>

<section id="contact">
  <div class="navbar navbar-default ">
    <div class="container text-center">
     
     <p>
       &#169; copyright Health Admission UTA 2015<br />  Contact 
        <a href="mailto:someone@example.com">email@email.com</a>
      </p>
</div>
    </footer>
  </div>
</section>

   
    <script src="js/bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
  </body>
</html>

  