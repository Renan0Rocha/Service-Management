<?php

class Item extends Crud{
    protected $tabela = 'ItemOS';
    private $idOS;
    private $idServico;
    private $quantidadeIOS;
    private $valorServico;


    #metodos set's

    public function setIdOs($id){
        $this->idOS = $id;
    }

    public function setIdServico($idServico){
        $this->idServico = $idServico;
    }

    public function setQuantidadeIOS($quantidadeIOS){
        $this->quantidadeIOS = $quantidadeIOS;
    }
    
    public function setValorServico($valorServico){
        $this->valorServico = $valorServico;
    }


    #métodos Gets
    public function getIdOs(){
        return $this->idOS;
    }

    public function getIdServico(){
        return $this->idServico;
    }

    public function getQuantidadeIOS(){
        return $this->quantidadeIOS;
    }

    public function getValorServico(){
        return $this->valorServico;
    }

    #Implementando a Função Abastrata

    public function inserir(){
        $sqlInserir = "INSERT INTO {$this->tabela} (idOS, idServico,quantidadeIOS,valorServico) VALUES(:idOS, :idServico ,:quantidadeIOS, :valorServico)";
        $stmt = Conexao::prepare($sqlInserir);
        $stmt->bindParam(':idOS',$this->idOS,PDO::PARAM_INT);
        $stmt->bindParam(':idServico',$this->idServico,PDO::PARAM_INT);
        $stmt->bindParam(':quantidadeIOS',$this->quantidadeIOS,PDO::PARAM_STR);
        $stmt->bindParam(':valorServico',$this->valorServico,PDO::PARAM_STR);
        $stmt->execute();
    }

    public function atualizar($campo,$id)
    {

        
    }
}