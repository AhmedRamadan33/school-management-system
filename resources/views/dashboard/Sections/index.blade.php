@extends('layouts.master')

@section('title')
    Sections
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Sections
@endsection
<!-- breadcrumb -->
@endsection
@section('content')
@include('layouts.messages_alert')

<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a class="button x-small" href="#" data-toggle="modal" data-target="#exampleModal">
                    add section</a>
            </div>


            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">

                        @foreach ($Grades as $Grade)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $Grade->name }}</a>
                                <div class="acd-des">

                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>Class Name</th>
                                                                    <th>Status</th>
                                                                    <th>Processes</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($Grade->sections as $list_Sections)
                                                                    <tr>
                                                                        <td>{{ $list_Sections->id }}</td>
                                                                        <td>{{ $list_Sections->name }}</td>
                                                                        <td>{{ $list_Sections->classses->name }}
                                                                        </td>
                                                                        <td>
                                                                            @if ($list_Sections->status === 1)
                                                                                <label
                                                                                    class="badge badge-success">Active</label>
                                                                            @else
                                                                                <label class="badge badge-danger">Not
                                                                                    Active</label>
                                                                            @endif

                                                                        </td>
                                                                        <td>

                                                                            <a href="#"
                                                                                class="btn btn-outline-info btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#edit{{ $list_Sections->id }}">Edit</a>
                                                                            <a href="#"
                                                                                class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#delete{{ $list_Sections->id }}">Delete</a>
                                                                        </td>
                                                                    </tr>


                                                                    <!--تعديل قسم  -->
                                                                    <div class="modal fade"
                                                                        id="edit{{ $list_Sections->id }}" tabindex="-1"
                                                                        role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                                        id="exampleModalLabel">
                                                                                        Edit Section
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form
                                                                                        action="{{ route('sections.update', $list_Sections->id) }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                    name="name"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_Sections->name }}">
                                                                                            </div>

                                                                                        </div>
                                                                                        <br>


                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">Grade
                                                                                                Name</label>
                                                                                            <select name="grade_id"
                                                                                                class="custom-select"
                                                                                                onclick="console.log($(this).val())">
                                                                                                <!--placeholder-->
                                                                                                <option
                                                                                                    value="{{ $Grade->id }}">
                                                                                                    {{ $Grade->name }}
                                                                                                </option>

                                                                                                @foreach ($list_Grades as $list_Grade)
                                                                                                    @if ($Grade->name != $list_Grade->name)
                                                                                                        <option
                                                                                                            value="{{ $list_Grade->id }}">
                                                                                                            {{ $list_Grade->name }}
                                                                                                        </option>
                                                                                                    @endif
                                                                                                @endforeach

                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">Class
                                                                                                Name</label>
                                                                                            <select name="classroom_id"
                                                                                                class="custom-select">
                                                                                                <option
                                                                                                    value="{{ $list_Sections->classses->id }}">
                                                                                                    {{ $list_Sections->classses->name }}
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <div class="form-check">

                                                                                                @if ($list_Sections->status === 1)
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        checked
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">
                                                                                                @else
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">
                                                                                                @endif
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="exampleCheck1">Status</label><br>

                                                                                                <div class="col">
                                                                                                    <label
                                                                                                        for="inputName"
                                                                                                        class="control-label">Teacher
                                                                                                        Name</label>
                                                                                                    <select multiple
                                                                                                        name="teacher_id[]"
                                                                                                        class="form-control"
                                                                                                        id="exampleFormControlSelect2">

                                                                                                        @foreach ($teachers as $teacher)
                                                                                                            @php $check = []; @endphp
                                                                                                            @foreach ($list_Sections->teachers as $teacherId)
                                                                                                                @php $check [] = $teacherId->id  @endphp
                                                                                                            @endforeach

                                                                                                            <option
                                                                                                                value="{{ $teacher->id }}"
                                                                                                                {{ in_array($teacher->id, $check) ? 'selected' : '' }}>
                                                                                                                {{ $teacher->name }}
                                                                                                            </option>
                                                                                                        @endforeach

                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>


                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">Close</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger">submit</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <!-- delete_modal_Grade -->
                                                                    <div class="modal fade"
                                                                        id="delete{{ $list_Sections->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="text-warning"
                                                                                        id="exampleModalLabel">
                                                                                        warning
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form
                                                                                        action="{{ route('sections.destroy', $list_Sections->id) }}"
                                                                                        method="post">

                                                                                        @csrf
                                                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                            class="modal-title"
                                                                                            id="exampleModalLabel">
                                                                                            delete Section <span
                                                                                                class=" text-success">{{ $list_Sections->name }}</span>
                                                                                        </h5>

                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-dismiss="modal">Close</button>
                                                                                            <button type="submit"
                                                                                                class="btn btn-danger">submit</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!--اضافة قسم جديد -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                add section</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('sections.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="name">
                                    </div>
                                </div>
                                <br>

                                <div class="col">
                                    <label for="inputName" class="control-label">Grade Name</label>
                                    <select name="grade_id" class="custom-select"
                                        onchange="console.log($(this).val())">
                                        <!--placeholder-->
                                        <option value="" selected disabled>
                                            Select Grade
                                        </option>
                                        @foreach ($list_Grades as $list_Grade)
                                            <option value="{{ $list_Grade->id }}"> {{ $list_Grade->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>

                                <div class="col">
                                    <label for="inputName" class="control-label">Class Name</label>
                                    <select name="classroom_id" class="custom-select">

                                    </select>
                                </div><br>

                                <div class="col">
                                    <label for="inputName" class="control-label">Teacher Name</label>
                                    <select multiple name="teacher_id[]" class="form-control"
                                        id="exampleFormControlSelect2">
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<br>
<!-- row closed -->
@endsection
