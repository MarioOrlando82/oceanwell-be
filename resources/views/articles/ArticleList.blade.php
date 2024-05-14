<x-app-layout>
    <x-container>
        <div>
            <h1 class="mb-5 text-center text-3xl font-bold text-[#01283C]">Article List</h1>
        </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($articles as $article)
                @if ($article->id == 1)
                    <x-card :article="$article" />
                @endif
            @endforeach
        </div>
    </x-container>
</x-app-layout>
