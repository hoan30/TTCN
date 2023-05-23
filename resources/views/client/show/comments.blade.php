{{-- @foreach ($comments as $comment)
    <div>
        <p>Comment ID: {{ $comment->id }}</p>
        <p>Comment Content: {{ $comment->content }}</p>
        @if ($comment->childComments->isNotEmpty())
            <div class="child-comments">
                @include('comments', ['comments' => $comment->childComments])
            </div>
        @endif
    </div>
@endforeach --}}

@foreach ($comments as $key => $value)
    @php
        $id = rand(100, 1000) * rand(10, 100) * $value->id;
    @endphp
    <div class="mt-3">
        @if ($value->comment_id == 0)
            <div class="d-flex row mt-4 ">
                <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                @else
                    <div class="d-flex row justify-content-end">
                        <div class="col-11">
        @endif

        {{-- $value->childComments->isNotEmpty() --}}
        <div @class([
            'd-flex flex-column comment-section',
            'border-3 border-top border-info' => $value->comment_id == 0,
        ])>
            <div class="bg-white p-2">
                <div class="d-flex flex-row user-info align-items-center">
                    <img class="rounded-circle img-thumbnail me-2" src="{{ config('app.link') . $value->user->avatar }}"
                        width="40">
                    <div class="d-flex flex-column justify-content-start ml-2"><span
                            class="d-block font-weight-bold name">{{ $value->user->name }}</span><span
                            class="date text-black-50">{{ $value->created_at }}</span></div>
                </div>
                <div class="mt-2">
                    <p class="comment-text ms-5">
                        {{ $value->content }}
                    </p>
                </div>
            </div>
            <div class="bg-white">
                <hr class="hr m-0 p-0" />
                <div class="d-flex flex-row fs-12 justify-content-end">
                    @if (Auth::check())
                        <div class="like p-2 cursor" data-bs-toggle="collapse"
                            href="#collapseExample{{ $id }}" role="button" aria-expanded="false"
                            aria-controls="collapseExample{{ $id }}">
                            <i class="fas fa-comments"></i> <span class="ml-1">Trả lời</span>
                        </div>
                    @else
                        <div class="like p-2 cursor" onclick="alert('Đăng nhập để bình luận')">
                            <i class="fas fa-comments"></i> <span class="ml-1">Trả lời</span>
                        </div>
                    @endif

                    <div class="like p-2 cursor">
                        <i class="fa fa-share"></i> <span class="ml-1">Chia sẻ</span>
                    </div>
                </div>
            </div>
            @if (Auth::check())
                <div class="bg-light p-2 collapse" id="collapseExample{{ $id }}">
                    <div class="d-flex flex-row align-items-start">
                        <img class="rounded-circleme-1 rounded-circle img-thumbnail"
                            src="{{ auth()->user()->avatar ? 'storage/admin/' . auth()->user()->avatar : 'client/images/avatar.png' }}"
                            width="35">
                        <div class="ms-2 w-100">
                            <div>
                                <span class="fw-bold">{{ auth()->user()->name }}</span>
                            </div>
                            <textarea class="form-control ml-1 shadow-none textarea w-100" id="content{{ $id }}"
                                name="content{{ $id }}"></textarea>
                        </div>
                    </div>
                    <div class="mt-2 text-right d-flex justify-content-end">
                        <button class="btn btn-primary" type="button"
                            onclick="comments({{ auth()->user()->id }},{{ $value->id }}, {{ $id }}, {{ $value->article_id }})">
                            Trả lời
                        </button>
                        <button class="btn btn-outline-primary ms-2" type="button" data-bs-toggle="collapse"
                            href="#collapseExample{{ $id }}" role="button" aria-expanded="false"
                            aria-controls="collapseExample{{ $id }}">Hủy</button>
                    </div>
                </div>
            @endif

            @if ($value->childComments->isNotEmpty())
                <div class="child-comments">
                    @include('client.show.comments', ['comments' => $value->childComments])
                </div>
            @endif
        </div>
    </div>
    </div>
    </div>
@endforeach
