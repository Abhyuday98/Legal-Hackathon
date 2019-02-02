
<?php
if (isset($_REQUEST['question'])){
    $question = $_REQUEST['question'];
}
else{
    $question = "";
}
?>
 <section>
 <form action="bot_response.php" method='post'>
            <div class="row">
            <div class="col-md-12 text-center content-header">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2>Hi I'm Kaki! Ask me a question.</h2>

                    
                    <p><input type="text" name="question" value=<?php echo '"'.$question.'"' ;?>></p>
                    <input type="submit" value="Submit">
                </div>
                <div class="panel-body">
                    <h4>Answer:</h4>

                </div>
            
