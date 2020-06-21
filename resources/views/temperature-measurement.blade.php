<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

<style>
    .input {
        transition: border 0.2s ease-in-out;
        min-width: 280px
    }

    .input:focus + .label,
    .input:active + .label,
    .input.filled + .label {
        font-size: .75rem;
        transition: all 0.2s ease-out;
        top: -0.1rem;
        color: #667eea;
    }

    .label {
        transition: all 0.2s ease-out;
        top: 0.4rem;
        left: 0;
    }
</style>

<div class="text-gray-900 bg-gray-200 min-h-screen">
    <div class="hidden bg-blue-dark md:block md:bg-white md:border-b">
        <div class="container mx-auto px-4">
            <div class="md:flex">
                <div class="flex -mb-px mr-8">
                    <div href="#"
                         class="no-underline md:text-indigo-600 flex items-center py-4 border-b border-blue-dark">
                        <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M3.889 3h6.222a.9.9 0 0 1 .889.91v8.18a.9.9 0 0 1-.889.91H3.89A.9.9 0 0 1 3 12.09V3.91A.9.9 0 0 1 3.889 3zM3.889 15h6.222c.491 0 .889.384.889.857v4.286c0 .473-.398.857-.889.857H3.89C3.398 21 3 20.616 3 20.143v-4.286c0-.473.398-.857.889-.857zM13.889 11h6.222a.9.9 0 0 1 .889.91v8.18a.9.9 0 0 1-.889.91H13.89a.9.9 0 0 1-.889-.91v-8.18a.9.9 0 0 1 .889-.91zM13.889 3h6.222c.491 0 .889.384.889.857v4.286c0 .473-.398.857-.889.857H13.89C13.398 9 13 8.616 13 8.143V3.857c0-.473.398-.857.889-.857z"></path>
                        </svg>
                        Histórico de medições
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center px-16 py-4 text-md">
        <div class="w-8/12">
            <table class="w-full bg-white shadow-md rounded mb-4">
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

        <div class="w-4/12 pl-4">
            <div class="bg-white rounded shadow-md p-2">
                <div class="mb-3 font-bold">Alerta</div>

                <form action="{{ route('configurations') }}" method="POST">
                    @csrf

                    @if(!empty(\Session::get('success')))
                        <div class="mb-3 px-4 py-1 bg-green-100 border border-green-400 text-green-700 rounded relative">
                            <strong class="font-bold">
                                {{ \Session::get('success') }}
                            </strong>
                        </div>
                    @endif

                    <div class="mb-4 relative">
                        <input
                            class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-indigo-600 focus:outline-none active:outline-none active:border-indigo-600"
                            id="min_temperature" name="min_temperature" type="text" value="{{ $minTemperature }}">

                        <label for="email"
                               class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">
                            Temperatura mínima
                        </label>
                    </div>

                    <div class="mb-4 relative">
                        <input
                            class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-indigo-600 focus:outline-none active:outline-none active:border-indigo-600"
                            id="max_temperature" name="max_temperature" type="text" value="{{ $maxTemperature }}">

                        <label for="password"
                               class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">
                            Temperatura máxima
                        </label>
                    </div>

                    <button type="submit"
                            class="bg-indigo-600 text-white font-bold py-3 px-6 rounded">
                        Salvar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let toggleInputContainer = function (input) {
        if (input.value != "") {
            input.classList.add('filled');
        } else {
            input.classList.remove('filled');
        }
    }

    let labels = document.querySelectorAll('.label');

    for (var i = 0; i < labels.length; i++) {
        labels[i].addEventListener('click', function () {
            this.previousElementSibling.focus();
        });
    }

    window.addEventListener("load", function () {
        var inputs = document.getElementsByClassName("input");
        for (var i = 0; i < inputs.length; i++) {
            console.log('looped');
            inputs[i].addEventListener('keyup', function () {
                toggleInputContainer(this);
            });
            toggleInputContainer(inputs[i]);
        }
    });
</script>
