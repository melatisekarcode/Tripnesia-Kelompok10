<?php

namespace App\Models;

use CodeIgniter\Model;

class SimpanModel extends Model
{
    protected $table         = 'simpan';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['user_id', 'slug'];
}