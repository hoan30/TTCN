@extends('client.layout.app')

@section('title')
    <title>
        Tìm kiếm bài viết
    </title>
    <meta name="description" content="Tìm kiếm bài viết" />
@endsection

@section('body')
    <x-breadcrumb />

    <div class="p-body-header">
        <div class=" ">
            <h1 class="p-title-value">
                Hiển thị kết quả tìm kiếm cho: {{ $keyword }}
            </h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 border-top border-warning border-3">
                <div class="card-body">
                    <div>
                        {{-- <h1 class="h4 text-danger">Bài mới nhất</h3> --}}
                    </div>
                    <div class="structItemContainer">
                        @foreach ($data as $value)
                            <ol class="block-body">
                                <li class="block-row block-row--separated  js-inlineModContainer">
                                    <div class="contentRow ">
                                        <span class="contentRow-figure">
                                            <a href=""
                                                class="avatar avatar--s avatar--default avatar--default--dynamic"
                                                style="background-color: #ebadad; color: #b82e2e" id="js-XFUniqueId7">
                                                <span class="avatar-u200971-s" role="img"
                                                    aria-label="Dauchandiadang">D</span>
                                            </a>
                                        </span>
                                        <div class="contentRow-main">
                                            <h3 class="contentRow-title">
                                                <a href="{{ route('show_blog', ['slug' => $value->slug]) }}"><span
                                                        class="label label--primary"
                                                        dir="auto">[{{ $value->category->name }}]</span>
                                                    <span class="label-append">&nbsp;</span>
                                                    {{ $value->title }}
                                                </a>
                                            </h3>
                                            <div class="contentRow-snippet">
                                                {{ substr($value->description, 0, 500) }}...
                                            </div>
                                            <div class="contentRow-minor contentRow-minor--hideLinks">
                                                <ul class="listInline listInline--bullet">
                                                    <li>
                                                        <a href="" class="username " id="js-XFUniqueId8">
                                                            {{ $value->user->name }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <time class="u-dt">
                                                            {{ $value->created_at }}
                                                        </time>
                                                    </li>
                                                    <li>Tags:
                                                        @foreach ($value->tags as $item)
                                                            <a class="badge text-bg-light text-light"
                                                                href="{{ route('tags', ['slug' => $item->slug]) }}">
                                                                {{ $item->name }}
                                                            </a>
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        @endforeach

                        @if (!empty($data))
                            <ol class="block-body">
                                <li class="block-row block-row--separated  js-inlineModContainer">
                                    <div class="contentRow text-center">
                                        Không có kết quả cho từ khóa <span class="text-danger ms-1">{{ $keyword }}</span>
                                    </div>
                                </li>
                            </ol>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-end">
                {!! $data->links() !!}
            </div>
        </div>
    </div>
@endsection
