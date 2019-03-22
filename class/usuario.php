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
            
            $this->setData($results[0]);
        }
        
    }
    
    
    public static function getList(){
        
        $sql = new Sql ();
        
        return $sql->select("SELECT * FROM login ORDER BY persona;");
        
        
    }
    
    
    public function setData($data){
        
        $this->setId($data['id']);
        $this->setLogin($data['persona']);
        $this->setSenha($data['senha']);
        
    }
    
    
    public function insert(){
        
        $sql = new Sql();
        
        $results = $sql->select("CALL sp_usuario_insert(:LOGIN, :PASSWORD)", array(
            ':LOGIN'=>$this->getLogin(),
            ':PASSWORD'=>$this->getSenha()
        
        ));
         
        if (count($results) > 0){
            $this->setData($results[0]);
            
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