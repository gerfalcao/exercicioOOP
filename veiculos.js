class Veiculos {
  constructor(porte, preco, precisaLicensa) {
    this.porte = porte; //Pequeno, médio ou grande
    this.preco = preco; //number
    this.precisaLicensa = precisaLicensa; //true ou false 
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
 
const materialFerro = {
  material: 'Ferro',
  resistencia: 8
}
const materialAluminio = {
  material: 'Alumínio',
  resistencia: 4
} 

const motorR8 = {
  nome: 'R8',
  combustivel: 'Gasolina',
  potencia: 80,
  material: materialFerro
}

const motorG14 = {
  nome: 'G14',
  combustivel: 'Híbrido',
  potencia: 55,
  material: materialFerro
}

class Carro extends Veiculos {
  constructor(porte, preco, precisaLicensa, motor, cambio, portas, cor){
    super('médio', preco, true);
    this.motor = motor // Elétrico, gasolina, álcool ou diesel
    this.cambio = cambio // automático ou manual
    this.portas = portas // number
    this.cor = cor // cores
  }
  getMotor(){
    return this.motor
  }
  getCambio(){
    return this.cambio
  }
  getPortas(){
    return this.portas
  }
  getCor (){
    return this.cor
  }
  abastecer(combustivel){
    if (this.motor.combustivel === combustivel){
      return 'abasteceu'
    } else {
      return 'combustível incompatível'
    }
  }
  acelerar(){
    if (this.motor.potencia < 20){
      return 'vrum'
    }
    if (this.motor.potencia >= 20 && this.potencia < 80){
      return 'vrummmmm'
    }
    if (this.motor.potencia >= 80){
      return 'VRUMMMMMMMMMMMM'
    }
  }
}

class Kombi extends Carro {
  constructor(porte, preco, precisaLicensa, motor, cambio, portas, cor, usoProfissional, lugares){
    super(porte, preco, precisaLicensa, motorR8, 'manual', 3, cor)
    this.usoProfissional = usoProfissional; // true ou false
    this.lugares = lugares; // Quantidade de lugares para sentar
  }
  getUsoProfissional (){
    return this.usoProfissional;
  }
  getLugares (){
    return this.getLugares;
  }
  levarFamilia (){
    if (this.usoProfissional = true){
      return 'família não, a Kombi é de uso profissional'
    } else {
      return 'Leva a família'
    }
    
  }
  fazerCarreto(){
    if (this.usoProfissional = true) {
      return 'faz o carreto'
    } else {
      return 'não faz o carreto, vai sujar seu carro'
    }
   
  }
}

const kombi98 = new Kombi('', 50000.00, '', '', '', '', 'Branca', true, 9) // Aqui achei rudimentar criar a Kombi colocando aspas ('') para declarar as funções fixas do super 

kombi98.acelerar()
kombi98.abastecer('Alcool')
kombi98.abastecer('Gasolina')
kombi98.fazerCarreto()




class Bicicleta extends Veiculos {
  constructor(porte, preco, precisaLicensa, material, marchas, uso, estado) {
  super('pequeno', 500, false);
  this.material = material // alumínio, ferro
  this.marcha = marchas // number
  this.uso = uso // Passeio, cross, speed
  this.estado = estado
  }
  getMaterial (){
    return this.material;
  }
  getMarcha (){
    return this.marcha;
  }
  getUso (){
    return this.uso;
  }
  getEstado (){
    return this.estado;
  }
  pedalar (){
    return 'pedalou';
  }
  empinar (){
    if (this.material.material === 'Ferro'){
      return 'Pesada demais pra empinar';
    }
    if (this.material.material === 'Alumínio')
    return 'empinou';
  }
  saltar (){
    if (this.material.resistencia <5) {
      this.estado = 'Quebrada'
      return 'Bike quebrou';
    }
    if (this.material.resistencia >= 5) {
      return 'Saltou bonito';
    }
  }
}

const caloi = new Bicicleta('','','',materialAluminio, 6, 'Passeio', 'Nova')

class BiciCross extends Bicicleta {
  constructor (porte, preco, precisaLicensa, material, marchas, uso, estado, aro){
    super ('', '', '', materialFerro, 6, 'cross', estado)
    this.aro = aro;
  }
  getAro () {
    return this.aro
  }
  drift(){
    return 'Deslizou bonito'
  }
}

const bikeBlade = new BiciCross ('', '', '', '', '', '', 'Nova', 14)

class Pessoa {
  constructor (nome,idade,sexo, profissao, rendaMensal, bens) {
    this.nome = nome;
    this.idade = idade;
    this.sexo = sexo;
    this.profissao = profissao;
    this.rendaMensal = rendaMensal;
    this.bens = ['Própria vida']
  }
  getNome (){
    return this.nome;
  }
  getIdade (){
    return this.idade;
  }
  getSexo (){
    return this.sexo;
  }
  getProfissao (){
    return this.profissao;
  }
  getRendaMensal (){
    return this.rendaMensal;
  }
  comer(){
    return 'comeu'
  }
  dormir (){
    return 'dormiu'
  }
  trabalhar (){
    if (this.profissao = null) {
      return 'Não trabalha'
    }
    if (this.profissao = String){
      return 'trabalhou '
    }
  }
  comprar(bem){
    if (bem.getPreco() < (this.rendaMensal * 12)){
      this.bens.push(bem)
      return 'Conseguiu comprar'
    } else {
      return 'Não conseguiu comprar'
    }
  }
}

class Musico extends Pessoa {
  constructor (nome, idade, sexo, profissao, rendaMensal, bens, instrumento, fezConservatorio){
    super (nome, idade, sexo, 'Músico', 8000.00, bens);
    this.instrumento = instrumento;
    this.fezConservatorio = fezConservatorio;
    this.bens.push(this.instrumento)
  }
  getInstrumento = function() {
    return this.instrumento;
  }
  getFezConservatorio (){
    return this.fezConservatorio;
  }
  tocar(paga){
    if (paga < 100){
      return `melhor tocar ${this.instrumento} de graça`
    }
    if (paga >= 100 && paga <300){
      return `toca ${this.instrumento}`
    }
    if (paga >= 300){
      return `toca ${this.instrumento} o quanto quiser`
    }
  }
}

class Gari extends Pessoa {
  constructor (nome, idade, sexo, profissao, rendaMensal, bens, areaLimpeza){
    super (nome, idade, sexo, 'Gari', 1000.00, bens);
    this.areaLimpeza = areaLimpeza;
  }
  getareaLimpeza(){
    return this.areaLimpeza
  }
  limpar(){
    return 'Limpou'
  }
  consertarBikes (bike){
    bike.estado = 'Nova'
    return 'Consertou a bike'
  }
}

const germanno = new Musico ('Germano', 27, 'masculino', '', '', '', 'violino', true)

germanno.tocar(50)
germanno.tocar(200)
// germanno.comprar(kombi98)
germanno.bens

const joao = new Gari ('João', 22, 'masculino', '', '', '', 'Centro de Reciclagem')

joao.limpar()
joao.comprar(kombi98)
joao.comprar(caloi)

//Germanno compra a bike, e leva no gari João pra consertar

/* germanno.comprar(caloi)
germanno.bens
germanno.bens[2].estado
germanno.bens[2].empinar()
germanno.bens[2].saltar()


joao.consertarBikes(germanno.bens[2])

germanno.bens[2].estado
*/

// Uma imperfeição desse trabalho: Não consegui acessar a bicicleta pelo nome, mas sim pelo índice na Array.