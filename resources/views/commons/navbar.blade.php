<div role="document" data-spy="scroll" data-target="#sampleScrollSpy" data-offset="160" id="top">
    <div id="sampleScrollSpy">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!--<div class="navbar-header">-->
                    <!-- Branding Image -->
                    @guest
                    <div class="navbar-brand">
                        <ul id="navbrand">
                            <li id="navbrand-item">
                                <span class="glyphicon glyphicon-th-list hidden-lg" onclick="openNav()"></span>
                            </li>
                            <li id="navbrand-item">
                                <a href="{{'/'}}"><img src="/image/logo4.png"></a>
                            </li>
                        </ul>
                    </div>
                    @else
                    <div class="navbar-brand">
                        <ul id="navbrand">
                            <li id="navbrand-item">
                                <span class="glyphicon glyphicon-th-list hidden-lg" onclick="openNav()"></span>
                            </li>
                            <li id="navbrand-item">
                                <a href="{{'/calendar'}}"><img src="/image/logo4.png"></a>
                            </li>
                        </ul>
                    </div>
                    @endguest
                <!--</div>-->
                <!-- Sidebar -->
                    <div id="sidebar-wrapper">
                        <ul class="sidebar-nav">
                            <li class="sidebar-brand">
                                <a href="#">
                                    Menus
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
                                    <a href="{{route('people.index')}}"><span class="glyphicon glyphicon-user"></span> 同行者リスト</a>
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
                            @endguest
                                <li>
                                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </li>
                            </li>
                        </ul>
                    </div>
                    <!-- /#sidebar-wrapper -->
                    <ul class="nav navbar-nav navbar-right visible-lg">
                            <!-- Authentication Links -->
                            @guest
                                <li><a href="{{ route('login') }}">ログイン</a></li>
                                <li><a href="{{ route('register') }}">新規登録</a></li>
                            @else
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
                                    <a href="{{route('people.index')}}"><span class="glyphicon glyphicon-user"></span> 同行者リスト</a>
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
                            @endguest
                        </ul>
                        <button class="btn btn-link btn-sm navbar-right"  data-toggle="modal" data-target="#sampleModal2" id="help-button">
    	                <h4><span class ="howtouse glyphicon glyphicon-question-sign"></span></h4>
                        </button>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="modal fade" id="sampleModal2" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
			<center>
			<h4 class="modal-title">使い方</h4></h4>
			</center>
			</div>
			<center>
			<div class="modal-body">
				<div style="color:#004986;">『記録をつける』</div>
				  ✔ 行ったお店や一緒に行った人、使った金額、お店についてのコメントなどを記録します。その日に撮った写真も一緒に投稿してみましょう！<br><hr>
				<div style="color:#004986;">『カレンダー』</div>
				  ✔ 投稿の詳細ページへ行くことができます。誰と行ったのか、どんなお店だったのかなどの細かい情報まで確認したいときに活用しましょう。<br>
				  ✔ "会社" や "友達" など同行者によって色分けが可能なので、一目でどんな人と行ったのかを確認可能です。<br>
				  ✔ 外食で使った金額の月ごとの合計が確認できるので、外食費の管理もできます。<br><hr>
				<div style="color:#004986;">『投稿一覧＆検索機能』</div>
				  ✔ 投稿の一覧をタイムライン形式で確認することができます。行ったお店や使った金額をパッと確認したいときに便利です。<br>
				  ✔ 検索機能もあるので、店の名前や同行者、値段などで検索して特定の投稿を探すことも可能です。<br><hr>
				<div style="color:#004986;">『お気に入り』</div>
				  ✔ また行きたい！と思ったお店や思い出深い記録はお気に入りして、<br>
				  自分だけの『お気に入りリスト』を作りましょう。<br><hr>
				<div style="color:#004986;">『同行者リスト』</div>
				  ✔ 誰とどこに何回行ったかを確認することができます。<br>
				  久しぶりのあの人やおなじみのあの人と、素敵なお店に行きましょう！<br><hr>
				<div style="color:#004986;">『編集機能』</div>
				  ✔ 記録内容を間違えてしまっても大丈夫。<br>
				  各投稿は編集できるので、正確な情報を記録していきましょう。
			
				 <br><br><hr>
				
				賢く楽しい外食ライフを！
			</div>
			</center>
			
			<div class="modal-footer">
				<center><a class="btn btn-primary" href="{{route('posts.create')}}">記録をつける</a> </center>
			</div>
			
		</div>
	</div>
</div>