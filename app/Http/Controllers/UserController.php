<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function index() {
        $user = UserModel::firstOrNew(
            [
                'username' => 'manager55',
                'nama' => 'Manager55',
                'password' => Hash::make('12345'),
                'level_id' => 2,
            ]);
            $user->username = 'manager56';

            $user->isDirty();
            $user->isDirty ('username');
            $user->isDirty('nama');
            $user->isDirty(['nama', 'username']);

            $user->isClean();
            $user->isClean('username');
            $user->isClean('nama');
            $user->isClean(['nama', 'username']);

            $user->save();
            
            $user->isDirty();
            $user->isClean();
            DD($user->isDirty());
    }
}