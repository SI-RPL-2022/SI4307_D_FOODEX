@extends('layouts.main')
@section('title', 'Tambah Artikel')
@section('content')
<section id="menu" class="mt-5">
    <div class="container">
        <div class="col-8 ms-auto me-auto">
            <p class="h3 mb-3">Artikel Baru</p>
            <form class="needs-validation" method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Judul Artikel" value="{{ old('title') }}" name="title" required>
                        @error('title')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Deskripsi Singkat Artikel" value="{{ old('description') }}" name="description" required>
                        @error('description')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="content" class="form-label">Konten</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="wysiwyg-editor" rows="5" placeholder="Isi Artikel" name="content" required>{{ old('content') }}</textarea>
                        @error('content')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <h4 class="mb-3">Thumbnail</h4>

                <div class="row">
                    <div class="col-12">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept=".jpg,.png,.jpeg" required>
                        @error('image')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-themed btn-lg" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        CKEDITOR.replace('wysiwyg-editor', {
            filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    });
</script>
@endsection