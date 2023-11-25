<?php
if (isset($_POST['submit'])) {
    // Form has been submitted, process the data

    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['Password'];


    if($username == "Ample" &&  $password == "Ample@123"){
        session_start();
        $_SESSION['authenticated'] = true;
        header("Location: index2.php");
        exit();
    }
   
}

?>