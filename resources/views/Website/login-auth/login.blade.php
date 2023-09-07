@extends('website_layout')
@section('website_content')


    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">Login</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <!-- <li><a href="index.html">Home</a></li>
                                    <li> - </li>
                                    <li><a href="index.html">Page</a></li>
                                    <li> - </li>                          -->
                            <!-- <li>Login</li> -->
                        </ul>
                    </div><!-- /.breadcrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.page-title -->
    <section class="flat-row page-user bg-theme">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6"
                    style="padding-top:20px; 
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <form class="form-login form-listing" action="{{ route('login_submit') }}" method="post"
                        id="login_form">
                        @csrf
                        <h3 class="title-formlogin">Log in</h3>
                        <span class="input-login icon-form"><input type="text" placeholder="Username*" name="email"
                                required="required"><i class="fa fa-envelope"></i></span>
                        <span class="input-login icon-form"><input type="password" placeholder="Password*" name="password" id="password"
                                required="required"><i toggle="#password" class="fa fa-eye-slash toggle-password"></i></span>
                        <div class="flat-fogot clearfix">

                            <label class="float-right link-register">
                                <a href="{{route('forget-password')}}">Forget Password?</a>
                            </label>
                        </div>
                        <div class="centered-container">
                            <button type="submite" id="login-button" class="btn" title="log in"
                                style="margin-bottom: 15px; ">
                                Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

@stop

@section('js')
    <script>
        $("#login_form").validate({
            rules: {

                email: {
                    required: true,

                },
                password: {
                    required: true,

                },

            },
            messages: {
                email: {
                    required: " Please enter email.",
                },
                password: {
                    required: "Please enter password.",


                },

            },
            submitHandler: function(form) {

                return true;
            },
            errorPlacement: function(error, element) {

                element.closest('.input-login').after(error);



            },
        });

      
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });


    </script>

@stop
