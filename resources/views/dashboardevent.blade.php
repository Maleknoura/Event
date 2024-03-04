<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Liste des events</h1>


        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $evenement)
                <tr>
                    <td>{{ $evenement->id }}</td>
                    <td>{{ $evenement->name }}</td>
                    <td>

                        <form action="{{ route('destroy.event', ['id' => $evenement->id]) }}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                            @csrf
                            @method('delete')
                            <button type="submit">Supprimer</button>
                    </td>
                </tr>
                @endforeach
            </tbody>

</html>