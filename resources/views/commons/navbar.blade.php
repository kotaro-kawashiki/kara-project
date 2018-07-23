<div role="document" data-spy="scroll" data-target="#sampleScrollSpy" data-offset="160" id="top">
    <div id="sampleScrollSpy">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!--<div class="navbar-header">-->
                    <!-- Branding Image -->
                    @guest
                    <a class="navbar-brand" href="{{ url('/') }}">
                        めし日和
                    </a>
                    @else
                    <a class="navbar-brand"onclick="openNav()">
                        めし日和
                    </a>
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
                        <button class="btn btn-link btn-sm navbar-right"  data-toggle="modal" data-target="#sampleModal2">
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
				『記録をつける』</br>
				  行ったお店や一緒に行った人、使った金額、お店についてのコメントなどを記録します。その日に撮った写真も一緒に投稿してみましょう！<br><br>
				『カレンダー』<br>
				  投稿の詳細ページへ行くことができます。誰と行ったのか、どんなお店だったのかなどの細かい情報まで確認したいときに活用しましょう。<br><br>
				『投稿一覧』<br>
				  投稿の一覧をタイムライン形式で確認することができます。行ったお店や使った金額をパッと確認したいときに便利です。検索機能もあるので、特定の投稿を探すことも可能です。<br><br>
				『お気に入り』<br>
				  また行きたい！と思ったお店や思い出深い記録はお気に入りして、自分だけの『お気に入りリスト』を作りましょう！<br><br>
				『人リスト』<br>
				  誰とどこに何回行ったかを確認することができます。久しぶりのあの人やおなじみのあの人と、素敵なお店に行きましょう！<br><br>
				『編集機能』<br>
				  記録内容を間違えてしまっても大丈夫！各投稿は編集できるので、正確な情報を記録していきましょう。<br><br>
				『外食費管理』<br>
				  外食で使った金額の月ごとの合計が確認できるので、外食費の管理にも活用できます。<br><br><br>
				
				賢く楽しい外食ライフを！
			</div>
			</center>
			
			<div class="modal-footer">
				<center><a class="btn btn-primary" href="{{route('posts.create')}}">記録をつける</a> </center>
			</div>
			
		</div>
	</div>
</div>