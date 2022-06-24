<?php

use App\Models\MasterUserModel;
use App\Models\MasterAksesUserLevelModel;



function allowHalaman($level_id, $namaHalaman)
{
    $masterAksesUserLevelModel = new masterAksesUserLevelModel();
    $listHalaman = $masterAksesUserLevelModel->getAksesMenu($level_id);
    foreach ($listHalaman as $list) {
        if ($list['nama_menu'] == $namaHalaman && $list['view_level'] == 'Y' && $list['is_active'] == 'Y') {
            return true;
        } else {
            return false;
        }
    }
}
