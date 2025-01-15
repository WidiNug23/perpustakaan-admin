<!-- app/Views/perpus/peminjaman.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Perpustakaan - Data Peminjaman</title>
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
        <h1>Data Peminjaman</h1>
        <a href="<?= site_url('admin-perpustakaan/tambah-peminjaman'); ?>" class="btn btn-success mb-3">Tambah Peminjaman</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Peminjaman</th>
                    <th>Judul Buku</th>
                    <th>ID Member</th>
                    <th>ID Petugas</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($peminjaman as $p): ?>
                    <tr>
                        <td><?= $p['id_peminjaman']; ?></td>
                        <?php
                        // Mengakses model Buku
                        $bukuModel = new \App\Models\BukuModel();

                        // Mendapatkan judul buku berdasarkan ID yang ada di $p['judul_buku']
                        $judulBuku = $bukuModel->find($p['judul_buku'])['judul'];
                        ?>
                        <td><?= $judulBuku; ?></td>
                        <td><?= $p['id_member']; ?></td>
                        <td><?= $p['id_petugas']; ?></td>
                        <td><?= $p['tanggal_pinjam']; ?></td>
                        <td><?= $p['tanggal_kembali']; ?></td>
                        <td>
                            <a href="<?= site_url('admin-perpustakaan/done-peminjaman/' . $p['id_peminjaman']); ?>" class="btn btn-success"
                            data-id="<?= $p['id_peminjaman']; ?>"
                            data-tanggal-kembali="<?= $p['tanggal_kembali']; ?>"
                            onclick="handleDoneClick(event)">
                                <i class="bi bi-check"></i> Done
                            </a>
                            <a href="<?= site_url('admin-perpustakaan/edit-peminjaman/' . $p['id_peminjaman']); ?>" class="btn btn-warning">
                                <i class="bi bi-check"></i> Edit
                            </a>
                            <a href="<?= site_url('admin-perpustakaan/hapus-peminjaman/' . $p['id_peminjaman']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Add this script to peminjaman.php -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Function to update status based on the current date
        function updateStatus(id_peminjaman, tanggal_kembali) {
            var currentDate = new Date().toISOString().split('T')[0];
            var status = (currentDate > tanggal_kembali) ? 'Terlambat' : 'Tepat Waktu';

            $.ajax({
                type: 'POST',
                url: '<?= site_url("admin-perpustakaan/update-status"); ?>',
                data: {
                    id_peminjaman: id_peminjaman,
                    status: status
                },
                success: function (response) {
                    // Reload the page or update the status element as needed
                    location.reload(); // This will refresh the page
                },
                error: function (error) {
                    console.error('Error updating status:', error);
                }
            });
        }

        // Event listener for the "Done" button
        $('.done-btn').on('click', function (e) {
            e.preventDefault();
            var id_peminjaman = $(this).data('id');
            var tanggal_kembali = $(this).data('tanggal-kembali');

            // Call the updateStatus function
            updateStatus(id_peminjaman, tanggal_kembali);
        });
    });
</script>

     <!-- Tambahkan script Bootstrap dan lainnya jika diperlukan -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iNl+lnEAAAB5gPeW0WXSvMOLe4L/6WL4l9giMDbPKD04VorFFtaJ9tXjp" crossorigin="anonymous"></script>
</body>
</html>
