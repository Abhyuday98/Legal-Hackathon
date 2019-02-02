<html>
    <body>
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
    echo (retrieve_answer());

}

?>

    
</body>
</html>

