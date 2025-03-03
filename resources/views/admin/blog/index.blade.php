@extends('admin.layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="fas fa-folder mr-2"></i>Data Blog</h4>
                    <div>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAdd">
                            <i class="fas fa-plus"></i> Tambah Data
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="myTable" class="display table-responsive nowrap table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Categorie</th>
                            <th>Content</th>
                            <th>Comment</th>
                            <th width="17%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td width="5%" class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $blog->image }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->categorie }}</td>
                                <td>{{ $blog->content }}</td>
                                <td>
                                    @foreach ($blog->comments as $comment)
                                        {{ $comment->comment }} <br>
                                    @endforeach
                                </td>
                                <td width="17%" class="text-center">
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-warning btn-sm btn-edit" data-toggle="modal" 
                                        data-target="#modalEdit"
                                        data-id="{{ $blog->id }}"
                                        data-title="{{ $blog->title }}"
                                        data-categorie="{{ $blog->categorie }}"
                                        data-content="{{ $blog->content }}"
                                        data-image="{{ $blog->image }}">
                                        <i class="fas fa-edit"></i> Ubah
                                    </button>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus blog ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('blog.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="text" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="categorie" class="form-label">Categorie</label>
                            <select class="form-control" name="categorie" id="categorie">
                                <option value="Laravel">Laravel</option>
                                <option value="Codeigneter">Codeigneter</option>
                                <option value="Vuejs">Vuejs</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" name="content" id="content" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Data -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="formEdit" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit-id" name="id">
                        <div class="mb-3">
                            <label for="edit-image" class="form-label">Image</label>
                            <input type="text" class="form-control" id="edit-image" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-categorie" class="form-label">Categorie</label>
                            <select class="form-control" name="categorie" id="edit-categorie">
                                <option value="Laravel">Laravel</option>
                                <option value="Codeigneter">Codeigneter</option>
                                <option value="Vuejs">Vuejs</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit-title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="edit-title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-content" class="form-label">Content</label>
                            <textarea class="form-control" name="content" id="edit-content" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

      <script>
        $(document).on("click", ".btn-edit", function () {
            let id = $(this).data("id");
            $("#edit-id").val(id);
            $("#edit-title").val($(this).data("title"));
            $("#edit-categorie").val($(this).data("categorie"));
            $("#edit-content").val($(this).data("content"));
            $("#edit-image").val($(this).data("image"));
            $("#formEdit").attr("action", "/blog/" + id);
        });
    </script>
@endsection
