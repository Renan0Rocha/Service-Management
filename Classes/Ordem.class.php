<?php

class Ordem extends Crud{
    protected $tabela = 'OrdemServico';
    private $idOS;
    private $dataOS;
    private $idCliente;
    private $totalOS;
    private $descontoOS;


    #metodos set's

    public function setId($id){
        $this->idOS = $id;
    }

    public function setData($dataOS){
        $this->dataOS = $dataOS;
    }

    public function setCliente($idCliente){
        $this->idCliente = $idCliente;
    }
    
    public function setTotal($totalOS){
        $this->totalOS = $totalOS;
    }

    public function setDesconto($descontoOS){
        $this->descontoOS = $descontoOS;
    }

    public function setServidosID($servicosID){
        $this->$servicosID = $servicosID;
    }

    public function setServidosValor($servicosValor){
        $this->$servicosValor =$servicosValor;
    }

    public function setServidosQtde($servicosQtde){
        $this->$servicosQtde =$servicosQtde;
    }

    #métodos Gets
    public function getId(){
        return $this->idOS;
    }

    public function getData(){
        return $this->dataOS;
    }

    public function getCliente(){
        return $this->idCliente;
    }

    public function getTotal(){
        return $this->totalOS;
    }
    
    public function getDesconto(){
        return $this->descontoOS;
    }

    #Implementando a Função Abastrata

    public function inserir(){

        $sqlInserir = "INSERT INTO {$this->tabela} (dataOS, idCliente,totalOS,descontoOS) VALUES(:dataOS, :idCliente, :totalOS, :descontoOS)";
        $conn = Conexao::conectar();
        $stmt = $conn->prepare($sqlInserir);
        $stmt->bindParam(':dataOS',$this->dataOS,PDO::PARAM_STR);
        $stmt->bindParam(':idCliente',$this->idCliente,PDO::PARAM_INT);
        $stmt->bindParam(':totalOS',$this->totalOS,PDO::PARAM_STR);
        $stmt->bindParam(':descontoOS',$this->descontoOS,PDO::PARAM_STR);
        $stmt->execute();
        return $conn->lastInsertId();
    }

    public function atualizar($campo,$id)
    {

        
    }

    public function OrdemCliente(){
        $sqlSelect = "SELECT O.*, C.nomeCliente FROM {$this->tabela} O LEFT JOIN Cliente C on O.idCliente = C.idCliente";
        $stmt = Conexao::prepare($sqlSelect);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deletarOS($campo, $id){
        $sqlDel = "delete from ItemOS where
        $campo=:delPar;";
        $sqlDel .= "delete from {$this->tabela} where $campo=:delPar;";
        $stmt = Conexao::prepare($sqlDel);
        $stmt->bindParam(':delPar',$id,PDO::PARAM_INT);
        $stmt->execute();
    }
}