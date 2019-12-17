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
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                                <h2 class="step-title">Address Book</h2>
                            </div>

                            <div class="col-md-6">
                                <h4 class="">Default Shiping Address</h4>
                                @if (isset($sInfo->s_name))
                                    <var>
                                        {{ $sInfo->s_name }}<br>
                                        {{ $sInfo->s_address }}<br>
                                        {{ $sInfo->s_state.', '.$sInfo->s_city.'-'.$sInfo->s_zip.', '.$sInfo->s_country }}<br>
                                        {{ $sInfo->s_phone }}<br>
                                    </var>
                                @else
                                    <span style="color: red;">Not Given</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h4 class="">Default Billing Address</h4>
                                @if (isset($bInfo->b_name))
                                    <var>
                                        {{ $bInfo->b_name }}<br>
                                        {{ $bInfo->b_address }}<br>
                                        {{ $bInfo->b_state.', '.$bInfo->b_city.'-'.$bInfo->b_zip.', '.$bInfo->b_country }}<br>
                                        {{ $bInfo->b_phone }}<br>
                                    </var>
                                @else
                                    <span style="color: red;">Not Given</span>
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