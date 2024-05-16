<x-app-layout>
    <x-slot name="style">
        <style>
            .ck-editor__editable[role="textbox"] {
                height: 275px;
            }

            @media (min-width: 768px) {
                .ck-editor__editable[role="textbox"] {
                    height: 375px;
                }
            }

            .ck-editor__editable_inline {
                padding: 0 1.5rem !important;
            }
        </style>
    </x-slot>
    <div class="flex min-h-[80dvh] w-full">
        <div class="m-auto h-[75dvh] w-[95vw] rounded-lg bg-[#eae6e6] p-5">
            <div class="flex h-[5%] items-center">
                <h1 class="mx-auto text-center text-3xl font-bold text-[#01283C]">Add article</h1>
            </div>
            <div class="flex w-full flex-col items-center p-2">
                <form action="{{ route('article.store') }}" method="POST"
                    class="flex h-full w-full flex-col justify-between px-5" enctype="multipart/form-data">
                    @csrf
                    <div class="flex w-full flex-row justify-between">
                        <div class="flex w-1/3 flex-col p-1">
                            <label class="@error('title') text-red-500 @enderror text-xl" for="title">Title</label>
                            <input class="mt-1 h-full rounded-md border-0 bg-[#d9d9d9] p-3" type="text"
                                id="title" name="title" value="{{ old('title') }}" />
                        </div>
                        <div class="flex w-1/3 flex-col p-1">
                            <label class="@error('author_name') text-red-500 @enderror text-xl"
                                for="author_name">Author</label>
                            <input class="mt-1 h-full rounded-md border-0 bg-[#d9d9d9] p-3" type="text"
                                id="author_name" name="author_name" value="{{ old('author_name') }}" />
                        </div>
                        <div class="flex w-1/3 flex-col p-1">
                            <label class="@error('image') text-red-500 @enderror text-xl" for="image">Image</label>
                            <input class="mt-1 h-full rounded-md border-0 bg-[#d9d9d9] p-3" type="file"
                                id="image" name="image" value="{{ old('image') }}" />
                        </div>
                        <div class="flex w-1/3 flex-col p-1">
                            <label class="@error('article_category_id') text-red-500 @enderror text-xl"
                                for="image">Category</label>
                            <select class="mt-1 h-full rounded-md border-0 bg-[#d9d9d9] p-3" name="article_category_id"
                                id="article_category_id">
                                @foreach ($articleCategories as $articleCategory)
                                    <option value="{{ $articleCategory->id }}"
                                        @if (old('article_category_id') == $articleCategory->id) selected @endif>
                                        {{ $articleCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex max-w-full flex-col p-1">
                        <label class="@error('content') text-red-500 @enderror mb-1 text-xl"
                            for="editor">Content</label>
                        <textarea id="content" name="content"> {{ old('content') }}</textarea>
                    </div>
                    <div class="mx-auto h-[10%] w-3/12 text-center">
                        <button type="submit"
                            class="mx-auto mt-3 h-full rounded-md border-0 bg-[#01cbe1] p-3 text-xl text-white">Add
                            Article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector("#content"), {
            toolbar: [
                "heading",
                "|",
                "bold",
                "italic",
                "link",
                "bulletedList",
                "numberedList",
                "|",
                "undo",
                "redo",
                "blockQuote",
            ],
        }).catch((error) => {
            console.error(error);
        });
        ClassicEditor.replace;
    </script>
    <x-alertify />
    @error('title')
        <script>
            alertify.error("{{ $message }}");
        </script>
    @enderror
    @error('author_name')
        <script>
            alertify.error("{{ $message }}");
        </script>
    @enderror
    @error('image')
        <script>
            alertify.error("{{ $message }}");
        </script>
    @enderror
    @error('article_category_id')
        <script>
            alertify.error("{{ $message }}");
        </script>
    @enderror
    @error('content')
        <script>
            alertify.error("{{ $message }}");
        </script>
    @enderror
    @if (session('success'))
        <script>
            alertify.success("Article added successfully");
        </script>
    @endif
    @if (session('error'))
        <script>
            alertify.error('Article not added');
        </script>
    @endif
</x-app-layout>
