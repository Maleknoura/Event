<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>

    <title>Document</title>
</head>

<body>
    <div class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
        @extends('layout')
    </div>




    <!-- Snippet -->
    <section class="flex flex-col justify-center antialiased bg-gray-100 text-gray-600 min-h-screen p-4">
        <div class="h-full">
            <!-- Table -->
            <div class="w-full  max-w-2xl  mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            @foreach($events as $evenement)
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Evenement</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Description</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-left">Place_available</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Organiser</div>
                                    </th>
                                    <th class="p-2 whitespace-nowrap">
                                        <div class="font-semibold text-center">Action</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                <tr>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">

                                            <div class="font-medium text-gray-800">{{ $evenement->name }}</div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">testdescription</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left font-medium text-green-500">25</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center">test</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center">Accepter</div>
                                    </td>
                                </tr>


                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>






</body>

</html>