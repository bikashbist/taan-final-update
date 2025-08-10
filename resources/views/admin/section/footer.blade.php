</div>

<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS-->
<script src="{{ asset('assets/cms/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/cms/vendors/popper.js/dist/umd/popper.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/cms/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/cms/vendors/metisMenu/dist/metisMenu.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/cms/vendors/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>

<!-- CORE SCRIPTS-->
<script src="{{ asset('assets/cms/js/app.min.js')}}" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="{{ asset('assets/cms/js/scripts/dashboard_1_demo.js')}}" type="text/javascript"></script>


<script src="{{ asset('assets/cms/test/jquery-migrate-1.2.1.min.js') }}"></script>
@show
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>
<!-- jquery notify -->

<script src="{{ asset('assets/cms/dm_js/app.js') }}"></script>

<script src="{{ asset('assets/cms/plugin/toastr-master/toastr.js') }}"></script>
@yield('scripts')
</body>
@include('admin.section.flash-message')
</html>