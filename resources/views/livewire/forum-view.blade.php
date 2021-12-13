<div>
    @if (count($allReplies) > 0 || count($allUsers) > 0)
        @foreach ($allReplies as $reply)
            <div class="mt-2">
                <p class="m-0 fs-20 py-2">{{ $reply->reply }}</p>
                @foreach ($allUsers as $user)
                    @if ($user->id == $reply->user_id)
                        <h4 class="fs-20 m-0">➡ {{ $user->first_name }} {{ $user->last_name }}</h4>
                        @break;
                    @endif
                @endforeach

                <div class="mb-2"><small class="text-muted">
                    {{ \Carbon\Carbon::parse($reply->created_at)->format('d M Y')}}    
                </small></div>
                <hr class="m-0">
            </div>
        @endforeach
    @else

    @endif
</div>
