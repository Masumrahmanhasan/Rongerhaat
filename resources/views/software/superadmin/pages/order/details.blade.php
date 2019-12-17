@extends(saLayout())

@section('content')
    @php
        $sInfo = (object) json_decode($invoice->shipping_address);
        $bInfo = (object) json_decode($invoice->billing_address);
    @endphp

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Order Details</h2>
                    <div class="breadcrumb-wrapper col-12">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ saRoute('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Order Details</li>
                      </ol>
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
                            <div class="details_top">
                                <div class="row">
                                    <div class="col-md-4" style="margin-bottom: 20px;">
                                        <p class="card-text">
                                            <b>Date: {{ date('d M Y', strtotime($invoice->created_at)) }}</b><br><br>
                                        </p>

                                        <p class="card-text">
                                            <b>OrderID: {{ $invoice->inv_no }}</b><br>
                                            <b>Status: 
                                                @if ($invoice->status == 'Pending')
                                                    <span class="badge badge-pill badge-warning">Pending</span>
                                                @elseif($invoice->status == 'Processing')
                                                    <span class="badge badge-pill badge-info">Processing</span>
                                                @elseif($invoice->status == 'Cancelled')
                                                    <span class="badge badge-pill badge-danger">Cancelled</span>
                                                @elseif($invoice->status == 'Completed')
                                                    <span class="badge badge-pill badge-success">Completed</span>
                                                @endif
                                            </b><br>
                                            <b>Payment Method: Cash on Delivery</b><br>
                                            <b>User: {{ '@'.$invoice->user->username }}</b><br>
                                        </p>

                                        <p class="card-text">
                                            @if($invoice->status == 'Pending' || $invoice->status == 'Processing')
                                                <a href="{{ saRoute('order.action', ['apporve', $invoice->id]) }}" class="btn btn-icon rounded-circle btn-outline-success mr-1 mb-1 waves-effect waves-light acc_btn" title="Apporve">
                                                    <i class="fa fa-check"></i>
                                                </a>

                                                <a href="{{ saRoute('order.action', ['cancel', $invoice->id]) }}" class="btn btn-icon rounded-circle btn-outline-danger mr-1 mb-1 waves-effect waves-light acc_btn" title="Cancel">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            @endif
                                        </p>
                                    </div>

                                    <div class="col-md-4" style="margin-bottom: 20px;">
                                        <h2 class="step-title">Shipping To</h2>
                                        <b>Full Name: </b> {{ $sInfo->s_name ?? '' }}<br>
                                        <b>Address: </b> {{ $sInfo->s_address ?? '' }}<br>
                                        <b>Country: </b> {{ $sInfo->s_country ?? '' }}<br>
                                        <b>City: </b> {{ $sInfo->s_city ?? '' }}<br>
                                        <b>State: </b> {{ $sInfo->s_state ?? '' }}<br>
                                        <b>Zip: </b> {{ $sInfo->s_zip ?? '' }}<br>
                                        <b>Phone: </b> {{ $sInfo->s_phone ?? '' }}<br>
                                    </div>

                                    <div class="col-md-4" style="margin-bottom: 20px;">
                                        <h2 class="step-title">Billing To</h2>
                                        <b>Full Name: </b> {{ $bInfo->b_name ?? '' }}<br>
                                        <b>Address: </b> {{ $bInfo->b_address ?? '' }}<br>
                                        <b>Country: </b> {{ $bInfo->b_country ?? '' }}<br>
                                        <b>City: </b> {{ $bInfo->b_city ?? '' }}<br>
                                        <b>State: </b> {{ $bInfo->b_state ?? '' }}<br>
                                        <b>Zip: </b> {{ $bInfo->b_zip ?? '' }}<br>
                                        <b>Phone: </b> {{ $bInfo->b_phone ?? '' }}<br>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="table-responsive table_wrap">
                                @if (count($invoice->orders) > 0)
                                    <table class="table">
                                        <thead class="table_head">
                                            <tr>
                                                <th class="text-left">Product</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-right">Price</th>
                                                <th class="text-right">SubTotal</th>
                                            </tr>
                                        </thead>

                                        <tbody class="table_data">
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
                                                    <td class="text-center">{{ $v->quantity }}</td>
                                                    <td class="text-right">৳{{ $v->price }}</td>
                                                    <td class="text-right">৳{{ $v->sub_price }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <td colspan="4" class="clearfix">
                                                    <div class="float-right">
                                                        <b>Total - ৳{{ $invoice->orders->sum('sub_price') }}</b>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="col-md-12 text-center" style="margin-top: 100px;">
                                        <h4 style="color: red;">No items</h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection