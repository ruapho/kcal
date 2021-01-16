<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recipes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('message'))
                <div class="bg-green-200 border-2 border-green-600 p-2 mb-2">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($recipes as $recipe)
                            <div class="p-2 font-light rounded-lg border-2 border-gray-200">
                                <a class="text-gray-500 hover:text-gray-700 hover:border-gray-300 float-right text-sm"
                                   href="{{ route('recipes.edit', $recipe) }}">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <div class="pb-2 lowercase flex justify-between items-baseline">
                                    <div class="text-2xl">
                                        <a href="{{ route('recipes.show', $recipe) }}"
                                           class="text-gray-600 hover:text-gray-800">{{ $recipe->name }}</a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 text-sm border-t-8 border-black pt-2">
                                    <div class="col-span-2 text-xs text-right">Amount per serving</div>
                                    <div class="font-extrabold text-lg border-b-4 border-black">Calories</div>
                                    <div class="font-extrabold text-right text-lg border-b-4 border-black">{{ $recipe->caloriesPerServing() }}</div>
                                    <div class="font-bold border-b border-gray-300">Fat</div>
                                    <div class="text-right border-b border-gray-300">{{ $recipe->fatPerServing() < 1 ? $recipe->fatPerServing() * 1000 . "m" : $recipe->fatPerServing() }}g</div>
                                    <div class="font-bold border-b border-gray-300">Cholesterol</div>
                                    <div class="text-right border-b border-gray-300">{{ $recipe->cholesterolPerServing() < 1 ? $recipe->cholesterolPerServing() * 1000 . "m" : $recipe->cholesterolPerServing() }}g</div>
                                    <div class="font-bold border-b border-gray-300">Sodium</div>
                                    <div class="text-right border-b border-gray-300">{{ $recipe->sodiumPerServing() < 1 ? $recipe->sodiumPerServing() * 1000 . "m" : $recipe->sodiumPerServing() }}g</div>
                                    <div class="font-bold border-b border-gray-300">Carbohydrates</div>
                                    <div class="text-right border-b border-gray-300">{{ $recipe->carbohydratesPerServing() < 1 ? $recipe->carbohydratesPerServing() * 1000 . "m" : $recipe->carbohydratesPerServing() }}g</div>
                                    <div class="font-bold">Protein</div>
                                    <div class="text-right">{{ $recipe->proteinPerServing() < 1 ? $recipe->proteinPerServing() * 1000 . "m" : $recipe->proteinPerServing() }}g</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
