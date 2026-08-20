@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-circle mb-0"><i class="bi bi-box-seam"></i></div>
                <div>
                    <h4 class="fw-bold mb-0">{{ $totalProduk }}</h4>
                    <small class="text-secondary">Total Produk</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-circle mb-0"><i class="bi bi-check2-circle"></i></div>
                <div>
                    <h4 class="fw-bold mb-0">{{ $produkAktif }}</h4>
                    <small class="text-secondary">Produk Aktif</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-circle mb-0"><i class="bi bi-envelope"></i></div>
                <div>
                    <h4 class="fw-bold mb-0">{{ $totalPesan }}</h4>
                    <small class="text-secondary">Total Pesan</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-circle mb-0"><i class="bi bi-envelope-exclamation"></i></div>
                <div>
                    <h4 class="fw-bold mb-0">{{ $pesanBelumDibaca }}</h4>
                    <small class="text-secondary">Pesan Belum Dibaca</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card stat-card p-4">
    <h5 class="fw-bold mb-3">Pesan Terbaru</h5>
    @if ($pesanTerbaru->count())
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Subjek</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanTerbaru as $pesan)
                        <tr>
                            <td>{{ $pesan->nama }}</td>
                            <td>{{ $pesan->subjek }}</td>
                            <td>{{ $pesan->created_at->format('d M Y H:i') }}</td>
                            <td>
                                @if ($pesan->is_read)
                                    <span class="badge bg-secondary">Dibaca</span>
                                @else
                                    <span class="badge bg-primary">Baru</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.messages.show', $pesan) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-secondary mb-0">Belum ada pesan masuk.</p>
    @endif
</div>
@endsection
