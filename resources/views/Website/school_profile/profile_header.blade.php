<div class="dashbard-menu-header">
    <div class="dashbard-menu-avatar fl-wrap">
      
        <img src="{{asset('public/'.Auth::user()->logo)}}" alt="">
        <h4>Welcome, <span>{{ ucfirst(Auth::user()->name ?? '') }}</span></h4>

    </div>
    <a href="{{route('logout')}}" class="log-out-btn   tolt" data-microtip-position="bottom"
        data-tooltip="Log Out"><i class="far fa-power-off"></i></a>
</div>