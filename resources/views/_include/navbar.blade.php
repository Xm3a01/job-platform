
    <div class="site-navbar-wrap js-site-navbar bg-white">
            <div class="container-fluid">
              <div class="site-navbar bg-light">
                <div class="py-1">
                  <div class="row align-items-center">
                    <div class="">
                  <div class="mb-0 site-logo"><a href="{{route('home' , app()->getLocale())}}"><img src=" {{asset('asset/images/logo.png')}} " width="50%"></a></div>
                    </div>
                    <div class="">
                      <nav class="site-navigation" role="navigation">
                        <div class="container">
                          <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3 navmedia">
                            <a href="#" class="site-menu-toggle js-menu-toggle text-black">
                              <span class="icon-menu h3"></span>
                             </a>
                            </div>

                          <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li><a href="{{route('home')}}">{{ __('Home') }}</a></li>
                            @if(Auth::guard('web')->check())
                            <li><a href="{{route('users.index' , app()->getLocale())}}">{{ __('Add your CV') }}</a></li>
                            @else
                            <li><a href="{{route('login' , app()->getLocale())}}">{{ __('Add your CV') }}</a></li>
                            @endif
                           <li class="has-children">
                              <a href="#">{{ __('Jobs') }} </a>
                              <ul class="dropdown arrow-top text-center" style="width:15em;">
                                  <table class="table table-borderless">
                                   <tr class="border-bottom"><td>  {{ __('Search by') }}   </td></tr>
                                      <tr> <td><a href="{{route('job.full')}}">{{__('Full Time')}} </a></td></tr>
                                      <tr><td><a href="{{route('job.part')}}">{{__('Part Time')}} </a></td></tr>
                                  </table>
                              </ul>
                            </li>
                             <li><a href="{{route('job.owner')}}"> {{ __('Employer?') }}</a></li>
                            <li><a href="{{route('web.contact')}}">  {{ __('Contact Us') }}</a></li>

                            @guest
                            <li><a class="add" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            @if (Route::has('register'))
                                <li >
                                    <a class="login" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                            @if(Auth::check() )
                             <li class="has-children mr-2">
                                <a href="">{{(app()->getLocale() == 'ar') ? Auth::user()->ar_name : Auth::user()->name}}</a>
                                <ul class="dropdown arrow-top">
                                  <li><a href="" data-toggle="modal" data-target ="#changepassword" >{{__('Account Setting')}}</a></li>
                                  <li ><a href="{{route('users.logout')}}" >  <img src="{{asset('images/more-circular.png')}}" alt="">  {{__('Logout')}}   </a></li>
                                   </ul>
                                </li>
                                @elseif(Auth::guard('owner')->check())
                                 <li class="has-children mr-2">
                                <a href="">{{(app()->getLocale() == 'ar') ? Auth::user()->ar_name : Auth::user()->name}}</a>
                                <ul class="dropdown arrow-top">
                                  <li><a href="" data-toggle="modal" data-target ="#changepassword" >{{__('Account setting')}}</a></li>
                                  <li ><a href="{{route('owners.logout')}}" >  <img src="{{asset('images/more-circular.png')}}" alt="">  {{__(' Logout ')}}   </a></li>
                                   </ul>
                                </li>
                                @endif
                           @endguest

                         @if(Route::current()->getName() != 'search.job')
                           <li>
                               @if(app()->getLocale() == 'ar')
                               <a class="text-center" href="/locale/en"> En
                                  <img SRC="{{asset('asset/images/en.png')}} " width="15%" class="rounded-circle border border-light">
                               </a>
                               @else
                                 <a class="text-center" href="/locale/ar"> عربي
                                     <img  SRC="{{asset('asset/images/ar.png')}} " width="15%" class="rounded-circle border border-light" alt="Lang">
                                 </a>
                              @endif
                           </li>
                           @endif
                        </ul>
                        </div>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
