@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <h3 class="fw-bold mb-4">Hasil Pencarian: "{{ request('search') }}"</h3>

    <div class="row">
        @forelse($events as $event)
            <div class="col-md-3 mb-4">
                <a href="{{ route('public.event.show', $event->id) }}" class="text-decoration-none text-dark">
                    <div class="card card-event h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/'.$event->banner) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h6 class="card-title fw-bold text-truncate">{{ $event->name }}</h6>
                            <span class="badge bg-primary mb-2">{{ $event->category }}</span>
                            <p class="text-muted small mb-1">
                                <i class="bi bi-geo-alt"></i> {{ $event->location }}
                            </p>
                            <h5 class="text-primary fw-bold mt-2">Rp {{ number_format($event->price, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-search display-1 text-muted opacity-25"></i>
                <h4 class="mt-3 text-muted">Oops, event tidak ditemukan.</h4>
                <p class="text-muted">Coba kata kunci lain atau jelajahi kategori di halaman depan.</p>
                <a href="{{ url('/') }}" class="btn btn-outline-primary mt-3 rounded-pill px-4">Kembali ke Beranda</a>
            </div>
        @endforelse
    </div>
</div>
@endsection