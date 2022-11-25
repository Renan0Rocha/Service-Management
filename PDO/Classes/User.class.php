<?php

class User extends Crud
{
    protected $tabela = 'Usuario';
    private $id;
    private $usuario;
    private $senha;

    #métodos sets

    public function setId($id){
        $this->id = $id;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    #métodos Gets
    public function getId(){
        return $this->id;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getSenha(){
        return $this->senha;
    }

    #Implementando a Função Abastrata

    public function inserir(){
        $sqlInserir = "INSERT INTO $this->tabela (loginUsuario, senhaUsuario) VALUES (:login,:senha)";
        $stmt = Conexao::prepare($sqlInserir);
        $stmt->bindParam(':login',$this->usuario,PDO::PARAM_STR);
        $stmt->bindParam(':senha',$this->senha,PDO::PARAM_STR);
        $stmt->execute();
    }

    public function atualizar($campo,$id)
    {
        $sqlAtualizar = "UPDATE $this->tabela SET loginUsuario = :login, senhaUsuario = :senha where $campo=:id" ;
        $stmt = Conexao::prepare($sqlAtualizar);
        $stmt->bindParam(':login',$this->usuario,PDO::PARAM_STR);
        $stmt->bindParam(':senha',$this->senha,PDO::PARAM_STR);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();        
    }
}