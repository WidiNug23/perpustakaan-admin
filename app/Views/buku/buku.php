<!-- app/Views/perpus/buku.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Perpustakaan - Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('home'); ?>">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= site_url('admin-perpustakaan/buku'); ?>">Data Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('admin-perpustakaan/member'); ?>">Data Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('admin-perpustakaan/petugas'); ?>">Data Petugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('admin-perpustakaan/peminjaman'); ?>">Data Peminjaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('admin-perpustakaan/pengembalian'); ?>">Data Pengembalian</a>
                    </li>
                    <!-- Tambahkan menu lainnya sesuai kebutuhan -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1>Data Buku</h1>
        <a href="<?= site_url('admin-perpustakaan/tambah-buku'); ?>" class="btn btn-success mb-3">Tambah Buku</a>
        <!-- <a href="<?= site_url('contoh/trash'); ?>" class="btn btn-success mb-3">COntoh</a> -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID Buku</th>
                    <th>Judul</th>
                    <th>Genre</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buku as $row): ?>
                    <tr>
                        <td><?= $row['id_buku']; ?></td>
                        <td><?= $row['judul']; ?></td>
                        <td><?= $row['genre']; ?></td>
                        <td><?= $row['penulis']; ?></td>
                            <td>
                                <a href="<?= site_url('admin-perpustakaan/edit-buku/' . $row['id_buku']); ?>" class="btn btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="<?= site_url('admin-perpustakaan/hapus-buku/' . $row['id_buku']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    

    <!-- Tambahkan script Bootstrap dan lainnya jika diperlukan -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iNl+lnEAAAB5gPeW0WXSvMOLe4L/6WL4l9giMDbPKD04VorFFtaJ9tXjp" crossorigin="anonymous"></script>
</body>
</html>
