<?php

class OrdemServico extends Crud{
    protected $tabela = 'ordemservico';
    private $idOS;
    private $dataOS;
    private $idCliente;
    private $totalOS;
    private $descontoOS;

    #metodos set's

    public function setId($idOS){
        $this->idOS = $idOS;
    }

    public function setData($dataOS){
        $this->dataOS = $dataOS;
    }

    public function setCliente($idCliente){
        $this->idCliente = $idCliente;
    }

    public function setTotalOS($totalOS){
        $this->totalOS = $totalOS;
    }

    public function setDescontosOS($descontoOS){
        $this->descontoOS = $descontoOS;
    }

    #métodos Gets
    public function getId(){
        return $this->idOS;
    }

    public function getData(){
        return $this->dataOS;
    }

    public function getIdCliente(){
        return $this->idCliente;
    }

    public function getTotalOS(){
        return $this->totalOS;
    }

    public function getDescontosOS(){
        return $this->descontoOS;
    }


    #Implementando a Função Abastrata

    public function inserir(){
        $sqlInserir = "INSERT INTO ordemservico (idOS, dataOS, idCliente, totalOS, descontoOS) VALUES (1, '0000-00-00', 1, 1, 1)";
        $stmt = Conexao::prepare($sqlInserir);
        $stmt->bindParam(':id', $this->idOS, PDO::PARAM_STR);
        $stmt->bindParam(':data', $this->dataOS, PDO::PARAM_STR);
        $stmt->bindParam(':cliente', $this->idCliente, PDO::PARAM_STR);
        $stmt->bindParam(':total', $this->totalOS, PDO::PARAM_STR);
        $stmt->bindParam(':desconto', $this->descontoOS, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function atualizar($campo,$id)
    {
        $sqlAtualizar = "UPDATE $this->tabela SET idOS = :id, dataOS = :data, idCliente = :cliente, totalOS = :total, descontoOS = :desconto where $campo=:id";
        $stmt = Conexao::prepare($sqlAtualizar);
        $stmt->bindParam(':id', $this->idOS, PDO::PARAM_STR);
        $stmt->bindParam(':data', $this->dataOS, PDO::PARAM_STR);
        $stmt->bindParam(':cliente', $this->idCliente, PDO::PARAM_STR);
        $stmt->bindParam(':total', $this->totalOS, PDO::PARAM_STR);
        $stmt->bindParam(':desconto', $this->descontoOS, PDO::PARAM_STR);
        $stmt->execute(); 
        
    }
}