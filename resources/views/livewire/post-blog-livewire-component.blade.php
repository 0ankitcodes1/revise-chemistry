<section class="p-1">
    <h3 class="text-dark fs-25 fw-700 m-0">Add Blog</h3>
    <div>
        <div class="row">
            <div class="col-12">
                <form class="row mt-1" wire:submit.prevent="save">
                    <div class="col-sm-12 col-xl-9 mb-3">
                        @if (session()->has('page-message'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                                {{ session('page-message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-12 col-xl-9 mb-3">
                        <label for="blogTitleField" class="form-label fw-600 fs-15 text-dark">Title</label>
                        <input wire:model="title" type="text"
                            class="form-control rounded-0 border-style-dashed @error('title') border-danger @enderror border-3 bg-light"
                            id="blogTitleField" aria-describedby="blogTitleField">
                        @error('title')
                            <div id="blogTitleField-msg" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-12 col-xl-9 mb-3">
                        <label for="blogCategoryField" class="form-label fw-600 fs-15 text-dark">Category</label>
                        <select wire:model="category" id="blogCategoryField"
                            class="form-select rounded-0 border-style-dashed border-3 @error('category') border-danger @enderror bg-light"
                            aria-label="Default select example">
                            <option selected>Choose category</option>
                            <option value="O Levels">O Levels</option>
                            <option value="MYPIB">MYP IB</option>
                            <option value="IBDP SL-HL">IB DP SL/HL</option>
                            <option value="A Levels">A/AS Levels</option>
                            <option value="AP Chemistry">AP Chemistry</option>
                            <option value="DAT Chemistry">DAT Chemistry</option>
                            <option value="IA Ideas">IA Ideas</option>
                            <option value="others">Others</option>
                        </select>
                        @error('category')
                            <div id="blogCategoryField-msg" class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-12 col-xl-9 mb-3">
                        <label for="blogThumbnailField" class="form-label fw-600 fs-15 text-dark">Blog Thumbnail</label>
                        <input wire:model="file" type="file"
                            class="form-control rounded-0 border-style-dashed border-3 @error('file') border-danger @enderror bg-light"
                            id="blogThumbnailField" aria-describedby="blogThumbnailField"
                            aria-label="blog thumbnail Upload">
                        @error('file')
                            <div id="blogThumbnailField-msg" class="form-text text-danger">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div wire:ignore class="col-sm-12 col-xl-9 mb-3">
                        <label for="blogDescriptionField" class="form-label fw-600 fs-15 text-dark">Description</label>
                        <div wire:model="description" id="blogDescriptionField"
                            class="rounded-0 border-style-dashed border border-3 bg-light @error('description') border-danger @enderror py-2 px-2">
                            {!! $description !!}
                        </div>
                        @error('description')
                            <div id="blogDescriptionField-msg" class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-outline-dark rounded-0 fw-500 px-3 me-3">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@section('script')
    <script>
        BalloonBlockEditor
            .create(document.querySelector('#blogDescriptionField'), {
                toolbar: {
                    items: [
                        "bold",
                        "italic",
                        "imageInsert",
                        "link",
                        "mediaEmbed",
                        "imageUpload",
                    ],
                },
                language: "en",
                blockToolbar: [
                    "findAndReplace",
                    "alignment",
                    "heading",
                    "bold",
                    "italic",
                    "fontColor",
                    "fontFamily",
                    "fontSize",
                    "highlight",
                    "fontBackgroundColor",
                    "subscript",
                    "superscript",
                    "strikethrough",
                    "underline",
                    "link",
                    "imageInsert",
                    "mediaEmbed",
                    "imageUpload",
                    "horizontalLine",
                    "htmlEmbed",
                    "numberedList",
                    "bulletedList",
                    "todoList",
                    "insertTable",
                    "specialCharacters",
                    "code",
                    "undo",
                    "redo",
                ],
                image: {
                    toolbar: [
                        "imageTextAlternative",
                        "imageStyle:inline",
                        "imageStyle:block",
                        "imageStyle:side",
                    ],
                },
                table: {
                    contentToolbar: [
                        "tableColumn",
                        "tableRow",
                        "mergeTableCells",
                        "tableCellProperties",
                        "tableProperties",
                    ],
                },
                licenseKey: "",
            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('description', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@stop
