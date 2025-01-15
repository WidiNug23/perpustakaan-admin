<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'member';
    protected $allowedFields = ['nama', 'tanggal_join', 'pekerjaan', 'alamat'];
    protected $primaryKey = 'id_member';

    public function getMembersForDropdown()
    {
        $query = $this->select('id_member, nama')->orderBy('nama', 'ASC')->findAll();
        return $query;
    }
}
