{{--<div class="top_nav">--}}
    {{--<div class="nav_menu">--}}
        {{--<nav>--}}
            {{--<div class="nav toggle">--}}
                {{--<a id="menu_toggle"><i class="fa fa-bars"></i></a>--}}
            {{--</div>--}}

            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<li class="">--}}
                    {{--<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">--}}
                        {{--<img src="{!! asset('production/images/img.jpg') !!}" alt="">John Doe--}}
                        {{--<span class=" fa fa-angle-down"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu dropdown-usermenu pull-right">--}}
                        {{--<li><a href="javascript:;"> Profile</a></li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:;">--}}
                                {{--<span class="badge bg-red pull-right">50%</span>--}}
                                {{--<span>Settings</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="javascript:;">Help</a></li>--}}
                        {{--<li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}


            {{--</ul>--}}
        {{--</nav>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{!! asset('images/user-icon.png') !!}" alt="">{{Auth::user()->name}}
                        <span class=" fa fa-angle-down"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        {{-- <li><a href="javascript:;"> Profile</a></li> --}}
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out pull-right"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </li>
                <li>
                    @foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><img width="20" height="20" src="{{asset($localeCode.'.png')}}"> {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </li>
                <?php /*
                <li>
                    <button class="btn btn-default" data-toggle="dropdown">
                        <span id="dropdown_title2">
                            {{ LaravelLocalization::getCurrentLocaleName() }}
                        </span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" >
                        @foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                        {{-- <li>{!! link_to('lang/en', 'English') !!}</li> --}}
                        {{-- <li>{!! link_to('lang/ne', 'Nepali') !!}</li> --}}
                    </ul>
                </li>
                */ ?>
                <ul>

</ul>
            </ul>
        </nav>
    </div>
</div>