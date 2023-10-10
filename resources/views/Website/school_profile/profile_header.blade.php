<div class="dashbard-menu-header">
    <div class="dashbard-menu-avatar fl-wrap">
      
        <img src="{{isset(Auth::user()->logo) ? asset('public/'.Auth::user()->logo) : asset('public/images/blank.jpg')}}" alt="">
        <h4>Welcome, <span>{{ ucfirst(Auth::user()->name ?? '') }}</span></h4>

    </div>
    <a href="{{route('logout')}}" class="log-out-btn   tolt" data-microtip-position="bottom"
        data-tooltip="Log Out" align="center"><i class="fa fa-power-off"></i></a>
</div>