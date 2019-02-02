
<?php
if (isset($_REQUEST['question'])){
    $question = $_REQUEST['question'];
}
else{
    $question = "";
}
?>
<form action="index.php" method='post'>
  Question:<br>
  <input type="text" name="question" value=<?php echo '"'.$question.'"' ;?>><br>
  <input type="submit" value="Submit">
</form>
