<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<!--<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>-->

<script src="vendor/bootstrap-4.2.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.2.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<!-- Select2 -->
<script src="vendor/select2/select2.min.js"></script>
<!-- Moment JS -->
<script src="../bower_components/moment/moment.js"></script>
<!-- DataTables -->
<script src="vendor/data-tables/jquery.dataTables.min.js"></script>
<script src="vendor/data-tables/dataTables.bootstrap4.min.js"></script>

<script src="vendor/slick/slick.min.js"></script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>

<script src="vendor/persian-date/dist/persian-date.js"></script>
<script src="vendor/persian-datepicker/dist/js/persian-datepicker.min.js"></script>
<!-- ChartJS -->

<!-- daterangepicker -->

<!-- datepicker -->

<!-- bootstrap time picker -->

<!-- CK Editor -->
<script src="vendor/ckeditor/ckeditor.js"></script>
<script src="vendor/ckeditor/fa.js"></script>
<!-- Main JS-->
<script src="js/main.js"></script>

<!-- Active Script -->
<script>
$(function(){
	/** add active class and stay opened when selected */
	var url = window.location;

	// for sidebar menu entirely but not cover treeview
	$('ul.sidebar-menu a').filter(function() {
	    return this.href == url;
	}).parent().addClass('active');

	// for treeview
	$('ul.treeview-menu a').filter(function() {
	    return this.href == url;
	}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

});
</script>
<!-- Data Table Initialize -->
<script>
  $(function () {
    $('#table_id_1').DataTable({
        scrollX: true,
        language: {
            "sEmptyTable":     "هیچ داده‌ای در جدول وجود ندارد",
            "sInfo":           "نمایش _START_ تا _END_ از _TOTAL_ ردیف",
            "sInfoEmpty":      "نمایش 0 تا 0 از 0 ردیف",
            "sInfoFiltered":   "(فیلتر شده از _MAX_ ردیف)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ",",
            "sLengthMenu":     "نمایش _MENU_ ردیف",
            "sLoadingRecords": "در حال بارگزاری...",
            "sProcessing":     "در حال پردازش...",
            "sSearch":         "جستجو:",
            "sZeroRecords":    "رکوردی با این مشخصات پیدا نشد",
            "oPaginate": {
                "sFirst":    "برگه‌ی نخست",
                "sLast":     "برگه‌ی آخر",
                "sNext":     "بعدی",
                "sPrevious": "قبلی"
            },
            "oAria": {
                "sSortAscending":  ": فعال سازی نمایش به صورت صعودی",
                "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
            }
        },
    });
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function(){
    //Initialize Select2 Elements
    $('.select2').select2();
    //CK Editor
      var editor1;
      ClassicEditor
          .create( document.querySelector( '#editor1' ), {
              // The UI of the editor as well as its content will be in German.
              language: 'fa',
              // But the content will be edited in Arabic.
              content: 'ar'
          } )
          .then( newEditor => {
              editor1 = newEditor;
          } )
          .catch( error => {
              console.error( error );
          } );

      /*var editor2;
      ClassicEditor
          .create( document.querySelector( '#editor2' ), {
              // The UI of the editor as well as its content will be in German.
              language: 'fa',
              // But the content will be edited in Arabic.
              content: 'ar'
          } )
          .then( newEditor => {
              editor2 = newEditor;
          } )
          .catch( error => {
              console.error( error );
          } );*/
  });
</script>


