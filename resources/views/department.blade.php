
@extends('layout')

@section('content')
<section layout:fragment="content" class="content-wrapper" style="padding:50px; background:white;">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-4">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p style="margin-bottom: 0px; text-align: center;">{{ $message }}</p>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p style="margin-bottom: 0px; text-align: center;">{{ $message }}</p>
                </div>
            @endif

            @if ($message = Session::get('failed'))
                <div class="alert alert-danger">
                    <p style="margin-bottom: 0px; text-align: center;">{{ $message }}</p>
                </div>
            @endif
        </div>
    </div>
    <a href="/department/create" type="button" class="btn btn-success md" style="margin-bottom: 20px;">Create New Department</a>
    <div class="box-body">
        <div id="example1_wrapper" style="display:block" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-12">


                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column descending"
                                style="width: 169px;">No</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column descending"
                                style="width: 169px;">Department Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending" style="width: 209px;">
                                Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($departments as $department)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $loop->index+1 }}</td>
                                <td > {{ $department->department}}</td>
                                <td>
                                    <a style="float: left;" href="/department/{{ $department->id}}/edit" type="button" class="" >
                                        <i class="fa fa-fw fa-edit"></i>
                                    </a>
                                    <span style="float: left;">|</span>
                                    
                                    <!-- <a href="/department/delete/{{ $department->id}}" type="button" class="" >
                                        <i style="color:red;" class="far fa-trash-alt"></i>
                                    </a> -->

                                    <form role="form" action="/department/{{ $department->id}}" method="POST">
                                        @csrf
                                         <input name="_method" type="hidden" value="DELETE">
                                        <!-- text input -->
                                        <button   type="submit" class="" style="border: none; float: left; background: transparent;">
                                            <i style="color:red;" class="far fa-trash-alt"></i>    
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection