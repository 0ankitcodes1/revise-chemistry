<div class="me-2">
    <!-- Example single danger button -->
    <div class="btn-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            {{ substr($useremail, 0, 6) }} ...
        </button>
        <ul class="dropdown-menu">
            @if ($userrole == 0)
                <li><a class="dropdown-item" href="{{ env('APP_URL') }}/admin/dashboard">Dashboard</a></li>
            @else
                <li><a class="dropdown-item" href="{{ env('APP_URL') }}/dashboard">Dashboard</a></li>
            @endif
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <form wire:submit.prevent="save" class="dropdown-item">
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</div>
