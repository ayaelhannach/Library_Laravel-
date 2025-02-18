<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Rapport Administratif</h1>
    <p>Date : {{ $date }}</p>

    <table>
        <tr>
            <th>Catégorie</th>
            <th>Nombre</th>
        </tr>
        <tr>
            <td>Livres</td>
            <td>{{ $books }}</td>
        </tr>
        <tr>
            <td>Utilisateurs</td>
            <td>{{ $users }}</td>
        </tr>
        <tr>
            <td>Prêts</td>
            
        </tr>
    </table>
</body>
</html>
