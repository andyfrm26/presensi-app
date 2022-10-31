@extends('admin.layout.main')

@section('mainadmin') 
    <h5 class="mb-5">{{ $title }}</strong></h5>

    <form action={{ "/dashboard/presensi/" . $presensi->id }} method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="title" value="{{ $presensi->title }}">
            @error('title')
                <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Catatan</label>
            <input type="text" class="form-control" id="note" name="note" value="{{ $presensi->note }}">
            @error('note')
                <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="endTime" class="form-label">Batas Waktu</label>
            <input type="datetime-local" step="1" class="form-control" id="endTime" name="end_time" value="{{ $presensi->end_time }}">
            @error('end_time')
                <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection