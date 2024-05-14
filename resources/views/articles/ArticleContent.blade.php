<x-app-layout>
    <x-slot name="style">
        <style>
            body {
                line-height: 1.6;
            }

            #content {
                text-align: justify;
            }
        </style>
    </x-slot>

    <article class="w-full">
        <header class="w-full px-14 py-8">
            <h1 class="text-3xl font-semibold">{{ $content->title }}</h1>
            <h2 class="py-2 font-semibold">By <span class="text-indigo-400">{{ $content->author_name }}</span> -
                {{ date_format($content->created_at, 'Y/m/d') }}
            </h2>
            <img src="{{ asset("Aset/Article/$content->id.jpg") }}" alt="banner" class="h-[30dvh] w-full object-cover">
        </header>
        <div id="content" class="mx-auto w-8/12 pb-5">
            {!! $content->content !!}
        </div>
    </article>
</x-app-layout>
