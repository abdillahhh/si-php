<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterAksesMenuModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'tbl_akses_menu';
    protected $allowedFields = ['level_id', 'menu_id', 'view_level'];
}
