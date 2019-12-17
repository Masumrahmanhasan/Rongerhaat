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
                            <div class="col-lg-12">
                                <h2 class="step-title">Shipping Address</h2><br>

                                <div class="form_grid">
                                    <div class="row">
                                        <div class="col-lg-6 form-group required-field">
                                            <label>Full Name</label><br>
                                            <b>{!! (isset($sInfo->s_name)) ? $sInfo->s_name : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>

                                        <div class="col-lg-6 form-group required-field">
                                            <label>Street Address</label><br>
                                            <b>{!! (isset($sInfo->s_address)) ? $sInfo->s_address : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 form-group required-field">
                                            <label>Country</label><br>
                                            <b>{!! (isset($sInfo->s_country)) ? $sInfo->s_country : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>

                                        <div class="col-lg-6 form-group required-field">
                                            <label>City</label><br>
                                            <b>{!! (isset($sInfo->s_city)) ? $sInfo->s_city : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 form-group required-field">
                                            <label>State/Province</label><br>
                                            <b>{!! (isset($sInfo->s_state)) ? $sInfo->s_state : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>

                                        <div class="col-lg-6 form-group required-field">
                                            <label>Zip/Postal Code</label><br>
                                            <b>{!! (isset($sInfo->s_zip)) ? $sInfo->s_zip : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 form-group required-field">
                                            <label>Phone Number</label><br>
                                            <b>{!! (isset($sInfo->s_phone)) ? $sInfo->s_phone : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <h2 class="step-title">Billing Address</h2><br>

                                <div class="form_grid">
                                    <div class="row">
                                        <div class="col-lg-6 form-group required-field">
                                            <label>Full Name</label><br>
                                            <b>{!! (isset($bInfo->b_name)) ? $bInfo->b_name : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>

                                        <div class="col-lg-6 form-group required-field">
                                            <label>Street Address</label><br>
                                            <b>{!! (isset($bInfo->b_address)) ? $bInfo->b_address : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 form-group required-field">
                                            <label>Country</label><br>
                                            <b>{!! (isset($bInfo->b_country)) ? $bInfo->b_country : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>

                                        <div class="col-lg-6 form-group required-field">
                                            <label>City</label><br>
                                            <b>{!! (isset($bInfo->b_city)) ? $bInfo->b_city : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 form-group required-field">
                                            <label>State/Province</label><br>
                                            <b>{!! (isset($bInfo->b_state)) ? $bInfo->b_state : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>

                                        <div class="col-lg-6 form-group required-field">
                                            <label>Zip/Postal Code</label><br>
                                            <b>{!! (isset($bInfo->b_zip)) ? $bInfo->b_zip : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 form-group required-field">
                                            <label>Phone Number</label><br>
                                            <b>{!! (isset($bInfo->b_phone)) ? $bInfo->b_phone : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12" style="margin-top: 20px; margin-bottom: 20px;">
                                            <a href="{{ webRoute('user.address.book.create') }}" class="btn btn-primary">Edit</a>
                                        </div>
                                    </div>
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