<?php

class Cliente extends Crud{
    protected $tabela = 'Cliente';
    private $idCliente;
    private $nomeCliente;
    private $enderecoCliente;
    private $telefoneCliente;
    private $nascimentoCliente;
    private $bairroCliente;
    private $cidadeCliente;
    private $estadoCliente;

    #Set's
    public function setIdCliente($id){
        $this->idCliente = $id;
    }

    public function setNomeCliente($nome){
        $this->nomeCliente = $nome;
    }

    public function setEnderecoCliente($endereco){
        $this->enderecoCliente = $endereco;
    }

    public function setTelefoneCliente($telefone){
        $this->telefoneCliente = $telefone;
    }

    public function setNascimentoCliente($nascimento){
        $this->nascimentoCliente = $nascimento;
    }

    public function setBairroCliente($bairro){
        $this->bairroCliente = $bairro;
    }

    public function setCidadeCliente($cidade){
        $this->cidadeCliente = $cidade;
    }

    public function setEstadoCliente($estado){
        $this->estadoCliente = $estado;
    }



    #métodos Gets
    public function getIdCliente(){
        return $this->idCliente;
    }

    public function getNomeCliente(){
        return $this->nomeCliente;
    }

    public function getEnderecoCliente(){
        return $this->enderecoCliente;
    }

    public function getTelefoneCliente(){
        return $this->telefoneCliente;
    }

    public function getNascimentoCliente(){
        return $this->nascimentoCliente;
    }

    public function getBairroCliente(){
        return $this->bairroCliente;
    }

    public function getCidadeCliente(){
        return $this->cidadeCliente;
    }

    public function getEstadoCliente(){
        return $this->estadoCliente;
    }

    public function inserir(){
        $sqlInserir = "INSERT INTO {$this->tabela}(nomeCliente,enderecoCliente,telefoneCliente,nascimentoCliente,bairroCliente,cidadeCliente,estadoCliente) VALUES (:nomeCliente,:enderecoCliente,:telefoneCliente,:nascimentoCliente,:bairroCliente,:cidadeCliente,:estadoCliente)";
        $stmt = Conexao::prepare($sqlInserir);
        $stmt->bindParam(':nomeCliente',$this->nomeCliente,PDO::PARAM_STR);
        $stmt->bindParam(':enderecoCliente',$this->enderecoCliente,PDO::PARAM_STR);
        $stmt->bindParam(':telefoneCliente',$this->telefoneCliente,PDO::PARAM_STR);
        $stmt->bindParam(':nascimentoCliente',$this->nascimentoCliente,PDO::PARAM_STR);
        $stmt->bindParam(':bairroCliente',$this->bairroCliente,PDO::PARAM_STR);
        $stmt->bindParam(':cidadeCliente',$this->cidadeCliente,PDO::PARAM_STR);
        $stmt->bindParam(':estadoCliente',$this->estadoCliente,PDO::PARAM_STR);
        $stmt->execute();
    }
    public function atualizar($campo, $id){
        $sqlAtualizar = "UPDATE {$this->tabela} SET nomeCliente = :nomeCliente,enderecoCliente = :enderecoCliente, telefoneCliente = :telefoneCliente, nascimentoCliente = :nascimentoCliente, bairroCliente = :bairroCliente, cidadeCliente = :cidadeCliente, estadoCliente = :estadoCliente WHERE $campo = :id ";
        $stmt = Conexao::prepare($sqlAtualizar);
        $stmt->bindParam(':nomeCliente',$this->nomeCliente,PDO::PARAM_STR);
        $stmt->bindParam(':enderecoCliente',$this->enderecoCliente,PDO::PARAM_STR);
        $stmt->bindParam(':telefoneCliente',$this->telefoneCliente,PDO::PARAM_STR);
        $stmt->bindParam(':nascimentoCliente',$this->nascimentoCliente,PDO::PARAM_STR);
        $stmt->bindParam(':bairroCliente',$this->bairroCliente,PDO::PARAM_STR);
        $stmt->bindParam(':cidadeCliente',$this->cidadeCliente,PDO::PARAM_STR);
        $stmt->bindParam(':estadoCliente',$this->estadoCliente,PDO::PARAM_STR);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
    }
}