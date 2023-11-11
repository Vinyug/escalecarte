<div class="w-full p-4 lg:w-1/2">
    <h1 class="text-2xl font-semibold mb-4">Carte cadeau</h1>
    <form action="" method="POST">
    @csrf

        <div class="mb-4">
            <label for="institute" class="block text-lg font-semibold mb-2">Institut</label>
            <select name="institute" id="institute" class="w-full border p-2 rounded">
                <option value="institute1">Institut 1</option>
                <option value="institute2">Institut 2</option>
                <option value="institute3">Institut 3</option>
            </select>
        </div>

        <div>
            <h2 class="block text-lg font-semibold mb-2">De la part :</h2>
            <div class="flex mb-4">
                <input type="text" name="deprenom" id="deprenom" class="w-1/2 border mr-2 p-2 rounded" placeholder="Prénom">
                <input type="text" name="denom" id="denom" class="w-1/2 border ml-2 p-2 rounded" placeholder="Nom">
            </div>
            <div class="mb-4">
                <input type="text" name="demail" id="demail" class="w-full border p-2 rounded" placeholder="Email">
            </div>
        </div>

        <div>
            <h2 class="block text-lg font-semibold mb-2">À l'intention de :</h2>
            <div class="flex mb-4">
                <input type="text" name="aprenom" id="aprenom" class="w-1/2 border mr-2 p-2 rounded" placeholder="Prénom">
                <input type="text" name="anom" id="anom" class="w-1/2 border ml-2 p-2 rounded" placeholder="Nom">
            </div>
            <div class="mb-4">
                <input type="text" name="amail" id="amail" class="w-full border p-2 rounded" placeholder="Email">
            </div>
            <div class="mb-4">
                <textarea name="amsg" id="amsg" class="w-full h-32 border p-2 rounded" placeholder="Message"></textarea>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-lg font-semibold mb-2">Montant</label>
            
            <div class="flex space-x-4 font-semibold mb-4">
                <div>
                    <input type="radio" class="peer hidden" name="montant" value="10" id="montant_10">
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
            </div>
            <div class="ml-4 font-semibold">
                <input type="radio" class="peer hidden" name="montant" value="autre" id="montant_autre">
                <label for="montant_autre">Autre montant</label>
            </div>
            <input type="text" name="montant_personnalise" id="montant_personnalise" class="w-full border p-2 rounded mt-2">
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Payer</button>
    </form>
</div>