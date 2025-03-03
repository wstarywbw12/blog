@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Wellcome to Blog</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-4">
                    <div class="card" style="width: 20rem;">
                        <img class="px-3 pt-3" src="https://alwaysngoding.com/media/belajar/thumb/php.png" height="180px"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ $blog->content }}</p>
                            <a href="{{ route('show', $blog->id) }}" class="form-control btn btn-outline-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div><!-- /.container-fluid -->
@endsection
