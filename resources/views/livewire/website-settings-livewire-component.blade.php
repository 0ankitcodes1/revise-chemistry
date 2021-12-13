<section class="container-fluid">
    <h3>Website Settings</h3>
    <form class="row" wire:submit.prevent="save">
        <div class="col-sm-12 col-xl-9 my-3">
            @if (session()->has('page-message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('page-message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="col-sm-12 col-xl-9 mb-3">
            <label for="websiteLogoField" class="form-label fw-600 fs-15 text-dark">Website Logo</label>
            <input wire:model="file" type="file"
                class="form-control rounded-0 border-style-dashed border-3 @error('file') border-danger @enderror bg-light"
                id="websiteLogoField" />
            @error('file')
                <div id="blogThumbnailField-msg" class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-sm-12 col-xl-9 mb-3">
            <label for="facebook_url" class="form-label fw-600 fs-15 text-dark">Facebook Url</label>
            <input wire:model="facebook_url" type="text"
                class="form-control rounded-0 border-style-dashed @error('facebook_url') border-danger @enderror border-3 bg-light"
                id="facebook_url" />
        </div>
        <div class="col-sm-12 col-xl-9 mb-3">
            <label for="instagram_url" class="form-label fw-600 fs-15 text-dark">Instagram Url</label>
            <input wire:model="instagram_url" type="text"
                class="form-control rounded-0 border-style-dashed @error('instagram_url') border-danger @enderror border-3 bg-light"
                id="instagram_url" />
        </div>
        <div class="col-sm-12 col-xl-9 mb-3">
            <label for="youtube_url" class="form-label fw-600 fs-15 text-dark">Youtube Url</label>
            <input wire:model="youtube_url" type="text"
                class="form-control rounded-0 border-style-dashed @error('youtube_url') border-danger @enderror border-3 bg-light"
                id="youtube_url" />
        </div>
        <div class="col-sm-12 col-xl-9 mb-3">
            <label for="twitter_url" class="form-label fw-600 fs-15 text-dark">Twitter Url</label>
            <input wire:model="twitter_url" type="text"
                class="form-control rounded-0 border-style-dashed @error('twitter_url') border-danger @enderror border-3 bg-light"
                id="twitter_url" />
        </div>
        <div class="col-sm-12 col-xl-9 mb-3">
            <label for="contact_header" class="form-label fw-600 fs-15 text-dark">Contact Header</label>
            <input wire:model="contact_header" type="text"
                class="form-control rounded-0 border-style-dashed @error('contact_header') border-danger @enderror border-3 bg-light"
                id="contact_header" />
        </div>
        <div class="col-sm-12 col-xl-9 mb-3">
            <label for="aboutusField" class="form-label fw-600 fs-15 text-dark">About Us Video</label>
            <input wire:model="about_file" type="file"
                class="form-control rounded-0 border-style-dashed border-3 @error('about_file') border-danger @enderror bg-light"
                id="aboutusField" />
            @error('about_file')
                <div id="aboutusField-msg" class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div wire:ignore class="col-sm-12 col-xl-9 mb-3">
            <label for="aboutUsField" class="form-label fw-600 fs-15 text-dark">About Us</label>
            <div wire:model="about_us" id="aboutUsField"
                class="rounded-0 border-style-dashed border border-3 bg-light @error('about_us') border-danger @enderror py-2 px-2">
                {!! $about_us !!}
            </div>
            @error('about_us')
                <div id="aboutUsField-msg" class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div wire:ignore class="col-sm-12 col-xl-9 mb-3">
            <label for="whyChooseUsField" class="form-label fw-600 fs-15 text-dark">Why Choose Us</label>
            <div wire:model="why_choose_us" id="whyChooseUsField"
                class="rounded-0 border-style-dashed border border-3 bg-light @error('why_choose_us') border-danger @enderror py-2 px-2">
                {!! $why_choose_us !!}
            </div>
            @error('why_choose_us')
                <div id="whyChooseUsField-msg" class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div wire:ignore class="col-sm-12 col-xl-9 mb-3">
            <label for="whatWeOfferField" class="form-label fw-600 fs-15 text-dark">What We Offer</label>
            <div wire:model="what_we_offer" id="whatWeOfferField"
                class="rounded-0 border-style-dashed border border-3 bg-light @error('what_we_offer') border-danger @enderror py-2 px-2">
                {!! $what_we_offer !!}
            </div>
            @error('what_we_offer')
                <div id="whatWeOfferField-msg" class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div wire:ignore class="col-sm-12 col-xl-9 mb-3">
            <label for="ourVisionField" class="form-label fw-600 fs-15 text-dark">Our Vision</label>
            <div wire:model="our_vision" id="ourVisionField"
                class="rounded-0 border-style-dashed border border-3 bg-light @error('our_vision') border-danger @enderror py-2 px-2">
                {!! $our_vision !!}
            </div>
            @error('our_vision')
                <div id="ourVisionField-msg" class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-sm-12 col-xl-9 mb-3">
            <label for="android_url" class="form-label fw-600 fs-15 text-dark">Android App Url</label>
            <input wire:model="android_url" type="text"
                class="form-control rounded-0 border-style-dashed @error('android_url') border-danger @enderror border-3 bg-light"
                id="android_url" />
        </div>
        <div class="col-sm-12 col-xl-9 mb-3">
            <label for="apple_url" class="form-label fw-600 fs-15 text-dark">Apple App Url</label>
            <input wire:model="apple_url" type="text"
                class="form-control rounded-0 border-style-dashed @error('apple_url') border-danger @enderror border-3 bg-light"
                id="apple_url" />
        </div>
        <div class="col-12 mb-3">
            <button type="submit" class="btn btn-primary rounded-0">Update Changes</button>
        </div>
    </form>
</section>


@section('script')
    <script>
        BalloonBlockEditor
            .create(document.querySelector('#aboutUsField'), {
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
                    @this.set('about_us', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });


        BalloonBlockEditor
            .create(document.querySelector('#whyChooseUsField'), {
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
                    @this.set('why_choose_us', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });

        BalloonBlockEditor
            .create(document.querySelector('#whatWeOfferField'), {
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
                    @this.set('what_we_offer', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });

        BalloonBlockEditor
            .create(document.querySelector('#ourVisionField'), {
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
                    @this.set('our_vision', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@stop
