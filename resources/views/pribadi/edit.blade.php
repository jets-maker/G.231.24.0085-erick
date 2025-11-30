<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Pribadi Mahasiswa</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Data Pribadi Mahasiswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pribadi.index') }}">Back</a>
            </div>
        </div>
    </div>

    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('pribadi.update', $pribadi->id_pribadi) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">

            <!-- NIK -->
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>NIK :</strong>
                    <input type="text" name="nik"
                           value="{{ $pribadi->nik }}"
                           class="form-control" placeholder="NIK" maxlength="16">
                    @error('nik')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Nama Mahasiswa -->
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nama Mahasiswa :</strong>
                    <input type="text" name="nama_mahasiswa"
                           value="{{ $pribadi->nama_mahasiswa }}"
                           class="form-control" placeholder="Nama Mahasiswa">
                    @error('nama_mahasiswa')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>

        <div class="row">

            <!-- Tempat Lahir -->
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Tempat Lahir :</strong>
                    <input type="text" name="tempat_lahir"
                           value="{{ $pribadi->tempat_lahir }}"
                           class="form-control" placeholder="Tempat Lahir">
                    @error('tempat_lahir')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Tanggal Lahir -->
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Tanggal Lahir :</strong>
                    <input type="date" name="tanggal_lahir"
                           value="{{ $pribadi->tanggal_lahir }}"
                           class="form-control">
                    @error('tanggal_lahir')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary ml-3">Update</button>

    </form>

</div>
</body>
</html>
