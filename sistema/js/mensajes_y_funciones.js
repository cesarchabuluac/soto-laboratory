
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



$(".finalizar").submit(function(e) {
  e.preventDefault();
  Swal.fire({
    title: 'Esta seguro de finalizar la orden?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Finlaizar esta orden.',
     cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      this.submit();
    }
  })
})

//GUARDAR DATOS DE LA EMPRESA y para todos los fotones que usen esta opción
$(".actualizar").submit(function(e) {
  e.preventDefault();
  Swal.fire({
    title: 'Actualizado exitosamente!',
    icon: 'info',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ok',
     cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      this.submit();
    }
  })
})


//GUARDAR DATOS DE LA EMPRESA y para todos los botones que usen esta función
$(".guardar").submit(function(e) {
  e.preventDefault();
  Swal.fire({
    title: 'Guardado exitosamente!',
    icon: 'info',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ok',
     cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      this.submit();
    }
  })
})

