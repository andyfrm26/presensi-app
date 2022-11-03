<div class="position-fixed w-100" style="z-index: 1">
    <nav class="navbar navbar-expand-lg" style="min-height: 70px; background-color: #0B192E;">
        <div class="container-fluid px-5 d-flex items-center">
            <a class="navbar-brand text-light fw-bold" href="#">PresensiApp</a>
            <form action="/logout" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-outline-danger d-flex align-items-center fw-semibold">Logout</button>
            </form>
        </div>
    </nav>
</div>