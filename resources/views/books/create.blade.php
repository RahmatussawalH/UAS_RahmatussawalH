@extends('layouts.app')

@section('title', 'Tambah Buku Baru')

@section('content')
    <h1>Tambah Buku Baru</h1>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom: 18px;">
            <label for="title">Judul:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required style="margin-top:6px;">
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div style="margin-bottom: 18px;">
            <label for="author">Penulis:</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}" required style="margin-top:6px;">
            @error('author')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div style="margin-bottom: 18px;">
            <label for="year">Tahun Terbit:</label>
            <input type="number" id="year" name="year" value="{{ old('year') }}" required style="margin-top:6px;">
            @error('year')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div style="margin-bottom: 24px;">
            <label for="image">Gambar Buku:</label>
            <input type="file" id="image" name="image" accept="image/*" style="margin-top:6px;">
            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div style="display:flex; gap:12px;">
            <button type="submit" class="btn btn-success">Simpan Buku</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
@endsection