@extends('admin.layout.main')

@section('mainadmin') 
    <h5 class="mb-5">{{ $title }}</strong></h5>

    <form action={{ "/dashboard/mahasiswa/" . $user->id }} method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="name" value="{{ $user->name }}">
            @error('name')
                <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
            @error('email')
                <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="d-flex align-items-center">
                <input type="password" class="form-control" id="passwordField" name="password">
                <a href="#" class="d-block" style="min-width: 36px" onclick="hideShowPassword()"><i class="fa fa-eye mx-2" aria-hidden="true" id="passwordEyeIcon"></i></a>
            </div>
            @error('password')
                <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="konfirmasiPassword" class="form-label">Konfirmasi Password</label>
            <div class="d-flex align-items-center">
                <input type="password" class="form-control" id="confirmPasswordField" name="confirmPassword">
                <a href="#" class="d-block" style="min-width: 36px" onclick="hideShowConfirmPassword()"><i class="fa fa-eye ml-2" id="confirmPasswordEyeIcon"></i></a>
            </div>
            @error('confirmPassword')
                <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection