@extends('Website.school_profile.layout')

@section('profile_content')
    <div class="dashboard-content">
        <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
        <div class="container dasboard-container">
            <!-- dashboard-title -->
            <!-- dashboard-title -->
            <div class="dashboard-title fl-wrap">
                <div class="dashboard-title-item"><span>Enquiries</span></div>
                @include('Website.school_profile.profile_header')

                <!--Tariff Plan menu-->
                <div class="tfp-det-container">


                </div>
                <!--Tariff Plan menu end-->
            </div>
            <!-- dashboard-title end -->
            <!-- dasboard-wrapper-->


            <div class="dasboard-widget-box fl-wrap">


                <div class="col-md-12" style="overflow-x:scroll;">
                    <table id="customers" >
                        <thead>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>

                        </thead>
                        <tbody>
                            @foreach ($enquiries as $enquirie)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $enquirie->name }}</td>
                                    <td>
                                        <a href="mailto:{{ $enquirie->email }}">{{ $enquirie->email }}</a>
                                    </td>
                                    <td>{{ $enquirie->message }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($enquiries) == 0)
                        <p>No Record Found</p>
                    @endif
                </div>


            </div>
        </div>

    </div>
@stop
