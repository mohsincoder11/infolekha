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
                        <h1 class="title">Forget Password?</h1>
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
                    <form class="form-login form-listing" action="{{ route('update_password_using_mobile') }}" method="post"
                        id="forget_form">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id">
                        <h3 class="title-formlogin">Forget Password</h3>
                        <span class="input-login icon-form">
                            <input type="text" placeholder="Mobile No*" id="mob"
                            name="r_mob" maxlength=10 required="required" class="mb-15">
                        <button id="login-button3" disabled type="button" class="btn" 
                            style="margin-bottom: 15px;">Send OTP</button>
                    </span>
                        
                    <span class="input-login icon-form">
                        <input type="text" maxlength=4 placeholder="Enter OTP*" id="otp" name="otp"
                            required="required">
                    </span>
                    
                    <span class="input-login icon-form">
                        <input type="password" placeholder="Password*" id="password" name="password"
                            required="required"><i toggle="#password"
                            class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                    </span>
                  

                    <span class="input-login icon-form">
                        <input type="password" placeholder="Confirm Password*" name="password_confirmation"
                            id="password_confirmation" required="required" class="mb-20"><i toggle="#password_confirmation"
                            class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                    </span>


                     
                    <div class="centered-container">
                        <button disabled type="submit" id="login-button" class="btn" title="log in" style="margin-bottom: 15px;">
                            Update Password
                        </button>
                    </div>
                    </form>
                    <input type="hidden" id="exist_otp">
                </div>
            </div>
        </div>
        </div>
    </section>

@stop

@section('js')
    <script>
        $("#forget_form").validate({
            rules: {

                r_mob: {
                    required: true,

                },
                 password: {
                    required: true,
                    minlength: 8,
                    strongPassword: true,
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"

                },

            },
            messages: {
                r_mob: {
                    required: " Please enter email.",
                },
               password: {
                    required: "This field is required.",
                    minlength: "Minimum password length should be 8 digit.",
                   strongPassword: "Password must contain at least one uppecase,one lowercase,one digit,one special character."
                },
                password_confirmation: {
                    required: "This field is required.",
                    equalTo: "Confirm password and password must be same."

                },

            },
            submitHandler: function(form) {

                return true;
            },
            errorPlacement: function(error, element) {

                element.closest('.input-login').after(error);



            },
        });

        $('#mob, #otp').on('keypress', function(event) {
    var keyCode = event.which ? event.which : event.keyCode;
    if ((keyCode >= 48 && keyCode <= 57) || keyCode == 8 || keyCode == 46 || keyCode == 9 || (keyCode >= 37 && keyCode <= 40)) {
      

            return true;
      
    } else {
      event.preventDefault();
      return false;
    }

  });
  $('#otp').on('keyup', function(event) {
    
        if ($("#exist_otp").val() && $("#otp").val() && $("#exist_otp").val() === $("#otp").val()) {
            $("#login-button").prop('disabled', false);
        }else{
            $("#login-button").prop('disabled', true);
        }
  })

        $("#mob").on('keyup', function(e) {
            $("#login-button1").prop('disabled', true);
            $("#login-button").prop('disabled', true);
            var value = $(this).val();

            if (/^\d+$/.test(value) && value.length === 10)
                $("#login-button3").prop('disabled', false);
            else
                $("#login-button3").prop('disabled', true);
        })

 $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        $("#login-button3").on('click', function(e) {
            $('#otp').val("");
            $('#popup_login').modal('show');
            otp();
        })

        function otp() {
            const mob = $("#mob").val();
            $.ajax({
                type: 'GET',
                url: 'send_forget_otp/' + mob,
                success: function(data) {
                    if(data.status){
                        $("#user_id").val(data.user_id);
                        $("#exist_otp").val(data.otp);
                        Toast2.fire({
            icon: 'success',
            title: "OTP send successfully."
        })
                    }else{
                        Toast2.fire({
            icon: 'success',
            title: data.otp
        })
                    }
                },
                error: function(data) {
                    //console.log(data);
                }
            });
        }

        const Toast2 = Swal.mixin({
             toast: true,
             position: 'bottom',
             showConfirmButton: false,
             timer: 6000,
             background: '#000',
             color: '#fff',
             timerProgressBar: true,
             didOpen: (toast) => {
                 toast.addEventListener('mouseenter', Swal.stopTimer)
                 toast.addEventListener('mouseleave', Swal.resumeTimer)
             }
         })



    </script>

@stop
