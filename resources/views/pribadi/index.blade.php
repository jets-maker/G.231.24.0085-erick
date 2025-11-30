<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hal Data Pribadi Mahasiswa</title>
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
                       href="{{ route('home.index') }}"
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
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Halaman Data Pribadi Mahasiswa</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('pribadi.create') }}">Add Data</a>
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
            @foreach ($pribadi as $pr)
                <tr>
        
                    <td>{{ $pr->id_pribadi }}</td>
                    <td>{{ $pr->nik }}</td>
                    <td>{{ $pr->nama_mahasiswa }}</td>
                    <td>{{ $pr->tempat_lahir }} / {{ $pr->tanggal_lahir }}</td>
                    <td>
                        <form action="{{ route('pribadi.destroy', $pr->id_pribadi) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('pribadi.edit', $pr->id_pribadi) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin hapus data ini?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $pribadi->links() !!}
</div>

</body>
</html>
