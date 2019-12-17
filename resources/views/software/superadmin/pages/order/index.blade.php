@extends(saLayout())

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Order Manage</h2>
                    <div class="breadcrumb-wrapper col-12">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ saRoute('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Order Manage</li>
                      </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
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
                                            <td align="left">User</td>
                                            <td align="left">OrderID</td>
                                            <td align="left">Products</td>
                                            <td align="center">Quantity</td>
                                            <td align="right">Total</td>
                                            <td align="center">OrderAt</td>
                                            <td align="center">Status</td>
                                            <td align="right">Action</td>
                                        </tr>
                                    </thead>

                                    <tbody class="table_data">
                                        @foreach ($invoices as $key => $v)
                                            @php
                                                $imgs        = '';
                                                $prod_ids   = explode(',', $v->prod_ids);
                                                foreach ($prod_ids as $prod_id)
                                                {
                                                    $product = \App\Model\Product::with('productImg')->where('id', $prod_id)->first();
                                                    if (count($product->productImg) > 0)
                                                    {
                                                        foreach ($product->productImg as $imKey => $im)
                                                        {
                                                            if($imKey > 0) break;
                                                            $imgs .= '
                                                                <b>'.$product->name.'</b><br>
                                                                <img class="product-single-image" src="'.source('upload/products/'.$im->image).'" data-zoom-image="'.source('upload/products/'.$im->image).'" style="width: 40px; height: 40px; border-radius: 50%; margin: 5px; display: none;">
                                                            ';
                                                        }
                                                    } else {
                                                        $imgs .= '
                                                            <b>'.$product->name.'</b><br>
                                                            <img class="product-single-image" src="https://via.placeholder.com/300x400?text=No+Image" data-zoom-image="https://via.placeholder.com/300x400?text=No+Image" alt="Image" style="width: 40px; height: 40px; border-radius: 50%; margin: 5px; display: none;">
                                                        ';
                                                    
                                                    }
                                                }
                                            @endphp
                                            <tr>
                                                <td align="left">{{ $key+1 }}</td>
                                                <td align="left">
                                                    {{ '@'.$v->user->username }}
                                                </td>
                                                <td align="left">{{ $v->inv_no }}</td>
                                                <td align="left">
                                                    <div style="display:;">
                                                        {!! $imgs !!}
                                                    </div>
                                                </td>
                                                <td align="center">{{ $v->quantity }}</td>
                                                <td align="right">৳{{ $v->total_price }}</td>
                                                <td align="center">{{ date('d M Y', strtotime($v->created_at)) }}</td>
                                                <td align="center">
                                                    @if ($v->status == 'Pending')
                                                        <span class="badge badge-pill badge-warning">Pending</span>
                                                    @elseif($v->status == 'Processing')
                                                        <span class="badge badge-pill badge-info">Processing</span>
                                                    @elseif($v->status == 'Cancelled')
                                                        <span class="badge badge-pill badge-danger">Cancelled</span>
                                                    @elseif($v->status == 'Completed')
                                                        <span class="badge badge-pill badge-success">Completed</span>
                                                    @endif
                                                </td>
                                                <td align="right">
                                                    <a href="{{ saRoute('order.details', [$v->id]) }}" class="btn btn-icon rounded-circle btn-outline-success mr-1 mb-1 waves-effect waves-light acc_btn">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
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