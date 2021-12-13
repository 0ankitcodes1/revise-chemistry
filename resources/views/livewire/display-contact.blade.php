
<div class="table-responsive">
    <h5>Contact Form Data</h5>
    <div class="mb-2">
        <input wire:model="search" type="text" class="form-control" placeholder="Search Page Title....." />
    </div>
    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <div>
                @if (session()->has('delete-news-message'))
                    <div class="alert alert-success">
                        {{ session('delete-news-message') }}
                    </div>
                @endif
            </div>
            @if (count($newsArray) > 0)
                @foreach ($newsArray as $news)
                    <tr>
                        <td>{{ $news->full_name }}</td>
                        <td>{{ $news->email }}</td>
                        <td>{{ $news->contact_number }}</td>
                        <td>{{ $news->subject }}</td>
                        <td>{{ $news->message }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger btn-sm"
                                    wire:click="delete({{ $news->id }})">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <td>- -</td>
                <td>empty</td>
                <td>empty</td>
                <td>empty</td>
                <td>empty</td>
                <td>- -</td>
            @endif
        </tbody>
        
    </table>
</div>
