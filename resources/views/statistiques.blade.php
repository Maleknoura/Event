<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
@extends('layout')
<div class=" flex justify-center items-center ml-64 mt-24 ">
<ul>
            <li>Nombre de catégories : {{ $categoriesCount }}</li>
            <li>Nombre de clients : {{ $clientsCount }}</li>
            <li>Nombre d'organisateurs : {{ $organizersCount }}</li>
            <li>Nombre d'événements : {{ $eventsCount }}</li>
        </ul>
</div>
</body>
</html>











<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>
    @extends('layout')
    <div class="flex justify-end">
        <button id="ajouterCategorieBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Ajouter une catégorie
        </button>
    </div>
    <div class=" flex justify-center items-center ml-64 mt-24 ">

        <div class="flex flex-col">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700 ">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>

                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Category Name
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">

                                    </th>
                                    <th scope="col" class="py-7 px-9 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Action
                                    </th>

                                    <th scope="col" class="p-4">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach($cat as $category)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $category->name }}</td>
                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                        <form action=method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                                            @csrf
                                            <button type="submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                <td>

                                </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div id="popupAjoutCategorie" class="fixed bg-gray-700 bg-opacity-50 hidden top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 ">
        <div class="backdrop-filter backdrop-blur-sm"></div>
        <div class="bg-white p-8 rounded shadow-md">
            <h2 class="text-2xl font-bold mb-4">Ajouter une catégorie</h2>

            <!-- Formulaire d'ajout de catégorie (exemple) -->
            <form action="{{ route('store') }}" method="post">
                @csrf
                <label for="nomCategorie" class="block text-sm font-medium text-gray-700">Nom de la catégorie:</label>
                <input type="text" id="nomCategorie" name="name" class="mt-1 p-2 border rounded-md ">

                <!-- Bouton de soumission du formulaire (exemple) -->
                <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Ajouter
                </button>
            </form>

            <!-- Bouton de fermeture du popup -->
            <button id="fermerPopupBtn" class="mt-4 text-sm text-gray-600 hover:text-gray-800">
                Fermer
            </button>
        </div>
    </div>

    <script>
        // JavaScript pour gérer l'affichage du popup
        const ajouterCategorieBtn = document.getElementById('ajouterCategorieBtn');
        const popupAjoutCategorie = document.getElementById('popupAjoutCategorie');
        const fermerPopupBtn = document.getElementById('fermerPopupBtn');

        ajouterCategorieBtn.addEventListener('click', () => {
            popupAjoutCategorie.classList.remove('hidden');
        });

        fermerPopupBtn.addEventListener('click', () => {
            popupAjoutCategorie.classList.add('hidden');
        });
    </script>
    <div id="updatePopup" class="fixed inset-0 bg-gray-700 bg-opacity-50 hidden justify-center items-center">
        <div class="bg-white p-8 rounded shadow-md">
            <h2 class="text-2xl font-bold mb-4">Modifier la catégorie</h2>

            <!-- Formulaire de mise à jour -->
            <form id="updateForm" action="" method="post">
                @csrf
                <input type="hidden" name="id" id="category_id">
                <label for="category_name">Nouveau nom de la catégorie:</label>
                <input type="text" id="category_name" name="categoryname" class="mt-1 p-2 border rounded-md w-full" required>

                <!-- Bouton de soumission du formulaire (exemple) -->
                <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Mettre à jour
                </button>
            </form>

            <!-- Bouton de fermeture du popup -->
            <button onclick="closeUpdatePopup()" class="mt-4 text-sm text-gray-600 hover:text-gray-800">
                Fermer
            </button>
        </div>
    </div>
    <script>
        function openUpdatePopup(categoryId, categoryName) {
            // Récupérer le formulaire de mise à jour
            let updateForm = document.getElementById('updateForm');

            // Pré-remplir les champs avec les données actuelles
            updateForm.elements['category_id'].value = categoryId;
            updateForm.elements['category_name'].value = categoryName;

            // Afficher le popup
            document.getElementById('updatePopup').classList.remove('hidden');
        }

        function closeUpdatePopup() {
            // Cacher le popup
            document.getElementById('updatePopup').classList.add('hidden');
        }
    </script>
</body>

</html>
::://////dashboard 