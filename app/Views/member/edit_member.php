<!-- app/Views/perpus/edit_member.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Edit Member</h1>
        <form method="post" action="<?= site_url('admin-perpustakaan/edit-member/' . $member['id_member']); ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $member['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_join" class="form-label">Tanggal Join</label>
                <input type="date" class="form-control" id="tanggal_join" name="tanggal_join" value="<?= $member['tanggal_join']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $member['pekerjaan']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $member['alamat']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Include Bootstrap JS if needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iNl+lnEAAAB5gPeW0WXSvMOLe4L/6WL4l9giMDbPKD04VorFFtaJ9tXjp" crossorigin="anonymous"></script>
</body>
</html>
