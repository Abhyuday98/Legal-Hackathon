<html>
<body>
<?php
session_start();
require_once "Match.php";
if ($match==0){
    $_SESSION['message']="Still Looking for Matches";
    header("Location: shared_economy.php");
    exit;
    echo "Still Looking for Matches";
}
else{
    $_SESSION['message']="found ".$match." matches with ".$lawyer." Specializing in ".$speciality." check your email for appointment details";
    header("Location: shared_economy.php");
    exit;
    echo ("found ".$match." matches with ".$lawyer." Specializing in ".$speciality." check your email for appointment details");         
}

?>
</body>
</html>