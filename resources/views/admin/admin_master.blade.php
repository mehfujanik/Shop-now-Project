<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
   {{--  <meta name="author" content=""> --}}
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../images/favicon.ico">

    <title>Shop Now</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('backend/css/style.css ') }} ">
	<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css')}} ">
  
  {{-- For toster sms  --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>






  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  @include('admin.body.admin_header')
  
  <!-- Left side column. contains the logo and sidebar -->
 
@include('admin.body.admin_sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	 
    @yield('admin')

  </div>
  <!-- /.content-wrapper -->



@include('admin.body.admin_footer')


  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
	<script src="{{ asset('backend/js/vendors.min.js ')}}"></script>

    <script src=" {{ asset('../assets/icons/feather-icons/feather.min.js')}} "></script>	
	<script src=" {{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}} "></script>
	<script src=" {{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}} "></script>
	<script src=" {{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}} "></script>
	
	<!-- Sunny Admin App -->
	<script src="{{ asset('backend/js/template.js ')}}"></script>
	<script src="{{ asset('backend/js/pages/dashboard.js ')}}"></script>
	
{{-- Input Color --}}
<script src="{{ asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')  }}"></script>


<script src="{{ asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
  <script src="{{ asset('backend/js/pages/data-table.js') }}"></script>





  <!-- toster cdn  -->
  <script  src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	
  <script>
  @if(Session::has('message'))
  var type = "{{ Session::get('alert-type', 'info')}}"
   switch (type) {

     case 'info':
     toastr.info(" {{ Session::get('message') }} ");
       break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
       break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
       break;	 
       
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
       
       
        break;	 	 
        default:
      break;
  }
    
   @endif		

  </script>
	








{{-- <script type="text/javascript"> 

    $('button#deleteButton').on('click', function(e){
var name = $(this).data('id');
e.preventDefault();
swal({
    title: "Careful!",
    text: "Are you sure you want to delete "+name+"?",
    icon: "warning",
    dangerMode: true,
    buttons: {
      cancel: "Exit",
      confirm: "Confirm",
    },
})
.then ((willDelete) => {
    if (willDelete) {
       $(this).closest("form").submit();
    }
});
});
</script>  --}}








</body>
</html>
