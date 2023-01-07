<!-- jQuery -->
    <script src="{{ asset('') }}vendor/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('') }}vendor/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

<script src="{{ asset('') }}vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap 4 -->
    <!-- ChartJS -->
    <script src="{{ asset('') }}vendor/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ asset('') }}vendor/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{ asset('') }}vendor/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ asset('') }}vendor/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('') }}vendor/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('') }}vendor/plugins/moment/moment.min.js"></script>

    <!-- overlayScrollbars -->
    <script src="{{ asset('') }}vendor/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    @stack('scripts_vendor')

    <!-- AdminLTE App -->
    <script src="{{ asset('') }}vendor/dist/js/adminlte.js"></script>
    <script src="{{ asset('') }}js/custom.js"></script>

<script src="{{asset('')}}vendor/plugins/sweetalert2/sweetalert2.all.min.js"></script>
@stack('js')
<script>
     @if (Session::has('success'))
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
        icon: 'success',
        title: '{{ Session::get('success') }}'
    })

        @endif
    @if (Session::has('error'))
    const Toast = Swal.mixin({
    toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
})
    Toast.fire({
        icon: 'error',
        title: '{{ Session::get('error') }}'
})

        @endif
</script>

</body>

</html>
