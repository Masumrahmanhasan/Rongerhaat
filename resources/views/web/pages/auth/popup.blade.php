{{-- Login Popup --}}
<div class="login-popup modal fade" id="login-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" style="max-height: 100% !important;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="float-left">
                            <h2 class="title mb-2">Welcome to RongerHaat! Please login.</h2>
                        </div>
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="col-md-12">
                        <form class="mb-1" id="log_in" action="{{ webRoute('user.auth.login') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label>User Name<span class="required">*</span></label>
                                <input type="text" class="form-input form-wide" name="username" required>
                            </div>

                            <div class="mb-2">
                                <label>Password <span class="required">*</span></label>
                                <input type="password" class="form-input form-wide" name="password" required>
                            </div>

                            <div class="form-footer">
                                <input type="hidden" name="goto" id="goto" value="">
                                <button type="submit" class="btn btn-primary btn-md" id="login_submit">LOGIN</button>

                                {{-- <div class="custom-control custom-checkbox form-footer-right">
                                    <input type="checkbox" class="custom-control-input" name="remember" id="lost-password">
                                    <label class="custom-control-label form-footer-right" for="lost-password">Remember Me</label>
                                </div> --}}
                                <div class="form-footer-right">
                                    <a href="#" class="forget-password form-footer-right"> Forgot your password?</a>
                                </div>
                            </div>
                            {{-- <a href="#" class="forget-password"> Forgot your password?</a> --}}
                        </form>
                    </div>
                </div>
            </div>

            <div class="social-login-wrapper">
                <p>Access your account through your social networks.</p>

                <div class="btn-group">
                    <a class="btn btn-social-login btn-md btn-gplus mb-1"><i class="icon-gplus"></i><span>Google</span></a>
                    <a class="btn btn-social-login btn-md btn-facebook mb-1"><i class="icon-facebook"></i><span>Facebook</span></a>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Register Popup --}}
<div class="login-popup modal fade" id="signup-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content mail_grid" style="display: none;">
            <div class="modal-body" style="height: 300px !important;">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="col-md-12 text-center" style="padding-top: 60px;">
                        <p class="text-success" style="font-size: 20px;">Sign Up Successfully. Please Email Verification Now...</p>
                        <a href="https://mail.google.com/" target="_blank" class="btn btn-primary btn-md" style="font-weight: bold; font-size: 16px; outline:none !important;">
                                Check Mail
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-content rg_grid">
            <div class="modal-body" style="max-height: 100% !important;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="float-left">
                            <h2 class="title mb-2">Create your RongerHaat Account.</h2>
                        </div>
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="col-md-12">
                        <form class="mb-1" id="register" action="{{ webRoute('user.auth.register') }}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label>Full Name <span class="required">*</span></label>
                                <input type="text" class="form-input form-wide" name="name" id="name" required>
                            </div>

                            <div class="mb-2">
                                <label>Phone <span class="required">*</span></label>
                                <input type="number" min="0" class="form-input form-wide" name="phone" id="phone" required>
                                <small class="phone_alert"></small>
                            </div>

                            <div class="mb-2">
                                <label>Email <span class="required">*</span></label>
                                <input type="email" class="form-input form-wide" name="email" id="email" required>
                                <small class="email_alert"></small>
                            </div>

                            <div class="mb-2">
                                <label>User Name <span class="required">*</span></label>
                                <input type="text" class="form-input form-wide" name="username" id="username" required>
                                <small class="username_alert"></small>
                            </div>

                            <div class="mb-2">
                                <label>Password <span class="required">*</span></label>
                                <input type="password" class="form-input form-wide" name="password" id="password" required>
                            </div>

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-md" id="register_submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="social-login-wrapper">
                <p>Register through your social networks.</p>

                <div class="btn-group">
                    <a class="btn btn-social-login btn-md btn-gplus mb-1"><i class="icon-gplus"></i><span>Google</span></a>
                    <a class="btn btn-social-login btn-md btn-facebook mb-1"><i class="icon-facebook"></i><span>Facebook</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#log_in').submit(function(event){
            event.preventDefault();
            var data = new FormData($("#log_in")[0]);

            $('#login_submit').text('Please Wait...');
            $('#login_submit').prop("disabled", true);

            $.ajax({
                type: 'POST',
                url: $('#log_in').attr('action'),
                data: data,
                dataType: 'json',
                contentType : false,
                processData : false,
                success: function(res)
                {
                    $('#login_submit').text('Login');
                    $('#login_submit').removeAttr("disabled");
                    if(res.type == 'error')
                    {
                        swal({title:res.msg, icon:'error', button:true});
                        $("body, #submit").css({"cursor":"auto"});
                        $('#submit').text('Sign In');
                    } else {
                        $("body, #submit").css({"cursor":"auto"});
                        $('#log_in')[0].reset();
                        location.replace(res.url);
                    }
                }
            });
        });

        $('#register').submit(function(event){
            event.preventDefault();
            var data = new FormData($("#register")[0]);

            $('#register_submit').text('Please Wait...');
            $('#register_submit').prop("disabled", true);

            $.ajax({
                type: 'POST',
                url: $('#register').attr('action'),
                data: data,
                dataType: 'json',
                contentType : false,
                processData : false,
                success: function(res)
                {
                    $('#register_submit').text('Register');
                    $('#register_submit').removeAttr("disabled");

                    if(res.type == 'error')
                    {
                        if(res.data.phone == $('#phone').val())
                        {
                            $('.phone_alert').html('<span class="text-danger">This Phone Is Taken !!!</span>');
                        } else {
                            $('.phone_alert').html('');
                        }

                        if(res.data.email == $('#email').val())
                        {
                            $('.email_alert').html('<span class="text-danger">This Email Is Taken !!!</span>');
                        } else {
                            $('.email_alert').html('');
                        }

                        if(res.data.username == $('#username').val())
                        {
                            $('.username_alert').html('<span class="text-danger">This Username Is Taken !!!</span>');
                        } else {
                            $('.username_alert').html('');
                        }
                        $("body, #submit").css({"cursor":"auto"});
                    } else {

                        $('.rg_grid').hide();
                        $('.mail_grid').show();
                        $("body, #submit").css({"cursor":"auto"});
                        $('#register')[0].reset();
                    }
                }
            });
        });

        $('.signup').click(function(){
            $('.rg_grid').show();
            $('.mail_grid').hide();
        });
    });
</script>