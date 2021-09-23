<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome/>
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/jquery.js') }}"></script>
    <script type="text/javascript">
        var el = ['a', 'b', 'c', 'd'];

        function combination(elements) {
            if (elements.length === 0) return [[]];
            const firstEl = elements[0];
            const rest = elements.slice(1);
            const combsWithoutFirst = combination(rest);
            const combsWithFirst = [];

            combsWithoutFirst.forEach(comb => {
                const combWithFirst = [...comb, firstEl];
                combsWithFirst.push(combWithFirst);
            });
            return [...combsWithoutFirst, ...combsWithFirst];
        }

        async function getAllItem() {
            let response = await $.get('/all-item');
            const {data} = response;
            let combination_chance = combination(data);
            // let resPost = await $.post('/test-to-map', {
            //     combination_chance
            // });
            console.log(combination_chance);
            // console.log(data);
        }

        $(document).ready(function () {
            console.log('test');
            getAllItem();
            // console.log(combination(el));
        })
    </script>
</x-app-layout>


