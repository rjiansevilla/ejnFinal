<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

// Service
use App\Services\UserServices;

// Requests
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    private $user;

    public function __construct(UserServices $user)
    {
        $this->user = $user;
    }

    // Create user
    public function createUser(UserRequest $request)
    {
        $request = \Request::all();
        unset($request['_token']);
        $data = $this->user->createUser($request);

        return redirect('users')
                    ->with('status', $data['status'])
                    ->with('message', $data['message']);
    }

    // Delete user
    public function deleteUser($id)
    {
        $data = $this->user->deleteUser($id);

        return response()->json(compact('data'));
    }

    // Add user form
    public function addUserForm()
    {
        $data = [
            "header" => "Crete New User",
            "title" => "New User"
        ];

        return view('admin.user.create-user', compact('data'));
    }

    // Display users
    public function users()
    {
        $users = $this->user->getUsers();
        $data = [
            "header" => "Users",
            "title" => "Users",
            "users" => $users
        ];

        return view('admin.user.user-management', compact('data'));
    }
}