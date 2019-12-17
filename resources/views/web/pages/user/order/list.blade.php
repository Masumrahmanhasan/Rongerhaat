@extends(webLayout())

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ webRoute('home') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">My Orders</a></li>
            </ol>
        </div>
    </nav>

    <div class="main-container">
        <div class="main-content">
            <div class="container-fluid"><br>
                <div class="row">
                    <div class="col-lg-9 order-lg-last dashboard-content usr_content_wrap">
                        <div class="row usr_content_box">
                            <div class="col-md-12">
                                <h2 class="step-title">My Orders</h2>
                            </div>

                            <div class="col-md-12">
                                <div class="table-responsive usr_table_wrap">
                                    <table class="table usr_table">
                                        <thead>
                                            <th class="text-left">OrderID</th>
                                            <th class="text-left">Products</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-right">Total</th>
                                            <th class="text-center">OrderAt</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-right">Action</th>
                                        </thead>

                                        <tbody>
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
                                                    <td class="text-left">{{ $v->inv_no }}</td>
                                                    <td class="text-left">
                                                        <div style="display:;">
                                                            {!! $imgs !!}
                                                        </div>
                                                    </td>
                                                    <td class="text-center">{{ $v->quantity }}</td>
                                                    <td class="text-right">৳{{ $v->total_price }}</td>
                                                    <td class="text-center">{{ date('d M Y', strtotime($v->created_at)) }}</td>
                                                    <td class="text-center">
                                                        @if ($v->status == 'Pending')
                                                            <span class="badge badge-warning">Pending</span>
                                                        @elseif($v->status == 'Processing')
                                                            <span class="badge badge-info">Processing</span>
                                                        @elseif($v->status == 'Cancelled')
                                                            <span class="badge badge-danger">Cancelled</span>
                                                        @elseif($v->status == 'Completed')
                                                            <span class="badge badge-success">Completed</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-right">
                                                        {{-- <a href="#" title="Edit product" class="btn-edit"><span class="sr-only">Edit</span><i class="icon-pencil"></i></a> --}}

                                                        <a href="{{ webRoute('user.order.details', [$v->id]) }}" title="Order Details" class="btn-edit"><span class="sr-only">Details</span><i class="icon-eye"></i></a>

                                                        {{-- <a href="#" title="Cancel Order" class="btn-remove"><span class="sr-only">Cancel</span></a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('web.pages.user.menu')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection