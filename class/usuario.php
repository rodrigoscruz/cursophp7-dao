<?php

class Usuario {
    
    private $id;
    private $persona;
    private $senha;
    
    public function getId(){
        
        return $this->id;
        
    }
    
    public function setId($value){
       
        $this->id=$value;
    }
    
    public function getLogin(){
        
        return $this->login;
        
    }
    
    public function setLogin($value){
       
        $this->login=$value;
    }
    
    public function getSenha(){
        
        return $this->senha;
        
    }
    
    public function setSenha($value){
        
        $this->senha=$value;
    }
    
    public function loadByid($id){
        
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM login WHERE id = :ID", array(
        
            ":ID"=>$id
        
        ));
        
        if (count($results) > 0){
            
            $row = $results[0];
            
            $this->setId($row['id']);
            $this->setLogin($row['persona']);
            $this->setSenha($row['senha']);
        }
        
    }
    
    public function __toString(){
        
        return json_encode(array(
            
            "id"=>$this->getId(),
            "persona"=>$this->getLogin(),
            "senha"=>$this->getSenha()
        
        ));
    }
    
}

?>