@extends('client.layout.app')

@section('title')
    <title>
        Bài viết của {{ auth()->user()->name }}
    </title>
    <meta name="description" content="Bài viết của {{ auth()->user()->name }}" />
@endsection

@section('body')
    <x-breadcrumb />

    <div class="row mb-5">
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
            <div class="card border-0 border-top border-warning border-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h1 class="h4 text-danger">Sửa bài viết {{ $data->title }}</h1>

                        <div>
                            <a class="btn btn-primary" href=""><i class="fas fa-plus me-1"></i> Đăng bài mới</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-4">
                <div>
                    <form action="{{ route('articles.update', ['id' => $data->id]) }}" method="post"
                        enctype='multipart/form-data'>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Tiêu đề</label>
                            <input required type="text" value="{{ $data->title }}" class="form-control" name="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ảnh</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Danh mục bài viết</label>
                            <select name="category_id" class="form-select">
                                @foreach ($categories as $value)
                                    @if ($value->id == $data->category->id)
                                        <option selected value="{{ $value->id }}">{{ $value->name }}
                                        </option>
                                    @else
                                        <option value="{{ $value->id }}">{{ $value->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tags</label>
                            <select multiple required id="tags" name="tags[]" class="form-select">
                                @foreach ($tags as $value)
                                    <option
                                        @foreach ($data->tags as $item)
                                        @selected($value->id == $item->id) @endforeach
                                        value="{{ $value->id }}">
                                        {{ $value->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea required name="description" value="{{ $data->description }}" class="form-control">{{ $data->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nội dung</label>
                            <textarea id="summernote" required name="content" value="{{ $data->content }}" class="form-control">{{ $data->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Xác nhận sửa</button>
                    </form>
                </div>
            </div>


        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
            <x-search />
        </div>
    </div>
@endsection
