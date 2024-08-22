<?php
$mysqli = new mysqli("localhost","root","dvH.031214","shoesecommerce");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
// else {
//   echo "Connect successfully: " ;

// }

?>