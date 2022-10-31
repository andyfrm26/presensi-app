@extends('admin.layout.main')

@section('mainadmin') 
    <h5 class="mb-5">{{ $title }}</strong></h5>

    <form action="/dashboard/presensi" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="title" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Catatan</label>
            <input type="text" class="form-control" id="note" name="note" value="{{ old('note') }}">
            @error('note')
                <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="endTime" class="form-label">Batas Waktu</label>
            <input type="datetime-local" step="1" class="form-control" id="endTime" name="end_time" value="{{ old('end_time') }}">
            @error('end_time')
                <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
@endsection