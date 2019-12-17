@extends(webLayout())

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ webRoute('home') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Order Details</a></li>
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
                                <h2 class="step-title">Order Details - {{ $invoice->inv_no }}
                                    @if ($invoice->status == 'Pending')
                                        <a href="javascript:;" class="badge badge-warning float-right" style="padding: 6px 18px; font-size: 14px; font-weight: normal;">Pending</a>
                                    @elseif($invoice->status == 'Processing')
                                        <a href="javascript:;" class="badge badge-info float-right" style="padding: 6px 18px; font-size: 14px; font-weight: normal;">Processing</a>
                                    @elseif($invoice->status == 'Cancelled')
                                        <a href="javascript:;" class="badge badge-danger float-right" style="padding: 6px 18px; font-size: 14px; font-weight: normal;">Cancelled</a>
                                    @elseif($invoice->status == 'Completed')
                                        <a href="javascript:;" class="badge badge-success float-right" style="padding: 6px 18px; font-size: 14px; font-weight: normal;">Completed</a>
                                    @endif
                                </h2>
                            </div>

                            <div class="col-md-12">
                                @if (count($invoice->orders) > 0)
                                    <div class="table-responsive usr_table_wrap">
                                        <table class="table usr_table">
                                            <thead>
                                                <tr>
                                                    <th class="text-left">Product</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-right">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($invoice->orders as $key => $v)
                                                    @php
                                                        $prodImg    = \App\Model\ProductImage::where('prod_id', $v->prod_id)->first();
                                                    @endphp                                        
                                                    <tr>
                                                        <td class="text-left">
                                                            @if ($prodImg)
                                                                <img src="{{ source('upload/products/'.$prodImg->image) }}" alt="product" style="width: 100px; height: 120px;">
                                                            @else
                                                                <img src="https://via.placeholder.com/100x120?text=No+Image" alt="Image" style="width: 100px; height: 120px;">
                                                            @endif
                                                            <b>{{ $v->product->name }}</b>
                                                        </td>
                                                        <td class="text-center">৳{{ $v->sub_price }}</td>
                                                        <td class="text-center">{{ $v->quantity }}</td>
                                                        <td class="text-right">৳{{ $v->price*$v->quantity }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" align="center" class="clearfix">
                                                        <div class="float-right">
                                                            <b>Total - ৳{{ $invoice->orders->sum('sub_price') }}</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                @else
                                    <div class="col-md-12 text-center" style="margin-top: 100px;">
                                        <h4 style="color: red;">No items</h4>
                                    </div>
                                @endif
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