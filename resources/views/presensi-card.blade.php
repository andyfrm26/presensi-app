<div class="card mt-3" style="z-index: 0">
  <h5 class="card-header">{{ $presensi->title }}</h5>
  <div class="card-body">
      <h5 class="card-title">{{ $presensi->note }}</h5>
      <p class="card-text text-muted">Batas presensi: {{ date_format(date_create($presensi->end_time), "d M Y, H:i:s") }}</p>
      <div class="d-flex justify-content-evenly w-50">
        <form action={{ route('isiPresensi', [$presensi->id, $user->id, 'hadir']) }} method="POST">
          @csrf
          <input type="submit" class="btn btn-success w-100" name="status" value="Hadir">
        </form>
  
        <form action={{ route('isiPresensi', [$presensi->id, $user->id, 'izin']) }} method="POST">
          @csrf
          <input type="submit" class="btn btn-warning" name="status" value="Izin">
        </form>
  
        <form action={{ route('isiPresensi', [$presensi->id, $user->id, 'sakit']) }} method="POST">
          @csrf
          <input type="submit" class="btn btn-danger" name="status" value="Sakit">
        </form>
      </div>
  </div>
</div>