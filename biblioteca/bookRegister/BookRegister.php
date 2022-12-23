<?php

require_once '../connect/connect.php';

class BookRegister extends Connection{

private $NAME_BOOK;
private $QUANTITY_PAGES;

public function __construct($NAME_BOOK, $QUANTITY_PAGES){

    $this->setNAME_BOOK($NAME_BOOK);
    $this->setQUANTITY_PAGES($QUANTITY_PAGES);
    
}

public function bookInsert(){

    $this->validationBookInsert();

}

private function sqlInsertBook(){

    $this->connect();
    $sql = "
        INSERT INTO book (NAME_BOOK,QUANTITY_PAGES) VALUES ('$this->NAME_BOOK','$this->QUANTITY_PAGES')
    ";
    $this->connect->query($sql);

    echo "O Livro foi cadastrado com sucesso.";

}

private function validationBookInsert(){

    if($this->getQUANTITY_PAGES() < 0){

        die('Digite um número de páginas válido');

    }else{

        return $this->sqlInsertBook();

    }

}

public function getNAME_BOOK()
{
return $this->NAME_BOOK;
}
 
public function getQUANTITY_PAGES()
{
return $this->QUANTITY_PAGES;
}

public function setNAME_BOOK($NAME_BOOK)
{
$this->NAME_BOOK = $NAME_BOOK;

return $this;
}

public function setQUANTITY_PAGES($QUANTITY_PAGES)
{
$this->QUANTITY_PAGES = $QUANTITY_PAGES;

return $this;
}
}

?>