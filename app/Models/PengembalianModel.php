<?php

namespace App\Models;

use CodeIgniter\Model;

class PengembalianModel extends Model
{
    protected $table = 'pengembalian';
    protected $allowedFields = ['id_peminjaman', 'id_pengembalian', 'status_pengembalian'];
    protected $primaryKey = 'id_pengembalian';
}



