@extends('layouts.app')

@section('content')
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
                            {{ $measure->created_at }}
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
                        <div
                            class="mb-3 px-4 py-1 bg-green-100 border border-green-400 text-green-700 rounded relative">
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
@endsection
