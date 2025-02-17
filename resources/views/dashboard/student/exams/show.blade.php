@extends('layouts.master')
@section('title')
    Take an exam
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Take an exam
@stop
<!-- breadcrumb -->
@endsection
@section('content')

@livewire('show-questions', ['quiz_id' => $quiz_id, 'student_id' => $student_id])

@endsection
