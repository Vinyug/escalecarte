<div class="w-full p-4 lg:w-1/2">
    <h1 class="text-2xl font-semibold mb-4">Carte cadeau</h1>
    <form method="POST" action="{{ route("giftcard.store") }}" enctype="multipart/form-data">
    @csrf

        <div class="mb-4">
            <label for="institut_id" class="block text-lg font-semibold mb-2">{{ trans('cruds.carte.fields.institut') }} *</label>
            <select name="institut_id" id="institut_id" class="w-full border p-2 rounded" required>
                @foreach($instituts as $id => $entry)
                    @if ($id === 1)
                        @continue
                    @endif
                    <option value="{{ $id }}" {{ old('institut_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                @endforeach
            </select>
            @error('institut_id')
            <div class="">{{ $errors->first('institut') }}</div>
            @enderror
        
            <span class="">{{ trans('cruds.carte.fields.institut_helper') }}</span>
        </div>

        <div>
            <h2 class="block text-lg font-semibold mb-2">De la part :</h2>
            <div class="flex mb-4">
                <input type="text" name="deprenom" id="deprenom" class="w-1/2 border mr-2 p-2 rounded" value="{{ old('deprenom', '') }}" placeholder="{{ trans('cruds.carte.fields.deprenom') }} *" required>
                @error('deprenom')
                <div class="">{{ $errors->first('deprenom') }}</div>
                @enderror
                <span class="">{{ trans('cruds.carte.fields.deprenom_helper') }}</span>
                
                <input type="text" name="denom" id="denom" class="w-1/2 border mr-2 p-2 rounded" value="{{ old('denom', '') }}" placeholder="{{ trans('cruds.carte.fields.denom') }} *" required>
                @error('denom')
                <div class="">{{ $errors->first('denom') }}</div>
                @enderror
                <span class="">{{ trans('cruds.carte.fields.denom_helper') }}</span>
            </div>
            <div class="mb-4">
                <input type="text" name="demail" id="demail" class="w-full border mr-2 p-2 rounded" value="{{ old('demail', '') }}" placeholder="{{ trans('cruds.carte.fields.demail') }} *" required>
                @error('demail')
                <div class="">{{ $errors->first('demail') }}</div>
                @enderror
                <span class="">{{ trans('cruds.carte.fields.demail_helper') }}</span>
            </div>
        </div>

        <div>
            <h2 class="block text-lg font-semibold mb-2">À l'intention de :</h2>
            <div class="flex mb-4">
                <input type="text" name="aprenom" id="aprenom" class="w-1/2 border mr-2 p-2 rounded" value="{{ old('aprenom', '') }}" placeholder="{{ trans('cruds.carte.fields.aprenom') }} *" required>
                @error('aprenom')
                <div class="">{{ $errors->first('aprenom') }}</div>
                @enderror
                <span class="">{{ trans('cruds.carte.fields.aprenom_helper') }}</span>
                
                <input type="text" name="anom" id="anom" class="w-1/2 border mr-2 p-2 rounded" value="{{ old('anom', '') }}" placeholder="{{ trans('cruds.carte.fields.anom') }} *" required>
                @error('anom')
                <div class="">{{ $errors->first('anom') }}</div>
                @enderror
                <span class="">{{ trans('cruds.carte.fields.anom_helper') }}</span>
            </div>
            <div class="mb-4">
                <input type="text" name="amail" id="amail" class="w-full border mr-2 p-2 rounded" value="{{ old('amail', '') }}" placeholder="{{ trans('cruds.carte.fields.amail') }} *" required>
                @error('amail')
                <div class="">{{ $errors->first('amail') }}</div>
                @enderror
                <span class="">{{ trans('cruds.carte.fields.amail_helper') }}</span>
            </div>
            <div class="mb-4">
                <textarea name="amsg" id="amsg" class="w-full h-32 border p-2 rounded" placeholder="{{ trans('cruds.carte.fields.amsg') }}">{!! old('amsg') !!}</textarea>
                @error('amsg')
                <div class="">{{ $errors->first('amsg') }}</div>
                @enderror
                <span class="">{{ trans('cruds.carte.fields.amsg_helper') }}</span>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-lg font-semibold mb-2">Montant</label>
            
            <div class="flex space-x-4 font-semibold mb-4">
                {{-- <div>
                    <input type="radio" class="peer hidden" name="montant" value="10" id="montant_10" checked>
                    <label for="montant_10" class="block cursor-pointer select-none rounded-md px-4 py-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">10€</label>
                </div>

                <div>
                    <input type="radio" class="peer hidden" name="montant" value="50" id="montant_50">
                    <label for="montant_50" class="block cursor-pointer select-none rounded-md px-4 py-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">50€</label>
                </div>

                <div>
                    <input type="radio" class="peer hidden" name="montant" value="100" id="montant_100">
                    <label for="montant_100" class="block cursor-pointer select-none rounded-md px-4 py-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">100€</label>
                </div>

                <div class="ml-4 font-semibold">
                    <input type="radio" class="peer hidden" name="montant" value="autre" id="montant_autre">
                    <label for="montant_autre" class="block cursor-pointer select-none rounded-md px-4 py-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">Autre montant</label>
                </div> --}}

                <input type="text" name="montant" id="montant_personnalise" value="{{ old('montant', '') }}" class="w-32 border p-2 rounded" placeholder="Valeur">
                @error('montant')
                <div class="">{{ $errors->first('montant') }}</div>
                @enderror
                <span class="">{{ trans('cruds.carte.fields.montant_helper') }}</span>
            </div>
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Payer</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputMontantPersonnalise = document.getElementById('montant_personnalise');
        const radioAutreMontant = document.getElementById('montant_autre');

        inputMontantPersonnalise.addEventListener('click', function() {
            // Checked "Autre montant" when inputMontantPersonnalise focused
            radioAutreMontant.checked = true;
        });
    });
</script>