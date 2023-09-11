@extends('website_layout')
@section('css')
<style>
    .condition-label {
  color: red;
}

.condition-label.valid {
  color: green;
}
	

</style>
@stop
@section('website_content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">School / College / Institution Sign Up</h1>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <section class="flat-row page-profile bg-theme">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6"
                    style="padding-top:20px; 
         box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <form class="form-login form-listing" action="{{ route('school_institute_register_user_create') }}"
                        method="post" id="form1">
                        @csrf
                        <h3 class="title-formlogin">Sign Up</h3>
                        <span class="input-login icon-form">
                            <select class="form-select select country-select" name="entity" id="sel" requiered>
                                <option disabled selected>--Select Entity </option>
                                @foreach ($entities as $entity)
                                    <option value="{{ $entity->entity }}">{{ $entity->entity }}</option>
                                @endforeach
                            </select></span>



                        <span class="input-login icon-form"><input type="text" id="entity"
                                placeholder=" Name of Entity" name="name" required="required"><i
                                class="fa fa-user"></i></span>

                        <span class="input-login icon-form"><input type="text" placeholder="Contact Person*"
                                name="contact_person" required="required"><i class="fa fa-user"></i></span>

                        <span class="input-login icon-form"><input type="text" placeholder="Mobile No*" id="mob"
                                name="r_mob" maxlength=10 required="required">
                            <button id="login-button2" disabled type="button" class="btn" title="Sign Up" style="margin-top:15px;"
                          >Verify Mobile</button>
                        </span>

                        <span class="input-login icon-form"><input type="text" placeholder="E-mail*" name="email"
                                required="required"><i class="fa fa-envelope"></i></span>

                        <span class="input-login icon-form">
                            <input type="text" placeholder="Address*" id="current_location_at_form" name="address"
                                required="required">
                            <i class="fa fa-envelope-o"></i>
                        </span>





                        <span class="input-login icon-form field-icon.error">
                            <input type="password" placeholder="Password*" id="password" name="password"
                                required="required"><i toggle="#password"
                                class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                        </span>

                        <span class="input-login icon-form field-icon.error">
                            <input type="password" placeholder="Confirm Password*" name="password_confirmation"
                                id="password_confirmation" required="required"><i toggle="#password_confirmation"
                                class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                        </span>


                        <hr class="mt-4">

                        <div class="centered-container">
                            <button id="login-button1" type="submit" class="btn" title="Sign Up" disabled
                                style="margin-bottom: 15px;">
                                Submit</button>


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

                                    <span class="input-login icon-form">
                                        <input type="text" placeholder="Enter OTP*" maxlength="4" id="otp"
                                            name="otp" required="required"><i
                                            class="fa fa-user field-icon toggle-password"></i>
                                    </span>

                                    <div class="otp_error" style="text-align: left;margin-top:-10px;">
                                    </div>
                                </span>

                                <span class="">
                                    <button type="submit" id="login-button" class="btn" title="log in" style="margin-top:20px;">
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
        setTimeout(() => {
            $('#password').val('');
            $('#password_confirmation').val('');
        }, 1000);
        $('#sel').on('change', function() {
            //console.log($('#sel').children("option:selected").val());
            $('#entity').attr({
                "placeholder": ' Name of ' + $('#sel').children("option:selected").val()
            });

        });
		
		
    </script>

    <script>
        $("#form1").validate({
            rules: {
                name: {
                    required: true,
                },
                contact_person: {
                    required: true,
                },
                r_mob: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
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
                    customEmail: true,
                    remote: "{{ url('check_email_exist') }}",

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
                entity: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "This field is required.",
                },
                contact_person: {
                    required: "This field is required",
                },
                r_mob: {
                    required: "Please enter mobile number.",
                    minlength: "Please enter 10 digit mobile number.",
                    maxlength: "Please enter 10 digit mobile number.",
                    digits: "Mobile number must be integer only.",
                    remote: "This mobile number is already registered with us."
                },
                email: {
                    required: "This field is required.",
                    customEmail: "Please enter valid email address.",
                    remote: "This email address is already registered with us."
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
                entity: {
                    required: "Please select option.",
                },
            },
            submitHandler: function(form) {
                return true;
            },
            errorPlacement: function(error, element) {
				 $(element).next("i.toggle-password").addClass("error");
                error.insertAfter(element);
                if (element.attr("name") === "r_mob") {
                    error.insertAfter(element.closest('.input-login'));
                } else {
                    element.closest('.input-login').after(error);
                }

            },
        });

    //      $('#password').on('input', function() {
    //   var password = $(this).val();
    //         $('.condition-label').each(function() {
    //             var label = $(this);
    //             var condition = label.text().trim();
    //             var isValid = false;

    //             if (condition === 'Use 8 or more characters.') {
    //                 isValid = password.length >= 8;
    //             } else if (condition === 'Use uppercase letter.') {
    //                 isValid = /[A-Z]/.test(password);
    //               } else if (condition === 'Use a number.') {
    //                 isValid = /[0-9]/.test(password);
    //             } else if (condition === 'Use lowercase letter.') {
    //                 isValid = /[a-z]/.test(password);
    //             } else if (condition === 'Use special character.') {
    //                 isValid = /[!@#$%^&*(),.?":{}|<>]/.test(password);
    //             }

    //             label.toggleClass('valid', isValid);
    //         });
    //     });
    $('#mob').on('keypress', function(event) {
    var keyCode = event.which ? event.which : event.keyCode;
    if ((keyCode >= 48 && keyCode <= 57) || keyCode == 8 || keyCode == 46 || keyCode == 9 || (keyCode >= 37 && keyCode <= 40)) {
      return true;
    } else {
      event.preventDefault();
      return false;
    }
  });
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

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Successfully Verified',
                        confirmButtonText: 'Close'
                    });

                } else {


                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Enter Correct OTP',
                        confirmButtonText: 'Close'
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
            var value = $(this).val();

            if (/^\d+$/.test(value) && value.length === 10)
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



        //   if (selectedFiles.length > maximage) {
        //     alert(`You can select maximum ${maximage} files`);
        //     imageSelector.value = ''; // Clear the selected files
        //   }
        var Boo = function() {
            alert("test");
        }
    </script>


    <script>
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            /* var input = document.getElementById('current_location');*/
            var autocomplete = new google.maps.places.Autocomplete(
                (document.getElementById('current_location_at_form')), {
                    types: ['locality']
                });
                autocomplete.setComponentRestrictions({
                 'country': 'in'
             });
            /*var autocomplete = new google.maps.places.Autocomplete(input);*/

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();

            });
        }
		
		
    </script>

@stop
