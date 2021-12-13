<section class="mt-4 p-1">
    <h4 class="text-dark fs-20 fw-700">Change Password</h4>
    <div class="my-3">
        @if (session()->has('page-message'))
            <div class="alert alert-success rounded-0 alert-dismissible fade show mt-3" role="alert">
                {{ session('page-message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <form class="row mt-3" wire:submit.prevent="save">
        <div class="col-12 mb-3">
            <label for="newAdminPasswordField" class="form-label fw-600 fs-15 text-dark">New
                Password</label>
            <input wire:model="password" type="password"
                class="form-control rounded-0 border-style-dashed border-3 bg-light @error('password') border-danger @enderror"
                id="newAdminPasswordField" aria-describedby="newAdminPasswordField">
            @error('password')
                <div id="newAdminPasswordField-msg" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12 mb-3">
            <label for="passwordAdminConfirmationField" class="form-label fw-600 fs-15 text-dark">Password
                Confirmation</label>
            <input wire:model="password_confirmation" type="password"
                class="form-control rounded-0 border-style-dashed border-3 bg-light @error('password_confirmation') border-danger @enderror"
                id="passwordAdminConfirmationField" aria-describedby="passwordAdminConfirmationField">
            @error('password_confirmation')
                <div id="passwordAdminConfirmationField-msg" class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-outline-dark rounded-0 fw-500 px-3 me-3">Change
                Password</button>
        </div>
    </form>
</section>
