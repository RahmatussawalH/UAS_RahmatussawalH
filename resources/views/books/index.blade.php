@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <h1>Daftar Buku</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($books->isEmpty())
        <p style="margin-top: 20px; text-align: center; color: #777;">Belum ada buku dalam daftar.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>
                            @if($book->image)
                                <img src="{{ asset('storage/' . $book->image) }}" alt="Gambar Buku" style="width: 60px; height: 80px; object-fit: cover; border-radius: 4px;">
                            @else
                                <span style="display:inline-block;width:60px;height:80px;background:#eee;color:#aaa;text-align:center;line-height:80px;border-radius:4px;font-size:12px;">No Image</span>
                            @endif
                        </td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->year }}</td>
                        <td>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="delete-form" data-title="{{ $book->title }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-delete" style="margin-top:2px;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            gap: 4px;
            margin-top: 18px;
            font-size: 10px;
        }
        .pagination .page-link, .pagination .page-item span {
            padding: 3px 9px;
            border-radius: 4px;
            border: 1px solid #ddd;
            background: #f9f9f9;
            color: #333;
            text-decoration: none;
            transition: background 0.2s;
        }
        .pagination .page-link:hover {
            background: #e1e7ed;
        }
        .pagination .active .page-link, .pagination .active span {
            background: #3498db;
            color: #fff;
            border-color: #3498db;
        }
        .pagination .disabled .page-link, .pagination .disabled span {
            color: #aaa;
            background: #f4f4f4;
        }
    </style>
    @if ($books->lastPage() > 1)
        <div style="display:flex;justify-content:center;gap:4px;margin-top:18px;">
            {{-- Previous --}}
            @if ($books->onFirstPage())
                <span style="padding:3px 9px;border-radius:4px;border:1px solid #ddd;background:#f4f4f4;color:#aaa;font-size:13px;">&laquo;</span>
            @else
                <a href="{{ $books->previousPageUrl() }}" style="padding:3px 9px;border-radius:4px;border:1px solid #ddd;background:#f9f9f9;color:#333;font-size:13px;text-decoration:none;">&laquo;</a>
            @endif

            {{-- Page Numbers --}}
            @for ($i = 1; $i <= $books->lastPage(); $i++)
                @if ($i == $books->currentPage())
                    <span style="padding:3px 9px;border-radius:4px;border:1px solid #3498db;background:#3498db;color:#fff;font-size:13px;">{{ $i }}</span>
                @else
                    <a href="{{ $books->url($i) }}" style="padding:3px 9px;border-radius:4px;border:1px solid #ddd;background:#f9f9f9;color:#333;font-size:13px;text-decoration:none;">{{ $i }}</a>
                @endif
            @endfor

            {{-- Next --}}
            @if ($books->hasMorePages())
                <a href="{{ $books->nextPageUrl() }}" style="padding:3px 9px;border-radius:4px;border:1px solid #ddd;background:#f9f9f9;color:#333;font-size:13px;text-decoration:none;">&raquo;</a>
            @else
                <span style="padding:3px 9px;border-radius:4px;border:1px solid #ddd;background:#f4f4f4;color:#aaa;font-size:13px;">&raquo;</span>
            @endif
        </div>
    @endif
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.btn-delete').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                var form = btn.closest('form');
                var title = form.getAttribute('data-title');
                Swal.fire({
                    title: 'Yakin hapus buku?',
                    text: 'Buku "' + title + '" akan dihapus secara permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e74c3c',
                    cancelButtonColor: '#95a5a6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection