
function calcularImc() {
  event.preventDefault();
  url = "http://localhost:8881/imc";
  let peso = document.getElementById("peso").value;
  let altura = document.getElementById("altura").value;

  body = {
    "peso": peso,
    "altura": altura
  }

  enviarValores(url, body);

}

function enviarValores(url, body) {
  let request = new XMLHttpRequest();
  request.open("POST", url, true);
  request.setRequestHeader("Content-type", "application/json");
  request.send(JSON.stringify(body));

  request.onload = function() {
    retorno = JSON.parse(this.response)
    divRetorno = document.querySelector('#imc').innerHTML = "IMC: " + retorno.imc;
    divRetorno = document.querySelector('#classificacao').innerHTML = "Classificação: " + retorno.classificacao;
  }
}