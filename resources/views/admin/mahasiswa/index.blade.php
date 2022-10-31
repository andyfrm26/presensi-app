@extends('admin.layout.main')

@section('mainadmin') 
    <h5 class="mb-5">Daftar Mahasiswa</strong>!</h5>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
        <a href="mahasiswa/create" class="btn btn-primary mb-5">Tambah Mahasiswa</a>

        <div class="table-responsive">
            <table class="table table-bordered cell-border hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $m)    
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $m->name }}</td>
                        <td>{{ $m->email }}</td>
                        <td>
                            <a href={{ "mahasiswa/". $m->id ."/edit"}} class="btn btn-warning"><i class="fa fa-pencil-alt text-white" aria-hidden="true"></i></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-action={{ "mahasiswa/". $m->id }}>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    {{-- <table id="table_id" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $m)    
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $m->name }}</td>
                <td>{{ $m->email }}</td>
                <td>
                    <a href={{ "mahasiswa/". $m->id ."/edit"}} class="btn btn-warning"><i class="fa fa-pencil-alt text-white" aria-hidden="true"></i></a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-action={{ "mahasiswa/". $m->id }}>
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <a href={{ "mahasiswa/". $m->id }} class=""></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> --}}

    <!-- Vertically centered modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Hapus mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus mahasiswa ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection