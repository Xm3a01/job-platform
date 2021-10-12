<div class="site-navbar-wrap js-site-navbar bg-gray-400 ">

    <div class="h-4 bg-gray-500"></div>
    <div class="container-fluid">
        <div class="site-navbar bg-light">
            <div class="py-1">
                <div class="row align-items-center">
                    <div class="">
                        <div class="mb-0 site-logo"><a href="{{ route('home') }}"><img
                                    src=" {{ asset('asset/images/logo.png') }} " width="50%"></a></div>
                    </div>
                    <div class="">
                        <nav class="site-navigation" role="navigation">
                            <div class="container">
                                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
                                    <a href="#" class="site-menu-toggle js-menu-toggle text-black">
                                        <span class="icon-menu h3"></span>
                                    </a>
                                </div>

                                <ul class="site-menu js-clone-nav d-none d-lg-block">
                                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                                    <li><a href="{{ route('web.mycv') }}"> {{ __('My CV') }} </a></li>
                                    <li class="has-children">
                                        <a href="#">{{ __('Jobs') }} </a>
                                        <ul class="dropdown arrow-top text-center" style="width:15em;">
                                            <table class="table table-borderless">
                                                <tr class="border-bottom">
                                                    <td> {{ __('Search by') }} </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="{{ route('job.full') }}">{{ __('Full Time') }}
                                                        </a></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="{{ route('job.part') }}">{{ __('Part Time') }}
                                                        </a></td>
                                                </tr>
                                            </table>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('web.contact') }}">{{ __('Contact Us') }}</a></li>
                                    <li><a href="{{ route('users.index') }}" class="add">
                                            {{ __('Search by Job title') }} </a></li>
                                    <li class="has-children m-2">
                                        <a
                                            href="">{{ app()->getLocale() == 'ar' ? Auth::user()->ar_name : Auth::user()->name }}</a>
                                        <ul class="dropdown arrow-top">
                                            <li><a href="" data-toggle="modal"
                                                    data-target="#changepassword">{{ __('Account Setting') }}</a></li>
                                            <li><a href="{{ route('users.logout') }}"> <img
                                                        src="{{ asset('images/more-circular.png') }}" alt="">
                                                    {{ __('Logout') }} </a></li>
                                        </ul>
                                    </li>


                                    @if (Route::current()->getName() != 'search.job')
                                        <li>
                                            @if (app()->getLocale() == 'ar')
                                                <a class="text-center" href="/locale/en"> En
                                                    <img SRC="{{ asset('asset/images/en.png') }} " width="15%"
                                                        class="rounded-circle border border-light">
                                                </a>
                                            @else
                                                <a class="text-center" href="/locale/ar"> عربي
                                                    <img SRC="{{ asset('asset/images/ar.png') }} " width="15%"
                                                        class="rounded-circle border border-light" alt="Lang">
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
