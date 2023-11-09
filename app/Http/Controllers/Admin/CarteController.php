<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCarteRequest;
use App\Http\Requests\StoreCarteRequest;
use App\Http\Requests\UpdateCarteRequest;
use App\Models\Carte;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CarteController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('carte_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cartes = Carte::with(['institut'])->get();

        $users = User::get();

        return view('admin.cartes.index', compact('cartes', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('carte_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instituts = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.cartes.create', compact('instituts'));
    }

    public function store(StoreCarteRequest $request)
    {
        $carte = Carte::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $carte->id]);
        }

        return redirect()->route('admin.cartes.index');
    }

    public function edit(Carte $carte)
    {
        abort_if(Gate::denies('carte_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instituts = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carte->load('institut');

        return view('admin.cartes.edit', compact('carte', 'instituts'));
    }

    public function update(UpdateCarteRequest $request, Carte $carte)
    {
        $carte->update($request->all());

        return redirect()->route('admin.cartes.index');
    }

    public function show(Carte $carte)
    {
        abort_if(Gate::denies('carte_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carte->load('institut');

        return view('admin.cartes.show', compact('carte'));
    }

    public function destroy(Carte $carte)
    {
        abort_if(Gate::denies('carte_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carte->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarteRequest $request)
    {
        $cartes = Carte::find(request('ids'));

        foreach ($cartes as $carte) {
            $carte->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('carte_create') && Gate::denies('carte_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Carte();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
