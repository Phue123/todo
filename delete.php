<?php

require 'config.php';

$pdostatement=$pdo->prepare("DELETE FROM todo Where id=".$_GET['id']);
$pdostatement->execute();

header("Location:index.php");

?>