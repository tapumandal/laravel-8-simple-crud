
@extends('layout')

@section('content')
<section layout:fragment="content" class="content-wrapper" style="padding:50px; background:white;">
    <div class="box-body">
        <div id="example1_wrapper" style="display:block" class="dataTables_wrapper form-inline dt-bootstrap">

            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form role="form" action="/customer" method="POST">
                        @csrf
                        <!-- text input -->
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label style="width:100%; justify-content:left !important">Customer Name</label>
                                <input style="width:100% !important" name="name" type="text" class="form-control" placeholder="Name ...">
                            </div>

                            <div class="form-group blu-margin">
                                <label style="width:100%; justify-content:left !important">Select Department</label>
                                <select name="departmentId" class="form-control"   id="dropOperator" style="width:100% !important">
                                    <option >Select</option>
                                    @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class=" col-md-2">
                                <button  type="submit" class="btn btn-success md" style="margin-top: 22px;">Create</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection