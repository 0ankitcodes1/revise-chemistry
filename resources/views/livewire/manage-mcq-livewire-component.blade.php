<section>
    <h3 class="mb-3">Manage Blog Post</h3>
    <div class="my-2">
        <div class="input-group input-group-lg">
            <span class="input-group-text rounded-0 bg-transparent p-0" id="search_page">
                <select wire:model="what_search" class="form-select rounded-0 m-0 w-100 h-100">
                    <option value="question">Search For Question</option>
                    <option value="options">Search For Option</option>
                    <option value="answer">Search For Answer</option>
                    <option value="description">Search For Description</option>
                    <option value="chapter">Search For Chapter</option>
                    <option value="category">Search For Category</option>
                    <option value="subChapter">Search For Sub Chapter</option>
                </select>
            </span>
            <input wire:model="search" type="text" class="form-control rounded-0 bg-transparent"
                aria-label="Page search input" aria-describedby="search_page" placeholder="Search ...">
        </div>
    </div>
    <div class="mt-3 d-flex justify-content-start">
        {{ $pageArray->links('components.general.pagination') }}
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th scope="col">Question</th>
                    <th scope="col">Option</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Description</th>
                    <th scope="col">Chapter</th>
                    <th scope="col">Sub Chapter</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <div>
                    @if (session()->has('page-message'))
                        <div class="alert alert-danger rounded-0 alert-dismissible fade show mt-3" role="alert">
                            {{ session('page-message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                @if (count($pageArray) > 0)
                    @foreach ($pageArray as $page)
                        <tr>
                            <td>{{ $page->question }}</td>
                            <td>
                                @foreach (json_decode($page->options) as $option)
                                    <span class="btn btn-secondary my-1">{{ $option }}</span>
                                @endforeach
                            </td>
                            <td>{{ $page->answer }}</td>
                            <td>{{ $page->description }}</td>
                            <td>{{ $page->chapter }}</td>
                            <td>{{ $page->category }}</td>
                            <td>{{ $page->subChapter }}</td>
                            <td>{{ \Carbon\Carbon::parse($page->created_at)->format('D, m, Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        wire:click="delete({{ $page->id }})">Delete</button>
                                    <a type="button"
                                        href="{{ env('APP_URL') . '/admin/dashboard/manage-mcq/'. $page->id }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <td>Empty</td>
                    <td>Empty</td>
                    <td>Empty</td>
                    <td>Empty</td>
                    <td>Empty</td>
                    <td>Empty</td>
                    <td>Empty</td>
                    <td>Empty</td>
                    <td>N/A</td>
                @endif
            </tbody>
        </table>
    </div>
    <div class="mt-2 d-flex justify-content-start">
        {{ $pageArray->links('components.general.pagination') }}
    </div>
</section>
