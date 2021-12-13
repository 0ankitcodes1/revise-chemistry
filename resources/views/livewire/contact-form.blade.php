<form wire:submit.prevent="save">
    <div>

        @if (session()->has('message'))

            <div class="alert alert-success">

                {{ session('message') }}

            </div>

        @endif

    </div>
    <div class="mb-3">
        <label for="contact-name" class="form-label h6">Full Name</label>
        <input wire:model="name" type="text" class="form-control border-style-dashed @error('name') border-danger @enderror rounded-0" id="contact-email" aria-describedby="contact-nameHelp" placeholder="Enter your full name">
        @error('name')
            <div id="contact-nameHelp" class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="contact-email" class="form-label h6">Email</label>
        <input wire:model="email" type="email" class="form-control border-style-dashed @error('email') border-danger @enderror rounded-0" id="contact-email" aria-describedby="contact-emailHelp" placeholder="Enter your email address">
        @error('email')
            <div id="contact-emailHelp" class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>
    {{-- <div class="mb-3">
        <label for="contact-number" class="form-label h6">Contact Number</label>
        <input wire:model="contact" type="text" class="form-control border-style-dashed @error('contact') border-danger @enderror rounded-0" id="contact-number" aria-describedby="contact-numberHelp" placeholder="Enter your contact number">
        @error('contact')
            <div id="contact-numberHelp" class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div> --}}
    <div class="mb-3">
        <label for="contact-subject" class="form-label h6">Subject</label>
        <input wire:model="subject" type="text" class="form-control border-style-dashed @error('subject') border-danger @enderror rounded-0" id="contact-number" aria-describedby="contact-subjectHelp" placeholder="Enter your subject">
        @error('subject')
            <div id="contact-subjectHelp" class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="contact-message" class="form-label h6">Message</label>
        <textarea wire:model="message" type="text" class="form-control border-style-dashed @error('message') border-danger @enderror rounded-0" id="contact-message" aria-describedby="contact-messageHelp" placeholder="Enter your message"></textarea>
        @error('message')
            <div id="contact-messageHelp" class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary rounded-0">Submit Form</button>
</form>