@extends('layout.admin')

@section('content')
    <div id="content">
        @include('admin.breadcrumb')
        @include('admin.alert')
        @yield('main')
    </div>
@endsection