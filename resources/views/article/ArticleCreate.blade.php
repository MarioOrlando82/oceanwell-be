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
        </style>
    </x-slot>
    <div class="flex min-h-[80dvh] w-full">
        <div class="m-auto h-[75dvh] w-[80vw] rounded-lg bg-[#eae6e6] p-5">
            <div class="flex h-[5%] items-center">
                <h1 class="mx-auto text-center text-3xl font-bold text-[#01283C]">Add article</h1>
            </div>
            <div class="flex w-full flex-col items-center p-2">
                <form action="{{ route('article.create') }}" method="POST"
                    class="flex h-full w-full flex-col justify-between px-5">
                    @csrf
                    <div class="flex w-full flex-row justify-between">
                        <div class="flex w-1/3 flex-col p-1">
                            <label class="text-xl" for="title">Title</label>
                            <input class="mt-1 rounded-md border-0 bg-[#d9d9d9] p-3" type="text" id="title"
                                name="title" />
                        </div>
                        <div class="flex w-1/3 flex-col p-1">
                            <label class="text-xl" for="author">Author</label>
                            <input class="mt-1 rounded-md border-0 bg-[#d9d9d9] p-3" type="text" id="author"
                                name="author" />
                        </div>
                        <div class="flex w-1/3 flex-col p-1">
                            <label class="text-xl" for="image">Image</label>
                            <input class="mt-1 rounded-md border-0 bg-[#d9d9d9] p-3" type="file" id="image"
                                name="image" />
                        </div>
                    </div>
                    <div class="flex max-w-full flex-col p-1">
                        <label class="mb-1 text-xl" for="editor">Content</label>
                        <textarea id="content"></textarea>
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
</x-app-layout>
