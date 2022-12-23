<?php
require_once 'Register.php';
$register = new Register($_POST['ID_CUSTOMER'],$_POST['ID_BOOK'],$_POST['NAME_CUSTOMER'],$_POST['PHONE'],$_POST['GENDER_CUSTOMER'],$_POST['BIRTH']);
$register->validationRegister();
?>