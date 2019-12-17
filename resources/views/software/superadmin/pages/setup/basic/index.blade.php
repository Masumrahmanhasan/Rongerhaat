@extends(saLayout())

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Basic Manage</h2>
                    <div class="breadcrumb-wrapper col-12">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ saRoute('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Basic Manage</li>
                      </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrum-right">
                <div class="dropdown">
                    <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- <i class="feather icon-settings"></i> -->
                        <i class="feather icon-plus"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" id="" href="{{ saRoute('basic.create', [1]) }}">&nbsp; Edit Info</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text"></p>
                            <div class="table-responsive table_wrap">
                                <table id="dataTable" class="table zero-configuration">
                                    <thead class="table_head">
                                        <tr>
                                            <td align="left" width="5%">SL</td>
                                            <td align="left">Title</td>
                                            <td align="left">Website Name</td>
                                            <td align="left">Phone</td>
                                            <td align="left">Email</td>
                                            <td align="left">Logo</td>
                                            <td align="right">Action</td>
                                        </tr>
                                    </thead>

                                    <tbody class="table_data">
                                        @foreach($basic as $key => $v)
                                            <tr>
                                                <td align="left">{{ $key+1 }}</td>
                                                <td align="left">{{ $v->title }}</td>
                                                <td align="left">{{ $v->name }}</td>
                                                <td align="center">{{ $v->phone }}</td>
                                                <td align="center">{{ $v->email }}</td>

                                                <td align="center">
                                                    <img src="{{ source('upload/basic/'.$v->logo) }}" width="70" height="40" alt="logo">
                                                </td>

                                                <td align="right">
                                                    <a href="{{ saRoute('basic.create', [$v->id]) }}" class="btn btn-icon rounded-circle btn-outline-success mr-1 mb-1 waves-effect waves-light edit_btn acc_btn">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </a>

                                                    {{-- <i class="btn btn-icon fa fa-trash-o rounded-circle btn-outline-danger mr-1 mb-1 waves-effect waves-light del_btn acc_btn" data-href="{{ saRoute('basic.destroy') }}" data-id="{{ $v->id }}"> --}}
                                                    </i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection