 $(document).ready(function () {
  var j = 1;
  var i = 1;
  $("#example").DataTable({
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
    //para usar los botones
    responsive: "true",
    dom: "Bfrtilp",
    buttons: [
      {
        extend: "excelHtml5",
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: "Exportar a Excel",
        className: "btn btn-success",
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: "Exportar a PDF",
        className: "btn btn-danger",
      },
      {
        extend: "print",
        text: '<i class="fa fa-print"></i> ',
        titleAttr: "Imprimir",
        className: "btn btn-info",
      },
    ],
  });
   var t = $("#registro_paciente").DataTable({
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
	  processing: true,
    serverSide: true,
    ajax: "listado_pacientes.php",
    //para usar los botones
    responsive: "true",
    dom: "Bfrtilp",
    buttons: [
      {
        extend: "excelHtml5",
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: "Exportar a Excel",
        className: "btn btn-success",
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: "Exportar a PDF",
        className: "btn btn-danger",
      },
      {
        extend: "print",
        text: '<i class="fa fa-print"></i> ',
        titleAttr: "Imprimir",
        className: "btn btn-info",
      },
    ],
    columnDefs: [
     {
        searchable: false,
        orderable: false,
        targets: 0,
     },
    ],
    order: [[1, 'asc']],
    columns: [
      {
        data: "id"
      },
      {
        data: function (row) {
          return `<a href="editar_paciente.php?id_paciente=${row.id_paciente}"><i class="fas fa-user-edit"  style="font-size: 20px; color:  #1d6376 ;"></i></a>`;
        },
      },
      { data: "dpi_paciente" },
      { data: "nombre_paciente" },
      { data: "telefono_paciente" },
      { data: "nombre_genero" },
      { data: "correo_paciente" },
      { data: "direccion_paciente" },
      { data: function(row) {
        return (row?.fecha_nacimiento_paciente && row.fecha_nacimiento_paciente != '0000-00-00' ) ? moment(row.fecha_nacimiento_paciente).format('DD/MM/YYYY') : '';
      }},
      {
        data: function (row) {
          return `<a href="crear_formulario.php?id_paciente=${row.id_paciente}"><i class="fas fa-user-clock" data-toggle="modal" style="font-size: 30px; color:  #1d6376 ;"></i></a>`;
        },
      },
      {
        data: function (row) {
          let item = "";
          if (row.examen_c > 0) {
            item = `<a href="cargar_pruebas_usuario.php?id_paciente=${row.id_paciente}"><i class="fas fa-flask" data-toggle="modal" style="font-size: 30px; color:  #1d6376 ;"></i></a>`;
          }
          return item;
        },
      },
      {
        data: function (row) {
          return `<a href="crear_formulario_cotizacion.php?id_paciente=${row.id_paciente}"><i class="fas fa-receipt" data-toggle="modal" style="font-size: 30px; color:  #1d6376 ;"></i></a>`;
        },
      },
    ],
  });
  t.on( 'draw.dt', function () {
    var PageInfo = $('#registro_paciente').DataTable().page.info();
         t.column(0, { page: 'current' }).nodes().each( function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        } );
    } );

var t1 = $("#resultados_pac").DataTable({
  order: [[1, 'asc']],  
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
	  processing: true,
    serverSide: true,
    ajax: {url : "resultado_paciente.php",
    type: "GET"},
    //para usar los botones
    responsive: "true",
    dom: "Bfrtilp",
    buttons: [
      {
        extend: "excelHtml5",
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: "Exportar a Excel",
        className: "btn btn-success",
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: "Exportar a PDF",
        className: "btn btn-danger",
      },
      {
        extend: "print",
        text: '<i class="fa fa-print"></i> ',
        titleAttr: "Imprimir",
        className: "btn btn-info",
      },
    ],
    columnDefs: [
      {
          searchable: false,
          orderable: false,
          targets: 0,
      },
    ],
    order: [[1, 'asc']],
    columns: [
      {
        data: "id"
      },
      { data: "nombre_paciente" },
      { data: "codigo_formulario" },
      { data: function(row) {
        return row?.fecha_creado ? moment(row.fecha_creado).format('DD/MM/YYYY') : '';
      }},
      { data: "hora_creado" },
      { data: "nombre_medico" },
      { data: "usuario" },
      { data: "nombre_area" },
      {
        data: function (row) {
           return `<a href="cargar_resultados.php?codigo_formulario=${row.codigo_formulario}">
            <i class="fas fa-flask" style="font-size: 30px; color: green;"></i></a>`;
        },
      },
      { data: function(row) {
        let hora,fecha,usuario='';
        hora= row?.hora_cargado ? row.hora_cargado : '';
        fecha= row?.fecha_cargado ? moment(row.fecha_cargado).format('DD/MM/YYYY') : '';
        usuario_l= row?.usuario_l ? row.usuario_l : '';
        return `${fecha} ${hora} (${usuario_l})`;
       }
      },
    ],
  });
  t1.on('draw.dt', function () {
    var PageInfo = $('#resultados_pac').DataTable().page.info();
         t1.column(0, { page: 'current' }).nodes().each( function (cell, j) {
            cell.innerHTML = j + 1 + PageInfo.start;
        } );
    });
});
