<div class="w-full p-4 lg:w-1/2">
    <h1 class="text-2xl font-semibold mb-4">Bon d'Achat</h1>
    
    <div class="relative">
        <img class="min-w-[464px]" src="{{ asset('assets/images/gift_card.png') }}" alt="tag">
        <div class="absolute top-[6.05rem] left-[6.25rem] text-lg font-bold">
            <p class="mb-[1.25rem]" id="sender">Prénom Nom</p>
            <p class="mb-[1.25rem] ml-6" id="recipient">Prénom Nom</p>
            <p class="ml-10" id="amount">- €</p>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        let deprenomInput = document.getElementById('deprenom');
        let denomInput = document.getElementById('denom');
        let aprenomInput = document.getElementById('aprenom');
        let anomInput = document.getElementById('anom');
        let montantPersonnaliseInput = document.getElementById('montant_personnalise');

        let senderElement = document.getElementById('sender');
        let recipientElement = document.getElementById('recipient');
        let amountElement = document.getElementById('amount');

        function updateSender() {
            let deprenomValue = deprenomInput.value;
            let denomValue = denomInput.value;

            deprenomValue = deprenomValue.charAt(0).toUpperCase() + deprenomValue.slice(1);
            denomValue = denomValue.toUpperCase();

            senderElement.textContent = deprenomValue + ' ' + denomValue;
        }

        function updateRecipient() {
            let aprenomValue = aprenomInput.value;
            let anomValue = anomInput.value;

            aprenomValue = aprenomValue.charAt(0).toUpperCase() + aprenomValue.slice(1);
            anomValue = anomValue.toUpperCase();

            recipientElement.textContent = aprenomValue + ' ' + anomValue;
        }

        function updateAmount() {
            let montantPersonnaliseValue = montantPersonnaliseInput.value;

            amountElement.textContent = montantPersonnaliseValue + ' €';
        }

        deprenomInput.addEventListener('input', updateSender);
        denomInput.addEventListener('input', updateSender);
        aprenomInput.addEventListener('input', updateRecipient);
        anomInput.addEventListener('input', updateRecipient);
        montantPersonnaliseInput.addEventListener('input', updateAmount);
    });
</script>