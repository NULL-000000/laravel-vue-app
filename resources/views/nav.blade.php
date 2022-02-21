<!-- Header Start -->
<header class="site-header">
    <div class="wrapper site-header__wrapper">
        {{-- <a href="/" class="brand"><i class="far fa-sticky-note mr-1"></i>TO DO SENGEN</a> --}}
        <a class="icon" href="/">
            <img src="{{ asset('images/to-do-sengen_icon.png') }}" alt="">
        </a>
        <nav class="nav">
            <ul class="nav__wrapper">
                @guest
                    <li class="nav__item"><a href="/">ホーム</a></li>
                    <li class="nav__item"><a href="{{ route('register') }}">ユーザー登録</a></li>
                    <li class="nav__item"><a href="{{ route('login') }}">ログイン</a></li>
                    <li class="nav__item"><a href="{{ route('login.guest') }}">ゲストログイン</a></li>
                @endguest

                @auth
                    <li class="nav__item">
                        <!-- 検索フォーム -->
                        <form method="GET" action="{{ route('articles.search') }}"
                            class="d-none d-md-flex input-group w-auto mx-auto search">
                            <input autocomplete="off" type="text" class="form-control rounded" placeholder='検索...'
                                name="keyword" />
                            <button type="submit" class="input-group-text border-0"><i class="fas fa-search"></i></button>
                        </form>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('articles.create') }}"><i class="fas fa-pen mr-1"></i>投稿</a>
                    </li>
                    <!-- Dropdown -->
                    <li class="nav__item dropdown">
                        <a class="nav__link dropdown-toggle p-3" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            @if (empty($navuser))
                                {{-- $navuserが存在しない場合は$user->image --}}
                                @if ($user->image)
                                    <img src="{{ $user->image }}" alt="Contact Person"
                                        class="img-fuild rounded-circle btn btn-outline-dark waves-effect m-0 p-0"
                                        width="35" height="35"
                                        style="background-position:center; border-radius:50%; object-fit:cover;" />
                                @else
                                    <img src="https://images.unsplash.com/photo-1531934788018-04c3cd417b80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3436&q=80"
                                        alt="Contact Person"
                                        class="img-fuild rounded-circle btn btn-outline-dark waves-effect m-0 p-0"
                                        width="35" height="35"
                                        style="background-position:center; border-radius:50%; object-fit:cover;" />
                                @endif
                            @elseif (!empty($navuser))
                                {{-- $navuserが存在する場合は$navuser->image --}}
                                @if ($navuser->image)
                                    <img src="{{ $navuser->image }}" alt="Contact Person"
                                        class="img-fuild rounded-circle btn btn-outline-dark waves-effect m-0 p-0"
                                        width="35" height="35"
                                        style="background-position:center; border-radius:50%; object-fit:cover;" />
                                @else
                                    <img src="https://images.unsplash.com/photo-1531934788018-04c3cd417b80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3436&q=80"
                                        alt="Contact Person"
                                        class="img-fuild rounded-circle btn btn-outline-dark waves-effect m-0 p-0"
                                        width="35" height="35"
                                        style="background-position:center; border-radius:50%; object-fit:cover;" />
                                @endif
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-primary"
                            aria-labelledby="navbarDropdownMenuLink">
                            <button class="dropdown-item" type="button"
                                onclick="location.href='{{ route('users.show', ['name' => Auth::user()->name]) }}'">
                                マイページ
                            </button>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" type="button"
                                onclick="location.href='{{ route('articles.create') }}'">
                                新規投稿
                            </button>
                            <div class="dropdown-divider"></div>
                            <button form="logout-button" class="dropdown-item" type="submit">
                                ログアウト
                            </button>
                        </div>
                    </li>
                    <form id="logout-button" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
                    <!-- Dropdown -->
                @endauth
            </ul>

            <ul class="menu__wrapper">
                <li class="nav__item">
                    <button type="button" class="menu-btn" v-on:click="open=!open">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                </li>
            </ul>

            @guest
                <div class="menu" v-bind:class="{'is-active' : open }">
                    <div class="menu__item">
                        <a href="/"><i class="fas fa-pen mr-1"></i>ホーム</a>
                    </div>
                    <div class="menu__item">
                        <a href="{{ route('register') }}">ユーザー登録</a>
                    </div>
                    <div class="menu__item">
                        <a href="{{ route('login') }}">ログイン</a>
                    </div>
                    <div class="menu__item">
                        <a href="{{ route('login.guest') }}">ゲストログイン</a>
                    </div>
                </div>
            @endguest

            @auth
                <div class="menu" v-bind:class="{'is-active' : open }">
                    <div class="menu__item">
                        <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}"><i
                                class="fas fa-pen mr-1"></i>マイページ</a>
                    </div>
                    <div class="menu__item">
                        <a href="{{ route('articles.search') }}"><i class="fas fa-search mr-1"></i>検索</a>
                    </div>
                    <div class="menu__item">
                        <a href="{{ route('articles.create') }}"><i class="fas fa-pen mr-1"></i>投稿</a>
                    </div>
                    <div class="menu__item">
                        <form name="logout" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="javascript:logout.submit()"><i class="fas fa-pen mr-1"></i>ログアウト</a>
                        </form>
                    </div>
                </div>
            @endauth
        </nav>
    </div>
</header>
<!-- Header End -->
