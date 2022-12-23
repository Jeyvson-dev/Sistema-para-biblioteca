<?php
require_once '../connect/connect.php';
class Delete extends Connection{

private $ID;
PRIVATE $ID_BOOK;

public function __construct($ID,$ID_BOOK){

    $this->setID($ID);
    $this->setID_BOOK($ID_BOOK);
    
}
public function deleteAndUpdate(){

    $this->deleteQuery();
    $this->updateQuery();

    echo 'Devolução do livro efetuada com sucesso';

}
private function deleteQuery(){

    $this->connect();

    $sql = "
        DELETE
        FROM
            customer
        WHERE 
            ID = '$this->ID'
        ";

    $this->connect->query($sql);

}
private function updateQuery(){

    $this->connect();

    $sql = "
        UPDATE book
        SET ID_STATUS_BOOK = 1
        WHERE
            ID_BOOK = '$this->ID_BOOK'
        ";
    
    $this->connect->query($sql);
}
 
    //Getters

public function getID(){

    return $this->ID;

}

public function getID_BOOK()
{
return $this->ID_BOOK;
}
 

    //Setters
public function setID($ID){

    $this->ID = $ID;

    return $this;
}

public function setID_BOOK($ID_BOOK)
{
$this->ID_BOOK = $ID_BOOK;

return $this;
}
}
?>