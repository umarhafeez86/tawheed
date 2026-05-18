<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wlleftmenu extends Model
{
    use HasFactory;

    public static function tree()
    {
        $allLeftmenus = Wlleftmenu::get();

        $rootLeftmenus = $allLeftmenus->where('leftmenu_status',1)->where('leftmenu_parent',0);

        self::formatTree($rootLeftmenus, $allLeftmenus);

        return $rootLeftmenus;
    }

    private static function formatTree($Leftmenus, $allLeftmenus)
    {
       
        foreach ($Leftmenus as $Leftmenu) {
                $Leftmenu->children = $allLeftmenus->where('leftmenu_status',1)->where('leftmenu_parent',$Leftmenu->leftmenuid)->values();
                if ($Leftmenu->children->isNotEmpty()) {
                    self::formatTree($Leftmenu->children, $allLeftmenus);
                }
        }
    }

}
