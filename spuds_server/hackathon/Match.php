<?php
require_once 'ConnectionManager.php';
    $a = $_REQUEST['issue_area'];
    $b= $_REQUEST['time'];
    $c= $_REQUEST['action_taken'];
    $d= $_REQUEST['injury'];
    $e= $_REQUEST['category'];
    $f= $_REQUEST['description'];
    $g= $_REQUEST['number_of_people'];
    $h= $_REQUEST['fees'];
    $i= $_REQUEST['issue_area'];

function enter_sign_up($a,$b,$c,$d,$e,$f,$g,$h) {
    $sql = "INSERT INTO `shared_economy`.`sign_up` ( `Issue_area`, `time`, `Action_taken`, `type_of_injury`, `category`, `Description`, `number_of_coconsultants`, `fees`) VALUES (:a, :b, :c,:d,:e,:f,:g,:h);";
    $result = "";
    
    $connMgr = new ConnectionManager();
    $conn = $connMgr->getConnection();
    
    $stmt = $conn->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindParam(':a', $a, PDO::PARAM_STR);
    $stmt->bindParam(':b', $b, PDO::PARAM_STR);
    $stmt->bindParam(':c', $c, PDO::PARAM_STR);
    $stmt->bindParam(':d', $d, PDO::PARAM_STR);
    $stmt->bindParam(':e', $e, PDO::PARAM_STR);
    $stmt->bindParam(':f', $f, PDO::PARAM_STR);
    $stmt->bindParam(':g', $g, PDO::PARAM_STR);
    $stmt->bindParam(':h', $h, PDO::PARAM_STR);
    
    $result = $stmt->execute();
   


    #return $result;
    $result = 0;
    $sql ="SELECT  l1.username FROM shared_economy.lawyers l1, (select s1.Issue_Area from shared_economy.sign_up s1, shared_economy.sign_up s2 where s1.client_id!=s2.client_id and s1.Issue_area=s1.Issue_area and s1.type_of_injury=s2.type_of_injury and s1.fees=s2.fees and s1.number_of_coconsultants=s2.number_of_coconsultants and s1.client_id=(select max(client_id) from shared_economy.sign_up) ) as s where s.Issue_area= l1.type limit 1;";
    
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
    

    if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $row['username'];
        #var_dump($row['username']);
    }
    else{
        $result=0;
    }
    #var_dump($result);
    return $result;
}
$lawyer = enter_sign_up($a,$b,$c,$d,$e,$f,$g,$h);
#echo $lawyer=='0';
if ($lawyer=='0'){
    $match = 0;
} 
else{
    $match = $g;
    $speciality = $a." Lawyer";
    
}?>