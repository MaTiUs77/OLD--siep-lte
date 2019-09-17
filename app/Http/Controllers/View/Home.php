<?php
namespace App\Http\Controllers\View;

use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
        $user = ApiLogin::user();
        return view('index',compact('user'));
    }
}
