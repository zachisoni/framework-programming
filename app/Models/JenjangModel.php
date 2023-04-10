<?php

namespace App\Models;

use CodeIgniter\Model;

class JenjangModel extends Model
{
    // Table
    protected $table = 'jenjang_pendidikan';
    // allowed fields to manage
    protected $allowedFields = ['id', 'nama'];
}