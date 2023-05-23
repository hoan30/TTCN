@extends('client.layout.app')

@section('title')
    <title>
        Bài viết theo tags
    </title>
    <meta name="description" content="tat ca bai viet" />
@endsection

@section('body')
    <x-breadcrumb />

    <div class="p-body-header">
        <div class="p-title ">
            <h1 class="p-title-value">
                Tags
            </h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
            <div class="card border-0 border-top border-warning border-3">
                <div class="card-body">
                    <div>
                        <h1 class="h4 text-danger">Tags: {{ $tag }}</h3>
                    </div>
                    <div class="structItemContainer">
                        @foreach ($data as $value)
                            <div class="structItem structItem--thread js-inlineModContainer js-threadListItem-3405">
                                <div class="structItem-cell structItem-cell--icon">
                                    <div class="structItem-iconContainer">
                                        <a href="{{ route('show_blog', ['slug' => $value->slug]) }}"
                                            class="avatar avatar--s">
                                            <img src="/storage/admin/{{ $value->image }}" class="avatar-u7099-s"
                                                width="48" height="48" loading="lazy">
                                        </a>
                                    </div>
                                </div>
                                <div class="structItem-cell structItem-cell--main" data-xf-init="touch-proxy">
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
                                                <a href="{{ route('show_blog', ['slug' => $value->slug]) }}">
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
                                <div class="structItem-cell structItem-cell--icon structItem-cell--iconEnd">
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
            </div>

            <div class="mt-3 d-flex justify-content-end">
                {!! $data->links() !!}
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <x-search />
        </div>
    </div>
@endsection
