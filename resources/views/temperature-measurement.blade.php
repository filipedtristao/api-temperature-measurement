<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

<div class="text-gray-900 bg-gray-200 min-h-screen">
    <div class="p-4 flex">
        <h1 class="text-3xl">
            Histórico de Medição
        </h1>
    </div>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">

            <thead>
            <tr class="border-b">
                <th class="text-left p-3 px-5">Temperatura</th>
                <th class="text-left p-3 px-5">Temperatura Min.</th>
                <th class="text-left p-3 px-5">Temperatura Max.</th>
                <th class="text-left p-3 px-5">Notificável</th>
                <th class="text-left p-3 px-5">Data</th>
                <th></th>
            </tr>
            </thead>

            <tbody>

            @foreach($temperatureMeasurements as $measure)
                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                    <td class="p-3 px-5">
                        {{ $measure->temperature }}
                    </td>
                    <td class="p-3 px-5">
                        {{ $measure->min_temperature }}
                    </td>
                    <td class="p-3 px-5">
                        {{ $measure->max_temperature }}
                    </td>
                    <td class="p-3 px-5">
                        {{ $measure->is_notifiable ? 'SIM' : 'NÃO' }}
                    </td>
                    <td class="p-3 px-5">
                        {{ $measure->created_at->format('d/m/Y H:i') }}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>
