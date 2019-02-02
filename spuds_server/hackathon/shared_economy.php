<!doctype html>
<?php
session_start();
if(isset($_SESSION['message'])){
  $a = $_SESSION['message'];
  echo '<script>
    alert("'.$a.'");
  
  </script>';
  session_unset();
  
}
?>
<html lang="en">
  <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha256-916EbMg70RQy9LHiGkXzG8hSg9EdNy97GazNG/aiY1w=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" integrity="sha256-00w68NO3TLuHjKRHJmjrrgJBDtG/6OhbJEu1gtHcsuo=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css" />

  <link rel="stylesheet" href="assets/css/style.css" />
  
    <title>Welcome to our Shared Economy PLatform</title>
  </head>
  <nav class="navbar navbar-default navbar-fixed-top" id="top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#top">Legal Kaki </a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="signup.php">Logout</a></li>
            </ul>
        </nav>
  <body>
<br><br><br>

<section>
      <div class="row">
      <div class="col-md-12 text-center content-header">
      <div class="panel panel-info">
          <div class="panel-heading"><h2>Welcome to our Shared Economy Platform</h2></div>
          <div class="panel-body">
            <h4>Answer a few questions so we can match you and similar clients to attorney's best suited for you</h4>
          </div>
      </div>
  </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

<form method="POST" action="shared_economy1.php"> 
  <div id='1' class="form-group" style="display:" >
    <label for="exampleFormControlSelect1">Select an Issue Area</label>
    <select name="issue_area" class="form-control" id="exampleFormControlSelect1">
      <option value="Personal Injury">Personal Injury</option>
      <option value="Crime">Crime</option>
      <option value="Family">Family</option>
      <option value="Syariah matters">Syariah matters</option>
      <option value="Contract">Contract</option>
    </select>
    </div>

  
  <div class="form-group">
    <label for="exampleFormControlSelect2">How long ago was it?</label>
    <select class="form-control" name="time" id="exampleFormControlSelect2">
      <option value="less than 3 years">less than 3 years</option>
      <option value="more tham three years">more tham three years</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect3">What action have you taken so far?</label>
    <select class="form-control" name="action_taken"  id="exampleFormControlSelect3">
      <option value="Nothing">Nothing</option>
      <option value="Writ of summons served">Writ of summons served</option>
      <option value="Pre-trial process">Pre-trial process</option>
      <option value="Trial ongoing">Trial ongoing</option>
      <option value="Appeal">Appeal</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect4">What is your primary type of injury</label>
    <select class="form-control" name="injury"  id="exampleFormControlSelect4">
      <option value="Physical">Physical</option>
      <option value="Phychiatric">Phychiatric</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect5">Select a category that best describes your case</label>
    <select class="form-control" name="category"  id="exampleFormControlSelect5">
      <option value="Medical Negligence">Medical Negligence</option>
      <option value="Workplace injury">Workplace injury</option>
      <option value="Vehicular Acciden">Vehicular Accident</option>
      <option value="Battery/Assault">Battery/Assault</option>
      <option value="Negligence">Negligence</option>
      <option value="Other">Other</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea6">Please give us a brief desription of your case and what you seek</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea6" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect7">Number of people you're willing to share the consult with?</label>
    <select  class="form-control" name="number_of_people"  id="exampleFormControlSelect7">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
    
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect8">Please select your preffered per hour consultation fees</label>
    <select class="form-control" name="fees" id="exampleFormControlSelect8">
      <option value="100">100/hr</option>
      <option value="200">200/hr</option>
      <option value="300">300/hr</option>
    </select> <br>
    <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
  </body>


</html>