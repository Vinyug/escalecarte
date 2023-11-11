<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarteRequest;
use App\Models\Carte;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;

class PublicCarteController extends Controller
{
    public function create()
    {
        $instituts = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('index', compact('instituts'));
    }
    
    public function store(Request $request)
    {
        // data validation
        $request->validate([
            'montant' => [
                'required',
                'integer',
                'min:10',
                'max:1000',
            ],
            'aprenom' => [
                'string',
                'required',
            ],
            'anom' => [
                'string',
                'required',
            ],
            'amail' => [
                'string',
                'required',
            ],
            'amsg' => [
                'string',
            ],
            'deprenom' => [
                'string',
                'required',
            ],
            'denom' => [
                'string',
                'required',
            ],
            'demail' => [
                'string',
                'required',
            ],
            'institut_id' => [
                'required',
                'integer',
            ],
        ]);

        $request['ref'] = Str::uuid()->toString();

        $carte = Carte::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $carte->id]);
        }

        return redirect()->route('index');
    }
}
