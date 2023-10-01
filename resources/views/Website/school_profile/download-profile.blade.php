<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<style>
    .h {
        color: #144273;
    }
</style>

<body style="font-family:Arial;font-size:12px">

    <div width="100%"
        style="border: 2px solid #144273; border-top: 8px solid #144273; border-bottom:8px solid #144273; padding-right:5%; padding-left:5%;">


        <div style="margin-top:10px;"><img src="{{ asset('public') . '/' . ($user_data->banner_image ?? '') }}"
                height="200" width="660"></div>
        <div align="center" style="margin-top:10px;"><img src="{{ asset('public') . '/' . ($user_data->logo ?? '') }}"
                height="150" width="150" style=" border-radius: 50%;"></div>
        <p align="center" style="color: #144273; font-size:35px;"><b>{{ ucfirst($user_data->entity_name) ?? '' }}</b>
        </p>
        <h1 style="color: #144273;" align="center">About Us</h1>
        <h4 align="justify" style="color: #7d96b2; margin-left:10px; font-size:12px;">
            {{ $user_data->about }}

        </h4>
        <h1 style="color: #144273; margin-top:10%;" align="center">Courses</h1>


        @php
            $courses = json_decode($user_data->course);
        @endphp
        <table>
            <tr style="margin-bottom:5px;">
                @if ($courses)
                    @foreach ($courses as $index => $c)
                        <td style="width:5%;" class="h">&nbsp;&nbsp;&nbsp;<img style="margin-right:5px;"
                                src="data:image/png;base64,{{ base64_encode(file_get_contents('website_asset/icon/graduation2.png')) }}">{{ $c }}</td>

                        @if (($index + 1) % 4 == 0)
            </tr>
            <tr style="margin-bottom:5px;"> <!-- Start a new row after every 4 iterations -->
                @endif
                @endforeach
                @endif
            </tr>
        </table>


        <hr style="color: #8ca9c9; ">
        <h1 style="color: #144273 ; margin-top:10%;" align="center">Facilities</h1>

        @php
            $facilities = json_decode($user_data->facilities);
        @endphp
        <table>
            <tr style="margin-bottom:5px;">
                @if ($facilities)
                    @foreach ($facilities as $index => $f)
                        <td style="width:5%;" class="h">&nbsp;&nbsp;&nbsp;<img style="margin-right:5px;"
                                src="data:image/png;base64,{{ base64_encode(file_get_contents('website_asset/icon/book-2.png')) }}">{{ $f }}</td>

                        @if (($index + 1) % 4 == 0)
            </tr>
            <tr style="margin-bottom:5px;"> <!-- Start a new row after every 4 iterations -->
                @endif
                @endforeach
                @endif
            </tr>
        </table>

        <hr style="color: #8ca9c9; ">

        <table style="">
            <h1 style="color: #144273; margin-top:2%;" align="center">Images of School</h1>
            <tr>
                @if ($user_data->image != null)
                    @foreach (json_decode($user_data->image) as $i)
                        <td>
                            <img src="{{ asset('public') . '/' . $i }}" height="150" width="150">
                        </td>
                    @endforeach
                @endif

            </tr>
            <tr>



            </tr>
        </table>

        <h1 class="h" align="center">Contact Us</h1>
        <p style="color: #144273; font-size: 20px;"><b>Name</b> :<span style="color: #144273; font-size:18px;">
                {{ ucfirst($user_data->entity_name) ?? '' }}</span> </p>
        <p style="color: #144273; font-size: 20px;"><b> Address : </b><span
                style="color: #144273; font-size:18px;">{{ $user_data->address ?? '' }}</span></p>
        <p style="color: #144273; font-size: 20px;"><b> Mobile No :</b><span style="color: #144273; font-size:18px;">
                {{ $user_data->mob ?? '' }}</span></p>
        <p style="color: #144273; font-size: 20px;"><b>Email ID : </b><span style="color: #144273; font-size:18px;">
                {{ $user_data->email ?? '' }}</span></p>
        <p style="color: #144273; font-size: 20px;"><b>Website :</b><span style="color: #144273; font-size:18px;">
                <a href="{{ $user_data->website }}"> {{ $user_data->website ?? '' }}</a></span></p>
        @if ($user_data->fb || $user_data->website || $user_data->insta || $user_data->yt || $user_data->google)
            <p style="color: #144273; font-size: 20px;"><b>Social Media Handles : </b>
                @if ($user_data->fb)
                    <a target="_blank" href="{{ $user_data->fb }}"> <img
                            src="{{ asset('website_asset/icon/facebook-fill.png') }}"></a>
                @endif
                @if ($user_data->insta)
                    <a target="_blank" href="{{ $user_data->insta }}"> <img
                            src="{{ asset('website_asset/icon/instagram-fill.png') }}"></a>
                @endif
                @if ($user_data->yt)
                    <a target="_blank" href="{{ $user_data->yt }}"> <img
                            src="{{ asset('website_asset/icon/youtube-fill.png') }}"></a>
                @endif
                @if ($user_data->google)
                    <a target="_blank" href="{{ $user_data->google }}"> <img
                            src="{{ asset('website_asset/icon/linkedin-fill.png') }}"></a>
                @endif
            </p>
        @endif



    </div>

</body>

</html>
