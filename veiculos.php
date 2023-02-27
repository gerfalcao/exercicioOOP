<?php

abstract class Veiculos {
  private string $nome;
  private string $porte;
  private float $preco;
  private bool $precisaLicenca;

  public function __construct (string $nome, string $porte, float $preco, bool $precisaLicenca)
  {
    $this->nome = $nome;
    $this->porte = $porte;
    $this->preco = $preco;
    $this->precisaLicenca = $precisaLicenca;
  }
  
  public function getNome(){
    return $this->nome;
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

// Criando classe Material para criar material do motor

class Material {
  private string $material;
  private int $resistencia;

  public function __construct (string $material, int $resistencia){
    $this->material = $material;
    $this->resistencia = $resistencia;
  }

  public function getMaterial(){
    return $this->material;
  }

  public function getResistencia(){
  return $this->resistencia;
  }
}

$aluminio = new Material('Alumínio', 4);
$ferro = new Material('Ferro', 8);


// Criando classe Motor e dois tipos de motores

class Motor {
  private string $nome;
  private string $combustivel;
  private int $consumo;
  private int $potencia;
  private object $material;

  public function __construct (string $nome, string $combustivel, int $consumo, int $potencia, object $material) {
    $this->nome = $nome;
    $this->combustivel = $combustivel;
    $this->consumo = $consumo;
    $this->potencia = $potencia;
    $this->material = $material;
  }

  public function getNome(){
    return $this->nome;
  }

  public function getCombustivel(){
    return $this->combustivel;
  }

  public function getConsumo(){
    return $this->consumo;
  }

  public function getPotencia(){
    return $this->potencia;
  }

  public function getMaterial(){
    return $this->material;
  }
}

$motorR8 = new Motor('R8', 'Gasolina', 8, 80, $ferro);
$motorG14 = new Motor('G14', 'Híbrido', 12, 55, $ferro);

// Criando classe do tanque
class Tanque {
  private float $tanque;
  private float $capacidadeTotal;
  private float $disponivel;

  public function __construct(float $tanque)
  {
    $this->capacidadeTotal = $tanque;
    $this->disponivel = $tanque;
  }

  public function getCapacidadeTotal(){
    return $this->capacidadeTotal;
  }

  public function getDisponivel(){
    return $this->disponivel;
  }

  public function setDisponvivel(float $novoValor): void
  {
   $this->disponivel = $novoValor;
  }

}

// Criando classe Carro

class Carro extends Veiculos {
  private object $motor; 
  private string $cambio; 
  private object $tanque;
  private int $portas; 
  private string $cor;
  private bool $usoProfissional;
  private bool $temCarroceria;
  private int $lugares;

  public function __construct (string $nome, float $preco, object $motor, float $tanque, string $cambio, int $portas, string $cor, bool $usoProfissional, bool $temCarroceria, int $lugares){
    parent::__construct($nome, 'Médio', $preco , true);

    $this->motor = $motor;
    $this->cambio = $cambio;
    $this->tanque = new Tanque($tanque);
    // $this->tanque = {
    //   capacidadeTotal: $tanque;
    //   disponivel: $tanque;
    // }
    $this->portas = $portas;
    $this->cor = $cor;
    $this->usoProfissional = $usoProfissional;
    $this->temCarroceria = $temCarroceria;
    $this->lugares = $lugares;
  }

  public function getMotor(){
    return $this->motor;
  }

  public function getCambio(){
    return $this->cambio;
  }

  public function getTanque(){
    return $this->tanque;
  }

  public function getPortas(){
    return $this->portas;
  }

  public function getCor(){
    return $this->cor;
  }

  public function getUsoProfissional(){
    return $this->usoProfissional;
  }

  public function getTemCarroceria(){
    return $this->temCarroceria;
  }

  public function getLugares(){
    return $this->lugares;
  }

  // Função desempenho calculando e retornando o desempenho do carro (quantos segundos para chegar em 100 km/hr)
  public function getDesempenho(){
  return $this->motor->getPotencia() / 12;
  }

  // Função abastecer com variável do combustível, para completar tanque após consumo feito na função acelerar 
  public function abastecer(string $combustivel){
    if ($this->motor->combustivel === 'Híbrido' && $combustivel === 'Gasolina' || $combustivel === 'Alcool' ){
      $this->tanque->setDisponivel($this->tanque->capacidadeTotal);
      return 'abasteceu'; 
    }
    if ($this->motor->combustivel === $combustivel){
      $this->tanque->setDisponivel($this->tanque->capacidadeTotal);
      return 'abasteceu';
    } else {
      return 'combustível incompatível';
    }
  }
  
  // Função acelerar com variável de quilômetros, retornando o consumo de combustível para percorrer os quilômetros, e atualizando a quantidade de combustível no tanque após a aceleração;
  public function acelerar(int $km){
    $consumido = round(($km / $this->motor->getConsumo()), 2);
    if ($this->tanque->getDisponivel() - $consumido <= 0){
      return 'Não pode acelerar tanto, não tem combustível para isso';
    } else {
    $this->tanque->setDisponivel($this->tanque->disponivel - $consumido);
    return `O carro percorre $km quilômetros e foram consumidos $consumido litros.`;
    }
  }

  // Função dar carona com variável do número de pessoas
  public function darCarona (int $pessoas){
    if ($this->lugares > $pessoas){
      return 'dá a carona';
    } else {
      return 'não cabe todo mundo';
    }
  }

  // Função fazer carreto somente se o carro tiver carroceria
  public function fazerCarreto(){
    if ($this->temCarroceria === true) {
      return 'faz o carreto';
    } else {
      return 'não faz o carreto, não tem carroceria';
    }
  }

  // Função fazer o Uber somente se o carro for de uso profissional
  public function fazerUber(){
    if ($this->usoProfissional === true){
      return 'faz o Uber';
    } else {
      return 'carro de uso familiar';
    }
  }
}

$kombi98 = new Carro('Kombi 98', 50000.00, $motorR8, 'Manual', 40, 3, 'Branca', true, true, 9);

// Verificar tanque
echo $kombi98->$tanque->getDisponivel();

// Acelerar 50 km
$kombi98->acelerar(50);

// Verificar tanque
$kombi98->$tanque;

// Abastecer
$kombi98->$abastecer('Gasolina');

// Verificar
$kombi98->$tanque;

$civic2015 = new Carro('Civic 2015', 70000.00, $motorG14, 'Automático', 50, 4, 'Prata', false, false, 5);

function comparaCarros($carro1, $carro2){
  if ($carro1->getDesempenho() > $carro2->getDesempenho()){
    return `O veículo $carro1.getNome() é mais veloz que $carro2.getNome()`;
  }
  if ($carro1->getDesempenho() === $carro2->getDesempenho()){
    return `Os dois veículos são igualmente velozes`;
  }
  if ($carro1->getDesempenho() < $carro2->getDesempenho()){
    return `O veículo $carro2.getNome() é mais veloz que $carro1.getNome()`;
  }
}

comparaCarros($civic2015, $kombi98);

?>