
@extends('layout')

@section('content')
<section layout:fragment="content" class="content-wrapper" style="padding:50px; background:white;">
    <div class="box-body">
        <div id="example1_wrapper" style="display:block" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-12">
                    <form role="form" action="/department/{{ $department->id}}" method="POST">
                        @csrf
                         <input name="_method" type="hidden" value="PUT">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label style="width:100%; justify-content:left !important">Department Name</label>
                                <input style="width:100% !important" name="id"  value="{{$department->id}}"  type="hidden" class="form-control" >
                                <input style="width:100% !important" name="department"  value="{{$department->department}}"  type="text" class="form-control" placeholder="Name ...">
                            </div>
                            <div class=" col-md-2">
                                <button  type="submit" class="btn btn-success md" style="margin-top: 22px;">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection