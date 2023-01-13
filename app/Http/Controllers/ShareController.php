<?php

namespace App\Http\Controllers;

use App\Models\Tackle;
use App\Models\User;
use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Good $good, Request $request, Tackle $tackle)
    {
        //
        //$goods = Good::where('tackle_id', $tackle->id)->where('user_id', auth()->user()->id)->get();

        $tackles = Tackle::where('share_stock', '1')->withCount(['goods'])->orderBy('updated_at', 'desc')->get()->toArray();

        return Inertia::render('EveryoneTackle', compact('tackles'));
    }

    public function search(Request $request,$queryWord)
    {

            $tackles = Tackle::where('share_stock', '1')
            ->withCount(['goods'])->where('maker_name', 'like', '%'.$queryWord.'%'
            )->get();

            return Inertia::render('EveryoneTackle',compact('tackles'));
    }
}
