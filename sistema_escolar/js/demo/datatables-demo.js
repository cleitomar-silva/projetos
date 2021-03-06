// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
   // paging: false,
    //searching: false
    "order": [[0,"desc" ]], //coluna , ordem
    "language": {
      "lengthMenu":   "Exibir _MENU_ registros por página", // para retirar --- "lengthMenu": " "
      "zeroRecords":  "Nada encontrado - desculpe",
      "info":         "Mostrando página  _PAGE_ de _PAGES_",
      "infoEmpty":    "Nenhum registro disponível ",
      "infoFiltered": "(filtrado de _MAX_ registros no total)",
      "search":       "Buscar:",
      
      "oPaginate": {
        "sFirst":    "Primeiro",
        "sPrevious": "Anterior",
        "sNext":     "Seguinte",
        "sLast":     "Último"
      }      
    }
   

  });
});
