<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha256-916EbMg70RQy9LHiGkXzG8hSg9EdNy97GazNG/aiY1w=" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
        <link rel="stylesheet" href="assets/css/style.css" />
    </head>

    <body>
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
            <a class="navbar-brand" href="#top">Syariah Law </a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="home.php">English</a></li>
                <li><a href="#malay">Malay</a></li>
            </ul>
        </nav>

        <br><br><br>
        <section>
            <div class="row">
            <div class="col-md-12 text-center content-header">
            <div class="panel panel-info">
                <div class="panel-heading"><h2>Welcome to our Syariah Law Calculator</h2></div>
                <div class="panel-body">
                    <h4>Answer a few questions so we can help you calculate the amount of assets for the relevant people</h4>
                </div>
            </div>
        </section>
 
        <section id="english">
        <form method="post" action="calculator1.php">
            <br>

            <p>How much assets does the deceased have?</p>
            <p><input type="text" name="q0"></p>

            <p>Q1. How much gifts (hibah) were made while the deceased was still alive? (insert 0 if not applicable)</p>
            <p><input type="text" name="q1"></p>

            <p>Q2. How much jointly acquired matrimonial properties are there? (insert 0 if not applicable)</p>
            <p><input type="text" name="q2"></p>

            <p>Q3. How much vows to God (nazar) were made? (insert 0 if not applicable)</p>
            <p><input type="text" name="q3"></p>

            <p>Q4. How much funeral/ death related expenses were made? (insert 0 if not applicable)</p>
            <p><input type="text" name="q4"></p>

            <p>Q5. How much debt to God (zakad, fidyah, hajj) were made? (insert 0 if not applicable)</p>
            <p><input type="text" name="q5"></p>

            <p>Q6. How much debt to person was made? (insert 0 if not applicable)</p>
            <p><input type="text" name="q6"></p>

            <p> List the relevant number of each relative entitled to the deceased's assets(insert 0 if not applicable)</p>
            <p><textarea name="mother" rows="1" cols="4"></textarea>Mother</p>
            <p><textarea name="father" rows="1" cols="4"></textarea>Father</p>
            <p><textarea name="wife" rows="1" cols="4"></textarea>Wife/Wives</p>
            <p><textarea name="husband" rows="1" cols="4"></textarea>Husband</p>
            <p><textarea name="daughter" rows="1" cols="4"></textarea>Daughter(s)</p>
            <p><textarea name="son" rows="1" cols="4"></textarea>Son(s)</p>
            <p><textarea name="niece" rows="1" cols="4"></textarea>Niece(s)</p>
            <p><textarea name="nephew" rows="1" cols="4"></textarea>Nephew(s)</p>
        
            <input type="submit" value="Calculate">
        </form>
        </section>



        <section id="malay">
        <form method="post" action="calculator1.php">
            <br><br><br>

            <p>Berapakah jumlah harta yang ditinggalkan oleh arwah?</p>
            <p><input type="text" name="q0"></p>

            <p>Q1. Berapakah jumlah hibah yang diberikan arwah? (isi 0 jika tiada jawapan)</p>
            <p><input type="text" name="q1"></p>

            <p>Q2. Berapakah jumlah harta sepencariah? (isi 0 jika tiada jawapan)</p>
            <p><input type="text" name="q2"></p>

            <p>Q3. Berapakah jumlah yang telah dingzarkan? (isi 0 jika tiada jawapan)</p>
            <p><input type="text" name="q3"></p>

            <p>Q4. Berapakah perbelaryaah bagi jenazah? (isi 0 jika tiada jawapan)</p>
            <p><input type="text" name="q4"></p>

            <p>Q5. Berapakah jumlah hutang kepada Allah (zakat, fidyah, haji)? (isi 0 jika tiada jawapan)? </p>
            <p><input type="text" name="q5"></p>

            <p>Q6. Berapakah jumlah hutang kepada manusia? (isi 0 jika tiada jawapan)</p>
            <p><input type="text" name="q6"></p>

            <p> Siapakah ahli keluarga yang berhak atas harta arwah(isi 0 jika tiada jawapan)</p>
            <p><textarea name="mother" rows="1" cols="4"></textarea>Ibu</p>
            <p><textarea name="father" rows="1" cols="4"></textarea>Ayah</p>
            <p><textarea name="wife" rows="1" cols="4"></textarea>Isteri</p>
            <p><textarea name="husband" rows="1" cols="4"></textarea>Suami</p>
            <p><textarea name="daughter" rows="1" cols="4"></textarea>Anak perempuan</p>
            <p><textarea name="son" rows="1" cols="4"></textarea>Anak lelaki</p>
            <p><textarea name="niece" rows="1" cols="4"></textarea>Keponakan</p>
            <p><textarea name="nephew" rows="1" cols="4"></textarea>Anak saudara lelaki</p>
            

            <input type="submit" value="Kira">
        </form>    
            
        </section> 

            
    </body>

</html>