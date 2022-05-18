function acessarUrl(url) {
  let request = new XMLHttpRequest()
  request.open("GET", url, false)
  request.send()
  return request.responseText
}

function criarLinha(noticia){
  linha = document.createElement("tr")
  tdTitulo = document.createElement("td")
  tdDescricao = document.createElement("td")
  tdTitulo.innerHTML = noticia.titulo
  tdDescricao.innerHTML = noticia.descricao

  linha.appendChild(tdTitulo)
  linha.appendChild(tdDescricao)

  return linha
}

function main(){
  data = acessarUrl("http://localhost:8883/noticias")
  noticias = JSON.parse(data)
  let tabela = document.getElementById("tabela");

  noticias.forEach(element => {
    let linha = criarLinha(element);
    tabela.appendChild(linha)
  })
}

main()