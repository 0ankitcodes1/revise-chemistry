<section>
    <h2>Add Chapter Video</h2>
    <form wire:submit.prevent="save">
        @if (session()->has('upload-video-message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('upload-video-message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col-12 col-lg-9 mb-3">
            <label for="videoChapterField" class="form-label fw-600 fs-15 text-dark">Chapter</label>
            <input type="text"
                class="form-control rounded-0 border-style-dashed border-3 bg-light @error('video_chapter') is-invalid @enderror"
                id="videoChapterField" wire:model="video_chapter" aria-describedby="videoChapterField">
            @error('video_chapter')
                <div id="videoChapterField-msg" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 col-lg-9 mb-3">
            <label for="videoSubChapterField" class="form-label fw-600 fs-15 text-dark">Sub Chapter</label>
            <input wire:model="video_subchapter" type="text"
                class="form-control rounded-0 border-style-dashed border-3 bg-light @error('video_subchapter') is-invalid @enderror"
                id="videoSubChapterField" aria-describedby="videoSubChapterField">
            @error('video_subchapter')
                <div id="videoSubChapterField-msg" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 col-lg-9 mb-3">
            <label for="videoCategoryField" class="form-label fw-600 fs-15 text-dark">Video Category</label>
            <select wire:model="video_category" id="videoCategoryField"
                class="form-select rounded-0 border-style-dashed border-3 bg-light @error('video_category') is-invalid @enderror"
                aria-label="video category">
                <option selected>Choose category</option>
                <option value="O Levels">O Levels</option>
                <option value="MYPIB">MYPIB</option>
                <option value="IBDP SL-HL">IBDP SL/HL</option>
                <option value="A Levels">A Levels</option>
            </select>
            @error('video_category')
                <div id="videoCategoryField-msg" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 col-lg-9 mb-3">
            <label for="videoFileField" class="form-label fw-600 fs-15 text-dark">Upload Video</label>
            <input wire:model="video" type="file"
                class="form-control rounded-0 border-style-dashed border-3 bg-light @error('video') is-invalid @enderror"
                id="videoFileField">
            @error('video')
                <div id="videoFileField-msg" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-outline-primary rounded-0">Save Video</button>
    </form>
</section>
