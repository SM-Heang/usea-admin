@include('components.header')
<div class="wrapper">
  <!-- Navbar -->
  @include('components.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('components.sidebar')
  <!-- End Main Sidebar Container -->

  @yield('content')

  <!-- /.content-wrapper -->

   <!-- footer -->
  @include('components.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('dist/js/custom.js') }}"></script>

{{-- tiny text editor  --}}
{{-- <script src="https://cdn.tiny.cloud/1/vvkmnccqdibk2pxm43af2gd5pefttpqfixp2zdkyji4914t8/tinymce/6/plugins.min.js" referrerpolicy="origin"></script>
<script>
   tinymce.init({
     selector: 'textarea#myeditorinstance',
     plugins: 'powerpaste advcode table lists checklist',
     toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
   });
</script> --}}
<!-- Page specific script -->

{{-- Summernote --}}
<script>
  $(function () {

    $('#summernote').summernote({
      toolbar: [
    ['font-style', ['bold', 'italic', 'underline','strikethrough','superscript','subscript', 'clear']],
    ['fontname', ['fontname', 'fontsize']],
    ['color', ['color', 'forecolor']],
    ['para', ['style','ul', 'ol', 'paragraph','height']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video', 'hr']],
    ['view', ['fullscreen', 'codeview', 'undo', 'redo']],
  ],
      placeholder: "",
      tabsize: 2,
      height: 500,
      lineHeights: ['1.0', '1.15', '1.5', '2.0', '2.5', '3.0'],
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather', 'Times New Roman', 'Poppins' , 'Khmer OS Siemreap', 'Khmer OS Battambang','Khmer Mool1', 'Khmer OS Muol', 'Khmer OS System'],
    })
    $('#summernote1').summernote({
      toolbar: [
    ['font-style', ['bold', 'italic', 'underline','strikethrough','superscript','subscript', 'clear']],
    ['fontname', ['fontname', 'fontsize']],
    ['color', ['color', 'forecolor']],
    ['para', ['style','ul', 'ol', 'paragraph','height']],
    ['table', ['table', 'table']],
    ['insert', ['link', 'picture', 'video', 'hr']],
    ['view', ['fullscreen', 'codeview', 'undo', 'redo']],
  ],
      placeholder: "",
      tabsize: 2,
      height: 500,
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather', 'Times New Roman', 'Poppins' , 'Khmer OS Siemreap','Khmer OS Battambang','Khmer Mool1', 'Khmer OS Muol', 'Khmer OS System'],
    })

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
</body>
</html>
