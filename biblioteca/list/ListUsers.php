<?php
require_once '../connect/connect.php';

class ListUsers extends Connection{
    private $sql;
    private $stmt;
    private $list;

    //Função para mostrar na tela às informações vinda do banco
    public function showSelectJson(){

        print_r($this->selectCustomerQuery());

    }

    //Função que fará a query no banco e retornará às informações tratadas
    private function  selectCustomerQuery(){

        $this->connect();
        
        $this->sql = "
                SELECT
                    *
                FROM 
                    customer c,
                    book b
                WHERE
                    c.ID_BOOK = b.ID_BOOK
                ORDER BY
                    entry_date DESC    
                ";

        $this->stmt = $this->connect->query($this->sql);

        $this->list = $this->stmt->fetchAll(PDO::FETCH_OBJ);  
        
        return $this->validations($this->list);  

    }

    //Função com todas às validações para implementar às informações na tela
    public function validations($list){

        foreach ($list as $key => $value) {

            $value->GENDER_CUSTOMER	= $this->changeGender($value->GENDER_CUSTOMER);

            $value->PHONE = $this->telephoneFormat($value->PHONE); 
            
            $value->BIRTH = $this->dateFormat($value->BIRTH);

        }

        return json_encode($list);
    }

    //Função  para alterar Genero de sigla para nome inteiro
    private function changeGender($Gender){

        if($Gender == 'M'){
            
            $Gender = 'Masculino';

        }else if($Gender == 'F'){

            $Gender = 'Feminino';

        }
        return $Gender;

    }

    //Função Para alterar o formato do data para o formato Brasil
    private function dateFormat($date){

        $date = DateTime::createFromFormat('Y-m-d', $date);

        return $date->format('d/m/Y');

    }

    //função para Alterar o fomato do telefone como vem do banco para o padrão atual do Brasil
    private function telephoneFormat($number){

        $number="(".substr($number,0,2).") ".substr($number,2,-4)." - ".substr($number,-4);

        return $number;
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
    public function setList($list)
    {
        $this->list = $list;

        return $this;
    }

    
    public function setStmt($stmt)
    {
        $this->stmt = $stmt;

        return $this;
    }

    
    public function setSql($sql)
    {
        $this->sql = $sql;

        return $this;
    }
}
?>