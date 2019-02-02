<hmtl>

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
            <a class="navbar-brand" href="#top">Legal Kaki </a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="#malay">Logout</a></li>
            </ul>
        </nav>

        <br><br>

        <?php
            $q0=$_POST["q0"];
            $q1=$_POST["q1"];
            $q2=$_POST["q2"];
            $q3=$_POST["q3"];
            $q4=$_POST["q4"];
            $q5=$_POST["q5"];
            $q6=$_POST["q6"];

            $net_assets = $q0-$q1-$q2-$q3-$q4-$q5-$q6;

            $mother=$_POST["mother"];
            $father=$_POST["father"];
            $wife=$_POST["wife"];
            $husband=$_POST["husband"];
            $daughter=$_POST["daughter"];
            $son=$_POST["son"];
            $niece=$_POST["niece"];
            $nephew=$_POST["nephew"];
            
            
        ?>
        <br><br>

        <section>
            <div class="row">
            <div class="col-md-12 text-center content-header">
            <div class="panel panel-warning">
                <div class="panel-heading"><h3><?php echo "Assets to be split: $net_assets" ?></h3></div>
                <div class="panel-body"><h4>
                    <?php
                        if($wife==1 and $daughter==2 and $father==1 and $mother==1){
                            echo "Assets to Wife- ";
                            echo round($net_assets*(3/27), 2);
                            echo "<br>";
                            echo "Assets to Mother- ";
                            echo round($net_assets*(4/27), 2);
                            echo "<br>";
                            echo "Assets to Father- ";
                            echo round($net_assets*(4/27), 2);
                            echo "<br>";
                            echo "Assets to each daughter- ";
                            echo round($net_assets*(8/27), 2);
                            echo "<br>";
                        }

                    ?></h4>
                </div>
            </div>
        </section>

        <br><br>

        <section>
            <div class="row">
            <div class="col-md-12 text-center content-header">
            <div class="panel panel-danger">
                <div class="panel-heading"><h2>Next Steps:</h2></div>
                <div class="panel-body">
                <h4>Have you gotten a certificate of inheritance? </h4>
                <p><a class="btn btn-warning btn-lg" href="calculator2.php" role="button">Yes</a>
                <a class="btn btn-warning btn-lg" href="https://www.syariahcourt.gov.sg/syariah/front-end/Home.aspx" role="button">No</a></p>
                </div>
            </div>
        </section>

      
    </body>
</html>
