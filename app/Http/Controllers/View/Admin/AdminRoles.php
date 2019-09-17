<?php

namespace App\Http\Controllers\View\Admin;

use App\Http\Controllers\Api\ApiLogin;
use App\Http\Controllers\Api\ApiRoles;
use App\Http\Controllers\Controller;

class AdminRoles extends Controller
{
    public $api;

    public function __construct()
    {
        $this->api = new ApiRoles(ApiLogin::token());
    }

    public function index() {
        abort(503);
    }

    public function show() {
        abort(503);
    }

    public function store() {
        $response = $this->api->addRole(request('name'),ApiLogin::token());
        if(isset($response['error'])) {
            return redirect(route('admin'))->withErrors(['admin.api.error'=>$response['error']]);
        } else {
            return redirect()->back();
        }
    }

    public function destroy($id) {
        $response = $this->api->delRole(request('id'),ApiLogin::token());
        if(isset($response['error'])) {
            return redirect(route('admin'))->withErrors(['admin.api.error'=>$response['error']]);
        } else {
            return redirect()->back();
        }
    }
}