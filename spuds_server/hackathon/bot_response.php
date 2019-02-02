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
            <a class="navbar-brand" href="#top">Law Kaki </a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li><a href="#malay">Logout</a></li>
            </ul>
        </nav>

        <br><br><br>

       <?php
require_once 'form.php';
require_once 'ConnectionManager.php';

function retrieve_answer() {
    $sql = 'select answer from conversation where id=1';
    $result = "";
    
    $connMgr = new ConnectionManager();
    $conn = $connMgr->getConnection();
    
    $stmt = $conn->prepare($sql);
    #$stmt->setFetchMode(PDO::FETCH_ASSOC);
    #$stmt->bindParam(':answer', $a, PDO::PARAM_STR);
    $stmt->execute();

    if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $row['answer'];
    }
    return $result;
}
function enter_question($a) {
    $sql = 'update conversation set question=:question where id=1;';
    $result = "";
    
    $connMgr = new ConnectionManager();
    $conn = $connMgr->getConnection();
    
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':question', $a, PDO::PARAM_STR);
    $result = $stmt->execute();
    return $result;

    #if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    #    $result = $row['question'];
    #}
    #return $result;
}
#var_dump(enter_question());
#$a = $_REQUEST['submit'];
#var_dump($_REQUEST);
if (isset($_REQUEST['question'])){
    $a = $_REQUEST['question'];
    enter_question($a);
    #echo($a);
    #echo":";
    $req = curl_init();
    curl_setopt($req, CURLOPT_URL,"http://127.0.0.1:5000/load__first_response");
    curl_exec($req);


    ?>
    <div class="panel-body">
                    

               
    <?php
    
    echo (retrieve_answer());

}

?>
 </div>
 </div>
        </section>

    </body>
</html>
