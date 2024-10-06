<?php
 $formlogin = mysqli_connect("localhost", "root", "Tama2233", "tammy");

 if ($formlogin) {
    echo "Registration Is Successful";
 }else{
   echo "fails";
 }

?>