  <!-- Header -->
  <header class="header-v3">
      <!-- Header desktop -->
      <div class="container-menu-desktop trans-03">
          <div class="wrap-menu-desktop">
              <nav class="limiter-menu-desktop p-l-45">

                  <!-- Logo desktop -->
                  <a href="/" class="logo">
                      <img src="{{ asset('landing/images/icons/e-kost.png') }}" alt="IMG-LOGO">
                  </a>


                  <!-- Icon header -->
                  <div class="wrap-icon-header flex-w flex-r-m h-full">

                      <!-- Menu desktop -->
                      <div class="menu-desktop">
                          <ul class="main-menu">
                              {{-- <li>
                                  <a href="index.html">Home</a>
                              </li>

                              <li>
                                  <a href="index.html">Blog</a>
                              </li>

                              <li>
                                  <a href="index.html">Contact</a>
                              </li> --}}

                              @if(Auth::check())

                              <li>
                                  <a href="#">{{ Auth::user()->name }}</a>
                                  <ul class="sub-menu">
                                      <li><a href="/myprofil/#myprofil">My Profil</a></li>
                                      <li><a href="/whitelist/#whitelist">My Whitelist</a></li>
                                      <li><a href="/logout">Logout</a></li>
                                  </ul>
                              </li>
                              @else

                              <li>
                                  <a href="/about/#about">About</a>
                              </li>
                              <li>
                                  <a href="/loginuser/#login">Login</a>
                              </li>

                              @endif

                          </ul>
                      </div>
                      <div class="flex-c-m h-full p-lr-19">
                          {{-- <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                            <i class="zmdi zmdi-menu"></i>
                        </div> --}}
                      </div>
                      <div class="flex-c-m h-full p-lr-19">
                          {{-- <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                            <i class="zmdi zmdi-menu"></i>
                        </div> --}}
                      </div>
                      <div class="flex-c-m h-full p-lr-19">
                          {{-- <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                            <i class="zmdi zmdi-menu"></i>
                        </div> --}}
                      </div>
                      <div class="flex-c-m h-full p-lr-19">
                          {{-- <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                              <i class="zmdi zmdi-menu"></i>
                          </div> --}}
                      </div>
                  </div>
              </nav>
          </div>
      </div>

      <!-- Header Mobile -->
      <div class="wrap-header-mobile">
          <!-- Logo moblie -->
          <div class="logo-mobile">
              <a href="/"><img src="{{ asset('landing/images/icons/e-kost-2.png') }}" alt="IMG-LOGO"></a>
          </div>

          <!-- Button show menu -->
          <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
              <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
              </span>
          </div>
      </div>


      <!-- Menu Mobile -->
      <div class="menu-mobile">
          <ul class="main-menu-m">
              {{-- <li>
                  <a href="product.html">Home</a>
              </li>

              <li>
                  <a href="blog.html">Blog</a>
              </li>

              <li>
                  <a href="contact.html">Contact</a>
              </li> --}}

              @if (Auth::check())

              <li>
                  <a href="#">{{ Auth::user()->name }}</a>
                  <ul class="sub-menu-m">
                      <li><a href="/myprofil/#myprofil">My Profile</a></li>
                      <li><a href="/whitelist/#whitelist">My Whitelist</a></li>
                      <li><a href="/logout">Logout</a></li>
                  </ul>
                  <span class="arrow-main-menu-m">
                      <i class="fa fa-angle-right" aria-hidden="true"></i>
                  </span>
              </li>

              @else
              <li>
                  <a href="/loginuser/#login">Login</a>
              </li>
              @endif
          </ul>
      </div>

      <!-- Modal Search -->
      <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
          <button class="flex-c-m btn-hide-modal-search trans-04">
              <i class="zmdi zmdi-close"></i>
          </button>

          <form class="container-search-header">
              <div class="wrap-search-header">
                  <input class="plh0" type="text" name="search" placeholder="Search...">

                  <button class="flex-c-m trans-04">
                      <i class="zmdi zmdi-search"></i>
                  </button>
              </div>
          </form>
      </div>
  </header>
