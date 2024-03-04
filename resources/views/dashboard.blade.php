<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



<x-app-layout>

    <div>
        <button id="ajouterCategorieBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Ajouter une catégorie
        </button>
    </div>

    <div class="container">
        <h1>Liste des catégories</h1>


        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cat as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td></td>
                    <td>{{ $category->name }}</td>
                    <td> <a href="javascript:void(0);" class="edit-icon" data-id="{{ $category->id }}" onclick="openUpdatePopup({{ $category->id }}, '{{ $category->name }}')">
                            <i class='bx bx-edit'></i>
                        </a>

                    </td>
                    <td>

                        <form action="{{ route('destroy', ['id' => $category->id]) }}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                            @csrf
                            @method('delete')
                            <button type="submit">Supprimer</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>



    <div id="popupAjoutCategorie" class="fixed inset-0 bg-gray-700 bg-opacity-50 hidden justify-center items-center">
        <div class="bg-white p-8 rounded shadow-md">
            <h2 class="text-2xl font-bold mb-4">Ajouter une catégorie</h2>

            <!-- Formulaire d'ajout de catégorie (exemple) -->
            <form action="{{ route('store') }}" method="post">
                @csrf
                <label for="nomCategorie" class="block text-sm font-medium text-gray-700">Nom de la catégorie:</label>
                <input type="text" id="nomCategorie" name="name" class="mt-1 p-2 border rounded-md w-full">

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

</x-app-layout>