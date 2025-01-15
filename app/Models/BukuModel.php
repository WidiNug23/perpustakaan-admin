<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    // Model untuk tabel 'buku'
    protected $table = 'buku';
    protected $allowedFields = ['judul', 'genre', 'penulis'];
    protected $primaryKey = 'id_buku';

    public function getBukuForDropdown()
    {
        $query = $this->select('id_buku, judul')->orderBy('judul', 'ASC')->findAll();
        return $query;
    }
}



