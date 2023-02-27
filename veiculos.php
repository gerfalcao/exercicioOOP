<?php

abstract class Veiculos {
  private string $porte;
  private float $preco;
  private bool $precisaLicenca;

  public function __construct (string $porte, float $preco, bool $precisaLicenca)
  {
    $this->porte = $porte;
    $this->preco = $preco;
    $this->precisaLicenca = $precisaLicenca;
  }
  
  public function getPorte (){
    return $this->porte;
  }

  public function getPreco (){
    return $this->preco;
  }

  public function getPrecisaLicenca (){
    return $this->precisaLicenca;
  }

  public function comprar($possuiLicenca) {
    if($this->getPrecisaLicenca() === 'true') {
      if ($possuiLicenca === 'true') {
        return 'Pode comprar';
      }
      if ($possuiLicenca === 'false') {
        return 'Arrume uma licenca antes de comprar';
      }
    } else {
      return 'Pode comprar';
    }
  }
}

class Material {
  public string $material;
  public int $resistencia;

  public function __construct (string $material, int $resistencia){
    $this->material = $material;
    $this->resistencia = $resistencia;
  }
}

$aluminio = new $material('Alumínio', 4);
$ferro = new $material('Ferro', 8);

class Motor {
  private string $nome;
  private string $combustivel;
  private int $potencia;
  private string $material;

  public function __construct (string $nome, string $combustivel, int $potencia, string $material) {
    $this->nome = $nome;
    $this->combustivel = $combustivel;
    $this->potencia = $potencia;
    $this->material = $material;
  }
}

$R8 = new $motor('R8', 'Gasolina', 80, $ferro);
$G14 = new $motor('G14', 'Híbrido', 55, $ferro);

class Carro extends Veiculos {
  private string $motor; 
  private string $cambio; 
  private int $portas; 
  private string $cor;

  public function __construct (float $preco, string $motor, string $cambio, int $portas, string $cor){
    parent :: __construct('Médio', $preco , true);

    $this->motor = $motor;
    $this->cambio = $cambio;
    $this->portas = $portas;
    $this->cor = $cor;
  }


}