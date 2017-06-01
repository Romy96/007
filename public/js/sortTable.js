$(document).ready(function() {
    $('#products').DataTable({
        "ordering": true,
        columnDefs: [{
          orderable: false,
          targets: "no-sort"
      }]
  });
});