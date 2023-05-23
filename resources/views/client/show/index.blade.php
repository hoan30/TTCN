@extends('client.layout.app')

@section('title')
    <title>
        {{ $data->title }}
    </title>
    <meta name="description" content="{{ $data->description }}" />
@endsection

@section('body')
    <x-breadcrumb />

    <div class="p-body-header">
        <div class=" ">
            <h1 class="p-title-value">
                {{ $data->title }}
            </h1>
            <div>
                <span>
                    <a class="text-secondary me-1" href="">
                        {{ $data->user->name }} -
                    </a>
                </span>
                <span>
                    <a class="text-secondary me-1" href="">
                        {{ $data->created_at }} -
                    </a>
                </span>
                <span>
                    <a class="text-secondary me-2" href="">
                        {{ $data->category->name }}
                    </a>
                </span>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
            <div class="card">
                <div class="card-body">
                    <div>
                        <span class="text-secondary me-2">{{ $data->created_at }}</span>
                        <span class="text-secondary"><i class="fas fa-eye"></i> {{ $data->view }}</span>
                    </div>
                    <div class="mt-5">
                        <p>
                            {!! $data->content !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <x-search />
        </div>
    </div>

    <div class="mt-2">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                <div class="widget-area no-padding blank">
                    <div class="status-upload">
                        <form>
                            @php
                                $hash = $data->id * rand(10, 100) * rand(100, 10000);
                            @endphp
                            <textarea placeholder="Nhập bình luận" id="content{{ $hash }}" name="content"></textarea>
                            @if (Auth::check())
                                <button type="button" class="btn btn-primary green mb-2"
                                    onclick="comments({{ auth()->user()->id }},{{ '0' }}, {{ $hash }}, {{ $data->id }})"><i
                                        class="fa fa-share"></i> Bình
                                    luận</button>
                            @else
                                <button type="button" class="btn btn-primary green mb-2"
                                    onclick="alert('Đăng nhập để bình luận')"><i class="fa fa-share"></i> Bình
                                    luận</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="comment">
        @include('client.show.comments', ['comments' => $data->parentComments])
    </div>

    <div class="mb-5"></div>

    <script>
        function comments(user_id, comment_id, hash, article_id) {
            var content = document.getElementById("content" + hash).value;
            if (content === null || content == '' || content == null) {
                toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr.error("Vui lòng nhập bình luận của bạn")
                return;
            }
            $_token = "{{ csrf_token() }}";
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name=_token]').attr('content')
                },
                url: "{{ url('/comments') }}",
                type: 'POST',
                cache: false,
                data: {
                    'user_id': user_id,
                    'article_id': article_id,
                    'comment_id': comment_id,
                    'content': content,
                    '_token': $_token
                },
                datatype: 'html',
                beforeSend: function() {},
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $('#comment').html(data.data);
                        toastr.options = {
                            "closeButton": true,
                            "debug": true,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr.success("Cảm ơn bình luận của bạn.")
                        document.getElementById("content" + hash).value = '';
                    } else {

                    }
                },
                error: function(xhr, textStatus, thrownError) {
                    alert(xhr + "\n" + textStatus + "\n" + thrownError);
                }
            });
        }
    </script>
@endsection
