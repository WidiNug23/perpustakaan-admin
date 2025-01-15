<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $table = 'petugas';
    protected $allowedFields = ['nama', 'usia', 'jabatan', 'alamat'];
    protected $primaryKey = 'id_petugas';

    public function getPetugasForDropdown()
    {
        $query = $this->select('id_petugas, nama')->orderBy('nama', 'ASC')->findAll();
        return $query;
    }
}
