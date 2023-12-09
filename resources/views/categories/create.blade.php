@extends('layouts.navbar_dashboard')
@section('content')

<div id="content" class="m-4 m-md-5 mt-5">
	<h2 class="mb-4" style="font-weight: 600;">Buat Kategori</h2>
	<form action="{{ route('categories.store') }}" method="POST">
		@csrf
		
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Nama Kategori Baru :</label>
			<input name="name"  type="text" class="form-control border" id="exampleFormControlInput1" placeholder="Nama" required>
		</div>
		
		<div class="d-grid gap-2">
			<button class="btn btn-save mt-5" type="submit"><i class="fa fa-cloud-upload" aria-hidden="true"></i> <label>Publikasikan</label></button>
		</div>
	</form>
</div>
@endSection