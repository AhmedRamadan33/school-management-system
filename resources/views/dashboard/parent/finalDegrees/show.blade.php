@extends('layouts.master')
@section('title')
Student Degrees
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Student Degrees
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="card-body">
                    <div class="tab nav-border">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                    role="tab" aria-controls="home-02"
                                    aria-selected="true">Student Degrees </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                aria-labelledby="home-02-tab">
                                <table class="table table-striped table-hover" style="text-align:center">
                                    <tbody>
                                        <tr>
                                            <th scope="row">science</th>
                                            <td>{{ $mark->science }}</td>
                                            <th scope="row">social studies</th>
                                            <td>{{ $mark->social_studies }}</td>
                                            <th scope="row"> math</th>
                                            <td>{{ $mark->math }}</td>
                                            <th scope="row">english</th>
                                            <td>{{ $mark->english }}</td>
                                            <th scope="row">geography</th>
                                            <td>{{ $mark->geography }}</td>
                                            <th scope="row">statistic</th>
                                            <td>{{ $mark->statistic }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">arabic</th>
                                            <td>{{ $mark->arabic }}</td>
                                            <th scope="row">chemistry</th>
                                            <td>{{ $mark->chemistry }}</td>
                                            <th scope="row">physics</th>
                                            <td>{{ $mark->physics }}</td>
                                            <th scope="row">history</th>
                                            <td>{{ $mark->history }}</td>
                                            <th scope="row">biology</th>
                                            <td>{{ $mark->biology }}</td>
                                            <th scope="row">computer</th>
                                            <td>{{ $mark->computer }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">french</th>
                                            <td>{{ $mark->french }}</td>
                                            <th scope="row">german</th>
                                            <td>{{ $mark->german }}</td>
                                            <th scope="row">technology</th>
                                            <td>{{ $mark->technology }}</td>
                                            <th scope="row">religion</th>
                                            <td>{{ $mark->religion }}</td>
                                            <th scope="row">psychology</th>
                                            <td>{{ $mark->psychology }}</td>
                                            <th scope="row">philosophy</th>
                                            <td>{{ $mark->philosophy }}</td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- row closed -->
    @endsection

