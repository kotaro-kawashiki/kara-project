<div role="document" data-spy="scroll" data-target="#sampleScrollSpy" data-offset="160" id="top">
    <div id="sampleScrollSpy">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    @guest
                    <a class="navbar-brand" href="#menu-toggle" id="menu-toggle">
                        ≡
                    </a>
                    @else
                    <!--<a class="navbar-brand" href="#menu-toggle" id="menu-toggle">-->
                        <!--≡-->
                        <span class="glyphicon glyphicon-th-list" onclick="openNav()"></span>
                    </a>
                    @endguest
                </div>
              
                <!-- Sidebar -->
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li class="sidebar-brand">
                            <a href="#">
                                Start Bootstrap
                            </a>
                        @guest
                            <li><a href="{{ route('login') }}">ログイン</a></li>
                            <li><a href="{{ route('register') }}">新規登録</a></li>
                        @else
                            </li>
                            <li>
                                <a href="{{route('posts.create')}}"><span class="glyphicon glyphicon-pencil"></span> 記録をつける</a>
                            </li>
                            <li>
                                <a href="{{url('/calendar')}}"><span class="glyphicon glyphicon-calendar"></span> カレンダー</a>
                            </li>
                            <li>
                                <a href="{{route('posts.index')}}"><span class="glyphicon glyphicon-list-alt"></span> 投稿一覧 & 検索</a>
                            </li>
                            <li>
                                <a href="{{route('users.favos',['id' => Auth::user()->id])}}"><span class="glyphicon glyphicon-star-empty"></span> お気に入り</a>
                            </li>
                            <li>
                                <a href="{{route('people.index')}}"><span class="glyphicon glyphicon-user"></span> 人リスト</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <span class="glyphicon glyphicon-log-out"></span> ログアウト
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            </li>
                        @endguest
                        </li>
                    </ul>
                </div>
                <!-- /#sidebar-wrapper -->
            </div>
        </nav>
    </div>
</div>