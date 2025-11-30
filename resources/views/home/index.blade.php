<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hal Mahasiswa USM</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <style>
        body {
            /* Ganti 'images/background_usm.jpg' dengan path gambar Anda yang sebenarnya */
            background-image: url('{{ asset('https://asset-2.tstatic.net/jateng/foto/bank/images/Kampus-Universitas-Semarang-USM-yang-terletak-di-JlSoekarno-Hatta-Semarang-A.jpg') }}'); 
            background-size: cover; /* Memastikan gambar menutupi seluruh background */
            background-repeat: no-repeat; /* Mencegah pengulangan gambar */
            background-attachment: local ; /* Membuat gambar tetap saat digulir */
        }
        body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        
       
        background-color: rgba(255, 255, 255, 0.37); 
        
       
        z-index: -2;
        }
        /* Opsi: Tambahkan latar belakang putih transparan ke konten agar mudah dibaca */
        .content-wrapper {
            background-color: rgba(255, 253, 253, 1); 
            padding: 20px;
            border-radius: 8px;
        }
    </style>
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
<!-- NAVBAR -->

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left w-100 text-center">
            <h2>Data Mahasiswa Universitas Semarang</h2>
        </div>
    </div>
</div>
<break>

<!-- KOLOM DIAGRAM -->
<div style="width: 80%; margin: auto;">
    <canvas id="barChart" style="height: 200 px;"></canvas>
</div>

<script>
    var ctx = document.getElementById('barChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($data['labels']),
            datasets: [{
                label: 'Jenis Data',
                data: @json($data['data']),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 3
            }]
        },

       options: {
    
        scales: {
            y: {
                beginAtZero: true,
                // 1. Tampilan Garis Grid (Horizontal)
                grid: {
                    color: 'rgba(0, 0, 0, 0.5)', // Warna garis yang lebih gelap (50% opacity)
                    lineWidth: 1
                },
                // 2. Tampilan Label Angka Sumbu Y
                ticks: {
                    color: '#000000', // Warna teks (hitam solid)
                    font: {
                        size: 14, // Ukuran font diperbesar
                        weight: 'bold' // Ditebalkan
                    }
                }
            },
            x: {
                // 1. Tampilan Garis Grid (Vertikal)
                grid: {
                    color: 'rgba(0, 0, 0, 0.2)', // Warna garis (sedikit samar)
                    lineWidth: 1
                },
                // 2. Tampilan Label Nama Data (di bawah batang diagram)
                ticks: {
                    color: '#000000', // Warna teks (hitam solid)
                    font: {
                        size: 14, // Ukuran font diperbesar
                        weight: 'bold' // Ditebalkan
                    }
                }
            }
        },
        
        // 3. Tampilan Legenda (Keterangan Jenis Data)
        plugins: {
            legend: {
                labels: {
                    color: '#000000', // Warna teks legenda (hitam solid)
                    font: {
                        size: 16, // Ukuran font diperbesar
                        weight: 'bold' // Ditebalkan
                    }
                }
            }
        }
    }
});
</script>

</div>
</body>
</html>
