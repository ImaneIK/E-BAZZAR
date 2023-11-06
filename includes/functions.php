<?php
function prep_input($data,$conn){
    $data = trim($data);
    $data = stripslashes($data);
    $data = mysqli_real_escape_string($conn,$data);
    $data = htmlspecialchars($data);
    return $data;
}

?>