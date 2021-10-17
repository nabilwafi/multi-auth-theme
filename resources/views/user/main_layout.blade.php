<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('user/panel/assets/images/favicon.png') }}">
    <!--Page title-->
    <title>Admin easy Learning</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="{{ asset('user/panel/assets/css/bootstrap.min.css') }}">
    <!--font awesome-->
    <link rel="stylesheet" href="{{ asset('user/panel/assets/css/all.min.css') }}">
    <!-- metis menu -->
    <link rel="stylesheet" href="{{ asset('user/panel/assets/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/panel/assets/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css') }}">
    <!-- chart -->

    <!-- <link rel="stylesheet" href="assets/plugins/chartjs-bar-chart/chart.css"> -->
    <!--Custom CSS-->
    <link rel="stylesheet" href="{{ asset('user/panel/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body id="page-top">
    <!-- preloader -->
    <div class="preloader">
        <img src="{{ asset('user/panel/assets/images/preloader.gif') }}" alt="">
    </div>
    <!-- wrapper -->
    <div class="wrapper">

        <!-- header area -->
        @include('user.layout.header')
        <!-- / header area -->
        
        <!-- sidebar area -->
        @include('user.layout.sidebar')
        <!-- /sidebar Area-->


        <div class="content_wrapper">
            @yield('user_main')
        </div>
        <!--/ content wrapper -->

    </div>
    <!--/ wrapper -->



    <!-- jquery -->
    <script src="{{ asset('user/panel/assets/js/jquery.min.js') }}"></script>
    <!-- popper Min Js -->
    <script src="{{ asset('user/panel/assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap Min Js -->
    <script src="{{ asset('user/panel/assets/js/bootstrap.min.js') }}"></script>
    <!-- Fontawesome-->
    <script src="{{ asset('user/panel/assets/js/all.min.js') }}"></script>
    <!-- metis menu -->
    <script src="{{ asset('user/panel/assets/plugins/metismenu-3.0.4/assets/js/metismenu.js') }}"></script>
    <script src="{{ asset('user/panel/assets/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js') }}"></script>
    <!-- nice scroll bar -->
    <script src="{{ asset('user/panel/assets/plugins/scrollbar/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('user/panel/assets/plugins/scrollbar/scroll.active.js') }}"></script>
    <!-- counter -->
    <script src="{{ asset('user/panel/assets/plugins/counter/js/counter.js') }}"></script>
    <!-- chart -->
    <script src="{{ asset('user/panel/assets/plugins/chartjs-bar-chart/Chart.min.js') }}"></script>
    <script src="{{ asset('user/panel/assets/plugins/chartjs-bar-chart/chart.js') }}"></script>
    <!-- pie chart -->
    <script src="{{ asset('user/panel/assets/plugins/pie_chart/chart.loader.js') }}"></script>
    <script src="{{ asset('user/panel/assets/plugins/pie_chart/pie.active.js') }}"></script>

    <!-- Main js -->
    <script src="{{ asset('user/panel/assets/js/main.js') }}"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        @if(Session::has('message'))
        var type = '{{ Session::get("alert-type","info") }}'
        switch (type) {
            case 'info':
                toastr.info('{{ Session::get("message") }}');
                break;

            case 'success':
                toastr.info('{{ Session::get("message") }}');
                break;
            
            case 'warning':
                toastr.info('{{ Session::get("message") }}');
                break;

            case 'error':
                toastr.info('{{ Session::get("message") }}');
                break;
        }
        
        @endif
    </script>

</body>

</html>
