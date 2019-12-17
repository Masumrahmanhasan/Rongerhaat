@extends(saLayout())

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Product Manage</h2>
                    <div class="breadcrumb-wrapper col-12">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ saRoute('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Product Manage</li>
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
                        <a class="dropdown-item" id="" href="{{ saRoute('product.create') }}">&nbsp; Add new</a>
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
                                            <td align="left">Category</td>
                                            <td align="left">Name</td>
                                            <td align="left">Image</td>
                                            <td align="right">Price</td>
                                            <td align="center">Status</td>
                                            <td align="right">Action</td>
                                        </tr>
                                    </thead>

                                    <tbody class="table_data">
                                        @foreach($products as $key => $v)
                                            <tr>
                                                <td align="left">{{ $key+1 }}</td>
                                                <td align="left">
                                                    <b>Category - </b>{{ $v->category->cat_name }}<br>
                                                    <b>Sub-Category - </b>{{ $v->subCategory->sub_cat_name }}<br>
                                                    <b>Brand - </b>{{ $v->brand->br_name }}<br>
                                                </td>
                                                <td align="left">{{ $v->name }}</td>
                                                <td align="left">
                                                    {{-- <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                                        @foreach ($v->productImg as $p)
                                                            @if($loop->iteration > 1) @break @endif
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-placement="bottom" data-original-title="" class="avatar pull-up">
                                                            <img class="media-object rounded-circle" src="{{ source('upload/products/'.$p->image) }}" alt="Avatar" height="30" width="30">
                                                            </li>
                                                        @endforeach
                                                    </ul> --}}

                                                    @if (count($v->productImg) > 0)
                                                        @foreach ($v->productImg as $p)
                                                            @if($loop->iteration > 1) @break @endif
                                                            <div class="product-img">
                                                                <img src="{{ source('upload/products/100x100'.$p->image) }}" alt="Image" style="border-radius: 5px;">
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="product-img">
                                                            <img src="https://via.placeholder.com/100x100?text=No+Image" alt="Image" style="width: 100px; height: 120px; border-radius: 5px;">
                                                        </div>
                                                    @endif
                                                </td>
                                                <td align="right">
                                                    @if ($v->discount > 0)
                                                        <b>৳{{ $v->discount }}</b><br>
                                                        <b style="color: red;"><s>৳{{ $v->price }}</s></b>
                                                    @else
                                                        <b>৳{{ $v->price }}</b>
                                                    @endif
                                                </td>

                                                <td align="center">
                                                    @if($v->status == 1)
                                                        <span class="badge badge-pill badge-success badge-theme status_1 st">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-warning status_0 st disabled">Inactive</span>
                                                    @endif
                                                </td>

                                                <td align="right">
                                                    <a href="{{ saRoute('product.create', [$v->id]) }}" class="btn btn-icon rounded-circle btn-outline-success mr-1 mb-1 waves-effect waves-light edit_btn acc_btn">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </a>

                                                    <i class="btn btn-icon fa fa-trash-o rounded-circle btn-outline-danger mr-1 mb-1 waves-effect waves-light del_btn acc_btn" data-href="{{ saRoute('product.destroy') }}" data-id="{{ $v->id }}">
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