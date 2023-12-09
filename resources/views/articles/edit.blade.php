@extends('layouts.navbar_dashboard')
@section('content')

<div id="content" class="m-4 m-md-5 mt-5">
	<h2 class="mb-4" style="font-weight: 600;">Edit Postingan</h2>
	<form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT') <!-- Menggunakan method PUT untuk update -->

		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Judul Artikel Baru :</label>
			<input name="title" type="text" class="form-control border" id="exampleFormControlInput1" placeholder="Judul" maxlength="50" required  value="{{ $article->title }}">
		</div>
		<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">Isi Konten Baru :</label>
			<textarea name="content" class="form-control border" id="exampleFormControlTextarea1" style="min-height: 300px;" placeholder="Tulis isi konten mengunakan HTML" required>{{ $article->content }}</textarea>
		</div>
		<div hidden>
			<select name="user_id">
				@foreach ($users as $user)
					<option value="{{ $user->id }}">{{ $user->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">Ganti Kategori :</label>
			<select class="form-select" name="category_id" aria-label="Default select example">
			@foreach ($categories as $category)
				<option value="{{ $category->id }}">
					{{ $category->name }}
				</option>
			@endforeach
			</select>
		</div>
		<div class="mb-3">
			<label for="formFile" class="form-label">Unggah Gambar Header Baru :</label>
			<br>
			<img src="{{ asset('images/' . $article->image) }}" alt="Article Image" style="max-width: 100px;">
			<input type="file" class="form-control" id="image" name="image" accept=".jpg, .png">
		</div>

		

		<div class="d-grid gap-2">
			<button class="btn btn-save mt-5" type="submit"><i class="fa fa-cloud-upload" aria-hidden="true"></i> <label>Publikasikan</label></button>
		</div>
	</form>
</div>
@endsection