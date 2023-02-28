<?php

abstract class Veiculo
{
  private int $rodas;
  private int $eixos;
  private Motor $motor;
  private Tanque $tanque;
  private float $peso;

  public function __construct(int $rodas, int $eixos, Motor $motor, Tanque $tanque, float $peso)
  {
    $this->rodas = $rodas;
    $this->eixos = $eixos;
    $this->motor = $motor;
    $this->tanque = $tanque;
    $this->peso = $peso;
  }

  public function getRodas()
  {
    return $this->rodas;
  }

  public function getEixos()
  {
    return $this->eixos;
  }

  public function getMotor()
  {
    return $this->motor;
  }

  public function getTanque()
  {
    return $this->tanque;
  }

  public function getPeso()
  {
    return $this->peso;
  }
  //Função acelerar com valor em quilômetros e consumo do combustível do tanque;
  public function acelerar(int $km)
  {
    $consumido = $km / 10;
    $this->getTanque()->setQuantidade($this->getTanque()->getQuantidade() - $consumido);
    return 'acelerou';
  }
}


// Criando classe Motor e dois tipos de motores

class Motor
{
  private string $combustivel;
  private int $potencia;

  public function __construct(string $combustivel, int $potencia)
  {
    $this->combustivel = $combustivel;
    $this->potencia = $potencia;
  }

  public function getCombustivel()
  {
    return $this->combustivel;
  }

  public function getPotencia()
  {
    return $this->potencia;
  }
}

$motorR8 = new Motor('Gasolina', 80);
$motorG14 = new Motor('Híbrido', 55);

// Criando classe do tanque
class Tanque
{
  private float $capacidadeTotal;
  private float $quantidade;

  public function __construct(float $tanque)
  {
    $this->capacidadeTotal = $tanque;
    $this->quantidade = $tanque;
  }

  public function getCapacidadeTotal()
  {
    return $this->capacidadeTotal;
  }

  public function getQuantidade()
  {
    return $this->quantidade;
  }

  public function setQuantidade(float $novoValor): void
  {
    $this->quantidade = $novoValor;
  }

  // Abastecimento completo do tanque
  public function abastecer()
  {
    return $this->setQuantidade($this->getCapacidadeTotal());
  }
}

$tanque40 = new Tanque(40);
$tanque120 = new Tanque(120);

// Criando classe Carro

class Carro extends Veiculo implements Rastreavel
{
  private string $marca;
  private string $cambio;
  private int $portas;
  private int $passageiros = 0;
  private string $cor;
  private bool $usoProfissional;
  private bool $temCarroceria;
  private int $lugares;

  public function __construct(Motor $motor, Tanque $tanque, float $peso, string $marca, string $cambio, int $portas, string $cor)
  {
    parent::__construct(4, 2, $motor, $tanque, $peso);
    $this->marca = $marca;
    $this->cambio = $cambio;
    $this->portas = $portas;
    $this->cor = $cor;
  }

  public function getMarca()
  {
    return $this->marca;
  }

  public function getPassageiros()
  {
    return $this->passageiros;
  }

  public function getCambio()
  {
    return $this->cambio;
  }

  public function getPortas()
  {
    return $this->portas;
  }

  public function getCor()
  {
    return $this->cor;
  }

  public function setPassageiros(int $qtde)
  {
    $this->passageiros = $qtde;
  }

  // Função desempenho calculando e retornando o desempenho do carro (quantos segundos para chegar em 100 km/hr)
  public function calcEficiencia()
  {
    $pesoTotal = $this->getPeso() + ($this->getPassageiros() * 70);
    return $this->getMotor()->getPotencia() / $pesoTotal;
  }

  public function rastrear()
  {
    return '425, 234';
  }
}

class Caminhao extends Veiculo implements Rastreavel
{
  private float $cargaMax;
  private string $marca;
  private float $comprimento;
  private string $tipoCarga; //Sólida, líquida, animal
  private float $carga = 0;

  public function __construct(int $rodas, int $eixos, Motor $motor, Tanque $tanque, float $peso, float $cargaMax, string $marca, float $comprimento, string $tipoCarga)
  {
    parent::__construct($rodas, $eixos, $motor, $tanque, $peso);
    $this->cargaMax = $cargaMax;
    $this->marca = $marca;
    $this->comprimento = $comprimento;
    $this->tipoCarga = $tipoCarga;
  }

  public function getCargaMax()
  {
    return $this->cargaMax;
  }

  public function getCarga()
  {
    return $this->carga;
  }

  public function getMarca()
  {
    return $this->marca;
  }

  public function getComprimento()
  {
    return $this->comprimento;
  }

  public function getTipoCarga()
  {
    return $this->tipoCarga;
  }

  public function setCarga(float $carga)
  {
    if ($this->getCargaMax() >= $carga) {
      return $this->carga = $carga;
    } else {
      return 'Não pode por a carga de ' . $carga . ' kg';
    }
  }

  public function setComprimento(float $comprimento): void
  {
    $this->comprimento = $comprimento;
  }

  public function transportar(string $tipo)
  {
    if ($this->getTipoCarga() === $tipo) {
      return 'Transporta';
    } else {
      return 'não transporta';
    }
  }

  public function rastrear()
  {
    return '280, 750';
  }
}

interface Rastreavel
{
  public function rastrear();
}

function localizarVeiculo(Rastreavel $veiculo)
{
  return $veiculo->rastrear();
}

class Onibus extends Veiculo
{
  private string $empresa;
  private int $passageirosMax;
  private int $passageiros;
  private string $tipo; // Urbano, rodoviário ou executivo;
  private float $linha;

  public function __construct(int $rodas, int $eixos, Motor $motor, Tanque $tanque, float $peso, string $empresa, int $passageirosMax, string $tipo, float $linha)
  {
    parent::__construct(8, 1, $motor, $tanque, $peso);
    $this->empresa = $empresa;
    $this->passageirosMax = $passageirosMax;
    $this->tipo = $tipo;
    $this->linha = $linha;
  }

  public function getEmpresa()
  {
    return $this->empresa;
  }

  public function getPassageirosMax()
  {
    return $this->passageirosMax;
  }

  public function getTipo()
  {
    return $this->tipo;
  }

  public function getLinha()
  {
    return $this->linha;
  }

  public function setPassageiros(int $pass)
  {
    if ($this->getPassageirosMax() >= $pass) {
      return $this->passageiros = $pass;
    } else {
      return 'Quantidade inadequada de passageiros';
    }
  }

  //Função transportar com valor em quilômetros e consumo do combustível do tanque;
  public function transportar(int $km)
  {
    $consumo = $km / 10;
    if ($this->getTanque()->getQuantidade() - $consumo > 0) {
      $this->getTanque()->setQuantidade($this->getTanque()->getQuantidade() - $consumo);
      return 'transportou';
    } else {
      return 'trajeto longo, não há combustivel o bastante';
    }
  }
}


// Ações com o Honda Civic 2015, como aceleração e drenagem do tanque e cálculo de eficiência.

$civic2015 = new Carro($motorG14, $tanque40, 250, 'Honda', 'Manual', 4, 'Prata');

echo "O tanque do " . $civic2015->getMarca() . " tem " . $civic2015->getTanque()->getQuantidade() . " litros <br>";
echo $civic2015->acelerar(80) . "<br>";
echo "agora o tanque tem " . $civic2015->getTanque()->getQuantidade() . " litros <br>";
echo $civic2015->getTanque()->abastecer();
echo "após abastecer tem " . $civic2015->getTanque()->getQuantidade() . " litros <br>";

echo "A eficiência de " . $civic2015->getMarca() . " é de " . $civic2015->calcEficiencia() . "<br>";

echo "A localização do veículo é " . $civic2015->rastrear() . "<br>";


// Ações com o caminhão Super Truck: transportar diferentes itens e colocar diferentes cargas, sendo os itens e a carga avaliados pelo Objeto.

$superTruck = new Caminhao(12, 6, $motorR8, $tanque120, 1500, 2000, 'Mercedes Benz', 0, 'Animal');

echo $superTruck->transportar('Líquidos') . " os líquidos <br>";
echo $superTruck->setCarga(3000) . "<br>";
echo $superTruck->setCarga(1800) . "<br>";
echo $superTruck->transportar('Animal') . " o animal <br>";

echo "A localização do veículo é " . $superTruck->rastrear() . "<br>";


// Ações com o ônibus Metropolitano SP, inserindo passageiros e transportando

$metropolitanoSP = new Onibus(6, 3, $motorR8, $tanque120, 800, 'Prefeitura de SP', 50, 'Urbano', '230');
echo "O tanque do " . $metropolitanoSP->getEmpresa() . " tem " . $metropolitanoSP->getTanque()->getQuantidade() . " litros <br>";
echo "entraram " . $metropolitanoSP->setPassageiros(40) . " passageiros <br>";
echo $metropolitanoSP->transportar(150) . " 150 km <br> ";
echo "agora o tanque tem " . $metropolitanoSP->getTanque()->getQuantidade() . " litros <br>";
