@extends('Website.tutor_profile.layout')
@section('profile_content')
            <div class="dashboard-content">
                <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
                <div class="container dasboard-container">
                    <!-- dashboard-title -->
                    <div class="dashboard-title fl-wrap">
                        <div class="dashboard-title-item">Wishlist</div>
                        @include('Website.school_profile.profile_header')

                    </div>
                    <!-- dashboard-title end -->
                    <!-- dasboard-wrapper-->

                    <div class="col-md-12">
                        <div class="list-searh-input-wrap-title fl-wrap"></div>
                        <div class="block-box fl-wrap search-sb" id="filters-column">
                            <!-- listsearch-input-item -->
                            <table id="customers">
                                <tr>
                                    <th>Sr.no</th>
                                    <th>College Name</th>
                                    <th>Remove</th>
                                </tr>
                                @foreach($wishlists as $wishlist)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a target="_blank" href="{{route('listing-details',$wishlist->college_id)}}">
                                        {{$wishlist->college_name}}
                                    </a>
                                    </td>
                                    <td>
                                        <a href="{{route('remove-wishlist',$wishlist->id)}}" class="btn1 btn-outline-success"><i class="fa fa-trash"
                                                aria-hidden="true"></i></a></td>
                                </tr>
                                @endforeach
                              
                            </table>

                        </div>
                    </div>
                </div>

            </div>
       @stop