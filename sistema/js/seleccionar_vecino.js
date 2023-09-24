
// buscar Cliente
$('#num_casa').keyup(function(v) {
  v.preventDefault();
  var cl_v = $(this).val();
  var action = 'searchCliente_v';
  $.ajax({
    url: 'modal.php',
    type: "POST",
    async: true,
    data: {action:action,dpi_vecino:cl_v},
    success: function(response) {
      if (response == 0) {
        $('#idcliente').val('');
        $('#nombre').val('');
        $('#telefono').val('');
        $('#direccion').val('');
        // mostar boton agregar
        $('.btn_new_cliente').slideDown();
      }else {
        var data = $.parseJSON(response);
        $('#idcliente').val(data.idcliente);
        $('#nombre').val(data.nombre_inq);
         $('#telefono').val(data.telefono);
          $('#direccion').val(data.direccion);
      
        // ocultar boton Agregar
      
        
      }
    },
    error: function(error) {

    }
  });

});



// buscar el producto
$('#codigo_producto').keyup(function(v) {
  v.preventDefault();
  var cl_v = $(this).val();
  var action = 'searchCliente_v';
  $.ajax({
    url: 'modal.php',
    type: "POST",
    async: true,
    data: {action:action,codigo_producto:cl_v},
    success: function(response) {
      if (response == 0) {
         $('#id_producto').val('');
          $('#id_producto').slideUp();
       
             $('#codigo_producto2').val('');
          $('#codigo_producto2').slideUp();

           $('#id_local').val('');
          $('#id_local').slideUp();
         $('#nombre_producto').val('');
          $('#nombre_producto').slideUp();
          $('#precio_venta').val('');
          $('#precio_venta').slideUp();
  

      
 
       
      }else {
        var data = $.parseJSON(response);
        $('#id_producto').val(data.id_producto);
        $('#id_producto').slideDown();
         $('#codigo_producto2').val(data.codigo_producto);
        $('#codigo_producto2').slideDown();
         $('#id_local').val(data.id_local);
        $('#id_local').slideDown();
     
        $('#nombre_producto').val(data.nombre_producto);
        $('#nombre_producto').slideDown();
            $('#precio_venta').val(data.precio_venta);
        $('#precio_venta').slideDown();
              $('#stock_local').val(data.stock_local);
        $('#stock_local').slideDown();
  

     
     
      
        // ocultar boton Agregar
      
        
      }
    },
    error: function(error) {

    }
  });

});



// buscar el producto
$('#codigo_producto').keyup(function(v5) {
  v5.preventDefault();
  var cl_v5 = $(this).val();
  var action = 'searchCliente_v5';
  $.ajax({
    url: 'modal.php',
    type: "POST",
    async: true,
    data: {action:action,codigo_producto:cl_v5},
    success: function(response) {
      if (response == 0) {
   //STOCK TEMPORAL SE REFIERE A LA CANTIDAD DE PRODUCTOS EN LA TABLA DETALLES PARA HACER UNA RESTA CON STOCK REAL.
 
        
            
      
 
       
      }else {
        var data = $.parseJSON(response);

        $('#stock_temporal').val(data.cantidad_producto);
        $('#stock_temporal').slideDown();

  

     
     
      
        // ocultar boton Agregar
      
        
      }
    },
    error: function(error) {

    }
  });

});



// buscar dpi personal
$('#dpi_personal').keyup(function(p) {
  p.preventDefault();
  var cl_p = $(this).val();
  var action = 'searchCliente_p';
  $.ajax({
    url: 'modal.php',
    type: "POST",
    async: true,
    data: {action:action,dpi_personal:cl_p},
    success: function(response) {
      if (response == 0) {
         $('#id_personal').val('');
          $('#id_personal').slideUp();
           $('#nombre_personal').val('');
          $('#nombre_personal').slideUp();
            $('#pago_diario').val('');
          $('#pago_diario').slideUp();
          $('#realizar_venta').slideUp();
     
     
      
 
       
      }else {
        var data = $.parseJSON(response);
        $('#id_personal').val(data.id_personal);
        $('#id_personal').slideDown();
         $('#nombre_personal').val(data.nombre_personal);
        $('#nombre_personal').slideDown();
        $('#pago_diario_permiso').val(data.pago_diario);  //ponemos el valor en el permiso para que el usuario decida si mantien
        $('#pago_diario_permiso').slideDown();
        $('#realizar_venta').slideDown();
     
      
     
     
      
        // ocultar boton Agregar
      
        
      }
    },
    error: function(error) {

    }
  });

});




// buscar dpi personal
$('#dpi_personal2').keyup(function(p2) {
  p2.preventDefault();
  var cl_p2 = $(this).val();
  var action = 'searchCliente_p2';
  $.ajax({
    url: 'modal.php',
    type: "POST",
    async: true,
    data: {action:action,dpi_personal2:cl_p2},
    success: function(response) {
      if (response == 0) {
         $('#id_personal2').val('');
          $('#id_personal2').slideUp();
           $('#nombre_personal2').val('');
          $('#nombre_personal2').slideUp();
     
      
 
       
      }else {
        var data = $.parseJSON(response);
        $('#id_personal2').val(data.id_personal);
        $('#id_personal2').slideDown();
         $('#nombre_personal2').val(data.nombre_personal);
        $('#nombre_personal2').slideDown();
     
      
     
     
      
        // ocultar boton Agregar
      
        
      }
    },
    error: function(error) {

    }
  });

});







// buscar el producto
$('#nit_cliente').keyup(function(y) {
  y.preventDefault();
  var cl_y = $(this).val();
  var action = 'searchCliente_y';
  $.ajax({
    url: 'modal.php',
    type: "POST",
    async: true,
    data: {action:action,nit_cliente:cl_y},
    success: function(response) {
      if (response == 0) {
         $('#id_cliente').val('');
          $('#id_cliente').slideUp();
            
                   $('#nombre_cliente').slideUp();

         $('#nombre_cliente').val('');// NO SE OCULTA PARA QUE PUEDAN ESCRIBIR EL NOMBREL DEL CLIENTE CON CF
        
     

      
 
       
      }else {
        var data = $.parseJSON(response);
    
      $('#id_cliente').val(data.id_cliente);
        $('#id_cliente').slideDown();

        $('#nombre_cliente').val(data.nombre_cliente);
                $('#nombre_cliente').slideDown();

       


     
     
      
        // ocultar boton Agregar
      
        
      }
    },
    error: function(error) {

    }
  });

});




// buscar el código de la venta para jalar el id para el pedido express
$('#codigo_venta').keyup(function(c) {
  c.preventDefault();
  var cl_c = $(this).val();
  var action = 'searchCliente_c';
  $.ajax({
    url: 'modal.php',
    type: "POST",
    async: true,
    data: {action:action,codigo_venta:cl_c},
    success: function(response) {
      if (response == 0) {
         $('#id_venta').val('');
          $('#id_venta').slideUp();
           $('#persona_receptor').val('');
          $('persona_receptor').slideUp();
    
     
      
 
       
      }else {
        var data = $.parseJSON(response);
        $('#id_venta').val(data.id_venta);
        $('#id_venta').slideDown();
         $('#persona_receptor').val(data.nombre_cliente);
        $('#persona_receptor').slideDown();

     
      
     
     
      
        // ocultar boton Agregar
      
        
      }
    },
    error: function(error) {

    }
  });

});




/*
// buscar el producto
$('#name_producto').keyup(function(w) {
  w.preventDefault();
  var cl_w = $(this).val();
  var action = 'searchCliente_w';
  $.ajax({
    url: 'modal.php',
    type: "POST",
    async: true,
    data: {action:action,name_producto:cl_w},
    success: function(response) {
      if (response == 0) {
         $('#nombre_producto').val('');
          $('#nombre_producto').slideUp();

      
 
        $('.btn_new_cliente').slideDown();
      }else {
        var data = $.parseJSON(response);
     
        $('#nombre_producto').val(data.nombre_producto);
        $('#nombre_producto').slideDown();
     
     
      
        // ocultar boton Agregar
      
        
      }
    },
    error: function(error) {

    }
  });

});

*/



// buscar cheque
$('#cheque').keyup(function(z) {
  z.preventDefault();
  var cl_z = $(this).val();
  var action = 'searchCliente_z';
  $.ajax({
    url: 'modal.php',
    type: "POST",
    async: true,
    data: {action:action,cheque:cl_z},
    success: function(response) {
      if (response == 0) {
        $('#codcasa_x').val('');
        $('#inquilino_x').val('');
         $('#banco_x').val('');
          $('#inquilino_x').slideUp();
           $('#codcasa_x').slideUp();
           $('#banco_x').slideUp();
           $('#fecha_procesado_x').slideUp();
   
        // mostar boton agregar
        $('.btn_new_cliente').slideDown();
      }else {
        var data = $.parseJSON(response);
        $('#codcasa_x').val(data.codcasa);
        $('#inquilino_x').val(data.inquilino);
           $('#banco_x').val(data.banco);
              $('#fecha_procesado_x').val(data.fecha_procesado);
            $('#inquilino_x').slideDown();
                 $('#codcasa_x').slideDown();
                      $('#banco_x').slideDown();
                      $('#fecha_procesado_x').slideDown();
      
      
        
      }
    },
    error: function(error) {

    }
  });

});


// buscar vecino para lectura
$('#codcasa').keyup(function(v) {
  v.preventDefault();
  var cl_v = $(this).val();
  var action = 'searchCliente_v';
  $.ajax({
    url: 'modal.php',
    type: "POST",
    async: true,
    data: {action:action,dpi_vecino:cl_v},
    success: function(response) {
      if (response == 0) {
         $('#nombre').val('');
          $('#nombre').slideUp();

      
 
        $('.btn_new_cliente').slideDown();
      }else {
        var data = $.parseJSON(response);
     
        $('#nombre').val('Verificación correcta');
        $('#nombre').slideDown();
     
     
      
        // ocultar boton Agregar
      
        
      }
    },
    error: function(error) {

    }
  });

});


// buscar vecino para lectura para colocar el valor anterior en el unput
$('#codcasa').keyup(function(l) {
  l.preventDefault();
  var cl_l = $(this).val();
  var action = 'searchCliente_l';
  $.ajax({
    url: 'modal.php',
    type: "POST",
    async: true,
    data: {action:action,codcasa:cl_l},
    success: function(response) {
      if (response == 0) {
         $('#lectura_anterior').val('0');
          $('#lectura_anterior').prop('disabled',false);
     

      
 
        $('.btn_new_cliente').slideDown();
      }else {
        var data = $.parseJSON(response);
     
        $('#lectura_anterior').val(data.lectura_anterior);
          $('#lectura_anterior').prop('disabled', true);

     
     
      
        // ocultar boton Agregar
      
        
      }
    },
    error: function(error) {

    }
  });

});
