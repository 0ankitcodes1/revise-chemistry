<div>
    @if(session()->has('video-deleted'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('video-deleted') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered m-0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Chapter</th>
                    <th scope="col">Sub Chapter</th>
                    <th scope="col">Category</th>
                    <th scope="col">Video Url</th>
                    <th scope="col">Media Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allVideo as $vid)
                <tr>
                    <td>{{ $vid->id }}</td>
                    <td>{{ $vid->chapter }}</td>
                    <td>{{ $vid->subChapter }}</td>
                    <td>{{ $vid->category }}</td>
                    <td>
                        <a href="{{ $vid->videoUrl }}" class="btn btn-sm btn-outline-dark rounded-0" style="width: 120px;">watch video</a>
                    </td>
                    <td>{{ $vid->mediaType }}</td>
                    <td>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-danger rounded-0" wire:click="deleteRecord({{ $vid->id }})">Delete</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
