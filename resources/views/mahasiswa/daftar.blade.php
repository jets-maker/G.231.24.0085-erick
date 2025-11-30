<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Ulang Mahasiswa</title>
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
    <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Daftar Ulang Mahasiswa Baru</h2>
        </div>
    </div>
</div>

@if (session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
@endif

<form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Program Studi</strong>
                <select name="id_progdi" class="custom-select mr-sm-2" required>
                    <option value="">-- Pilih Program Studi --</option>
                    @foreach ($progdi as $pro)
                        <option value="{{ $pro->id_progdi }}">{{ $pro->nm_progdi }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>NIM</strong>
                <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa" required>
            </div>
        </div>
    </div>

    @foreach ($pribadi as $p)
        <input type="hidden" name="id_pribadi" value="{{ $p->id_pribadi }}">

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>NIK :</strong>
                    <input type="text" class="form-control" value="{{ $p->nik }}" disabled>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nama Mahasiswa :</strong>
                    <input type="text" class="form-control" value="{{ $p->nama_mahasiswa }}" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Tempat Lahir :</strong>
                    <input type="text" class="form-control" value="{{ $p->tempat_lahir }}" disabled>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Tanggal Lahir :</strong>
                    <input type="date" class="form-control" value="{{ $p->tanggal_lahir }}" disabled>
                </div>
            </div>
        </div>
    @endforeach

    <button type="submit" class="btn btn-primary ml-3">Daftar</button>
</form>

</div>
</body>
</html>
