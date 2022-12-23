<?php
require_once 'Delete.php';
$returned = new Delete($_POST['ID'],$_POST['ID_BOOK']);
$returned->deleteAndUpdate();
?>