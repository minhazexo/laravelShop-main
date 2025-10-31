<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.2/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo_1/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" />

    @stack('style')
</head>
<body>
<div class="main-wrapper">
    @include('admin.layouts.partials.sidebar')

    <nav class="settings-sidebar">
        <div class="sidebar-body">
            <a href="#" class="settings-sidebar-toggler"><i data-feather="settings"></i></a>
        </div>
    </nav>

    <div class="page-wrapper">
        @include('admin.layouts.partials.header')
        <div class="page-content">
            @yield('content')
        </div>
        @include('admin.layouts.partials.footer')
    </div>
</div>

<!-- jQuery FIRST -->
<script src="{{ asset('admin/assets/vendors/jquery/jquery.min.js') }}"></script>

<!-- Core JS -->
<script src="{{ asset('admin/assets/vendors/core/core.js') }}"></script>

<!-- Flot Charts (local or CDN fallback) -->
<script>
    function loadScript(url, callback){
        let script = document.createElement('script');
        script.src = url;
        script.onload = callback;
        document.head.appendChild(script);
    }

    function loadFlot(callback) {
        if (typeof $.plot !== "undefined") {
            callback();
        } else {
            loadScript("https://cdnjs.cloudflare.com/ajax/libs/flot/4.2.2/es5/jquery.flot.min.js", function(){
                loadScript("https://cdnjs.cloudflare.com/ajax/libs/flot/4.2.2/jquery.flot.resize.min.js", callback);
            });
        }
    }
</script>

<!-- Other Plugin JS -->
<script src="{{ asset('admin/assets/vendors/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>

<!-- SweetAlert2 & Lucide -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.2/dist/sweetalert2.all.min.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>

<!-- Template Scripts -->
<script src="{{ asset('admin/assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/template.js') }}"></script>

<!-- Page Scripts -->
<script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
<script src="{{ asset('admin/assets/js/datepicker.js') }}"></script>

<script>
$(function() {
    // Toast setup
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    @if(session('success'))
        Toast.fire({ icon: "success", title: "{{ session('success') }}" });
    @endif
    @if(session('error'))
        Toast.fire({ icon: "error", title: "{{ session('error') }}" });
    @endif
    @if(session('warning'))
        Toast.fire({ icon: "warning", title: "{{ session('warning') }}" });
    @endif

    // Delete confirmation
    $('.deleteConfirm').on('click', function(e){
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result)=>{
            if(result.isConfirmed){
                window.location.href = href;
            }
        });
    });

    // Initialize Lucide icons
    lucide.createIcons();
});
</script>

@stack('script')
</body>
</html>
