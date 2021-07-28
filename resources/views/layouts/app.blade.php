
<!DOCTYPE html>
<html>

<!-- Header -->
@include('layouts.header')
<body>

<!-- pre-loader -->
{{-----------------
@include('layouts.pre_loader')
-------}}
<!-- header_body -->
@include('layouts.header_body')
<!-- right-sidebar -->
@include('layouts.right_sid_bar')
<!-- left-side-bar -->
@include('layouts.left_sid_bar')
<div class="mobile-menu-overlay"></div>
<!-- main-container -->
@yield('main-container')
<!-- scripts -->
<script src="{{asset('them/vendors/scripts/core.js')}}"></script>
<script src="{{asset('them/vendors/scripts/script.min.js')}}"></script>
<script src="{{asset('them/vendors/scripts/process.js')}}"></script>
<script src="{{asset('them/vendors/scripts/layout-settings.js')}}"></script>
{{---
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="vendors/scripts/dashboard.js"></script>
----}}
<!-- scripts add  -->
@yield('scripts')

</body>
</html>
