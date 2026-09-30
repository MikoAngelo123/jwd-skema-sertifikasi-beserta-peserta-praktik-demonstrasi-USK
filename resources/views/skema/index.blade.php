@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Data Skema Sertifikasi</h2>
    <a href="{{ route('skema.create') }}" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Tambah Skema</a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode Skema</th>
                        <th>Nama Skema</th>
                        <th>Jenis</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skemas as $index => $skema)
                    <tr>
                        <td>{{ $skemas->firstItem() + $index }}</td>
                        <td><span class="badge bg-secondary">{{ $skema->kode_skema }}</span></td>
                        <td>{{ $skema->nama_skema }}</td>
                        <td>{{ $skema->jenis }}</td>
                        <td class="text-center">
                            <form action="{{ route('skema.destroy', $skema->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('skema.edit', $skema->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus skema ini?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">Belum ada data skema sertifikasi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $skemas->links() }}
    </div>
</div>
@endsection