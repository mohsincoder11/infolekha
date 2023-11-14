@extends('website_layout')
@section('website_content')

    <div class="page-title parallax parallax1">
        <div class="section-overlay">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">Student/Parent Sign Up</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <!-- <ul>
                                <li><a href="index.html"></a></li>
                              
                            </ul>                    -->
                    </div><!-- /.breadcrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.page-title -->

    <section class="flat-row page-profile bg-theme">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6"
                    style="padding-top:20px; 
         box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <form class="form-login form-listing" action="{{ route('student_register_user_create') }}"
                        method="post" id="form1">
                        @csrf


                        <h3 class="title-formlogin">Sign Up</h3>

                        <span class="input-login icon-form"><input type="text" placeholder="Name of Student/Parent *"
                                name="name" required="required"><i class="fa fa-user"></i></span>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <span class="input-login icon-form"><input type="text"
                                placeholder="Name of Current School/College" name="current_school_institute"
                                required="required"><i class="fa fa-user"></i></span>
                        @error('current_school_institute')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <span class="input-login icon-form"><input type="text" id="mob" placeholder="Mobile No*"
                                maxlength=10 name="mob" required="required">
                            <button id="login-button2" disabled type="button" class="btn" title="Sign Up"
                                style="margin-bottom: 15px;">
                                Verify Mobile</button>
                        </span>
                        @error('mob')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <span class="input-login icon-form"><input type="text" placeholder="E-mail*" name="email"
                                required="required"><i class="fa fa-envelope-o"></i></span>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <span class="input-login icon-form"><input type="text" placeholder="Address*"
                                id="current_location_at_form" name="address" required="required"><i
                                class="fa fa-envelope-o"></i></span>





                        <span class="input-login icon-form">
                            <input type="password" placeholder="Password*" id="password" name="password"
                                required="required"><i toggle="#password"
                                class="fa fa-fw fa-eye field-icon toggle-password"></i>
                        </span>

                        <span class="input-login icon-form">
                            <input type="password" placeholder="Confirm Password*" name="password_confirmation"
                                id="password_confirmation" required="required"><i toggle="#password_confirmation"
                                class="fa fa-fw fa-eye field-icon toggle-password"></i>
                        </span>




                        <hr class="mt-4">
                        <div class="">
                            <button type="submit" id="login-button1" class=" login-btn btn" title="Sign Up"
                                style="margin-bottom: 15px; margin-left:45%;" disabled> Submit</button>
                        </div>


                    </form>

                </div>
            </div>

        </div>
    </section>

    <div class="modal fade flat-popupform" id="popup_login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body text-center clearfix">
                    <div class="form-login form-listing">
                        <h3 class="title-formlogin">OTP Verify</h3>
                        <form action="" id="modal_form"> <span class="input-login icon-form">
                                <input type="hidden" name="exist_otp" id="exist_otp">
                                <span class="input-login icon-form">
                                    <input type="hidden" name="exist_otp" id="exist_otp">

                                    <span class="input-login icon-form">
                                        <input type="text" placeholder="Enter OTP*" maxlength="4" id="otp"
                                            name="otp" required="required"><i
                                            class="fa fa-user field-icon toggle-password"></i>
                                    </span>

                                    <div class="otp_error" style="text-align: left;margin-top:-10px;">
                                    </div>
                                </span>

                                <span class="">
                                    <button type="submit" id="login-button" class="btn" title="log in">
                                        Verify</button>
                                </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop



@section('js')

    <script>
        $("#form1").validate({
            rules: {
                name: {
                    required: true,
                },
                current_school_institute: {
                    required: true,
                },
                mob: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                    remote: "{{ url('val_form') }}",
                    remote: {
                        url: 'val_form',
                        type: 'get',
                        data: {
                            r_mob: function() {
                                return $('#mob').val();
                            }
                        },
                        // Custom success function
                        dataFilter: function(response) {
                            if (response === false || response === 'false') {
                                $("#login-button2").prop('disabled', true);

                                this.valid = false;
                                return 'false';
                            } else if (response === true || response === 'true') {


                                this.valid = true;
                                return 'true';
                            }
                        }
                    }

                },
                email: {
                    required: true,
                    email: true,
                    remote: "{{ url('check_email_exist') }}",

                },
                password: {
                    required: true,
                    minlength: 6,

                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"

                },
                address: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "This field is required.",
                },
                current_school_institute: {
                    required: "This field is required",
                },
                mob: {
                    required: "Please enter mobile number.",
                    minlength: "Please enter 10 digit mobile number.",
                    maxlength: "Please enter 10 digit mobile number.",
                    digits: "Mobile number must be integer only.",
                    remote: "This mobile number is already registered with us."
                },
                email: {
                    required: "This field is required.",
                    email: "Please enter valid email address.",
                    remote: "This email address is already registered with us."
                },
                password: {
                    required: "This field is required.",
                    minlength: "Minimum password length should be 6 character.",

                },
                password_confirmation: {
                    required: "This field is required.",
                    equalTo: "Confirm password and password must be same."

                },
                address: {
                    required: "Please select option.",
                },
            },
            submitHandler: function(form) {
                return true;
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") === "r_mob") {
                    error.insertAfter(element.closest('.input-login'));
                } else {
                    element.closest('.input-login').after(error);
                }

            },
        });
    </script>

    <script>
        $("#modal_form").validate({
            rules: {

                exist_otp: {
                    required: true,

                },
                otp: {
                    minlength: 4,
                    maxlength: 4,
                    required: true,
                    equalTo: "#exist_otp",
                    digits: true

                },

            },
            messages: {
                exist_otp: {
                    required: " ",
                },
                otp: {
                    required: "Please enter otp.",
                    equalTo: "Please enter valid otp.",
                    minlength: "Please enter 4 digit otp.",
                    maxlength: "Please enter 4 digit otp.",
                    digits: "Please enter numeric otp.",

                },

            },
            submitHandler: function(form) {
                if ($("#exist_otp").val() == $("#otp").val()) {
                    $("#login-button1").prop("disabled", false);

                    $('#popup_login').modal('hide');

                    swal("Success", " Successfully Verified", "success", {
                        button: "close",
                    });

                } else {

                    swal("Fail", "Enter Correct OTP", "warning", {
                        button: "close",
                    });
                }
            },
            errorPlacement: function(error, element) {

                $(".otp_error").html(error);


            },
        });

        $("#login-button2").on('click', function(e) {
            $('#otp').val("");
            $('#popup_login').modal('show');
            otp();
        })

        $("#mob").on('keyup', function(e) {
            $("#login-button1").prop('disabled', true);

            if ($(this).val().length == 10)
                $("#login-button2").prop('disabled', false);
            else
                $("#login-button2").prop('disabled', true);

        })


        function otp() {
            $("#login-button1").prop("disabled", true);

            const mob = $("#mob").val();
            $.ajax({
                type: 'GET',
                url: 'send_mobile_verify_otp/' + mob,
                success: function(data) {
                    $("#exist_otp").val(data);
                    //console.log(data);
                },
                error: function(data) {

                    //console.log(data);
                }
            });

        }

        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });


        var Boo = function() {
            alert("test");
        }
    </script>

    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?countrycode:IN&key=AIzaSyC1Cz13aBYAbBYJL0oABZ8KZnd7imiWwA4&libraries=places">
    </script>

    <script>
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            /* var input = document.getElementById('current_location');*/
            var input = new google.maps.places.Autocomplete(
                (document.getElementById('current_location_at_form')), {
                    types: ['geocode']
                });

            //   var input =new google.maps.places.Autocomplete(
            //   (document.getElementById('current_location_at_form')),
            //   { types: ['locality'] ,componentRestrictions: { country: "in"}});

            /*var autocomplete = new google.maps.places.Autocomplete(input);*/

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();

            });
        }
    </script>
@stop
