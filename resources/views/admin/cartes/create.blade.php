@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.carte.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cartes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="ref">{{ trans('cruds.carte.fields.ref') }}</label>
                <input class="form-control {{ $errors->has('ref') ? 'is-invalid' : '' }}" type="text" name="ref" id="ref" value="{{ old('ref', '') }}" required>
                @if($errors->has('ref'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ref') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carte.fields.ref_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="montant">{{ trans('cruds.carte.fields.montant') }}</label>
                <input class="form-control {{ $errors->has('montant') ? 'is-invalid' : '' }}" type="number" name="montant" id="montant" value="{{ old('montant', '') }}" step="1" required>
                @if($errors->has('montant'))
                    <div class="invalid-feedback">
                        {{ $errors->first('montant') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carte.fields.montant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="aprenom">{{ trans('cruds.carte.fields.aprenom') }}</label>
                <input class="form-control {{ $errors->has('aprenom') ? 'is-invalid' : '' }}" type="text" name="aprenom" id="aprenom" value="{{ old('aprenom', '') }}" required>
                @if($errors->has('aprenom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('aprenom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carte.fields.aprenom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="anom">{{ trans('cruds.carte.fields.anom') }}</label>
                <input class="form-control {{ $errors->has('anom') ? 'is-invalid' : '' }}" type="text" name="anom" id="anom" value="{{ old('anom', '') }}" required>
                @if($errors->has('anom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('anom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carte.fields.anom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amail">{{ trans('cruds.carte.fields.amail') }}</label>
                <input class="form-control {{ $errors->has('amail') ? 'is-invalid' : '' }}" type="text" name="amail" id="amail" value="{{ old('amail', '') }}" required>
                @if($errors->has('amail'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amail') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carte.fields.amail_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amsg">{{ trans('cruds.carte.fields.amsg') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('amsg') ? 'is-invalid' : '' }}" name="amsg" id="amsg">{!! old('amsg') !!}</textarea>
                @if($errors->has('amsg'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amsg') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carte.fields.amsg_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="deprenom">{{ trans('cruds.carte.fields.deprenom') }}</label>
                <input class="form-control {{ $errors->has('deprenom') ? 'is-invalid' : '' }}" type="text" name="deprenom" id="deprenom" value="{{ old('deprenom', '') }}" required>
                @if($errors->has('deprenom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deprenom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carte.fields.deprenom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="denom">{{ trans('cruds.carte.fields.denom') }}</label>
                <input class="form-control {{ $errors->has('denom') ? 'is-invalid' : '' }}" type="text" name="denom" id="denom" value="{{ old('denom', '') }}" required>
                @if($errors->has('denom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('denom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carte.fields.denom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="demail">{{ trans('cruds.carte.fields.demail') }}</label>
                <input class="form-control {{ $errors->has('demail') ? 'is-invalid' : '' }}" type="text" name="demail" id="demail" value="{{ old('demail', '') }}" required>
                @if($errors->has('demail'))
                    <div class="invalid-feedback">
                        {{ $errors->first('demail') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carte.fields.demail_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="institut_id">{{ trans('cruds.carte.fields.institut') }}</label>
                <select class="form-control select2 {{ $errors->has('institut') ? 'is-invalid' : '' }}" name="institut_id" id="institut_id" required>
                    @foreach($instituts as $id => $entry)
                        <option value="{{ $id }}" {{ old('institut_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('institut'))
                    <div class="invalid-feedback">
                        {{ $errors->first('institut') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carte.fields.institut_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stripeid">{{ trans('cruds.carte.fields.stripeid') }}</label>
                <input class="form-control {{ $errors->has('stripeid') ? 'is-invalid' : '' }}" type="text" name="stripeid" id="stripeid" value="{{ old('stripeid', '') }}">
                @if($errors->has('stripeid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stripeid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carte.fields.stripeid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="statut">{{ trans('cruds.carte.fields.statut') }}</label>
                <input class="form-control {{ $errors->has('statut') ? 'is-invalid' : '' }}" type="text" name="statut" id="statut" value="{{ old('statut', '') }}">
                @if($errors->has('statut'))
                    <div class="invalid-feedback">
                        {{ $errors->first('statut') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carte.fields.statut_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="use">{{ trans('cruds.carte.fields.use') }}</label>
                <input class="form-control date {{ $errors->has('use') ? 'is-invalid' : '' }}" type="text" name="use" id="use" value="{{ old('use') }}">
                @if($errors->has('use'))
                    <div class="invalid-feedback">
                        {{ $errors->first('use') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carte.fields.use_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.cartes.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $carte->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection