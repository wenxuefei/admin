<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\AdminRepository;

class PermissionController extends Controller
{
    private $adminRepository;

    public function __construct(AdminRepository $admin)
    {
        $this->adminRepository = $admin;
    }

    public function userList()
    {
        return $this->adminRepository->getList();
    }

    public function addUser(UserRequest $request)
    {
        return $this->adminRepository->save();
    }

    public function editStatus()
    {
        $data = \request()->only('id', 'status');
        return $this->adminRepository->updateField($data);
    }

    public function rePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|same:confirm',
        ], [
            'password.same' => '两次密码不一致',
            'password.required' => '密码不能为空',
        ]);
        return $this->adminRepository->updatePassword();
    }
}
