<?php

namespace App\Http\Controllers\Api\Util;

use App\Http\Controllers\Controller;

class BladeHelper extends Controller
{
    public static function bladeRol($rol) {
        $user = session('user');
        $roles = $user['acl']['roles'];
        $access = collect($roles)->contains($rol);
        return $access;
    }

    public static function bladePermiso($permiso) {
        $user = session('user');
        $permisos = $user['acl']['permisos'];
        $access = collect($permisos)->contains($permiso);
        return $access;
    }

    public static function bladeUser() {
        if(session('user') === null) {
            return false;
        } else {
            return true;
        }
    }

}