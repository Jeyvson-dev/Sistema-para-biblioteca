<?php
require_once 'searchCustomer.php';

$searchCustomer = new SearchCustomer($_POST['namePiece']);
$searchCustomer->getSearchCustomer();
?>