<!doctype html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture</title>

    <style>
        p {
            line-height: 1.5;
        }
        h4 {
            margin: 0;
        }
        .w-full {
            width: 100%;
        }
        .w-half {
            width: 50%;
        }
        .margin-top {
            margin-top: 1.25rem;
        }
        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            background-color: rgb(241 245 249);
        }
        table {
            width: 100%;
            border-spacing: 0;
        }
        table.products {
            font-size: 0.875rem;
        }
        table.products tr {
            background-color: rgb(96 165 250);
        }
        table.products th {
            color: #ffffff;
            padding: 0.5rem;
        }
        table tr.items {
            background-color: rgb(241 245 249);
        }
        table tr.items td {
            padding: 0.5rem;
        }
        .total {
            text-align: right;
            margin-top: 1rem;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <table class="w-full">
        <tr>
            <td class="w-half">
                <h2>Facture</h2>
            </td>
        </tr>
    </table>

    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div><h4>WoodyCraft4Shop</h4></div>
                    <div>Yakub ONAL</div>
                    <div>Paris</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="margin-top">
        <table class="products">
            <tr>
                <th>Quantité</th>
                <th>Nom</th>
                <th>Prix</th>
            </tr>
            @foreach($articles as $article)
            <tr class="items">
                <td>
                    {{ $article['quantite'] }}
                </td>
                <td>
                    {{ $article['nom'] }}
                </td>
                <td>
                    {{ $article['prix'] }}€
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="total">
        Total: {{ number_format($total, 2) }}€
    </div>
    <div class="footer margin-top">
        <h2>Instructions de paiement :</h2>
        <p>
            Veuillez envoyer votre chèque à l'adresse suivante :</br></br>

            Destinataire :</br>
            WoodyCraft4Shop</br>
            123 Rue de la Finance</br>
            75001 Paris</br>
            France</br></br>

            Assurez-vous d'écrire "Facture N° 2025-00123" au dos de votre chèque pour nous permettre d'identifier rapidement votre paiement.</br></br>

            Le chèque doit être libellé à l'ordre de WoodyCraft4Shop.
        </p>
        <div>&copy; WoodyCraft4Shop</div>
    </div>
</body>
</html>
