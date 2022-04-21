<x-layout>

    <x-slot name="intro">

        <h1 class="text-lg mx-auto pt-6 pb-10"> {{ $page->itemName }} </h1>
        <img src="{{ $page->mainImage }}" class="mx-auto pt-6 pb-10">

    </x-slot>

    <x-slot name="info">

        <body>

            <div class="mx-auto w-full text-slate-800 justify-center h-auto">
                <p class="py-6"> {{ $page->about }} </p>
                <img src="{{ $page->aOneImage }}" class="mx-auto pt-6 pb-10">
                <p class="py-6"> {{ $page->abilityOne }} </p>
                <img src="{{ $page->aTwoImage }}" class="mx-auto pt-6 pb-10">
                <p class="py-6"> {{ $page->abilityTwo }} </p>
                <img src="{{ $page->aThreeImage }}" class="mx-auto pt-6 pb-10">
                <p class="py-6"> {{ $page->abilityThree }} </p>
                <img src="{{ $page->aFourImage }}" class="mx-auto pt-6 pb-10">
                <p class="py-6"> {{ $page->abilityFour }} </p>
            </div>

            <a href="/" class="bg-transparent border border-gray-400 hover:border-indigo-400 text-gray-400 hover:text-indigo-400 font-bold py-2 px-4 rounded-full">Home</a>
            <form action="{{ url('/setting/destroy', $page->id) }}" method="POST" class="py-4">
                @csrf
                @method('delete')
                <button type="submit" class="bg-transparent border border-gray-400 hover:border-indigo-400 text-gray-400 hover:text-indigo-400 font-bold py-2 px-4 rounded-full">Delete</button>
            </form>

    </x-slot>

</x-layout>