<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\User;


class UserController extends Controller
{
    public function channel(int $user_id)
    {
        $user = User::find($user_id);

        if(!is_object($user)){
            return redirect()->route('welcome.index');
        }

        $videos = Video::where('user_id', $user_id)->paginate(6);

        return view('user.channel', [
            'user' => $user,
            'videos' => $videos
        ]);
    }
}
