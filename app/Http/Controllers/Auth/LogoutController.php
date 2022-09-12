<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Validator;
use Auth;

class LogoutController extends Controller
{
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
}
