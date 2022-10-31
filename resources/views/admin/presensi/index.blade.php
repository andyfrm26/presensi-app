@extends('admin.layout.main')

@section('mainadmin')
    <h5 class="mb-5">Daftar Presensi</strong>!</h5>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <a href="presensi/create" class="btn btn-primary mb-5">Tambah Presensi</a>

    <div class="table-responsive">
        <table class="table table-bordered cell-border hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Catatan</th>
                    <th>Batas Waktu</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($presensi as $p)    
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $p->title }}</td>
                    <td>{{ $p->note }}</td>
                    <td>{{ $p->end_time }}</td>
                    <td class="text-center">
                        <div class="form-check form-switch">
                            <form action={{ "/dashboard/presensi/toggle/" . $p->id }} method="POST" class="toggleForm">
                                @csrf
                                <input type="hidden" name="id" value={{ $p->id }}>
                                <input type="hidden" name="status" value={{ $p->is_active }}>
                                <input class="form-check-input toggleSwitch" type="checkbox" name="nothing" role="switch" style="cursor: pointer;" 
                                @if ($p->is_active)
                                {{ 'checked' }}
                                @endif
                                @if (strtotime($p->end_time) < strtotime("now"))
                                {{ 'disabled' }}
                                @endif
                                >
                            </form>
                        </div>
                    </td>
                    <td>
                        <a href={{ "presensi/". $p->id ."/edit"}} class="btn btn-warning"><i class="fa fa-pencil-alt text-white" aria-hidden="true"></i></a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePresensiModal" data-bs-action={{ "presensi/". $p->id }}>
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        <a href={{ "presensi/". $p->id }} class=""></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Vertically centered modal -->
    <div class="modal fade" id="deletePresensiModal" tabindex="-1" aria-labelledby="deletePresensiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deletePresensiModalLabel">Hapus mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus presensi ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(function(){
            $(".toggleSwitch").change(function(){
                $(this).parent().submit();
        });
    });
    </script>

@endsection