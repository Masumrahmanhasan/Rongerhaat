@extends(webLayout())

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ webRoute('home') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Profile Edit</a></li>
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
                                <form action="{{ webRoute('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form_grid">
                                        <div class="row">
                                            <div class="col-lg-6 form-group required-field">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $user->name ?? '' }}" required>
                                            </div>

                                            <div class="col-lg-6 form-group required-field">
                                                <label>Profile Image</label>
                                                <input type="file" class="form-control" name="image" onchange="img_valid($(this));">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 form-group required-field">
                                                <label>Birthday</label>
                                                <input type="text" class="form-control datepicker" name="birth_date" id="birth_date" value="{{ $user->birth_date ?? '' }}" required>
                                            </div>
                                            
                                            <div class="col-lg-6 form-group required-field">
                                                <label>Gender</label>
                                                <select class="form-control" name="gender" style="max-width: 100%;">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12" style="margin-top: 20px;">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
    <script type="text/javascript">
        $('#birth_date').datepicker({
            format: 'dd-mm-yyyy',
            defaultViewDate:'01-01-1980'
        });
    </script>
@endsection