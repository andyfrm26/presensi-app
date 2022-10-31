@extends('layout.main')

@include('navbar')

@section('main')
    <div class="mt-5">
        <h5 class="mb-5">Selamat datang, <strong>{{ $user->name }}</strong>!</h5>

        @if ($presensis->isNotEmpty())
            <h4>Daftar Presensi</h4>
            @foreach ($presensis as $presensi)
                @if (!in_array($presensi->id, $finishedId))
                    @include('presensi-card')
                @else
                    @include('presensi-card-done')
                @endif

            @endforeach
        @else
            <h4>Tidak ada presensi hari ini.</h4>
        @endif
    </div>
@endsection