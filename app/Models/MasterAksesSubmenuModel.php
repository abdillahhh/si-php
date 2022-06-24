<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterAksesSubmenuModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'tbl_akses_submenu';
    protected $allowedFields = ['level_id', 'submenu_id', 'view_level', 'add_level', 'delete_level', 'edit_level', 'print_level', 'upload_level'];
}
