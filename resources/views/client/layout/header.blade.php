<header class="p-header" id="header">
    <div class="p-header-inner">
        <div class="p-header-content">
            <div class="p-header-logo p-header-logo--image">
                <a href="/" class="focus-logo">
                    <span class="focus-logo--image">
                        <img src="{{ env('APP_URL') }}/client/images/phuot_custom_stuff/logo_P_trans_red_100_text.png" />
                    </span>
                </a>
            </div>

            <nav class="focus-wrap-nav">
                <div class="p-nav-scroller hScroller" data-xf-init="h-scroller" data-auto-scroll=".p-navEl.is-selected">
                    <div class="hScroller-scroll">
                        <ul class="p-nav-list js-offCanvasNavSource">
                            <li>
                                <div class="p-navEl dropdown">
                                    <a href="#" class="p-navEl-link p-navEl-link--splitMenu dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">DANH MỤC</a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        @foreach ($categories as $value)
                                            <li><a class="dropdown-item"
                                                    href="/categories?category={{ $value->slug }}">{{ $value->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="p-navEl" data-has-children="true">
                                    <a href="{{ route('get_all_blogs') }}"
                                        class="p-navEl-link p-navEl-link--splitMenu">BÀI MỚI</a>
                                    <a class="p-navEl-splitTrigger" role="button" tabindex="0"
                                        aria-label="Toggle expanded" aria-expanded="false" aria-haspopup="true"></a>
                                    <div class="menu menu--structural" data-menu="menu" aria-hidden="true">
                                        <div class="menu-content">
                                            <a href="/whats-new/posts/"
                                                class="menu-linkRow u-indentDepth0 js-offCanvasCopy" rel="nofollow"
                                                data-nav-id="whatsNewPosts">New posts</a>
                                            <a href="/whats-new/profile-posts/"
                                                class="menu-linkRow u-indentDepth0 js-offCanvasCopy" rel="nofollow"
                                                data-nav-id="whatsNewProfilePosts">New profile posts</a>
                                            <a href="/whats-new/latest-activity"
                                                class="menu-linkRow u-indentDepth0 js-offCanvasCopy" rel="nofollow"
                                                data-nav-id="latestActivity">Latest activity</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="p-navEl" data-has-children="true">
                                    <a href="#" class="p-navEl-link p-navEl-link--splitMenu"
                                        data-nav-id="lap_team">LÊN CUNG</a>
                                    <a data-xf-key="3" data-xf-click="menu" data-menu-pos-ref="< .p-navEl"
                                        class="p-navEl-splitTrigger" role="button" tabindex="0"
                                        aria-label="Toggle expanded" aria-expanded="false" aria-haspopup="true"></a>
                                    <div class="menu menu--structural" data-menu="menu" aria-hidden="true">
                                        <div class="menu-content">
                                            <a href="/forums/cung-trong-nuoc.160/"
                                                class="menu-linkRow u-indentDepth0 js-offCanvasCopy"
                                                data-nav-id="0">Cung TRONG NƯỚC</a>
                                            <a href="/forums/goc-cua-dom.177/"
                                                class="menu-linkRow u-indentDepth1 js-offCanvasCopy" data-nav-id="0">Góc
                                                của Dỏm</a>
                                            <hr class="menu-separator" />
                                            <a href="/forums/cung-ngoai-nuoc.134/"
                                                class="menu-linkRow u-indentDepth0 js-offCanvasCopy"
                                                data-nav-id="1">Cung NGOÀI NƯỚC</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="p-navEl" data-has-children="true">
                                    <a href="#" class="p-navEl-link p-navEl-link--splitMenu"
                                        data-nav-id="cho_phuot">CHỢ PHƯỢT</a>
                                    <a data-xf-key="4" data-xf-click="menu" data-menu-pos-ref="< .p-navEl"
                                        class="p-navEl-splitTrigger" role="button" tabindex="0"
                                        aria-label="Toggle expanded" aria-expanded="false" aria-haspopup="true"></a>
                                    <div class="menu menu--structural" data-menu="menu" aria-hidden="true">
                                        <div class="menu-content">
                                            <a href="/forums/cho-trang-phuc-phuot.178/"
                                                class="menu-linkRow u-indentDepth0 js-offCanvasCopy"
                                                data-nav-id="0">Chợ: Trang phục phượt</a>
                                            <a href="/forums/cho-do-phuot.179/"
                                                class="menu-linkRow u-indentDepth0 js-offCanvasCopy"
                                                data-nav-id="1">Chợ: Đồ phượt</a>
                                            <a href="/forums/cho-may-anh-do-hitech.180/"
                                                class="menu-linkRow u-indentDepth0 js-offCanvasCopy"
                                                data-nav-id="2">Chợ: Máy ảnh, Đồ Hitech</a>
                                            <a href="/forums/cho-xe-co.181/"
                                                class="menu-linkRow u-indentDepth0 js-offCanvasCopy"
                                                data-nav-id="3">Chợ: Xe cộ</a>
                                            <a href="/forums/dich-vu-cho-thue-xe.182/"
                                                class="menu-linkRow u-indentDepth1 js-offCanvasCopy"
                                                data-nav-id="0">Dịch vụ cho thuê xe</a>
                                            <hr class="menu-separator" />
                                            <a href="/forums/tour-dich-vu-du-lich.148/"
                                                class="menu-linkRow u-indentDepth0 js-offCanvasCopy"
                                                data-nav-id="4">Tour - Dịch vụ du lịch</a>
                                            <a href="/forums/tour.79/"
                                                class="menu-linkRow u-indentDepth1 js-offCanvasCopy"
                                                data-nav-id="0">Tour</a>
                                            <hr class="menu-separator" />
                                            <a href="/forums/cho-dan-sinh.125/"
                                                class="menu-linkRow u-indentDepth0 js-offCanvasCopy"
                                                data-nav-id="5">Chợ Dân sinh</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="focus-wrap-search">
                <form action="{{ route('search') }}" method="post">
                    @csrf
                    <div class="focus-search">
                        <div class="focus-search-flex">
                            <input name="keyword" placeholder="Tìm kiếm..." aria-label="Tìm kiếm"
                                data-menu-autofocus="true" type="text" />
                            <div class="focus-search-prefix">
                                <i class="fa--xf far fa-search" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="focus-wrap-user">
                <div class="p-nav-opposite">
                    <div class="p-navgroup p-account p-navgroup--guest">
                        @if (!Auth::check())
                            <a href="javascript:void(0)"
                                class="p-navgroup-link p-navgroup-link--textual p-navgroup-link--logIn"
                                data-bs-toggle="modal" data-bs-target="#exampleModalLogin">
                                <span class="p-navgroup-linkText">Login</span>
                            </a>
                            <a href="javascript:void(0)"
                                class="p-navgroup-link p-navgroup-link--textual p-navgroup-link--register"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <span class="p-navgroup-linkText">Đăng ký</span>
                            </a>
                        @else
                            <div class="dropdown-center">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>
                                        <img width="23" class="rounded-circle"
                                            src="{{ env('APP_URL') }}/{{ auth()->user()->avatar ? 'storage/admin/' . auth()->user()->avatar : 'client/images/avatar.png' }}" />
                                    </span>
                                    {{ auth()->user()->name }}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"></a></li>
                                    <li><a class="dropdown-item" href="{{ route('articles.create') }}">Đăng bài</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('articles') }}">Bài viết của tôi</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item" href="#">Đăng
                                                xuất</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif
                        <a href="/misc/style?style_id=10&amp;t=1684425738%2C70f1effd4bb3e0428a0081f2ed21d8ce"
                            data-xf-init="tooltip" title="Dark mode" class="p-navgroup-link xenfocus-navgroup-icon">
                            <i class="fa--xf far fa-moon" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="p-navgroup p-discovery">
                        <a href="/whats-new/"
                            class="p-navgroup-link p-navgroup-link--iconic p-navgroup-link--whatsnew"
                            aria-label="What&#039;s new" title="What&#039;s new">
                            <i aria-hidden="true"></i>
                            <span class="p-navgroup-linkText">What's new</span>
                        </a>
                        <a href="/search/" class="p-navgroup-link p-navgroup-link--iconic p-navgroup-link--search"
                            data-xf-click="menu" data-xf-key="/" aria-label="Tìm kiếm" aria-expanded="false"
                            aria-haspopup="true" title="Tìm kiếm" data-xf-init="tooltip">
                            <i aria-hidden="true"></i>
                        </a>
                        <div class="menu menu--structural menu--wide" data-menu="menu" aria-hidden="true">
                            <form action="/search/search" method="post" class="menu-content"
                                data-xf-init="quick-search">
                                <h3 class="menu-header">Tìm kiếm</h3>
                                <div class="menu-row">
                                    <input type="text" class="input" name="keywords" placeholder="Tìm kiếm..."
                                        aria-label="Tìm kiếm" data-menu-autofocus="true" />
                                </div>
                                <div class="menu-row">
                                    <label class="iconic"><input type="checkbox" name="c[title_only]"
                                            value="1" /><i aria-hidden="true"></i><span
                                            class="iconic-label">Search titles only
                                            <span tabindex="0" role="button" data-xf-init="tooltip"
                                                data-trigger="hover focus click" title="Tags will also be searched">
                                                <i class="fa--xf far fa-question-circle u-muted u-smaller"
                                                    aria-hidden="true"></i> </span></span></label>
                                </div>
                                <div class="menu-row">
                                    <div class="inputGroup">
                                        <span class="inputGroup-text" id="ctrl_search_menu_by_member">By:</span>
                                        <input type="text" class="input" name="c[users]"
                                            data-xf-init="auto-complete" placeholder="Member"
                                            aria-labelledby="ctrl_search_menu_by_member" />
                                    </div>
                                </div>
                                <div class="menu-footer">
                                    <span class="menu-footer-controls">
                                        <button type="submit"
                                            class="button--primary button button--icon button--icon--search">
                                            <span class="button-text">Tìm kiếm</span>
                                        </button>
                                        <a href="/search/" class="button"><span class="button-text">Advanced
                                                search...</span></a>
                                    </span>
                                </div>
                                <input type="hidden" name="_xfToken"
                                    value="1684425738,70f1effd4bb3e0428a0081f2ed21d8ce" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="p-navSticky p-navSticky--primary" data-xf-init="sticky-header">
    <div class="p-nav">
        <div class="p-nav-inner">
            <div class="focus-mobile-navigation">
                <button type="button" class="button--plain p-nav-menuTrigger button" data-xf-click="off-canvas"
                    data-menu=".js-headerOffCanvasMenu" tabindex="0" aria-label="Menu">
                    <span class="button-text">
                        <i aria-hidden="true"></i>
                        <span class="p-nav-menuText">Menu</span>
                    </span>
                </button>
                <div class="focus-mobile-logo">
                    <a href="/forums/">FORUM</a>
                </div>
            </div>
            <div class="focus-wrap-user hide:desktop">
                <div class="p-nav-opposite">
                    <div class="p-navgroup p-account p-navgroup--guest">
                        {{-- @if (Auth::check())
                            <a href="/login/" class="p-navgroup-link p-navgroup-link--textual p-navgroup-link--logIn"
                                data-xf-click="overlay" data-follow-redirects="on">
                                <span class="p-navgroup-linkText">Đăng nhập</span>
                            </a>
                            <a href="/register/"
                                class="p-navgroup-link p-navgroup-link--textual p-navgroup-link--register"
                                data-xf-click="overlay" data-follow-redirects="on">
                                <span class="p-navgroup-linkText">Đăng ký</span>
                            </a>
                        @else

                        @endif --}}

                        <a href="/misc/style?style_id=10&amp;t=1684425738%2C70f1effd4bb3e0428a0081f2ed21d8ce"
                            data-xf-init="tooltip" title="Dark mode" class="p-navgroup-link xenfocus-navgroup-icon">
                            <i class="fa--xf far fa-moon" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="p-navgroup p-discovery">
                        <a href="/whats-new/"
                            class="p-navgroup-link p-navgroup-link--iconic p-navgroup-link--whatsnew"
                            aria-label="What&#039;s new" title="What&#039;s new">
                            <i aria-hidden="true"></i>
                            <span class="p-navgroup-linkText">What's new</span>
                        </a>
                        <a href="/search/" class="p-navgroup-link p-navgroup-link--iconic p-navgroup-link--search"
                            data-xf-click="menu" data-xf-key="/" aria-label="Tìm kiếm" aria-expanded="false"
                            aria-haspopup="true" title="Tìm kiếm" data-xf-init="tooltip">
                            <i aria-hidden="true"></i>
                        </a>
                        <div class="menu menu--structural menu--wide" data-menu="menu" aria-hidden="true">
                            <form action="/search/search" method="post" class="menu-content"
                                data-xf-init="quick-search">
                                <h3 class="menu-header">Tìm kiếm</h3>
                                <div class="menu-row">
                                    <input type="text" class="input" name="keywords" placeholder="Tìm kiếm..."
                                        aria-label="Tìm kiếm" data-menu-autofocus="true" />
                                </div>
                                <div class="menu-row">
                                    <label class="iconic"><input type="checkbox" name="c[title_only]"
                                            value="1" /><i aria-hidden="true"></i><span
                                            class="iconic-label">Search titles only
                                            <span tabindex="0" role="button" data-xf-init="tooltip"
                                                data-trigger="hover focus click" title="Tags will also be searched">
                                                <i class="fa--xf far fa-question-circle u-muted u-smaller"
                                                    aria-hidden="true"></i> </span></span></label>
                                </div>
                                <div class="menu-row">
                                    <div class="inputGroup">
                                        <span class="inputGroup-text" id="ctrl_search_menu_by_member">By:</span>
                                        <input type="text" class="input" name="c[users]"
                                            data-xf-init="auto-complete" placeholder="Member"
                                            aria-labelledby="ctrl_search_menu_by_member" />
                                    </div>
                                </div>
                                <div class="menu-footer">
                                    <span class="menu-footer-controls">
                                        <button type="submit"
                                            class="button--primary button button--icon button--icon--search">
                                            <span class="button-text">Tìm kiếm</span>
                                        </button>
                                        <a href="/search/" class="button"><span class="button-text">Advanced
                                                search...</span></a>
                                    </span>
                                </div>
                                <input type="hidden" name="_xfToken"
                                    value="1684425738,70f1effd4bb3e0428a0081f2ed21d8ce" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-sectionLinks p-sectionLinks--empty"></div>

</div>
