<?php

Class Cliente extends Crud{

    protected $tabela = 'cliente';
    private $idCliente;
    private $nomeCliente;
    private $enderecoCliente;
    private $telefoneCliente;
    private $nascimentoCliente;
    private $bairroCliente;
    private $cidadeCliente;
    private $estadoCliente;
    
    #metodos set's

    public function setId($id){
        $this->idCliente = $id;
    }

    public function setNome($nomeCliente){
        $this->nomeCliente = $nomeCliente;
    }

    public function setEndereco($enderecoCliente){
        $this->enderecoCliente = $enderecoCliente;
    }
    
    public function setTelefone($telefoneCliente){
        $this->telefoneCliente = $telefoneCliente;
    }

    public function setNascimento($nascimentoCliente){
        $this->nascimentoCliente = $nascimentoCliente;
    }

    public function setBairro($bairroCliente){
        $this->bairroCliente = $bairroCliente;
    }

    public function setCidade($cidadeCliente){
        $this->cidadeCliente = $cidadeCliente;
    }

    public function setEstado($estadoCliente){
        $this->estadoCliente = $estadoCliente;
    }

    #métodos Gets
    public function getId(){
        return $this->idCliente;
    }

    public function getNome(){
        return $this->nomeCliente;
    }

    public function getEndereco(){
        return $this->enderecoCliente;
    }
    
    public function getTelefone(){
        return $this->telefoneCliente;
    }

    public function getNascimento(){
        return $this->nascimentoCliente;
    }

    public function getBairro(){
        return $this->bairroCliente;
    }

    public function getCidade(){
        return $this->cidadeCliente;
    }

    public function getEstado(){
        return $this->estadoCliente;
    }

    #Implementando a Função Abastrata

    public function inserir(){
        $sqlInserir = "INSERT INTO $this->tabela (nomeCliente, enderecoCliente, telefoneCliente, nascimentoCliente, bairroCliente, cidadeCliente, estadoCliente)
         values (:nome, :endereco, :telefone, :nascimento, :bairro, :cidade, :estado)";
        $stmt = Conexao::prepare($sqlInserir);
        $stmt->bindParam(':nome', $this->nomeCliente, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $this->enderecoCliente, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefoneCliente, PDO::PARAM_STR);
        $stmt->bindParam(':nascimento', $this->nascimentoCliente, PDO::PARAM_STR);
        $stmt->bindParam(':bairro', $this->bairroCliente, PDO::PARAM_STR);
        $stmt->bindParam(':cidade', $this->cidadeCliente, PDO::PARAM_STR);
        $stmt->bindParam(':estado', $this->estadoCliente, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function atualizar($campo, $id){
        $sqlAtualizar = "UPDATE {$this->tabela} SET nomeCliente = :nome, enderecoCliente = :endereco, telefoneCliente = :telefone,
        nascimentoCliente = :nascimento, bairroCliente = :bairro, cidadeCliente = :cidade, estadoCliente = :estado WHERE $campo = :id";
        $stmt = Conexao::prepare($sqlAtualizar);
        $stmt->bindParam(':nome', $this->nomeCliente, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $this->endereroCliente, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefoneCliente, PDO::PARAM_STR);
        $stmt->bindParam(':nascimento', $this->nascimentoCliente, PDO::PARAM_STR);
        $stmt->bindParam(':bairro', $this->bairroCliente, PDO::PARAM_STR);
        $stmt->bindParam(':cidade', $this->cidadeCliente, PDO::PARAM_STR);
        $stmt->bindParam(':estado', $this->estadoCliente, PDO::PARAM_STR);
        $stmt->execute();

    }
}

