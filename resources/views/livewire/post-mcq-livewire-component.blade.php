<section class="mt-4 p-1">
    <h3 class="text-dark fw-700 m-0">Add MCQ Question</h3>
    <div class="row mt-3">
        <div>
            @if (session()->has('page-message'))
                <div class="alert alert-success rounded-0 alert-dismissible fade show mt-3" role="alert">
                    {{ session('page-message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <form class="col-12" wire:submit.prevent="save">
            <div class="row mt-3">
                <div wire:ignore class="col-12 col-lg-9 mb-3">
                    <label for="McqQuestionField" class="form-label fw-600 fs-15 text-dark">Question</label>
                    <div wire:model="question" id="McqQuestionField"
                        class="rounded-0 border-style-dashed border border-3 bg-light p-0 px-2 @error('question') border-danger @enderror">
                        {!! $question !!}
                    </div>
                    @error('question')
                        <div id="McqQuestionField-msg" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-lg-9 mb-3">
                    <h3 class="form-label fw-600 fs-15 text-dark">Answer Options</h3>
                    <div class="mb-2">
                        <div class="d-flex align-items-center">
                            <span class="m-0 me-1">a.</span>
                            <input wire:model="option1" type="text"
                                class="form-control rounded-0 border-style-dashed border-3 bg-light @error('option1') border-danger @enderror"
                                placeholder="Mcq Option 1" />
                        </div>
                        @error('option1')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <div class="d-flex align-items-center">
                            <p class="m-0 me-1">b.</p>
                            <input wire:model="option2" type="text"
                                class="form-control rounded-0 border-style-dashed border-3 bg-light @error('option2') border-danger @enderror"
                                placeholder="Mcq Option 2" />
                        </div>
                        @error('option2')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <div class="d-flex align-items-center">
                            <p class="m-0 me-1">c.</p>
                            <input wire:model="option3" type="text"
                                class="form-control rounded-0 border-style-dashed border-3 bg-light @error('option3') border-danger @enderror"
                                placeholder="Mcq Option 3" />
                        </div>
                        @error('option3')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <div class="d-flex align-items-center">
                            <p class="m-0 me-1">d.</p>
                            <input wire:model="option4" type="text"
                                class="form-control rounded-0 border-style-dashed border-3 bg-light @error('option4') border-danger @enderror"
                                placeholder="Mcq Option 4" />
                        </div>
                        @error('option4')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-lg-9 mb-3">
                    <label for="categoryField" class="form-label fw-600 fs-15 text-dark">Category</label>
                    <select wire:model="category" id="categoryField"
                        class="form-select rounded-0 border-style-dashed border-3 bg-light @error('category') border-danger @enderror"
                        aria-label="correct answer for mcq question">
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
                        <div id="categoryField-msg" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-lg-9 mb-3">
                    <label for="mcqChapterField" class="form-label fw-600 fs-15 text-dark">Chapter</label>
                    <input wire:model="chapter" type="text"
                        class="form-control rounded-0 border-style-dashed border-3 bg-light @error('chapter') border-danger @enderror"
                        id="mcqChapterField" aria-describedby="mcqChapterField">
                    @error('chapter')
                        <div id="mcqChapterField-msg" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-lg-9 mb-3">
                    <label for="mcqSubChapterField" class="form-label fw-600 fs-15 text-dark">Sub Chapter</label>
                    <input wire:model="subChapter" type="text"
                        class="form-control rounded-0 border-style-dashed border-3 bg-light @error('subChapter') border-danger @enderror"
                        id="mcqSubChapterField" aria-describedby="mcqSubChapterField">
                    @error('subChapter')
                        <div id="mcqSubChapterField-msg" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-lg-9 mb-3">
                    <label for="correctAnswerField" class="form-label fw-600 fs-15 text-dark">Correct Answer</label>
                    <select wire:model="answer" id="correctAnswerField"
                        class="form-select rounded-0 border-style-dashed border-3 bg-light @error('answer') border-danger @enderror"
                        aria-label="correct answer for mcq question">
                        <option selected>Answer</option>
                        <option value="a">a</option>
                        <option value="b">b</option>
                        <option value="c">c</option>
                        <option value="d">d</option>
                    </select>
                    @error('answer')
                        <div id="correctAnswerField-msg" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mb-3">
                    <label for="answerDescriptionField" class="form-label fw-600 fs-15 text-dark">Explain Your
                        Answer</label>
                    <textarea wire:model="description"
                        class="form-control rounded-0 border-style-dashed border-3 bg-light @error('description') border-danger @enderror"
                        placeholder="Write something about your answer" id="answerDescriptionField"></textarea>
                    @error('description')
                        <div id="answerDescriptionField-msg" class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-2">
                    <button type="submit" class="btn btn-outline-dark rounded-0 fw-500 px-3 me-3">Add
                        Question</button>
                </div>
            </div>
        </form>
    </div>
</section>

@section('script')
    <script>
        BalloonBlockEditor
            .create(document.querySelector('#McqQuestionField'), {
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
