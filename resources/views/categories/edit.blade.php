@extends('layouts.navbar_dashboard')
@section('content')

<div id="content" class="m-4 m-md-5 mt-5">
	<h2 class="mb-4" style="font-weight: 600;">Edit Kategori</h2>
	<form action="{{ route('categories.update', $category->id) }}" method="post">
		@csrf
		@method('PUT') <!-- Menggunakan method PUT untuk update -->
		<div class="form-group">
			<label for="name">Name kategori baru: </label>
			<input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
		</div>
		<button type="submit" class="btn btn-warning text-white">Save</button>
	</form>
</div>
@endsection