// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {

  $('.SinLe').on('input', function () { 
      this.value = this.value.replace(/[^0-9]/g,'');
  });

  var formatNumber = {
   separador: ",", // separador para los miles
   sepDecimal: '.', // separador para los decimales
   formatear:function (num){
   num +='';
   var splitStr = num.split('.');
   var splitLeft = splitStr[0];
   var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
   var regx = /(\d+)(\d{3})/;
   while (regx.test(splitLeft)) {
   splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
   }
   return this.simbol + splitLeft +splitRight;
   },
   new:function(num, simbol){
   this.simbol = simbol ||'';
   return this.formatear(num);
   }
  }

  $(".MoneyEs").keyup(function(event){
      var cifra = $(this).val();
   
      var newstring = cifra.replace(/,/g, ''); 
      var newstring1 = newstring.replace(/[A-Za-z]*/g, ''); 

      console.log(newstring1);

       sum = formatNumber.new(newstring1);

      $(".MoneyEs").val(sum);

  });

  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


$(function(){
  $("#FormProduct").submit(function(e){
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var selectNumber = $("#selectNumber").val();

    var sku = $("#sku").val();
    var nombre = $("#nombre").val();
    var cantidad = $("#cantidad").val();
    var precio = $("#precio").val();

    if (sku!="" && nombre!="" && cantidad!="" && precio!="") {


      var fila="<tr><td>"+sku+"</td><td>"+nombre+"</td><td>"+cantidad+"</td><td>"+precio+"</td></tr>";

    var btn = document.createElement("TR");
    btn.innerHTML=fila;
    $(".table_ordenes").append(btn);


      document.getElementById("FormProduct").reset();
      $("#FormProduct").removeClass('was-validated');
      $("#div-formulario").fadeOut("slow",function(){
        $("#thankyou").fadeIn("slow");
      });
      
    }else{

      var cadena="";
      if(sku==""){
        cadena+="Por favor elige una sku.\n";
      }

      if(nombre==""){
        cadena+="Por favor elige una nombre.\n";
      }


      if(cantidad==""){
        cadena+="Por favor elige una cantidad.\n";
      }

      if(precio==""){
        cadena+="Por favor elige una precio.\n";
      }

      if ($("#FormProduct").hasClass('was-validated')) {
        alert(cadena);
      }
      

    }
  });

  $(".addProducto").click(function(){
      $("#thankyou").fadeOut("slow",function(){
        $("#div-formulario").fadeIn("slow");
      });
  });


  $(".newproduct").click(function(){
      $("#thankyou").fadeOut("slow",function(){
        $("#div-formulario").fadeIn("slow");
      });
  });


  llenadotabla();

  function llenadotabla(){
    var valor=1;
    var cadenaS="";
    var fila="";
    $.ajax({
      type: 'GET',
      url: 'consulta.php',
      data: {id: valor},
      cache: false,
      dataType:'json',
      success: function(html){
        console.log(html);

            if (html.data=="ok") {

              cadenaS="";

                cadenaS+="<option value=''>Seleccione el número del orden</option>";
              for (var i = 0; i < html.resultados['orders'].length; i++) {
                  if(i==0){
                    cadenaS +="<option value='"+html.resultados['orders'][i]['number']+"' selected>Orden #"+html.resultados['orders'][i]['number']+"</option>";
                    

                    for (var j = 0; j < html.resultados['orders'][i]['items'].length; j++) {
                       fila +="<tr><td>"+html.resultados['orders'][i]['items'][j]['sku']+"</td><td>"+html.resultados['orders'][i]['items'][j]['name']+"</td><td>"+html.resultados['orders'][i]['items'][j]['quantity']+"</td><td>"+html.resultados['orders'][i]['items'][j]['price']+"</td></tr>";
                    }
                    

                    $(".table_ordenes").html(fila);


                  }else{
                    cadenaS +="<option value='"+html.resultados['orders'][i]['number']+"'>Orden #"+html.resultados['orders'][i]['number']+"</option>";
                  }
                  
              }

              $("#selectNumber").html(cadenaS);
            }else{
              console.log('Error en la db');
            }  
      }
      });
  }


  $(document).on("change","#selectNumber",function(){
    var valor = $(this).val();
    var cadenaS="";
    var fila="";
    $.ajax({
      type: 'GET',
      url: 'consulta.php',
      data: {id: valor},
      cache: false,
      dataType:'json',
      success: function(html){
        console.log(html);

            if (html.data=="ok") {

              for (var i = 0; i < html.resultados['orders'].length; i++) {
                  if(html.resultados['orders'][i]['number']==valor){

                    for (var j = 0; j < html.resultados['orders'][i]['items'].length; j++) {
                      console.log("Id del del producto: "+html.resultados['orders'][i]['items'][j]['id']);
                       fila +="<tr><td>"+html.resultados['orders'][i]['items'][j]['sku']+"</td><td>"+html.resultados['orders'][i]['items'][j]['name']+"</td><td>"+html.resultados['orders'][i]['items'][j]['quantity']+"</td><td>"+html.resultados['orders'][i]['items'][j]['price']+"</td></tr>";
                    }
                    

                    $(".table_ordenes").html(fila);


                  }
                  
              }

            }else{
              console.log('Error en la db');
            }  
      }
      });
  });


});