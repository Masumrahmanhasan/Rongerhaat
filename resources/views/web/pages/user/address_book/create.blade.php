@extends(webLayout())

@section('content')
    @php
        $sInfo = (object) json_decode($user->shipping_address);
        $bInfo = (object) json_decode($user->billing_address);
    @endphp

    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ webRoute('home') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Address Book</a></li>
            </ol>
        </div>
    </nav>

    <div class="main-container">
        <div class="main-content">
            <div class="container-fluid"><br>
                <div class="row">
                    <div class="col-lg-9 order-lg-last usr_content_wrap">
                        <div class="row usr_content_box">
                            @include('web.pages.user.address_book.form')
                        </div>
                    </div>

                    @include('web.pages.user.menu')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $('#birth_date').datepicker({
            format: 'dd-mm-yyyy',
            defaultViewDate:'01-01-1980'
        });
    </script>
@endsection