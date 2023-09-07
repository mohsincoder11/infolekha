@extends('Website.school_profile.layout')

@section('profile_content')




    <div class="dashboard-content">
        <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
        <div class="container dasboard-container">
            <!-- dashboard-title -->
            <div class="dashboard-title fl-wrap">
                <div class="dashboard-title-item">Post Announcement1</div>
                @include('Website.school_profile.profile_header')


            </div>


            <div class="col-md-12">
                <div class="list-searh-input-wrap-title fl-wrap"></div>
                <div class="block-box fl-wrap search-sb" id="filters-column">
                    <div class="row">
                        <form action="{{ route('insert-announcement') }}" method="post" enctype="multipart/form-data"
                            id="post_announcement_form">
                            @csrf
                            <div class="custom-form">
                                <div class="col-md-6">

                                    <div class="listsearch-input-item">

                                        <label style="font-size:16px;">Announcement Title</label>
                                        <input type="text" name="heading" placeholder="Announcement Title"
                                            value="" />
                                    </div>
                                </div>
								
								 <div class="col-md-6">

                                    <div class="listsearch-input-item">

                                        <label style="font-size:16px;">Upload Image</label>
                                        <input name="image" type="file" onClick="this.select()" value=""
                                            accept="image/*" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="listsearch-input-item">

                                        <label style="font-size:16px;">Main Content <span id="charcount">0 out of 1000 words</span></label>
                                        <textarea cols="10" name="content" id="content" rows="3" placeholder="Main Content"   
                                        onkeyup="charcountupdate(this.value)"></textarea>
                                    </div>
                                </div>

                               


                                <div class="col-md-12" style="margin-top:10px;">
                                    <button type="submit" class="btn  color-bg  float-btn">Publish Announcement </button>
                                </div>



                            </div>
                        </form>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px; margin-bottom:20px ;">
                        <hr>
                    </div>

                    <div class="col-md-12" style="overflow-x:scroll;">
                                                   <table id="customers">
                            <tr>
                                <th> SN</th>
                                <th>Announcement Title</th>
                                <th>Image</th>
                                <th>Announcement Description</th>
                                <th>Payment Status</th>
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
                                    <td>
                                        @if(check_announcement_payment($announcement->id)=='N/A')
                                <a href="{{route('school_profile.announcement-package', $announcement->id)}}">Make Payment</a>
                                <br> @endif
                                       {!!check_announcement_payment($announcement->id)!!}
                                        
                                    </td>
                                    <td>{{ ucfirst($announcement->status) }}</td>
                                </tr>
                            @endforeach


                        </table>
                        
@if(count($announcements)==0) 

<p>No Record Found</p>
@endif
                    </div>

                </div>

            </div>
        </div>

    </div>
@stop

@section('js')
    <script>

        function charcountupdate(str) {
    var text = str;
    var words = text.split(/\s+/).filter(function(word) {
      return word !== "";
    });
    var wordCount = words.length;

    if (wordCount > 1000) {
      var trimmedText = words.slice(0, 1000).join(" ");
      $("#content").val(trimmedText);
    }

    document.getElementById("charcount").innerHTML = wordCount + ' out of 1000 words';

        }  
  
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

            jQuery.validator.addMethod("imageFileonly", function(value, element) {
                // Get the file extension
                var extension = value.split('.').pop().toLowerCase();
                // Check if the extension is one of the image formats
                return ['jpg', 'jpeg', 'png', 'gif'].indexOf(extension) !== -1;
            }, "Please select a valid image file (jpg, jpeg, png).");



            $.validator.addMethod('wordCount', function(value, element) {
    var words = value.trim().split(/\s+/).length;
    return this.optional(element) || words <= 1000;
  }, 'Please enter up to 1000 words.');

            $("#post_announcement_form").validate({
                rules: {
                    heading: {
                        required: true,
                    },
                    content: {
                        required: true,
                        wordCount: true,
                    },
                    image: {
                        required: true,
                        imageFileonly: true,

                    },

                },
                messages: {
                    heading: {
                        required: "Please enter announcement title.",
                    },
                    content: {
                        required: "Please enter content.",
                        wordCount: "Please enter maximum 1000 words content.",
                    },

                    image: {
                        required: "Please select a file.",
                        imageFileonly: "Please select valid image files only (jpg, jpeg, png).",

                    },

                },
                submitHandler: function(form) {
                    return true;
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "content") {
        element.closest('.col-md-12').append(error);
      } else {
        element.closest('.col-md-6').append(error);
      }

                },
            });
        });
    </script>
@stop
