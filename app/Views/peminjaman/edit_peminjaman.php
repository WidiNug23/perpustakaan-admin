<!-- app/Views/perpus/edit_peminjaman.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Perpustakaan - Edit Peminjaman</title>
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
                    <li class="nav-item">
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
                    <!-- Tambahkan menu lainnya sesuai kebutuhan -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Edit Peminjaman</h1>
        <form action="<?= site_url('admin-perpustakaan/edit-peminjaman/' . $peminjaman['id_peminjaman']); ?>" method="post">
             <div class="mb-3">
                <label for="judul_buku" class="form-label">Judul Buku</label>
                <select class="form-select" id="judul_buku" name="judul_buku" required>
                    <?php foreach ($buku as $row): ?>
                        <option value="<?= $row['id_buku'] ?>" <?= ($row['id_buku'] == $peminjaman['judul_buku']) ? 'selected' : '' ?>>
                            <?= $row['judul'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="mb-3">
                <label for="id_member" class="form-label">Member</label>
                <select class="form-select" id="id_member" name="id_member" required>
                    <?php foreach ($members as $member): ?>
                        <option value="<?= $member['id_member']; ?>" <?= ($member['id_member'] == $peminjaman['id_member']) ? 'selected' : ''; ?>>
                            <?= $member['nama']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_petugas" class="form-label">Petugas</label>
                <select class="form-select" id="id_petugas" name="id_petugas" required>
                    <?php foreach ($petugas as $pegawai): ?>
                        <option value="<?= $pegawai['id_petugas']; ?>" <?= ($pegawai['id_petugas'] == $peminjaman['id_petugas']) ? 'selected' : ''; ?>>
                            <?= $pegawai['nama']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= $peminjaman['tanggal_pinjam']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" value="<?= $peminjaman['tanggal_kembali']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <!-- Include Bootstrap JS if needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iNl+lnEAAAB5gPeW0WXSvMOLe4L/6WL4l9giMDbPKD04VorFFtaJ9tXjp" crossorigin="anonymous"></script>
</body>
</html>
