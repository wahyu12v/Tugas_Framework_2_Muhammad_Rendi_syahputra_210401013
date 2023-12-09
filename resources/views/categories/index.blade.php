@extends('layouts.navbar_dashboard')
@section('content')

<div id="content" class="m-4 m-md-5 mt-5">
	<h2 class="mb-4" style="font-weight: 600;">Buat Kategori</h2>
	
	<div class="d-grid gap-2">
		<label for="exampleFormControlInput1" class="form-label">Tambah Kategori Baru :</label>
		<a href="{{ route('categories.create') }}" class="btn btn-save" type="submit"><i class="fa fa-cloud-upload" aria-hidden="true"></i> <label>Buat Kategori</label></a>
	</div>

	<div class="mt-5">
	@if(session('error'))
		<div class="alert alert-danger" role="alert">
			{{ session('error') }}
		</div>
	@endif
	<table class="table table-striped table-hover table-light">
			<tr>
				<th>Nama Kategori</th>
				<th>Tindakan</th>
			</tr>
			@foreach($categories as $category)
			<tr>
				<td>{{ $category->name }}</td>
				<td>
					<div class="d-flex">
						<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning text-white me-2">Edit</a>
						<form action="{{ route('categories.destroy', $category->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger text-white">Delete</button>
						</form>
					</div>
				</td>
			</tr>
			@endforeach
	</table>
	</div>
</div>
@endsection