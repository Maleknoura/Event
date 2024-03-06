<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @extends('layout')
    <!-- ./Sidebar -->

    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl">{{ $categoriesCount }}</p>
                    <p>Categories</p>
                </div>
            </div>
            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl">{{ $clientsCount }}</p>
                    <p>Clients</p>
                </div>
            </div>
            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl">{{ $eventsCount }}</p>
                    <p>Evenements</p>
                </div>
            </div>
            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl">{{ $organizersCount }}</p>
                    <p>Les Organisateurs</p>
                </div>
            </div>
        </div>
        <!-- ./Statistics Cards -->

        <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">

            <!-- Social Traffic -->
            <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                <div class="rounded-t mb-0 px-0 border-0">
                    <div class="flex flex-wrap items-center px-4 py-2">
                        <div class="relative w-full max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Categories</h3>
                        </div>
                        <div class="relative w-full max-w-full flex-grow flex-1 text-right">
                            <button id="ajouterCategorieBtn" class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                New Catégorie
                            </button>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Category</th>
                                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Action</th>
                                    <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cat as $category)
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">{{ $category->name }}</th>
                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <button onclick="openUpdatePopup" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Modifier la catégorie
                                        </button>

                                    </td>
                                    <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex items-center">
                                            <form action="" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </div>
                    </div>
                </div>
                </td>
                </tr>

                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- ./Social Traffic -->

    <!-- Recent Activities -->
    <div class="relative flex flex-col min-w-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
        <div class="rounded-t  px-0 border-0">
            <div class="flex mb-5 flex-wrap items-center px-4 py-2">
                <div class="relative w-full max-w-full flex-grow flex-1 text-right">
                </div>
            </div>
            <div class="block w-full">
                <div class="px-4  bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                    Users
                </div>
                <ul class="my-1">
                    @foreach($users as $usr)
                    <li class="flex px-4">
                        <div class="w-9 h-9 rounded-full flex-shrink-0 bg-indigo-500 my-2 mr-3">
                            <svg class="w-9 h-9 fill-current text-indigo-50" viewBox="0 0 36 36">
                                <path d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path>
                            </svg>
                        </div>
                        <div class="flex-grow flex items-center border-b border-gray-100 dark:border-gray-400 text-sm text-gray-600 dark:text-gray-100 py-2">
                            <div class="flex-grow flex justify-between items-center">
                                <div class="self-center">
                                    <p>
                                        {{ $usr->name }}
                                    </p>
                                </div>
                                <form method="POST" action="{{ route('users.update', $usr) }}">
                                    @csrf
                                    @method('PATCH')

                                    <input type="hidden" name="status" value="{{ $usr->status ? '0' : '1' }}">
                                    <button type="submit" class="bg-{{ $usr->status ? 'green' : 'red' }}-500 text-white text-sm px-3 py-1 rounded">
                                        {{ $usr->status ? 'Unban' : 'Ban' }}
                                    </button>
                                </form>
                            </div>
                        </div>
            </div>
            </li>
            @endforeach
            </ul>
        </div>
    </div>
    </div>

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
    <div id="popupAjoutCategorie" class="fixed bg-gray-700 bg-opacity-50 hidden top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 ">
        <div class="backdrop-filter backdrop-blur-sm"></div>
        <div class="bg-white p-8 rounded shadow-md">
            <h2 class="text-2xl font-bold mb-4">Ajouter une catégorie</h2>


            <form action="{{ route('store') }}" method="post">
                @csrf
                <label for="nomCategorie" class="block text-sm font-medium text-gray-700">Nom de la catégorie:</label>
                <input type="text" id="nomCategorie" name="name" class="mt-1 p-2 border rounded-md ">


                <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Ajouter
                </button>
            </form>

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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script>
        const setup = () => {
            const getTheme = () => {
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                }
                return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
                window.localStorage.setItem('dark', value)
            }

            return {
                loading: true,
                isDark: getTheme(),
                toggleTheme() {
                    this.isDark = !this.isDark
                    setTheme(this.isDark)
                },
            }
        }
    </script>
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