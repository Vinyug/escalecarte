<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PublicCarteController extends Controller
{
    public function create()
    {
        $instituts = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('index', compact('instituts'));
    }

    // public function store(StoreCarteRequest $request)
    // {
    //     $carte = Carte::create($request->all());

    //     if ($media = $request->input('ck-media', false)) {
    //         Media::whereIn('id', $media)->update(['model_id' => $carte->id]);
    //     }

    //     return redirect()->route('admin.cartes.index');
    // }
}
