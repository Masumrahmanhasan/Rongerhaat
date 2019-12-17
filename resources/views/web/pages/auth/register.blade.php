@extends(webLayout())

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ webRoute('home') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Login</a></li>
            </ol>
        </div>
    </nav>

    <div class="modal-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <br><br>
                    <h2 class="title mb-2">Create your RongerHaat Account.</h2>

                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <form class="mb-1" id="register" action="{{ webRoute('user.auth.register') }}" method="POST">
                        @csrf
                        <label>Full Name <span class="required">*</span></label>
                        <input type="text" class="form-input form-wide mb-2" name="name" id="name" required value="{{ old('name') }}">

                        <label>Phone <span class="required">*</span></label>
                        <input type="number" min="0" class="form-input form-wide mb-2" name="phone" id="phone" required value="{{ old('phone') }}">

                        <label>Email <span class="required">*</span></label>
                        <input type="email" class="form-input form-wide mb-2" name="email" id="email" required value="{{ old('email') }}">

                        <label>User Name <span class="required">*</span></label>
                        <input type="text" class="form-input form-wide mb-2" name="username" id="username" required value="{{ old('username') }}">

                        <label>Password <span class="required">*</span></label>
                        <input type="password" class="form-input form-wide mb-2" name="password" id="password" required value="{{ old('password') }}">

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-md" id="submit">Register</button>

                           {{--  <div class="custom-control custom-checkbox form-footer-right">
                                <input type="checkbox" class="custom-control-input" id="lost-password">
                                <label class="custom-control-label form-footer-right" for="lost-password">Remember Me</label>
                            </div> --}}
                        </div><!-- End .form-footer -->
                        Already member? <a href="{{ webRoute('user.auth.login.index') }}" class="forget-password">Login </a> here<br><br>
                        {{-- <a href="#" class="forget-password"> Forgot your password?</a> --}}
                    </form>

                    {{-- <div class="social-login-wrapper">
                        <p>Access your account through  your social networks.</p>

                        <div class="btn-group">
                            <a class="btn btn-social-login btn-md btn-gplus mb-1"><i class="icon-gplus"></i><span>Google</span></a>
                            <a class="btn btn-social-login btn-md btn-facebook mb-1"><i class="icon-facebook"></i><span>Facebook</span></a>
                            <a class="btn btn-social-login btn-md btn-twitter mb-1"><i class="icon-twitter"></i><span>Twitter</span></a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection