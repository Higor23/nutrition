
function cadastrarUsuario() {
  event.preventDefault();
  url = "http://localhost:8882/cadastro";
  let nome = document.getElementById("nome").value;
  let email = document.getElementById("email").value;

  body = {
    "name": nome,
    "email": email
  }

  enviarValores(url, body);

}

function enviarValores(url, body) {
  let request = new XMLHttpRequest();
  request.open("POST", url, true);
  request.setRequestHeader("Content-type", "application/json");
  request.send(JSON.stringify(body));
  
  request.onload = function() {
    if(this.response){
      retorno = JSON.parse(this.response)
      divRetorno = document.querySelector('#usuario-cadastrado').innerHTML = "Seja bem vindo " + retorno.name +"!";
    }
  }
}