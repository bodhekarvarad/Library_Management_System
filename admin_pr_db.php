<?php
extract($_POST);

if(isset($aEmail,$aPass)) 
{
    
    
    $con = mysqli_connect("localhost", "root", "", "library");
    $sql = "SELECT * FROM student WHERE admin_name='$aEmail' AND pass='$aPass'";
   
    $result = mysqli_query($con, $sql);

    if($result) {
        if(mysqli_num_rows($result) > 0) {
            header("Location: ./student-dashboard.php?msg=Login successful ");
            exit();
        } else {
            header("Location: ./login.php?msg=Invalid username or password");
            exit();
        }
    } else {
        $error = mysqli_error($con);
        header("Location: ./login.php?msg=$error");
        exit();
    }
} else {
    header("Location: ./login.php?msg=Invalid request");
    exit();
}
?>