<x-app-layout>
    <x-slot name="style">
        <style>
            #articleContent p {
                text-overflow: ellipsis;
            }
        </style>
    </x-slot>
    <div class="flex min-h-[80dvh] w-full">
        <div class="m-auto h-[75dvh] w-[95vw] rounded-lg bg-[#eae6e6] p-5">
            <div class="flex h-full flex-col">
                <div class="mx-auto mb-6 flex w-11/12 justify-between">
                    <div class="flex w-1/3 align-middle">
                        <form id="articleCategoryForm" action="{{ route('article.list') }}" method="GET"
                            class="flex w-1/2">
                            {{-- @csrf --}}
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
                    <div class="flex w-1/3 place-items-center">
                        <h1 class="mx-auto text-center text-3xl font-bold text-[#01283C]">Article List</h1>
                    </div>
                    @can('is_admin')
                        <div class="flex w-1/3 place-content-end">
                            <a href="{{ route('article.create') }}"
                                class="rounded-md border-0 bg-[#01cbe1] p-3 text-lg text-white">
                                Add Article
                            </a>
                        </div>
                    @else
                        <div class="w-1/3"></div>
                    @endcan
                </div>
                <div class="flex w-full flex-col items-center">
                    @foreach ($articles as $article)
                        <div class="mb-4 w-11/12 rounded-lg bg-white p-3">
                            <div class="flex h-24 overflow-hidden">
                                <img src="{{ asset("Aset/Article/$article->image") }}" alt="banner"
                                    class="w-3/12 rounded-lg object-cover">
                                <div class="flex w-9/12 flex-col ps-3">
                                    <div class="flex h-2/6 flex-row justify-between">
                                        <div>
                                            <h1
                                                class="text-nowrap h-3/6 overflow-hidden text-ellipsis text-xs font-bold">
                                                {{ $article->title }}
                                            </h1>
                                            <p class="h-3/6 text-xs">
                                                <span class="hidden sm:inline-block">{{ $article->author_name }}
                                                    -</span>
                                                <span
                                                    class="hidden sm:inline-block">{{ date_format(date_create($article->created_at), 'Y/m/d') }}
                                                    -
                                                </span>
                                                <span>
                                                    {{ $article->article_category->name }}
                                                </span>
                                            </p>
                                        </div>
                                        @can('is_admin')
                                            <div class="flex flex-row">
                                                <a href="{{ route('article.edit', ['id' => $article->id]) }}"><img
                                                        src="{{ asset('Aset/Icon/Edit.png') }}" alt="edit"
                                                        class="me-2 h-6 object-cover"></a>
                                                <form action="{{ route('article.delete', ['id' => $article->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit"><img src="{{ asset('Aset/Icon/Delete.png') }}"
                                                            alt="delete" class="h-6 object-cover"></button>
                                                </form>
                                            </div>
                                        @endcan
                                    </div>
                                    <div id="articleContent"
                                        class="flex h-3/6 flex-col overflow-hidden text-clip text-xs">
                                        {{-- {!! substr(explode('</p>', $article->content)[0], 0, 400) . '...</p>' !!} --}}
                                        {!! explode('</p>', $article->content)[0] . '</p>' !!}
                                    </div>
                                    <a href="{{ route('article.content', ['id' => $article->id]) }}"
                                        class="h-1/6 w-fit text-xs text-indigo-400">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-auto flex w-full justify-around">
                    <div id="paginator" class="w-11/12">
                        {{ $articles->appends($_GET)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @can('is_admin')
        <x-alertify />
        @if (session('success'))
            <script>
                alertify.success("{{ session('success') }}")
            </script>
        @elseif (session('error'))
            <script>
                alertify.error("{{ session('error') }}")
            </script>
        @endif
    @endcan
</x-app-layout>
