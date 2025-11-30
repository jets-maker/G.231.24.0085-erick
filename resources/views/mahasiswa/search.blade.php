<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hal Pencarian Mahasiswa USM</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <!-- NAVBAR -->
<nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">.: SIMA :.</a>

        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" 
                       href="/"
                       {{ Request::is('/') ? 'aria-current="page"' : '' }}>Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('progdi*') ? 'active' : '' }}" 
                       href="{{ route('progdi.index') }}"
                       {{ Request::is('progdi*') ? 'aria-current="page"' : '' }}>Data Progdi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('pribadi*') ? 'active' : '' }}" 
                       href="{{ route('pribadi.index') }}"
                       {{ Request::is('pribadi*') ? 'aria-current="page"' : '' }}>
                        Data Pribadi
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('mahasiswa*') ? 'active' : '' }}" 
                       href="{{ route('mahasiswa.index') }}"
                       {{ Request::is('mahasiswa*') ? 'aria-current="page"' : '' }}>Data Mahasiswa</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- BATAS -->

<div class="row mt-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Halaman Pencarian Data Pribadi Mahasiswa USM</h2>
        </div>

        <div class="pull-right mb-2">
            <form class="form" method="get" action="{{ route('search') }}">
                <div class="form-group w-100 mb-3">
                    <label for="search" class="d-block mr-2">Pencarian</label>
                    <input type="text" name="search" class="form-control w-75 d-inline"
                        id="search" placeholder="Masukkan keyword">
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>NIK</th>
            <th>Nama Mahasiswa</th>
            <th>Tempat / Tgl Lahir</th>
            <th width="200px">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($pribadi as $pri)
            <tr>
                <td>{{ $pri->id_pribadi }}</td>
                <td>{{ $pri->nik }}</td>
                <td>{{ $pri->nama_mahasiswa }}</td>
                <td>{{ $pri->tempat_lahir }} / {{ $pri->tanggal_lahir }}</td>

                <td>
                    @if (empty($pri->nim))
                        <a class="btn btn-primary" href="/mahasiswa/daftar/{{ $pri->id_pribadi }}">Blm DU</a>
                    @else
                        <a class="btn btn-info">Sudah terdaftar</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
</body>
</html>
