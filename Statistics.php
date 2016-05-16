<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<!-- Optional theme -->
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
   <a class="navbar-brand" href="#"><strong>Health Care</strong></a>


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
<p>Our intent is to improve the quality of life for the Texas people community. </p>
<div class="btn-group">
<a href="index.html" class="ntm btn btn-default"> Personalise</a>
<a href="#" class="ntm btn btn-default"> Analysis</a>
<a href="Statistics.php" class="ntm btn btn-info"> Statistics</a>
</div>
</div>
</div>
</section>
</div>
  <form for ="formSubmit" class="form-inline" id="search" action="Statistics1.php" method ="post">
<div  class="form-group">
        <fieldset id="inputs">
          <legend font -family:"verdana"align="center"><strong>Admission Criteria</strong></legend>
          <p>
            <label for="formCode" >Admitting Diagnosis Code</label> <input id="txtAdmitting" class="form-control" type="text"
              name='search_code' placeholder="Diagnosis Code"  required>

          </p>
           <label for="formScenario ">Scenario</label>
        <select form="search" name='scenario' size=0 >
              <option value="1" selected="selected">StayLength</option>
              <option value="2">Mortality Rate</option>
              <option value="3"> Average Charges</option>
            </select>
          </p>
         

<input class="btn btn-info btn-primary btn-md" id ="lbsumbit" type="submit" value="Submit" name="submit" />
 </div>
   
      </form>

 
   <script src="js/jquery-2.1.1.js"></script
    <script src="js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <div id="visualization" style="width: 900px; height: 500px;"></div>
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