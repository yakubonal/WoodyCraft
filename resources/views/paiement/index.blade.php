<x-app-layout>
    <div class="container my-5">
        <h2>Choisissez votre mode de paiement</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>PayPal</h5>
                        <form action="{{ route('paiement.paypal') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Payer avec PayPal</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5>Chèque</h5>
                        <form action="{{ route('paiement.cheque') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Payer par chèque</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
