<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					<p class="text-white text-lg-left text-center">Offer Zone Top Deals & Discounts
						<i class="fas fa-shopping-cart ml-1"></i>
					</p>
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>
						<li class="text-center border-right text-white">
							<a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
								<i class="fas fa-map-marker mr-2"></i>Select Location</a>
						</li>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-truck mr-2"></i>Track Order</a>
						</li>
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 001 234 5678
            </li>
            @guest
						<li class="text-center border-right text-white">
							<a href="login" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Log In </a>
            </li>
            <li class="text-center text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Register </a>
						</li>
            @else
            <li class="text-center border-right text-white">
						<a class="text-white nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu">
              <ul>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </li>
              </ul>
            </div>
            </li>
            <li class="text-center border-right text-white">
              <img src="{{Auth::user()->avatar }}" class="img-circle" width="30%">
            </li>
            @endguest
						
					</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>
<div class="header-bot">
  <div class="container">
    <div class="row header-bot_inner_wthreeinfo_header_mid">
      <!-- logo -->
      <div class="col-md-3 logo_agile">
        <h1 class="text-center">
          <a href="index.html" class="font-weight-bold font-italic">
            <img src="images/amirmatahati.gif" alt=" " class="img-fluid"><span style="color:#fff">Electro Store</span>
          </a>
        </h1>
      </div>
      <!-- //logo -->
      <!-- header-bot -->
      <div class="col-md-9 header mt-4 mb-md-0 mb-4">
        <div class="row">
          <!-- search -->
          <div class="col-10 agileits_search">
            <form class="form-inline" action="#" method="post">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" required>
              <button class="btn my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
          <!-- //search -->
          <!-- cart details -->
          <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
            <div class="wthreecartaits wthreecartaits2 cart cart box_1">
            
            </div>
          </div>
          <!-- //cart details -->
        </div>
      </div>
    </div>
  </div>
</div>
