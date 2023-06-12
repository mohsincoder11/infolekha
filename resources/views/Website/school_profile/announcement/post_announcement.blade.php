@extends('Website.school_profile.layout')
@section('css')
@stop
@section('profile_content')
    <div class="dashboard-content">
        <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
        <div class="container dasboard-container">
            <!-- dashboard-title -->
            <div class="dashboard-title fl-wrap">
                <div class="dashboard-title-item">Post Announcement</div>
                @include('Website.school_profile.profile_header')


            </div>


            <div class="col-md-12">
                <div class="list-searh-input-wrap-title fl-wrap"></div>
                <div class="block-box fl-wrap search-sb" id="filters-column">
                    <div class="row">
                        <form action="{{ route('insert-announcement') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="custom-form">
                                <div class="col-md-4">

                                    <div class="listsearch-input-item">

                                        <label>Announcement Title</label>
                                        <input type="text" name="heading" placeholder="Announcement Title" value="" />
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <label>Main Content </label>
                                    <textarea cols="10" name="content" rows="3" placeholder="Main Content "></textarea>
                                </div>

                                <div class="col-md-4">

                                    <div class="listsearch-input-item">

                                        <label>Upload Image</label>
                                        <input name="image" type="file" onClick="this.select()" value="" accept="image/*" />
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <button type="submit" class="btn  color-bg  float-btn">Publish Announcement </button>
                                </div>



                            </div>
                        </form>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px; margin-bottom:20px ;">
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <table id="customers">
                            <tr>
                                <th>Sr.no</th>
                                <th>Announcement Title</th>
                                <th>Image</th>
                                <th>Announcement Description</th>
                                <th>Status</th>
                            </tr>
                            @foreach ($announcements as $announcement)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $announcement->heading }}</td>
                                    <td>
                                        <a target="_blank" href="{{ asset('public/' . $announcement->image) }}">
                                            <img height="50px" width="auto"
                                                src="{{ asset('public/' . $announcement->image) }}" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <div class="text-container">
                                            <p class="short-text">
                                                {{ Str::limit($announcement->main_content, 50) }}
                                            @if (Str::length($announcement->main_content) > 50)
                                                <a href="#" class="read-more-link">Read More</a>
                                            @endif
                                            </p>
                                            <p class="full-text" style="display: none;">{{ $announcement->main_content }}
                                            </p>
                                            <p class="show-less" style="display: none;">
                                                <a href="#" class="show-less-link">Show Less</a>
                                              </p>
                                        </div>
                                    </td>
                                    <td>{{ucfirst($announcement->status)}}</td>
                                </tr>
                            @endforeach



                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.read-more-link').click(function(e) {
      e.preventDefault();
      var $container = $(this).closest('.text-container');
      $container.find('.short-text').hide();
      $container.find('.full-text').toggle();
      $container.find('.show-less').show();
    });

    $('.show-less-link').click(function(e) {
      e.preventDefault();
      var $container = $(this).closest('.text-container');
      $container.find('.full-text').hide();
      $container.find('.short-text').show();
      $container.find('.show-less').hide();
    });
        });
    </script>
@stop
