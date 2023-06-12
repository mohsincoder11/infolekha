@extends('Website.school_profile.layout')
@section('profile_content')

<div class="dashboard-content">
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
    <div class="container dasboard-container">
        <!-- dashboard-title -->
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item"> Change Password</div>
            @include('Website.school_profile.profile_header')

        </div>
        <!-- dashboard-title end -->
        <!-- dasboard-wrapper-->
        <div class="dasboard-wrapper fl-wrap no-pag">
            <div class="row">

                <div class="col-md-10">
                    <div class="dasboard-widget-title dbt-mm fl-wrap">
                        <h5><i class="fas fa-key"></i>Change Password</h5>
                    </div>
                    <div class="dasboard-widget-box fl-wrap">
                        <form action="{{ route('user_profile.post_user_change_password') }}" id="change_password">
                            @csrf
                            <div class="custom-form">
                                <div class="pass-input-wrap fl-wrap">
                                    <label style="font-size:16px;">Current Password<span class="dec-icon"><i
                                                class="far fa-lock-open-alt"></i></span></label>
                                    <input type="password" name="current_password" class="pass-input" placeholder="" value="" />
                                    <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                </div>
                                <div class="pass-input-wrap fl-wrap">
                                    <label style="font-size:16px;">New Password<span class="dec-icon"><i
                                                class="far fa-lock-alt"></i></span></label>
                                    <input type="password" name="new_password" id="new_password" class="pass-input" placeholder="" value="" />
                                    <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                </div>
                                <div class="pass-input-wrap fl-wrap">
                                    <label style="font-size:16px;">Confirm New Password<span class="dec-icon"><i
                                                class="far fa-shield-check"></i> </span></label>
                                    <input type="password" name="confirm_password" class="pass-input" placeholder="" value="" />
                                    <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                                </div>

                                <button type="submit" class="btn    color-bg  float-btn">Save Changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- dasboard-wrapper end -->
    </div>
    <!-- dashboard-footer -->

    <!-- dashboard-footer end -->
</div>
@stop

@section('js')
<script>

$("#change_password").validate({
rules: {
    current_password: {
        required: true,
    },
    new_password: {
        required: true,
        minlength: 8,
        strongPassword:true,
    },
    confirm_password: {
        required: true,
        equalTo: "#new_password"

    },
   
},
messages: {
    current_password: {
        required: "This field is required.",
    },
    new_password: {
        required: "This field is required.",
        minlength: "Minimum password length should be 8 character.",
        strongPassword:"Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character."
    },
    confirm_password: {
        required: "This field is required.",
        equalTo: "Confirm password and password must be same."

    },
  
},
submitHandler: function(form) {
    return true;
},
errorPlacement: function(error, element) {
   
        element.closest('.pass-input').after(error);

},
});

</script>

@stop
