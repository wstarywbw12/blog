@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Blog</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="fw-bold" id="blog-title">{{ $blog->title }}</h3>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="https://alwaysngoding.com/media/belajar/thumb/php.png" alt="Blog Image" class="img-fluid" style="max-width: 200px; border-radius: 10px;">
                </div>
                <p class="badge bg-primary" id="blog-category">{{ $blog->categorie }}</p>
                <p class="mt-3" id="blog-content">
                    {{ $blog->content }}
                </p>
            </div>
        </div>

         <!-- Form Tambah Komentar -->
         <div class="card mt-4">
            <div class="card-header">
                <h5>Tambah Komentar</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <textarea class="form-control" id="comment-input" rows="3" placeholder="Tambahkan komentar..." required></textarea>
                </div>
                <button class="btn btn-primary" id="add-comment">Kirim</button>
            </div>
        </div>

        <!-- List Komentar -->
        <div class="card mt-4">
            <div class="card-header">
                <h5>Komentar</h5>
            </div>
            <div class="card-body" id="comment-list">
                <p class="text-muted">Belum ada komentar.</p>
            </div>
        </div>

          {{-- list comment --}}
    </div><!-- /.container-fluid -->



    <script>
        $(document).ready(function() {
            $("#add-comment").click(function() {
                let commentText = $("#comment-input").val().trim();
                
                if (commentText !== "") {
                    let commentHtml = `
                        <div class="mb-3 p-3 border rounded">
                            <strong>Pengguna</strong>
                            <p class="mb-0">${commentText}</p>
                            <small class="text-muted">Baru saja</small>
                        </div>
                    `;

                    if ($("#comment-list p.text-muted").length) {
                        $("#comment-list").html("");
                    }

                    $("#comment-list").append(commentHtml);
                    $("#comment-input").val(""); 
                }
            });
        });
    </script>
@endsection
