<!-- container-scroller -->
  <!-- base:js -->
  <script src="/template/admin/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="/template/admin/js/off-canvas.js"></script>
  <script src="/template/admin/js/hoverable-collapse.js"></script>
  <script src="/template/admin/js/template.js"></script>
  <!-- endinject -->
  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
  <script src="/template/admin/js/main.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @yield('footer')