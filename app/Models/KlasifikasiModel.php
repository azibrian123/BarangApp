<?php

namespace App\Models;

use CodeIgniter\Model;

class KlasifikasiModel extends Model
{
    protected $table = 'klasifikasi';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama'];
}
