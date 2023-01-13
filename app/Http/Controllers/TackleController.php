<?php

namespace App\Http\Controllers;

use App\Models\Tackle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class TackleController extends Controller
{


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'tackle_name' => ['required', 'string', 'max:255'],
            'maker_name' => ['required', 'string', 'email', 'max:255'],
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tackles = Auth::user()->tackles;
        return Inertia::render('Tackle/Index', compact('tackles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tackles = Auth::user()->tackles;
        return Inertia::render('Tackle/create', compact('tackles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $tackles = new Tackle();
        $tackles->tackle_name = $request->input('tackle_name');
        $tackles->maker_name = $request->input('maker_name');
        $tackles->genre_name = $request->input('genre_name');
        $tackles->amount = $request->input('amount');
        $tackles->purchase_date = $request->input('purchase_date');
        $tackles->purchase_fee = $request->input('purchase_fee');
        $tackles->detailed_info = $request->input('detailed_info');
        $tackles->stock_check = $request->input('stock_check');
        $tackles->fish_category = $request->input('fish_category');
        $tackles->size = $request->input('size');
        $tackles->weight = $request->input('weight');
        $tackles->condition = $request->input('condition');
        $tackles->fishing_date = $request->input('fishing_date');
        $tackles->share_stock = $request->input('share_stock');
        $tackles->user_id = Auth::id();
        
        if($request->tacklePhoto) {
        $file_name = $request->file('tacklePhoto')->getClientOriginalName();//元のファイル名を取得
        $request->file('tacklePhoto')->storeAs('public',$file_name);//アップロードされたファイルを保存
        $tackles['tackle_photo'] = '/storage/'.$file_name;
        }

        if($request->fishingPhoto) {
        $file_name = $request->file('fishingPhoto')->getClientOriginalName();//元のファイル名を取得
        $request->file('fishingPhoto')->storeAs('public',$file_name);//アップロードされたファイルを保存
        $tackles['fishingresult_photo'] = '/storage/'.$file_name;
        }

        $tackles->save();


        return redirect()->route('tackle.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tackle  $tackle
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Tackle $tackle, $id)
    {
        //

        $tackles = Tackle::find($id);

        return Inertia::render('Tackle/Tackle_edit', compact('tackles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tackle  $tackle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tackle $tackle,$id)
    {
        //
        $tackles = Tackle::find($id);

        if($request->file('tacklePhoto')) {
        $file_name = $request->file('tacklePhoto')->getClientOriginalName();//元のファイル名を取得
        $request->file('tacklePhoto')->storeAs('public',$file_name);//アップロードされたファイルを保存
        $tackles['tackle_photo'] = '/storage/'.$file_name;
        }

        if($request->fishingPhoto) {
        $file_name = $request->file('fishingPhoto')->getClientOriginalName();//元のファイル名を取得
        $request->file('fishingPhoto')->storeAs('public',$file_name);//アップロードされたファイルを保存
        $tackles['fishingresult_photo'] = '/storage/'.$file_name;
        }

        $tackles->tackle_name = $request->input('tackle_name');
        $tackles->maker_name = $request->input('maker_name');
        $tackles->genre_name = $request->input('genre_name');
        $tackles->amount = $request->input('amount');
        $tackles->purchase_date = $request->input('purchase_date');
        $tackles->purchase_fee = $request->input('purchase_fee');
        $tackles->detailed_info = $request->input('detailed_info');
        $tackles->stock_check = $request->input('stock_check');
        $tackles->fish_category = $request->input('fish_category');
        $tackles->size = $request->input('size');
        $tackles->weight = $request->input('weight');
        $tackles->condition = $request->input('condition');
        $tackles->fishing_date = $request->input('fishing_date');
        $tackles->share_stock = $request->input('share_stock');
        Log::alert('popo');

        $tackles->save();

        return redirect()->route('tackle.edit',[$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tackle  $tackle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Tackle $tackle, $id)
    {
        //
        $tackle = Tackle::find($id);

        $tackle->delete();
        return redirect()->route('tackle.index');
    }
}
