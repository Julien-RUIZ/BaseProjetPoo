<?php

namespace App\Controllers\Soft;

use App\Core\Redirect;
use App\Core\Render;
use App\Core\RestrictedAccess;

class WorkspaceSoft
{
    public function Workespace(){
        if(RestrictedAccess::SoftwareAccess()===true){
            $test = 'Page soft avec info sur les produits';
            if(!empty($test)){
                Render::View('Soft/Soft', ['test'=>$test], 'SoftPage');
            }else{
                $test = '';
                Render::View('Soft/Soft', ['test'=>$test], 'SoftPage');
            }
        }
    }
}