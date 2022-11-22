<?php

class Servico extends Crud{
    protected $tabela = 'Servico';
    private $idServico;
    private $nomeServico;
    private $descricaoServico;
    private $precoServico;

    #metodos set's

    public function setId($id){
        $this->idServico = $id;
    }

    public function setNome($nomeServico){
        $this->nomeServico = $nomeServico;
    }

    public function setDescricao($descricaoServico){
        $this->descricaoServico = $descricaoServico;
    }
    
    public function setPreco($precoServico){
        $this->precoServico = $precoServico;
    }

    #métodos Gets
    public function getId(){
        return $this->idServico;
    }

    public function getNome(){
        return $this->nomeServico;
    }

    public function getDescricao(){
        return $this->descricaoServico;
    }

    public function getPreco(){
        return $this->precoServico;
    }

    #Implementando a Função Abastrata

    public function inserir(){
        $sqlInserir = "INSERT INTO $this->tabela (nomeServico, descricaoServico,precoServico) VALUES (:nome,:descricao,:preco)";
        $stmt = Conexao::prepare($sqlInserir);
        $stmt->bindParam(':nome',$this->nomeServico,PDO::PARAM_STR);
        $stmt->bindParam(':descricao',$this->descricaoServico,PDO::PARAM_STR);
        $stmt->bindParam(':preco',$this->precoServico,PDO::PARAM_STR);
        $stmt->execute();
    }

    public function atualizar($campo,$id)
    {

        $sqlAtualizar = "UPDATE $this->tabela SET nomeServico = :nome, descricaoServico = :descricao, precoServico = :preco where $campo=:id" ;
        $stmt = Conexao::prepare($sqlAtualizar);
        $stmt->bindParam(':nome',$this->nomeServico,PDO::PARAM_STR);
        $stmt->bindParam(':descricao',$this->descricaoServico,PDO::PARAM_STR);
        $stmt->bindParam(':preco',$this->precoServico,PDO::PARAM_STR);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
    }
}