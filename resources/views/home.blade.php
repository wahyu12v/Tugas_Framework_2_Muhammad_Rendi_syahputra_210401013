@extends('layouts.navbar_home')
@section('content')

<div style="background-color: #ededed; margin-top: -70px;">
    <div class="container" style="max-width: 1000px">
        <div class="jumbotron">
            <h3>Selamat Datang</h3>
            <p class="lead">Selamat datang di <b class="font-weight-bold text-warning">Artikel Ku</b>, destinasi terbaik untuk pencinta buku. Di sini, kami menghadirkan ragam koleksi buku dari berbagai genre, mulai dari fiksi hingga non-fiksi, sastra
                klasik hingga buku-buku terkini yang sedang tren. Dengan komitmen kami untuk menyediakan kualitas terbaik, BacaBudaya berusaha menjadi rumah bagi para pecinta kata-kata yang haus akan pengetahuan dan petualangan imajinasi.</p>
            <hr class="my-4">
            <p>"Telusuri, Temukan, dan Pelajari Lebih Lanjut Melalui Tulisan Saya"</p>
        </div>
    </div>
</div>


<div class="py-5">
    <div class="container" style="max-width: 1000px;">
        <h2 class="mb-3">Artikel-artikel terbaru</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($articles->sortByDesc('id') as $article)
            <div class="col">
                <a class="text-dark text-decoration-none" href="{{ route('show', $article->id) }}">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('images/' . $article->image) }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <span class="badge bg-warning text-white p-2">{{ $article->category->name }}</span>
                            <h5 class="card-title mt-3">{{ Str::limit($article->title, 10) }}</h5>
                            <p class="card-text">{{ Str::limit($article->content, 120) }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</div>
</div>
@endsection