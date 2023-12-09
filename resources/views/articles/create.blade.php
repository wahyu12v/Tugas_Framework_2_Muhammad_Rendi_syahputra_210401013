@extends('layouts.navbar_dashboard')
@section('content')

<div id="content" class="m-4 m-md-5 mt-5">
	<h2 class="mb-4" style="font-weight: 600;">Buat Postingan</h2>
	<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Judul Artikel :</label>
			<input name="title" type="text" class="form-control border" id="exampleFormControlInput1" placeholder="Judul" maxlength="50" required>
		</div>
		<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">Isi Konten :</label>
			<textarea name="content" class="form-control border" id="exampleFormControlTextarea1" style="min-height: 300px;" placeholder="Tulis isi konten mengunakan HTML" required></textarea>
		</div>
		<div hidden>
			<select name="user_id">
				@foreach ($users as $user)
					<option value="{{ $user->id }}">{{ $user->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="mb-3">
			<label for="exampleFormControlTextarea1" class="form-label">Kategori :</label>
			<select class="form-select" name="category_id" aria-label="Default select example">
			@foreach ($categories as $category)
				<option value="{{ $category->id }}">
					{{ $category->name }}
				</option>
			@endforeach
			</select>
		</div>
		<div class="mb-3">
			<label for="formFile" class="form-label">Unggah Gambar Header:</label>
			<input name="image" class="form-control" type="file" id="formFile" accept=".jpg, .png" required>
		</div>

		<div class="d-grid gap-2">
			<button class="btn btn-save mt-5" type="submit"><i class="fa fa-cloud-upload" aria-hidden="true"></i> <label>Publikasikan</label></button>
		</div>
	</form>
</div>
@endsection