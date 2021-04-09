//añadir a la cesta de compra
function addProduct(i) {
    var i = i;
    var codigo = document.getElementById("codigo_"+i).innerText;
    var data = {
      "cod" : codigo
    };
    
    $.ajax({
    method: "post",
    url: "fcesta.php",
    data: data,
    success: function(response) { 
      console.log(response)
      document.getElementById('prueba').innerHTML = response;
    }
  });
}

//vaciar la cesta de la compra
function vaciarCesta(){
  var data = {
    "vaciar" : 1
  };
  $.ajax({
    method: "post",
    url: "fcesta.php",
    data: data,
    success: function(response) { 
      document.getElementById('prueba').innerHTML = response;
    }
  });
}

