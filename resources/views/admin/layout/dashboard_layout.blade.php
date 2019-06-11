<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ELTA | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  {!! Html::style('storage/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  {!! Html::style('storage/admin/bower_components/font-awesome/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
  {!! Html::style('storage/admin/bower_components/Ionicons/css/ionicons.min.css') !!}
  <!-- jvectormap -->
  {!! Html::style('storage/admin/bower_components/jvectormap/jquery-jvectormap.css') !!}

  <!-- <link rel="stylesheet" href="../../"> -->
  {!! Html::style('storage/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}
  <!-- bootstrap datepicker -->
  {!! Html::style('storage/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}
  <!-- iCheck for checkboxes and radio inputs -->
  {!! Html::style('storage/admin/plugins/iCheck/all.css') !!}
  <!-- Bootstrap Color Picker -->
  {!! Html::style('storage/admin/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') !!}
  <!-- Bootstrap time Picker -->
  {!! Html::style('storage/admin/plugins/timepicker/bootstrap-timepicker.min.css') !!}
  <!-- Select2 -->
  {!! Html::style('storage/admin/bower_components/select2/dist/css/select2.min.css') !!}
  <!-- Theme style -->
  {!! Html::style('storage/admin/dist/css/AdminLTE.min.css') !!}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  {!! Html::style('storage/admin/dist/css/skins/_all-skins.min.css') !!}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Datatables css -->
  {!! Html::style('storage/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}

  <!-- Custom css -->
  {!! Html::style('storage/admin/dist/css/custom.css') !!}

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- begin #header -->
  @include('admin/partial/header')
  <!-- end #header -->
  <!-- begin #sidebar -->
  @include('admin/partial/sidebar')
		<!-- end #sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- individual page content starts -->
    @yield('content')
    <!-- individual page content ends -->
  </div>
  <!-- /.content-wrapper -->

  <!-- begin #sidebar -->
  @include('admin/partial/footer')
  <!-- end #sidebar -->


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
{!! Html::script('storage/admin/bower_components/jquery/dist/jquery.min.js') !!}
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js">
</script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js">
</script>
<!-- Bootstrap 3.3.7 -->
{!! Html::script('storage/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
<!-- FastClick -->
{!! Html::script('storage/admin/bower_components/fastclick/lib/fastclick.js') !!}
<!-- AdminLTE App -->
{!! Html::script('storage/admin/dist/js/adminlte.min.js') !!}
<!-- Sparkline -->
{!! Html::script('storage/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}
<!-- jvectormap  -->
{!! Html::script('storage/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('storage/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
<!-- SlimScroll -->
{!! Html::script('storage/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}
<!-- ChartJS -->
{!! Html::script('storage/admin/bower_components/chart.js/Chart.js') !!}
{!! Html::script('js/teacher.js') !!}
{!! Html::script('js/elta.js') !!}
{!! Html::script('js/features.js') !!}
{!! Html::script('js/team_member.js') !!}


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- {!! Html::script('storage/admin/dist/js/pages/dashboard2.js') !!} -->

<!-- AdminLTE for demo purposes -->
<!-- {!! Html::script('storage/admin/dist/js/demo.js') !!} -->
{!! Html::script('storage/admin/bower_components/select2/dist/js/select2.full.min.js') !!}
<!-- InputMask -->
{!! Html::script('storage/admin/plugins/input-mask/jquery.inputmask.js') !!}
{!! Html::script('storage/admin/plugins/input-mask/jquery.inputmask.date.extensions.js') !!}
{!! Html::script('storage/admin/plugins/input-mask/jquery.inputmask.extensions.js') !!}
<!-- date-range-picker -->
{!! Html::script('storage/admin/bower_components/moment/min/moment.min.js') !!}
{!! Html::script('storage/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}
<!-- bootstrap datepicker -->
{!! Html::script('storage/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
<!-- bootstrap color picker -->
{!! Html::script('storage/admin/bower_components/chart.js/Chart.js') !!}
<!-- bootstrap time picker -->
{!! Html::script('storage/admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') !!}
<!-- SlimScroll -->
{!! Html::script('storage/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}
<!-- iCheck 1.0.1 -->
{!! Html::script('storage/admin/plugins/iCheck/icheck.min.js') !!}
<!-- FastClick -->
{!! Html::script('storage/admin/bower_components/fastclick/lib/fastclick.js') !!}


<!-- jquery datatables -->
{!! Html::script('storage/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}

{!! Html::script('storage/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}

<!-- CK Editor -->
{!! Html::script('storage/admin/bower_components/ckeditor/ckeditor.js') !!}


<!-- DataTables -->
<!-- <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->

  <!-- custom js -->
  <!-- {!! Html::script('storage/admin/dist/js/custom.js') !!} -->

  {!! Html::script('js/home.js') !!}

  {!! Html::script('js/about.js') !!}

  {!! Html::script('js/resource.js') !!}

  {!! Html::script('js/contact_us.js') !!}

  {!! Html::script('js/event.js') !!}

  {!! Html::script('js/features_category.js') !!}
  <script>

  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  $(function () {
    $('#service_category_listings').DataTable(); // service_category_listings datatable
    $('#gallery_type_listings').DataTable(); // gallery_type_listings datatable

    CKEDITOR.replace('service_category_description');
    //CKEDITOR.replace('gallery_type_description');

    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })


  })

</script>

</body>
</html>
