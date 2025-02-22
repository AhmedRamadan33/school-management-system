@extends('layouts.master')
@section('css')

@section('title')
    Add Parent
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Add Parent
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <livewire:parent.create/>
                {{-- @livewire('parent.create') --}}
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @livewireScripts
@endsection
