// script.js
const contadores = {};


function addProd(id_produto){

  if (!contadores.hasOwnProperty(id_produto)) {
    
    contadores[id_produto] = 0;
  }
  contadores[id_produto] += 1;

  document.getElementById(id_produto).innerText = `${contadores[id_produto]}`;
  console.log(contadores[id_produto])
}

 function deletProd(id_produto){
    
    contadores[id_produto] -= 1;
    document.getElementById(id_produto).innerText = `${contadores[id_produto]}`;
    console.log(contadores[id_produto])
 }
