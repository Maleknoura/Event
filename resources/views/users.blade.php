<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <table class="items-center w-full bg-transparent border-collapse">
        <thead>
            <tr>
                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Evenement</th>
                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Action</th>
                <th class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px"></th>
            </tr>

        </thead>
        <tbody>

            @foreach($client as $cls)

            <tr class="text-gray-700 dark:text-gray-100">
                <th class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">{{ $cls->name }}</th>
                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                </td>
                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                    <div class="flex items-center">
                <td>
                    <button>restreindre l acces</button>

                </td>
                <div class="relative w-full">
                    <div class="overflow-hidden h-2 text-xs flex rounded bg-blue-200">
                        <div style="width: 70%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600"></div>
                    </div>
                </div>
                </div>
                </td>
            </tr>
            @endforeach

            </div>
            </div>
            </div>
</body>

</html>