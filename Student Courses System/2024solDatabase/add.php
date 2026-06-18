<?php
require("initsession.php");
require("addform.html");
?>


<?php
    if (isset($_POST['submit'])){
       $cont->addstudent($_POST);
    }
?>
