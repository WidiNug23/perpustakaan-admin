<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    // Model untuk tabel 'buku'
    protected $table = 'peminjaman';
    protected $allowedFields = ['judul_buku', 'id_member', 'id_petugas', 'tanggal_pinjam', 'tanggal_kembali', 'status_pengembalian'];
    protected $primaryKey = 'id_peminjaman';

}



