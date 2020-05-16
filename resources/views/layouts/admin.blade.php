<!DOCTYPE html>
<html lang="ru">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ mix('admin/css/admin.css') }}" rel="stylesheet">
  
  <!-- Yandex map-->
  <script src="https://api-maps.yandex.ru/2.1/?apikey={{ env('YANDEX_MAP_KEY') }}&lang=ru_RU" type="text/javascript">
    </script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
  
    <!-- Sidebar -->
    @include('admin.partials.layout.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column {{ request()->is('administrator/contacts/preview') ? 'bg-white' : '' }}">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('admin.partials.layout.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

        @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('admin.partials.layout.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

   <!-- Custom scripts for all pages-->
  <script src="{{ mix('admin/js/admin.js') }}"></script>

  <!-- Page level plugins -->
<!--   <script src="vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
<!--   <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script> -->
<script src="{{ mix('admin/js/ckeditor.js') }}"></script>
</body>

</html>

@yield('modalImage')
@yield('ClassicEditor')
@yield('modalCommentAnswer')
@yield('modalQuestionAnswer')
@yield('modalReviewAnswer')
@yield('imagesWatermark')
@yield('deleteImage')
