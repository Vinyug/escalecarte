@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.carte.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cartes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.carte.fields.id') }}
                        </th>
                        <td>
                            {{ $carte->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carte.fields.ref') }}
                        </th>
                        <td>
                            {{ $carte->ref }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carte.fields.montant') }}
                        </th>
                        <td>
                            {{ $carte->montant }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carte.fields.aprenom') }}
                        </th>
                        <td>
                            {{ $carte->aprenom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carte.fields.anom') }}
                        </th>
                        <td>
                            {{ $carte->anom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carte.fields.amail') }}
                        </th>
                        <td>
                            {{ $carte->amail }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carte.fields.amsg') }}
                        </th>
                        <td>
                            {!! $carte->amsg !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carte.fields.deprenom') }}
                        </th>
                        <td>
                            {{ $carte->deprenom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carte.fields.denom') }}
                        </th>
                        <td>
                            {{ $carte->denom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carte.fields.demail') }}
                        </th>
                        <td>
                            {{ $carte->demail }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carte.fields.institut') }}
                        </th>
                        <td>
                            {{ $carte->institut->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carte.fields.stripeid') }}
                        </th>
                        <td>
                            {{ $carte->stripeid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carte.fields.statut') }}
                        </th>
                        <td>
                            {{ $carte->statut }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carte.fields.use') }}
                        </th>
                        <td>
                            {{ $carte->use }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cartes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection