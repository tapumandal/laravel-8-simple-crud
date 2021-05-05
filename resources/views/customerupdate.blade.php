
@extends('layout')

@section('content')
<section layout:fragment="content" class="content-wrapper" style="padding:50px; background:white;">
    <div class="box-body">
        <div id="example1_wrapper" style="display:block" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-12">
                    <form role="form" action="/customer/{{ $customer->id }}" method="POST">
                        @csrf
                         <input name="_method" type="hidden" value="PUT">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <input style="width:100% !important" name="id" th:value="${customer.id}" type="hidden" class="form-control" >
                                <label style="width:100%; justify-content:left !important">Customer Name</label>
                                <input style="width:100% !important" name="name" value="{{ $customer->name }}" type="text" class="form-control" placeholder="Name ...">
                            </div>

                            <div class="form-group blu-margin">
                                <label style="width:100%; justify-content:left !important"> Select Department</label>
                                <select name="departmentId" class="form-control"   id="dropOperator" style="width:100% !important">
                                    <option value="0">Select</option>

                                    @if(!$customer->department->isEmpty())
                                        @foreach($departments as $department)

                                            @if($department->id == $customer->department[0]->id)
                                                <option selected value="{{ $department->id }}" >{{ $department->department }}</option>
                                            @else
                                                <option  value="{{ $department->id }}" >{{ $department->department }}</option>
                                            @endif
<!-- 
                                            @forelse ($customer->department as $dep)
                                                <option selected value="{{ $department->id }}" >{{ $department->department }}</option>
                                            @empty
                                                <option value="{{ $department->id }}" >{{ $department->department }}</option>
                                            @endforelse -->

                                        @endforeach

                                    @else
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" >{{ $department->department }}</option>
                                        @endforeach
                                    @endif

                                </select>
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