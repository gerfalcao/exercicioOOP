class Veiculos {
  constructor(nome, porte, preco, precisaLicensa) {
    this.nome = nome;
    this.porte = porte; //Pequeno, médio ou grande
    this.preco = preco; //number
    this.precisaLicensa = precisaLicensa; //true ou false 
  }

  getNome(){
    return this.nome;
  }

  getPreco() {
    return this.preco;
  }

  getPorte() {
    return this.porte;
  }

  getPrecisaLicensa() {
    return this.precisaLicensa;
  }

  segurar () {
    if (this.porte === 'pequeno') {
      return 'segurou'
    }
    if (this.porte === 'médio'){
      return 'veículo de porte médio, não segura'
    }
    if (this.porte === 'grande') {
      return 'muito grande pra segurar'
    }
  }

  comprar(possuiLicensa){
    if (this.precisaLicensa === true) {
      if (possuiLicensa === true) {
        return 'pode comprar';
      } else {
        return 'consiga uma licensa santes de comprar';
      }
    } else {
      return 'pode comprar';
    }
  }
}

class Material {
  constructor(material, resistencia){
    this.material = material;
    this.resistencia= resistencia;
  }

  getMaterial(){
    return this.material;
  }

  getResistencia(){
    return this.resistencia;
  }
}

const materialFerro = new Material ('Ferro', 8)
const materialAluminio = new Material ('Aluminio', 4)


class Motor {
  constructor(nome, combustivel, consumo, potencia, material){
    this.nome = nome;
    this.combustivel = combustivel;
    this.consumo = consumo; // valor de km por litro
    this.potencia = potencia;
    this.material = material;
  }

  getNome() {
    return this.nome;
  }

  getCombustivel(){
    return this.combustivel;
  }

  getConsumo (){
    return this.consumo;
  }

  getPotencia(){
    return this.potencia;
  }

  getMaterial(){
    return this.material;
  }
}


const motorR8 = new Motor('R8', 'Gasolina', 8, 80, materialFerro)
const motorG14 = new Motor('G14', 'Híbrido', 12, 120, materialFerro)

class Carro extends Veiculos {
  constructor(nome, porte, preco, precisaLicensa, motor, cambio, tanque, portas, cor, usoProfissional, temCarroceria, lugares){
    super(nome,'médio', preco, true);
    this.motor = motor // Elétrico, gasolina, álcool ou diesel
    this.cambio = cambio // automático ou manual
    this.tanque = {
      capacidadeTotal: tanque,
      disponivel: tanque
    }
    this.portas = portas // number
    this.cor = cor // cores
    this.usoProfissional = usoProfissional // true ou false
    this.temCarroceria = temCarroceria // true ou false - bagageiro
    this.lugares = lugares; //number - quantidade de lugares para sentar
  }

  getMotor(){
    return this.motor
  }

  getCambio(){
    return this.cambio
  }

  getTanque(){
    console.log((this.tanque.disponivel) / (this.tanque.capacidadeTotal) * 100 + ' % cheio')
    return this.tanque
  }

  getPortas(){
    return this.portas
  }

  getCor (){
    return this.cor
  }

  getUsoProfissional (){
    return this.usoProfissional
  }

  getLugares(){
    return this.lugares
  }

   // Função desempenho calculando e retornando o desempenho do carro (quantos segundos para chegar em 100 km/hr)
  getDesempenho(){
    return this.motor.getPotencia() / 12;
  }

  // Função abastecer com variável do combustível, para completar tanque após consumo feito na função acelerar 
  abastecer(combustivel){
    if (this.motor.combustivel === 'Híbrido' && combustivel === 'Gasolina' || combustivel === 'Alcool' ){
      this.tanque.disponivel = this.tanque.capacidadeTotal;
      return 'abasteceu'
      
    }
    if (this.motor.combustivel === combustivel){
      this.tanque.disponivel = this.tanque.capacidadeTotal;
      return 'abasteceu'
    } else {
      return 'combustível incompatível'
    }
  }
  
  // Função acelerar com variável de quilômetros, retornando o consumo de combustível para percorrer os quilômetros, e atualizando a quantidade de combustível no tanque após a aceleração;
  acelerar(km){
    const consumido = (km / this.motor.getConsumo()).toFixed(1);
    if (this.tanque.disponivel - consumido <= 0){
      return 'Não pode acelerar tanto, não tem combustível para isso'
    } else {
    this.tanque.disponivel = this.tanque.disponivel - consumido
    return `O carro percorre ${km} quilômetros e foram consumidos ${consumido} litros.`
    }
  }

  // Função dar carona com variável do número de pessoas
  darCarona (pessoas){
    if (this.lugares > pessoas){
      return 'dá a carona'
    } else {
      return 'não cabe todo mundo'
    }
    
  }

  // Função fazer carreto somente se o carro tiver carroceria
  fazerCarreto(){
    if (this.temCarroceria = true) {
      return 'faz o carreto'
    } else {
      return 'não faz o carreto, não tem carroceria'
    }
  }

  // Função fazer o Uber somente se o carro for de uso profissional
  fazerUber(){
    if (this.usoProfissional === true){
      return 'faz o Uber'
    } else {
      return 'carro de uso familiar'
    }
  }
}

const kombi98 = new Carro('Kombi 98', '', 50000.00, '', motorR8, 'Manual', 40, 3, 'Branca', true, true, 9) 

// Verificar tanque
kombi98.tanque

// Acelerar 50 km
kombi98.acelerar(50)

// Verificar tanque
kombi98.tanque

// Abastecer
kombi98.abastecer('Gasolina')

// Verificar
kombi98.tanque

const civic2015 = new Carro('Civic 2015', '', 70000.00, '', motorG14, 'Automático', 50, 4, 'Prata', false, false, 5)

function comparaCarros(carro1, carro2){
  if (carro1.getDesempenho() > carro2.getDesempenho()){
    return `O veículo ${carro1.getNome()} é mais veloz que ${carro2.getNome()}`;
  }
  if (carro1.getDesempenho() === carro2.getDesempenho()){
    return `Os dois veículos são igualmente velozes`;
  }
  if (carro1.getDesempenho() < carro2.getDesempenho()){
    return `O veículo ${carro2.getNome()} é mais veloz que ${carro1.getNome()}`
  }
}

comparaCarros(civic2015, kombi98)
