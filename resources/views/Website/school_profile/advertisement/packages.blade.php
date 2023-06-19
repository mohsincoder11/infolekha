
<div class="col-md-12">
               
    <h4 style="color: #073D5F; font-size: 22px; margin-bottom: 2vh; margin-top: 2vh;"><b>Our Subscription Plans  </b></h4>
    <!-- listsearch-input-item -->
    


   @foreach($advertisements as $advertisements) 
   <form action="{{route('school_profile.insert-advertisement')}}" method="post" id="form{{$loop->iteration}}">
    @csrf
   <div class="col-lg-4">
      <div class="card-basic">
          <div class="card-header header-basic">
            <h1>{{$advertisements->PackageName}}</h1>
          </div>
          <div class="card-body">
           <input type="hidden" name="PackageID" value="{{$advertisements->PackageID}}">
              <div class="card-element-hidden-standard">
                <ul class="card-element-container">
                  <li class="card-element">{{$advertisements->label}} : {{$advertisements->BannerWidth}} x {{$advertisements->BannerHeight}} pxl</li>
                  <li class="card-element">Original Price - Rs. {{$advertisements->OriginalPrice}} Per Day</li>
                  <li class="card-element">Discount - {{$advertisements->Discount}}%</li>
                  <li class="card-element">Final Price - Rs. {{$advertisements->OriginalPrice-(($advertisements->OriginalPrice/100)*$advertisements->Discount)}} Per Day</li>
                  <li class="card-element" style="padding:0 10px">
                    <div class="chosen-select on-radius no-search-select">
                        <input type="hidden" class="original_price" value="{{$advertisements->OriginalPrice-(($advertisements->OriginalPrice/100)*$advertisements->Discount)}}">
                        <select class="select_days" name="SelectedDays">
                        <option value="">Select no of days</option>
                        @for($i=$advertisements->MinDays;$i<=$advertisements->MaxDays;$i++)
                        <option value="{{$i}}">{{$i}} @if($i>1)days @else day @endif</option>
                        @endfor
                    </select>
                    <span class="no_of_days_error"></span>
                    </div>
                 </li>
                  <li class="card-element">Total Amount - Rs. <span class="total_amount"></span>
                    <input type="hidden" name="TotalAmount" class="total_amount">

                  </li>

                </ul>
                <div>

                    {{-- <label style="text-align: center !important;"> Apply Coupon Code</label>
                    <input type="text" class="form-control" name="CouponCode"  value="" /> --}}
                </div>
                <button type="submit" class="btn btn-standard btn-submit">Send Enquiry</button>
              </div>
            </div>
        </div>
 

    </div>
   </form>
    @endforeach

    
   

</div>
