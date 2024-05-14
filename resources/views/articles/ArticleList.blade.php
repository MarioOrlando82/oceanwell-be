<x-app-layout>
    <x-slot name="style">
        <style>
            #articleContent p {
                text-overflow: ellipsis;
            }
        </style>
    </x-slot>
    <x-container>
        <div>
            <h1 class="mb-6 mt-3 text-center text-3xl font-bold text-[#01283C]">Article List</h1>
        </div>
        <div class="flex w-full flex-col items-center">
            @foreach ($articles as $article)
                @if ($loop->iteration < 5)
                    <div class="mb-4 w-11/12 rounded-lg bg-white p-3">
                        <div class="flex h-24 overflow-hidden">
                            <img src="{{ asset("Aset/Article/$article->image") }}" alt="banner"
                                class="w-3/12 rounded-lg object-cover">
                            <div class="flex w-9/12 flex-col ps-3">
                                <div class="h-2/6">
                                    <h1 class="text-nowrap h-3/6 overflow-hidden text-ellipsis text-xs font-bold">
                                        {{ $article->title }}
                                    </h1>
                                    <p class="h-3/6 text-xs">
                                        <span class="hidden sm:inline-block">{{ $article->author_name }} -</span>
                                        <span>{{ date_format($article->created_at, 'Y/m/d') }}</span>
                                    </p>
                                </div>
                                <div id="articleContent" class="flex h-3/6 flex-col overflow-hidden text-clip text-xs">
                                    {{-- {!! substr(explode('</p>', $article->content)[0], 0, 400) . '...</p>' !!} --}}
                                    {!! explode('</p>', $article->content)[0] . '</p>' !!}
                                </div>
                                <a href="{{ route('article.content', ['id' => $article->id]) }}"
                                    class="h-1/6 w-fit text-xs text-indigo-400">Read More</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </x-container>
</x-app-layout>
