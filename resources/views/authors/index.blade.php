@extends('layouts.navbar_dashboard')
@section('content')

<div id="content" class="m-4 m-md-5 mt-5">
	<h2 class="mb-4" style="font-weight: 600;">Dashboard</h2>
	<div class="card">
		<div class="card-header">Info Akun</div>
		<div class="card-body">
		<table class="table">
			<tbody>
			@foreach ($users as $user)
				<tr>
					<td class="table-light">Nama</td>
					<td>{{ $user->name }}</td>
				</tr>
				<tr>
					<td class="table-light">Email</td>
					<td>{{ $user->email }}</td>
				</tr>
				<tr>
					<td class="table-light">Nomor Telepon</td>
					<td>{{ $user->telephone }}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		</div>
	</div>
</div>
@endsection
