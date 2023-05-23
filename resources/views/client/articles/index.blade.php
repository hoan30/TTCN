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
                        <h1 class="h4 text-danger">Bài viết của {{ auth()->user()->name }}</h1>

                        <div>
                            <a class="btn btn-primary" href="{{ route('articles.create') }}"><i class="fas fa-plus me-1"></i>
                                Đăng bài mới</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-4">
                <div>
                    <table class="table table-hover table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">
                                    <div class="width-max-content">Lượt xem</div>
                                </th>
                                <th scope="col">Tạo lúc</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                                <tr>
                                    <th>
                                        <a href="{{ $value->slug }}" target="_blank">
                                            {{ $value->title }}
                                        </a>
                                    </th>
                                    <td>
                                        {{ $value->category->name }}
                                    </td>
                                    <td>
                                        {{ $value->view }}
                                    </td>
                                    <td>
                                        {{ $value->created_at }}
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('articles.edit', ['id' => $value->id]) }}">
                                                <i class="far fa-edit text-success"></i>
                                            </a>
                                            <a href=""
                                                onclick="event.preventDefault(); deleteArticle('{{ $value->id }}')"
                                                class="mx-2">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </a>
                                            <form id="delete-form-{{ $value->id }}"
                                                action="{{ route('articles.delete', ['id' => $value->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
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

    <script>
        function deleteArticle(id) {
            if (confirm('Are you sure you want to delete this article?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
@endsection
