

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
    <div class="row">

       

        <div class="col-md-6">
            <a href="/customer/create" type="button" class="btn btn-success md" style="margin-bottom: 20px;">Create New Customer</a>
        </div>
        <div class="col-md-6">
            <!-- <div class="dropdown" style="margin-bottom:20px; float:right;">
                <button style="background-color: #909090; border-color: #909090;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                    <span >Number of entities: </span>
                    <span text="${customerList.size}"></span>
                    <span class="caret"></span></button>
                <ul class="dropdown-menu" style=" padding:0px;">
                    <li>
                        <a href="@{/customer(size=5, page=${customerList.number+1})}" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">5</a>
                    </li>
                    <li>
                        <a href="@{/customer(size=10, page=${customerList.number+1})}" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">10</a>
                    </li>
                    <li>
                        <a href="@{/customer(size=20, page=${customerList.number+1})}" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">20</a>
                    </li>
                </ul>
            </div> -->
        </div>
    </div>
    <div class="box-body">
        <div id="example1_wrapper" style="display:block" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-12">


<!--                    <a href="@{/customer(size=${customerList.size}, page=${customerList.number+2})}" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a>-->

                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column descending"
                                style="wid 169px;">No</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column descending"
                                style="wid 169px;">Customer Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending" style="wid 209px;">
                                Department Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending"
                                style="wid 185px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $customer)
                            <tr role="row" class="odd" each="customer,iter : ${customerList.content}">
                                <td class="sorting_1">{{ $loop->index+1 }}</td>
                                <td >{{ $customer->name}} </td>
                                <td >

                                    @if(!$customer->department->isEmpty())
                                    <div>
                                        {{ $customer->department[0]->department }}   
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <a style="float: left;" href="/customer/{{ $customer->id}}/edit" type="button" class="" >
                                        <i class="fa fa-fw fa-edit"></i>
                                    </a>
                                    <span style="float: left;">|</span>
                                    
                                    <!-- <a href="/customer/delete/{{ $customer->id}}" type="button" class="" >
                                        <i style="color:red;" class="far fa-trash-alt"></i>
                                    </a> -->

                                    <form role="form" action="/customer/{{ $customer->id}}" method="POST">
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

                    <!-- {!! $customers->links() !!} -->
                    {{$customers->links("pagination::bootstrap-4")}}

                    <style>
                        .page-item.active .page-link {
                            z-index: 1;
                            color: #fff;
                            background-color: #007bff;
                            border-color: #007bff;
                        }

                        .page-link {
                            position: relative;
                            display: block;
                            padding: .5rem .75rem;
                            margin-left: -1px;
                            line-height: 1.25;
                            color: #007bff;
                            background-color: #fff;
                            border: 1px solid #dee2e6;
                        }
                    </style>

                    <!-- <div class="row">
                        <div class="col-sm-12 col-md-4">
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                <ul class="pagination">
                                    <li classappend="${(customerList.number+1) > 1} ? enable : disabled"  class="paginate_button page-item next" id="example1_previous">
                                        <a href="@{/customer(size=${customerList.size}, page=${customerList.number})}" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Previous</a>
                                    </li>
                                    <li if="${customerList.totalPages > 0}" each="pageNumber : ${pageNumbers}" class="paginate_button page-item" classappend="${pageNumber==customerList.number + 1} ? active">
                                        <a href="@{/customer(size=${customerList.size}, page=${pageNumber})}"
                                           text=${pageNumber}
                                            href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link"></a>
                                    </li>
                                    <li classappend="${customerList.totalPages > (customerList.number+1)} ? enable : disabled"  class="paginate_button page-item next" id="example1_next">
                                        <a href="@{/customer(size=${customerList.size}, page=${customerList.number+2})}" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
 -->
<!--                    <div if="${customerList.totalPages > 0}" class="pagination" each="pageNumber : ${pageNumbers}">-->
<!--                        <a href="@{/customer(size=${customerList.size}, page=${pageNumber})}"-->
<!--                           text=${pageNumber}-->
<!--                           class="${pageNumber==customerList.number + 1} ? active"></a>-->
<!--                    </div>-->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection