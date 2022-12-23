<?php
class Connection {

    private $dsn;
    private $username;
    private $password;
    public $connect;

    public function connect(){

        $this->setDsn('mysql:host=localhost;dbname=library');
        $this->setUsername('root');
        $this->setPassword('123456');

      try {

        $this->connect = new PDO($this->getDsn(), $this->getUsername(),$this->getPassword());

      } catch(PDOException $e) {

        echo 'ERROR: ' . $e->getMessage();

      }

    }

    //Getters
    public function getDsn()
    {
        return $this->dsn;
    }
 
    public function getUsername()
    {
        return $this->username;
    }
  
    public function getPassword()
    {
        return $this->password;
    }
  
    public function getConnect()
    {
        return $this->connect;
    }
   
        //Setters
    public function setConnect($connect)
    {
        $this->connect = $connect;

        return $this;
    }
  
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
 
    public function setDsn($dsn)
    {
        $this->dsn = $dsn;

        return $this;
    }
}
?>