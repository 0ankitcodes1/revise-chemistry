<section class="mt-4 p-1">
    <h4 class="text-dark fs-25 fw-700 m-0">Add Note</h4>
    <div class="row">
        <form class="col-12" wire:submit.prevent="save">
            @if (session()->has('page-message'))
                <div class="alert alert-success rounded-0 alert-dismissible fade show mt-3" role="alert">
                    {{ session('page-message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row mt-3">
                <div class="col-12 col-lg-9 mb-3">
                    <label for="noteChapterField" class="form-label fw-600 fs-15 text-dark">Chapter</label>
                    <input wire:model="chapter" type="text"
                        class="form-control rounded-0 border-style-dashed border-3 @error('chapter') border-danger @enderror bg-light"
                        id="noteChapterField" aria-describedby="noteChapterField">
                    @error('chapter')
                        <div id="noteChapterField-msg" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-lg-9 mb-3">
                    <label for="noteSubChapterField" class="form-label fw-600 fs-15 text-dark">Sub Chapter</label>
                    <input wire:model="sub_chapter" type="text"
                        class="form-control rounded-0 border-style-dashed border-3 @error('sub_chapter') border-danger @enderror bg-light"
                        id="noteSubChapterField" aria-describedby="noteSubChapterField">
                    @error('sub_chapter')
                        <div id="noteSubChapterField-msg" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-lg-9 mb-3">
                    <label for="noteCategoryField" class="form-label fw-600 fs-15 text-dark">Note Category</label>
                    <select wire:model="category" id="noteCategoryField"
                        class="form-select rounded-0 border-style-dashed border-3 @error('category') border-danger @enderror bg-light"
                        aria-label="note category">
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
                        <div id="noteCategoryField-msg" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div wire:ignore class="col-12 col-lg-9 mb-3">
                    <label for="noteDescriptionField" class="form-label fw-600 fs-15 text-dark">Note Description</label>
                    <div wire:model="description" id="noteDescriptionField"
                        class="rounded-0 border-style-dashed border border-3 bg-light p-0 px-2">
                        {!! $description !!}
                    </div>
                    @error('description')
                        <div id="noteDescriptionField-msg" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-2">
                    <button id="add-notes-btn" type="submit" class="btn btn-outline-dark rounded-0 fw-500 px-3 me-3">Add
                        Notes</button>
                </div>
            </div>
        </form>
    </div>
</section>

@section('script')
    <script>
        BalloonBlockEditor
            .create(document.querySelector('#noteDescriptionField'), {
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
