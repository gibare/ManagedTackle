<?php

namespace App\Http\Controllers;

use App\Models\Tackle;
use App\Models\Good;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GoodController extends Controller
{
    public function goodAdd(Tackle $tackle, Request $request){
        $tackle_id = $request->id;
        $user = Auth::user()->id;
        // ユーザーがGoodしているか
        $good = Good::where('user_id', $user)->where('tackle_id', $tackle_id)->first();
        //既に押されている時はdelete
        if ($good) {
            $tackles = Good::where('user_id', $user)->where('tackle_id', $tackle_id)->first();
            $tackles->delete();
            return back();
        }
        else {
            $tackles = new Good();
            $tackles->tackle_id = $request->id;
            $tackles->user_id = Auth::user()->id;
            $tackles->save();
            return back();
        }
    }
}
