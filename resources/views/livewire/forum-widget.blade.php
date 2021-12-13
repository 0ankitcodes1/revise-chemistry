@php
    if(!$_COOKIE['student_token']) {
        $student_token = 'token-not-set';
    }
    else {
        if(\App\Models\Student::where('token', $_COOKIE['student_token'])->exists()) {
            $student_token = $_COOKIE['student_token'];
        }
        else {
            $student_token = 'token-not-set';
        }
    }
@endphp

@if (strlen($student_token) == 255)
<div class="container">
    <form wire:submit.prevent="saveContact">
        <div class="form-floating">
            <textarea class="form-control rounded-0 @error('reply_msg') is-invalid @enderror" wire:model="reply_msg"
                placeholder="Leave a comment here" id="forum-textarea" style="min-height: 100px;"></textarea>
            <label for="forum-textarea">Write Your Post</label>
            @error('reply_msg') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-outline-dark rounded-0 mt-3 px-5">POST</button>
    </form>
</div>
@else
    <div class="container mb-3">
        <a href="{{ env('APP_URL') }}/login" class="btn btn-sm btn-outline-primary rounded-0 px-4 fw-500">Login</a>
        <div><small class="text-primary fw-500">You need to login first</small></div>
    </div>
@endif