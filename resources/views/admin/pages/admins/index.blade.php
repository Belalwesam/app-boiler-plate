@extends('admin.layout.app')

@section('title')
    @lang('nav.admins')
@endsection

@section('css-vendor')
    <link rel="stylesheet" href="{{ asset('/dashboard/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/dashboard/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
@endsection

{{-- main content --}}
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-2">@lang('admins.admins')</h4>
@endsection


@section('script-vendor')
    <script src="{{ asset('/dashboard/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
@endsection
@section('script')
    <script>
        $('document').ready(function() {})
    </script>
@endsection
