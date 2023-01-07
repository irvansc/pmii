@push('head')
<link rel="stylesheet" href="{{ asset('/vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('/vendor/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
@endpush
