<?php

require_once '../connect/connect.php';

class ListBook extends Connection{

    private $sql;
    private $stmt;
    private $list;

    //Função para trazer a lista de livros e incluir no select

    public function showSelectListBookList(){

        print_r($this->selectListRegister());

    }

    //Função para trazer o resultado do banco de dados
    private function selectListRegister(){

        $this->connect();
      
        $this->sql = "
            SELECT
                *
            FROM
                book
            WHERE
                ID_STATUS_BOOK = 1  
            ";
        
        $this->stmt = $this->connect->query($this->sql);
      
        $this->list = $this->stmt->fetchAll(PDO::FETCH_OBJ);
      
      
        return json_encode($this->list);
        
    }

    //Getters
    public function getSql()
    {
        return $this->sql;
    }

 
    public function getStmt()
    {
        return $this->stmt;
    }

 
    public function getList()
    {
        return $this->list;
    }

 
    //Setters
    public function setSql($sql)
    {
        $this->sql = $sql;

        return $this;
    }

 
    public function setStmt($stmt)
    {
        $this->stmt = $stmt;

        return $this;
    }

 
    public function setList($list)
    {
        $this->list = $list;

        return $this;
    }
}
?>