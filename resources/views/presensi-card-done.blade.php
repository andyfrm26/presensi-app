<div class="card mt-3" style="z-index: 0">
  <h5 class="card-header">{{ $presensi->title }}</h5>
  <div class="card-body">
      <h5 class="card-title">{{ $presensi->note }}</h5>
      <p class="card-text text-muted">Batas presensi: {{ date_format(date_create($presensi->end_time), "d M Y, H:i:s") }}</p>

      <div class="alert alert-success" role="alert">
        @foreach ($finishedPresensi->where('presensi_id', $presensi->id)->all() as $p)
        <p class="card-text">Presensi Terekam pada: {{ date_format(date_create($p->created_at), "d M Y, H:i:s")}}</p>
        <span>Status: <strong class="badge 
          @if ($p->status==='hadir')
          {{ 'text-bg-success' }}
          @elseif ($p->status=='izin')
          {{ 'text-bg-warning ' }}
          @else
          {{ 'text-bg-danger' }}
          @endif 
        ">{{ ucfirst($p->status) }}</strong></span>
        @endforeach
      </div>
      

  </div>
</div>