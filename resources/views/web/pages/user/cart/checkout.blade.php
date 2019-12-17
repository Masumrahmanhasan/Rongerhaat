@extends(webLayout())

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ webRoute('home') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Cart</a></li>
            </ol>
        </div>
    </nav>

    <div class="main-container">
        <div class="main-content"><br>
            <div class="container-fluid">
                <div class="row" id="loadViewCart">
                    @include('web.pages.user.cart.ajax_list')
                </div><!-- End .row -->
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection