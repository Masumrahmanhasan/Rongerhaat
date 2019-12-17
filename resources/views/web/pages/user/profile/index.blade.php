@extends(webLayout())

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ webRoute('home') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Profile</a></li>
            </ol>
        </div>
    </nav>

    <div class="main-container">
        <div class="main-content">
            <div class="container-fluid"><br>
                <div class="row">
                    <div class="col-lg-9 order-lg-last usr_content_wrap">
                        <div class="row usr_content_box">
                            <div class="col-lg-3">
                                @if ($user->image)
                                    <img src="{{ source('upload/user/'.$user->image) }}" alt="Profile" style="border-radius: 50%;">
                                @else
                                    <img src="https://via.placeholder.com/250x250?text=No+Image" alt="Profile" style="border-radius: 50%;">
                                @endif
                            </div>

                            <div class="col-lg-9">
                                <div class="form_grid">
                                    <div class="row">
                                        <div class="col-lg-6 form-group required-field">
                                            <label>Name</label><br>
                                            <b>{!! ($user->name) ? $user->name : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>

                                        <div class="col-lg-6 form-group required-field">
                                            <label>Email</label><br>
                                            <b>{!! ($user->email) ? $user->email : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 form-group required-field">
                                            <label>Mobile</label><br>
                                            <b>{!! ($user->phone) ? $user->phone : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>

                                        <div class="col-lg-6 form-group required-field">
                                            <label>Birthday</label><br>
                                            <b>{!! ($user->birth_date) ? $user->birth_date : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 form-group required-field">
                                            <label>Gender</label><br>
                                            <b>{!! ($user->gender) ? $user->gender : '<span style="color: red;">Not Given</span>' !!}</b>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12" style="margin-top: 20px;">
                                            <a href="{{ webRoute('user.profile.create') }}" class="btn btn-primary">Edit Profile</a>
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