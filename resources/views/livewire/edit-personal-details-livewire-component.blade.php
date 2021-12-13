<section id="edit-personal-detail" class="mt-4 p-1">
    <h4 class="text-dark fs-20 fw-700 m-0">Edit Personal Detail</h4>
    <div>
        @if (session()->has('page-message'))
            <div class="alert alert-success rounded-0 alert-dismissible fade show mt-3" role="alert">
                {{ session('page-message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <form class="row mt-3" wire:submit.prevent="save">
        <div class="col-12 col-md-6 col-lg-6 mb-3">
            <label for="emailField" class="form-label fw-600 fs-15 text-dark">First Name</label>
            <input wire:model="first_name" type="text"
                class="form-control rounded-0 border-style-dashed border-3 bg-light @error('first_name') border-danger @enderror"
                id="firstNameField" aria-describedby="firstNameField">
            @error('first_name')
                <div id="firstNameField-msg" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 col-md-6 col-lg-6 mb-3">
            <label for="lastNameField" class="form-label fw-600 fs-15 text-dark">Last
                Name</label>
            <input wire:model="last_name" type="text"
                class="form-control rounded-0 border-style-dashed border-3 bg-light @error('last_name') border-danger @enderror"
                id="lastNameField" aria-describedby="lastNameField">
            @error('last_name')
                <div id="lastNameField-msg" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-outline-dark rounded-0 fw-500 px-3 me-3">Change
                Details</button>
        </div>
    </form>
</section>
