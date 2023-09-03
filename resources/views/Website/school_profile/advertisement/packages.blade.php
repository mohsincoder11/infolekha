<h4 style="color: #073D5F; font-size: 22px; margin-bottom: 1rem; margin-top: 2rem;">
    <b>Our Subscription Plans </b>
</h4>
<!-- listsearch-input-item -->


<div class="col-lg-12">
    @foreach ($advertisements as $advertisements)
        <div class="col-lg-4">
            <form action="{{ route('school_profile.insert-advertisement') }}" method="post"
                id="form{{ $loop->iteration }}">
                @csrf
                <div class="card-basic">
                    <div class="card-header header-basic">
                        <h1>{{ $advertisements->PackageName }}</h1>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="PackageID" value="{{ $advertisements->PackageID }}">
                        <div class="card-element-hidden-standard">
                            <ul class="card-element-container">
                                <li class="card-element">{{ $advertisements->label }} :
                                    {{ $advertisements->BannerWidth }} x {{ $advertisements->BannerHeight }} px</li>
                                <li class="card-element">Original Price - Rs. {{ $advertisements->OriginalPrice }} Per
                                    Day</li>
                                <li class="card-element">Discount - <span class="discount_span">0</span>
                                    <input type="hidden" name="Discount" class="discount_input">
                                </li>
                                <li class="card-element">Final Price - Rs.
                                    <span class="final_price"> {{ $advertisements->OriginalPrice }}</span>
                                    Per Day
                                </li>
                                <li class="card-element" style="padding:0 10px">
                                    <div class="chosen-select on-radius no-search-select">
                                        <input type="hidden" class="original_price"
                                            value="{{ $advertisements->OriginalPrice }}">
                                        <select class="select_days" name="SelectedDays"
                                            style="line-height:0px! important;">
                                            <option value="">Select no of days</option>
                                            @for ($i = $advertisements->MinDays; $i <= $advertisements->MaxDays; $i++)
                                                <option value="{{ $i }}">{{ $i }} @if ($i > 1)
                                                        days
                                                    @else
                                                        day
                                                    @endif
                                                </option>
                                            @endfor
                                        </select>
                                        <span class="no_of_days_error"></span>
                                    </div>
                                </li>
                                <li class="card-element">Total Amount - Rs. <span class="total_amount">0</span>
                                    <input type="hidden" name="TotalAmount" class="total_amount">

                                </li>
                                <li class="card-element" style="padding:0 10px;">
                                    <label style="text-align: center !important;"> Apply Coupon Code</label>

                                </li>
                                <div class="listing-rating card-popup-rainingvis">
                                    <input type="text" class="form-control CouponCode" name="CouponCode"
                                        value="" style="margin-left:10px;" />
                                    <span class="re_stars-title"><button style="margin-left:60px; padding:5px; border-radius:10px; color:#fff; border:none;"
                                            type="button" class="btn-standard ApplyCouponCode">Apply</button></span>
                                </div>

                            </ul>
                            {{-- <div style="padding:0 10px;">

                    <label style="text-align: center !important;margin:10px 0;"> Apply Coupon Code</label>
                    <input type="text" class="form-control CouponCode" name="CouponCode"  value="" />
                </div> --}}
                            <button style="margin:10px 0;" type="submit" class="btn btn-standard btn-submit">Send
                                Enquiry</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    @endforeach
</div>
