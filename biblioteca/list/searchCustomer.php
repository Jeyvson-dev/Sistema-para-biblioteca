<?php
require_once '../connect/connect.php';
require_once 'ListUsers.php';

class SearchCustomer extends Connection {

    private $namePiece;

    public function __construct($namePiece){

        $this->namePiece = $namePiece;
        
    }

    public function getSearchCustomer(){

        print_r ($this->sqlSearchCustomer()); 

    }

    private function sqlSearchCustomer(){

        $this->connect();

        $sql = "
            SELECT 
		        *
	        FROM
		        customer c,
                book b
	        WHERE
                c.ID_BOOK = b.ID_BOOK
            AND
		        (c.NAME_CUSTOMER like ('$this->namePiece%')
            OR
                c.ID_CUSTOMER like ('$this->namePiece%')) 
            ORDER BY 
                entry_date DESC
        ";
         $stmt = $this->connect->query($sql);

         $searchCustomer = $stmt->fetchAll(PDO::FETCH_OBJ);

         $validation = new ListUsers();

         return  $validation->validations($searchCustomer);

    }

    public function getNamePiece()
    {
        return $this->namePiece;
    }

    
    public function setNamePiece($namePiece)
    {
        $this->namePiece = $namePiece;

        return $this;
    }
}

?>