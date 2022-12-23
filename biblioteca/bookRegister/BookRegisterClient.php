<?php
require_once 'BookRegister.php';
$bookRegisterClient = new BookRegister($_POST['NAME_BOOK'], $_POST['QUANTITY_PAGES']);
$bookRegisterClient->bookInsert();
?>