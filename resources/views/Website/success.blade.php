@extends('website_layout')
@section('css')
<style>
    .h11 {
        color:#073D5F; 
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }

    .card p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size: 20px;
        margin: 0;
        line-height:2rem;
    }

    .i1 {
        color: #fff;
        font-size: 100px;
        line-height: 170px;
        margin-left: 47px;
     
    }

    .card {
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
    }
</style>
@stop
@section('website_content')



<section class="flat-row section-about1 parallax parallax3">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-5" style="margin-top:3%; margin-bottom:3%;">
                        <div class="card">
                            <div
                                style="border-radius:200px; height:160px; width:160px; background:#25c62e; margin:0 auto;">
                                <i class="checkmark i1">✓</i>
                            </div>
                            <br>
                            <h1 class="h11" align="center">Success</h1>
                            <p align="center">Subscription Placed Successfully! <br /> </p>
                            <p align="center" style="font-size:17px;">Thanks for joining with
                                Infolekha.</p>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>




@stop
@section('js')
<script>
    setTimeout(() => {
        window.location.href = "{{ route('school_profile.home') }}";

    }, 4000);
</script>
@stop