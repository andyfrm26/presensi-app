@extends('layout.main')
  @section('main')
    @if (session()->has('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="text-center py-5">
    <h1>PresensiApp</h1>
    <p class="text-muted mb-5" style="font-size: 12px">oleh: Kelompok 4 IESI G</p>

      <img src="/img/undraw_newspaper.svg" class="my-2" alt="" width="200">
    </div>

    <form action="/login" method="POST">
      @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}">
        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        @error('password') <div class="text-danger">{{ $message }}</div> @enderror
      </div>

      <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
    </form>
  @endsection
