<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  
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
            <a class="navbar-brand" href="#top">Legal Ka-Key </a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Signup</a></li>
            </ul>
        </nav>
  <body>
<h1>Welcome to our Shared Economy PLatform</h1>  
    <h2>Answer a few questions so we can match you and similar clients to attorney's best suited for you</h2>

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
    </select>
    <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
  </body>


</html>