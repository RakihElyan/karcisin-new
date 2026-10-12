@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark fw-bold">Edit Event</div>
                <div class="card-body">
                    
                    <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Wajib untuk Update -->
                        
                        <div class="mb-3">
                            <label class="fw-bold">Nama Event</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $event->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Kategori Event</label>
                            <select name="category" class="form-select" required>
                                @php $cat = old('category', $event->category); @endphp
                                <option value="Konser" {{ $cat == 'Konser' ? 'selected' : '' }}>Konser Musik</option>
                                <option value="Seminar" {{ $cat == 'Seminar' ? 'selected' : '' }}>Seminar / Webinar</option>
                                <option value="Workshop" {{ $cat == 'Workshop' ? 'selected' : '' }}>Workshop / Pelatihan</option>
                                <option value="Wisata" {{ $cat == 'Wisata' ? 'selected' : '' }}>Tempat Wisata / Healing</option>
                                <option value="Olahraga" {{ $cat == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                                <option value="Lainnya" {{ $cat == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="fw-bold">Deskripsi Lengkap</label>
                            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $event->description) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Tanggal & Jam</label>
                                <input type="datetime-local" name="event_date" class="form-control" value="{{ old('event_date', $event->event_date) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Lokasi</label>
                                <input type="text" name="location" class="form-control" value="{{ old('location', $event->location) }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Harga Tiket (Rp)</label>
                                <input type="number" name="price" class="form-control" value="{{ old('price', $event->price) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Kuota Tiket</label>
                                <input type="number" name="quota" class="form-control" value="{{ old('quota', $event->quota) }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="fw-bold">Ganti Banner (Opsional)</label>
                            <input type="file" name="banner" class="form-control mb-2">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti banner.</small>
                            @if($event->banner)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/'.$event->banner) }}" height="100" class="rounded">
                                    <small class="d-block text-muted">Banner Saat Ini</small>
                                </div>
                            @endif
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('event.show', $event->id) }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-warning fw-bold flex-grow-1">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection