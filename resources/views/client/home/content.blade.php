<div class="p-body-main p-body-main--withSidebar ">
    <div class="p-body-contentCol"></div>
    <div class="p-body-sidebarCol"></div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
            <div class="p-body-content">
                <div class="p-body-pageContent">
                    <div class="porta-articles-above-full">
                        <div class="block" data-widget-id="20" data-widget-key="whats_new_full_5"
                            data-widget-definition="new_posts">
                            <div class="block-container">
                                <h3 class="block-header">
                                    <a href="">Bài mới nhất</a>
                                </h3>
                                <div class="block-body">
                                    <div class="structItemContainer">
                                        @foreach ($news as $value)
                                            <div
                                                class="structItem structItem--thread js-inlineModContainer js-threadListItem-3405">
                                                <div class="structItem-cell structItem-cell--icon">
                                                    <div class="structItem-iconContainer">
                                                        <a href="{{ route('show_blog', ['slug' => $value->slug]) }}"
                                                            class="avatar avatar--s">
                                                            <img src="/storage/admin/{{ $value->image }}"
                                                                class="avatar-u7099-s" width="48" height="48"
                                                                loading="lazy">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="structItem-cell structItem-cell--main"
                                                    data-xf-init="touch-proxy">
                                                    <div class="structItem-title">
                                                        <a href="{{ route('show_blog', ['slug' => $value->slug]) }}">
                                                            {{ $value->title }}
                                                        </a>
                                                    </div>
                                                    <div class="structItem-minor">
                                                        <ul class="structItem-parts">
                                                            <li>
                                                                <a href="" class="username" id="js-XFUniqueId9">
                                                                    {{ $value->user->name }}
                                                                </a>
                                                            </li>
                                                            <li class="structItem-startDate">
                                                                <a
                                                                    href="{{ route('show_blog', ['slug' => $value->slug]) }}">
                                                                    <time class="u-dt">
                                                                        {{ $value->created_at }}
                                                                    </time>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="">
                                                                    {{ $value->category->name }}
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="structItem-cell structItem-cell--meta">
                                                    <dl class="pairs pairs--justified structItem-minor">
                                                        <dt>Views</dt>
                                                        <dd>{{ $value->view }}</dd>
                                                    </dl>
                                                </div>
                                                <div class="structItem-cell structItem-cell--latest">
                                                    <a href="">Lúc 17:01 hôm nay</time></a>
                                                    <div class="structItem-minor">
                                                        <a href="" class="username " id="js-XFUniqueId10">cao
                                                            son</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="structItem-cell structItem-cell--icon structItem-cell--iconEnd">
                                                    <div class="structItem-iconContainer">
                                                        <a href="/members/mwcr.239689/"
                                                            class="avatar avatar--xxs avatar--default avatar--default--dynamic"
                                                            id="js-XFUniqueId11">
                                                            <span class="avatar-u239689-s">M</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="block-footer">
                                    <span class="block-footer-controls">
                                        <a href="{{ route('get_all_blogs') }}" class="button"><span
                                                class="button-text">Xem thêm...</span></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="porta-articles-above-split porta-widgets-split">
                    </div>

                    <div class="block porta-articles porta-infinite porta-masonry">
                        <div class="row">
                            @foreach ($random as $value)
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                    <div class="porta-article-item">
                                        <div class="block-container porta-article-container">
                                            <a class="porta-article-header"
                                                href="{{ route('show_blog', ['slug' => $value->slug]) }}">
                                                <div class="porta-header-image"
                                                    style="background-image: url('/storage/admin/{{ $value->image }}');">
                                                </div>
                                                <div class="porta-header-text">
                                                    <span>
                                                        <span class="label label--primary" dir="auto">[Chia
                                                            sẻ]</span>
                                                        {{ $value->title }}
                                                    </span>
                                                </div>
                                            </a>
                                            <div class="block-body message-inner">
                                                <div class="message-cell message-main">
                                                    <header class="message-attribution">
                                                        <div class="message-attribution-main">
                                                            <ul class="listInline listInline--bullet">
                                                                <li>
                                                                    <i class="fa--xf far fa-user"
                                                                        aria-hidden="true"></i>
                                                                    <a href="" class="u-concealed">
                                                                        linhuhm</a>
                                                                </li>
                                                                <li>
                                                                    <i class="fa--xf far fa-clock"
                                                                        aria-hidden="true"></i>
                                                                    <a href="" class="u-concealed">
                                                                        <time class="u-dt" dir="auto">Thứ Hai
                                                                            lúc 16:29</time></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="message-attribution-opposite">
                                                            <ul class="listInline listInline--bullet">
                                                                <li>
                                                                    <i class="fa--xf far fa-eye" aria-hidden="true"></i>
                                                                    {{ $value->view }}
                                                                </li>
                                                                <li>
                                                                    <i class="fa--xf far fa-comments"
                                                                        aria-hidden="true"></i>
                                                                    6
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </header>
                                                    <div class="message-body withImage">
                                                        <div class="bbWrapper">
                                                            {{ $value->description }}
                                                        </div>
                                                        <a href="{{ route('show_blog', ['slug' => $value->slug]) }}"
                                                            class="porta-expandLink">
                                                            <div>
                                                                Xem tiếp...
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block-footer">
                                                <div class="block-footer-counter">
                                                    @foreach ($value->tags as $item)
                                                        <a href="/tags?tag={{ $item->slug }}"
                                                            class="button--link button">
                                                            <span class="button-text">
                                                                {{ $item->name }}
                                                            </span>
                                                        </a>
                                                    @endforeach
                                                </div>
                                                <div class="block-footer-controls">
                                                    <a href="{{ route('show_blog', ['slug' => $value->slug]) }}"
                                                        class="button button--icon">
                                                        <i class="fa--xf far fa-sign-in" aria-hidden="true"></i>
                                                        <span class="button-text"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="block porta-article-status" style="display: none;">
                        <div class="porta-article-ellipse infinite-scroll-request" style="display: none;">
                            <span class="loader-ellipse-dot"></span>
                            <span class="loader-ellipse-dot"></span>
                            <span class="loader-ellipse-dot"></span>
                            <span class="loader-ellipse-dot"></span>
                        </div>
                    </div>
                    <div class="block porta-article-loader" style="display: block;">
                        <button type="button" class="porta-article-button button--cta button"><span
                                class="button-text">TRANG SAU...</span></button>
                    </div>
                    <div class="block porta-article-pager" style="display: none;">
                        <div class="block-outer block-outer--after">
                            <div class="block-outer-main">
                                <nav class="pageNavWrapper pageNavWrapper--mixed ">
                                    <div class="pageNav  pageNav--skipEnd">
                                        <ul class="pageNav-main">
                                            <li class="pageNav-page pageNav-page--current "><a href="/articles/">1</a>
                                            </li>
                                            <li class="pageNav-page pageNav-page--later"><a
                                                    href="/articles/page-2">2</a>
                                            </li>
                                            <li class="pageNav-page pageNav-page--later"><a
                                                    href="/articles/page-3">3</a>
                                            </li>
                                            <li class="pageNav-page pageNav-page--skip pageNav-page--skipEnd">
                                                <a data-xf-init="tooltip" data-xf-click="menu" role="button"
                                                    tabindex="0" aria-expanded="false" aria-haspopup="true"
                                                    data-original-title="Tới trang" id="js-XFUniqueId32">...</a>
                                                <div class="menu menu--pageJump" data-menu="menu" aria-hidden="true">
                                                    <div class="menu-content">
                                                        <h4 class="menu-header">Tới trang</h4>
                                                        <div class="menu-row" data-xf-init="page-jump"
                                                            data-page-url="/articles/page-%page%">
                                                            <div class="inputGroup inputGroup--numbers">
                                                                <div class="inputGroup inputGroup--numbers inputNumber inputGroup--joined"
                                                                    data-xf-init="number-box"><input type="number"
                                                                        pattern="\d*"
                                                                        class="input input--number js-numberBoxTextInput input input--numberNarrow js-pageJumpPage"
                                                                        value="4" min="1" max="29"
                                                                        step="1" required="required"
                                                                        data-menu-autofocus="true"><button
                                                                        type="button" tabindex="-1"
                                                                        class="inputGroup-text inputNumber-button inputNumber-button--up js-up"
                                                                        data-dir="up" title="Increase"
                                                                        aria-label="Increase"></button><button
                                                                        type="button" tabindex="-1"
                                                                        class="inputGroup-text inputNumber-button inputNumber-button--down js-down"
                                                                        data-dir="down" title="Decrease"
                                                                        aria-label="Decrease"></button></div>
                                                                <span class="inputGroup-text"><button type="button"
                                                                        class="js-pageJumpGo button"><span
                                                                            class="button-text">Go</span></button></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pageNav-page "><a href="/articles/page-29">29</a></li>
                                        </ul>
                                        <a href="/articles/page-2" class="pageNav-jump pageNav-jump--next">Sau</a>
                                    </div>
                                    <div class="pageNavSimple">
                                        <a class="pageNavSimple-el pageNavSimple-el--current" data-xf-init="tooltip"
                                            data-xf-click="menu" role="button" tabindex="0" aria-expanded="false"
                                            aria-haspopup="true" data-original-title="Tới trang"
                                            id="js-XFUniqueId33">
                                            1 of 29
                                        </a>
                                        <div class="menu menu--pageJump" data-menu="menu" aria-hidden="true">
                                            <div class="menu-content">
                                                <h4 class="menu-header">Tới trang</h4>
                                                <div class="menu-row" data-xf-init="page-jump"
                                                    data-page-url="/articles/page-%page%">
                                                    <div class="inputGroup inputGroup--numbers">
                                                        <div class="inputGroup inputGroup--numbers inputNumber inputGroup--joined"
                                                            data-xf-init="number-box"><input type="number"
                                                                pattern="\d*"
                                                                class="input input--number js-numberBoxTextInput input input--numberNarrow js-pageJumpPage"
                                                                value="1" min="1" max="29"
                                                                step="1" required="required"
                                                                data-menu-autofocus="true"><button type="button"
                                                                tabindex="-1"
                                                                class="inputGroup-text inputNumber-button inputNumber-button--up js-up"
                                                                data-dir="up" title="Increase"
                                                                aria-label="Increase"></button><button type="button"
                                                                tabindex="-1"
                                                                class="inputGroup-text inputNumber-button inputNumber-button--down js-down"
                                                                data-dir="down" title="Decrease"
                                                                aria-label="Decrease"></button></div>
                                                        <span class="inputGroup-text"><button type="button"
                                                                class="js-pageJumpGo button"><span
                                                                    class="button-text">Go</span></button></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="/articles/page-2" class="pageNavSimple-el pageNavSimple-el--next">
                                            Sau <i aria-hidden="true"></i>
                                        </a>
                                        <a href="/articles/page-29" class="pageNavSimple-el pageNavSimple-el--last"
                                            data-xf-init="tooltip" data-original-title="Last" id="js-XFUniqueId34">
                                            <i aria-hidden="true"></i> <span class="u-srOnly">Last</span>
                                        </a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="porta-articles-below-full">
                    </div>
                    <div class="porta-articles-below-split porta-widgets-split">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <x-search />
        </div>
    </div>
</div>
