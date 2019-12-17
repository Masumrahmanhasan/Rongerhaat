@extends(saLayout())

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Category Manage</h2>
                    <div class="breadcrumb-wrapper col-12">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ saRoute('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Category Manage</li>
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
                        <a class="dropdown-item" id="" href="{{ saRoute('category.create') }}">&nbsp; Add new</a>
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
                                            <td align="left">Name</td>
                                            <td align="center">Image</td>
                                            <td align="center">Status</td>
                                            <td align="right">Action</td>
                                        </tr>
                                    </thead>

                                    <tbody class="table_data">
                                        @foreach($categories as $key => $v)
                                            <tr>
                                                <td align="left">{{ $key+1 }}</td>
                                                <td align="left">{{ $v->cat_name }}</td>

                                                <td align="center">
                                                    <img src="{{ source('upload/category/'.$v->cat_image) }}" width="120" height="100" alt="cat_image">
                                                </td>

                                                <td align="center">
                                                    @if($v->status == 1)
                                                        <span class="badge badge-pill badge-success badge-theme status_1 st">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-warning status_0 st disabled">Inactive</span>
                                                    @endif
                                                </td>

                                                <td align="right">
                                                    <a href="{{ saRoute('category.create', [$v->id]) }}" class="btn btn-icon rounded-circle btn-outline-success mr-1 mb-1 waves-effect waves-light edit_btn acc_btn">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </a>

                                                    <i class="btn btn-icon fa fa-trash-o rounded-circle btn-outline-danger mr-1 mb-1 waves-effect waves-light del_btn acc_btn" data-href="{{ saRoute('category.destroy') }}" data-id="{{ $v->id }}">
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