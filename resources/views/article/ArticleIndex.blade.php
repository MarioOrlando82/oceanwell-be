<x-app-layout>
    <x-slot name="style">
        <style>
            .multiline-elipsis p {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        </style>
    </x-slot>
    <div class="flex min-h-[80dvh] w-full flex-col">
        @can('is_admin')
            <div class="mx-auto mt-5 flex w-[95vw]">
                <a href="{{ route('article.list') }}"
                    class="ms-auto rounded-md border-0 bg-[#01cbe1] p-3 text-lg text-white">Admin Panel</a>
            </div>
        @endcan
        <div class="@can('is_admin') m-5 @else my-auto @endcan mx-auto h-[75dvh] w-[95vw] rounded-lg bg-[#eae6e6]">
            <div class="flex h-full">
                <div id="spotlight" class="flex w-3/6 p-5">
                    <div class="relative flex h-full">
                        <img src="{{ asset("Aset/Article/$articleSpotlight->image") }}" alt=""
                            class="z-0 aspect-video h-full rounded-lg object-cover brightness-[0.4]">
                        <div class="absolute bottom-5 z-10 mt-auto h-max w-full p-3">
                            <h1 class="font-bold text-white">
                                {{ $articleSpotlight->title }}
                            </h1>
                            <h2 class="text-sm text-red-600">By {{ $articleSpotlight->author_name }}</h2>
                            <div class="text-sm text-slate-300">
                                {!! explode('</p>', $articleSpotlight->content)[0] . '</p>' !!}
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('article.content', ['id' => $articleSpotlight->id]) }}"
                                    class="border border-slate-300 p-2 text-slate-300">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="list" class="flex w-3/6 flex-col gap-3 p-5">
                    <div class="mx-auto w-1/2">
                        <form id="articleCategoryForm" action="{{ route('article.index') }}" method="GET"
                            class="flex">
                            <select name="selectedCategory"
                                class="my-auto h-fit w-full rounded-md border-0 bg-[#f0f0f0] p-3 text-xs"
                                onchange="this.closest('form').submit()">
                                <option value="0">All Category</option>
                                @foreach ($articleCategories as $articleCateogory)
                                    <option value="{{ $articleCateogory->id }}"
                                        @if (old('articleCategory') == $articleCateogory->id) selected
                                        @elseif (isset($selectedCategory) && $selectedCategory == $articleCateogory->id) selected @endif>
                                        {{ $articleCateogory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    @foreach ($articles as $article)
                        <div class="flex h-1/6 flex-row gap-2 rounded-lg bg-white p-2">
                            <img src="{{ asset("Aset/Article/$article->image") }}" alt="img"
                                class="hidden aspect-video w-1/6 rounded-lg object-cover md:block">
                            <div class="w-5/6 px-3">
                                <h1 class="h-[20%] overflow-hidden text-ellipsis whitespace-nowrap text-xs">
                                    {{ $article->title }}
                                </h1>
                                <h2 class="h-1/6 text-[0.65rem] text-red-600">By {{ $article->author_name }}</h2>
                                <div class="multiline-elipsis h-1/3 w-full text-[0.65rem]">
                                    {!! explode('</p>', $article->content)[0] . '</p>' !!}
                                </div>
                                <button class="mt-1 border text-[0.65rem]">Read More</button>
                            </div>
                        </div>
                    @endforeach
                    <div class="">
                        {{ $articles->appends($_GET)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
