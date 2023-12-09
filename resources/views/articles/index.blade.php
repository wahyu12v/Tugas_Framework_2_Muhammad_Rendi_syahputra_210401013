@extends('layouts.navbar_dashboard')
@section('content')

<div id="content" class="m-4 m-md-5 mt-5">
	<h2 class="mb-4" style="font-weight: 600;">Edit Postingan</h2>
	<table class="table table-striped table-hover table-light">
		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Isi Artikel</th>
			<th>Author</th>
			<th>Kategori</th>
			<th>Gambar</th>
			<th>Tindakan</th>
		</tr>
		@foreach($articles->sortByDesc('id') as $article)
		<tr>
			<td>{{ $loop->index + 1 }}</td>
			<td>{{ $article->title }}</td>
			<td>{{ Str::limit($article->content, 150) }}</td>
			<td>{{ $article->user->name }}</td>
			<td>{{ $article->category->name }}</td>
			<td style="text-align: center;"><img style="width: 200px; height: 120px; object-fit: cover;" src="{{ asset('images/' . $article->image) }}"></td>
			<td>
				<a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning text-white">Edit</a>
				<form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger text-white">Delete</button>
			</form>
			</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection