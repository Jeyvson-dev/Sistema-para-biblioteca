<?php
require_once '../connect/connect.php';

class Register extends Connection{

    private $ID_CUSTOMER;
    private $ID_BOOK;
    private $NAME_CUSTOMER;
    private $PHONE;
    private $GENDER_CUSTOMER;
    private $BIRTH;

    public function __construct($ID_CUSTOMER, $ID_BOOK,$NAME_CUSTOMER,$PHONE,$GENDER_CUSTOMER,$BIRTH){

    $this->ID_CUSTOMER = $ID_CUSTOMER;
    $this->ID_BOOK = $ID_BOOK;
    $this->NAME_CUSTOMER = $NAME_CUSTOMER;
    $this->PHONE = $PHONE;
    $this->GENDER_CUSTOMER = $GENDER_CUSTOMER;
    $this->BIRTH = $BIRTH;
    
    }

    //Função para realizar às validações
    public function validationRegister(){

        if(empty($this->ID_CUSTOMER) || (strlen($this->ID_CUSTOMER) != 11 && strlen($this->ID_CUSTOMER) != 14)){

            die ('Por favor, preencher o CPF/CNPJ corretamente "11 Números para CPF e 14 para CNPJ" ex:78495366710');

        }

        if(empty($this->NAME_CUSTOMER) || strlen($this->NAME_CUSTOMER)<3 || strlen($this->NAME_CUSTOMER)>100){

            die ('Por favor preencha seu nome corretamente');

        }

        if(!empty($this->PHONE) && strlen($this->PHONE) != 11){

            die('Por favor preencher o número de telefone mais o DDD corretamente apenas os números, ex:ex:81985256642');

        }

        if($this->GENDER_CUSTOMER != 'M' && $this->GENDER_CUSTOMER != 'F'){

            die('Por Favor, Marcar o checkbox de "Genero" para Masculino se masculni, Feminino se Feminino');

        }

        if(empty($this->BIRTH) || $this->BIRTH > date('Y-m-d')){

            die('Por favor preencher o campo data de nascimento corretamente');

        }
        if(empty($this->ID_BOOK)){

            die('Por favor selecionar o livro adiquirido corretamente');

        }
        if($this->countCustomerValidation() >= 3){
            
            die('O mesmo cliente não pode adquirir mais de 3 livros, por favor entregue um livro para pegar um novo');

        }else{

            $this->insertRegister();
            $this->updateBookStatus();

            echo 'O usuário foi cadastrado com sucesso';

        }

    }

    //Função para inserir no banco de dados às informações enviadas
    private function insertRegister(){

        $this->connect();

        $sql = "
            INSERT INTO customer(ID_CUSTOMER, NAME_CUSTOMER, PHONE, GENDER_CUSTOMER, BIRTH, ID_BOOK) VALUES('$this->ID_CUSTOMER','$this->NAME_CUSTOMER','$this->PHONE','$this->GENDER_CUSTOMER','$this->BIRTH','$this->ID_BOOK')
        ";

        $this->connect->query($sql);

    }

    //Função para atualizar o status do livro no banco de dados
    private function updateBookStatus(){

        $this->connect();

        $sql = "
            UPDATE book
            SET ID_STATUS_BOOK = 2
            WHERE ID_BOOK = '$this->ID_BOOK'
        ";

        $this->connect->query($sql);
    }


    //Função para validar se o usuário cadastrado possui 3 livros ou mais em seu nome
    private function countCustomerValidation(){

        $this->connect();

        $sql = "
        SELECT
            count(*)
        FROM 
            customer
        WHERE ID_CUSTOMER = '$this->ID_CUSTOMER'
        ";

        $stmt = $this->connect->query($sql);

        $customer = $stmt->fetch(PDO::FETCH_ASSOC);

        return $customer['count(*)'];

    }

     //Getters
    public function getID_CUSTOMER()
    {
        return $this->ID_CUSTOMER;
    }

     
    public function getID_BOOK()
    {
        return $this->ID_BOOK;
    }

     
    public function getNAME_CUSTOMER()
    {
        return $this->NAME_CUSTOMER;
    }

    
    public function getPHONE()
    {
        return $this->PHONE;
    }

     
    public function getGENDER_CUSTOMER()
    {
        return $this->GENDER_CUSTOMER;
    }

     
    public function getBIRTH()
    {
        return $this->BIRTH;
    }

     
    //Setters
    public function setBIRTH($BIRTH)
    {
        $this->BIRTH = $BIRTH;

        return $this;
    }

     
    public function setGENDER_CUSTOMER($GENDER_CUSTOMER)
    {
        $this->GENDER_CUSTOMER = $GENDER_CUSTOMER;

        return $this;
    }

     
    public function setPHONE($PHONE)
    {
        $this->PHONE = $PHONE;

        return $this;
    }

     
    public function setNAME_CUSTOMER($NAME_CUSTOMER)
    {
        $this->NAME_CUSTOMER = $NAME_CUSTOMER;

        return $this;
    }

     
    public function setID_BOOK($ID_BOOK)
    {
        $this->ID_BOOK = $ID_BOOK;

        return $this;
    }

     
    public function setID_CUSTOMER($ID_CUSTOMER)
    {
        $this->ID_CUSTOMER = $ID_CUSTOMER;

        return $this;
    }
}
?>