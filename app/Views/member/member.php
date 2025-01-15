<!-- app/Views/perpus/member.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Perpustakaan - Data Member</title>
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

    <div class="container mt-4">
    <h1>Data Member</h1>
    <a href="<?= site_url('admin-perpustakaan/tambah-member'); ?>" class="btn btn-success mb-3">Tambah Member</a>

    <!-- <div class="mb-3">
        <label for="id_member" class="form-label">Member</label>
        <select class="form-select" id="id_member" name="id_member" required>
            <?php foreach ($members as $member): ?>
                <option value="<?= $member['id_member']; ?>"><?= $member['nama']; ?></option>
            <?php endforeach; ?>
        </select>
    </div> -->

    <table class="table">
        <thead>
            <tr>
                <th>ID Member</th>
                <th>Nama</th>
                <th>Tanggal Join</th>
                <th>Pekerjaan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member): ?>
                <tr>
                    <td><?= $member['id_member']; ?></td>
                    <td><?= $member['nama']; ?></td>
                    <td><?= $member['tanggal_join']; ?></td>
                    <td><?= $member['pekerjaan']; ?></td>
                    <td><?= $member['alamat']; ?></td>
                    <td>
                        <a href="<?= site_url('admin-perpustakaan/edit-member/' . $member['id_member']); ?>" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <a href="<?= site_url('admin-perpustakaan/hapus-member/' . $member['id_member']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus member ini?')">
                            <i class="bi bi-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

    <!-- Include Bootstrap JS if needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iNl+lnEAAAB5gPeW0WXSvMOLe4L/6WL4l9giMDbPKD04VorFFtaJ9tXjp" crossorigin="anonymous"></script>
</body>
</html>
