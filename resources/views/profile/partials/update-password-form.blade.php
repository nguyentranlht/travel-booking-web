<section class="card shadow-sm">
    <div class="card-body">
        <h5 class="card-title">Update Password</h5>
        <p class="text-muted">
            Ensure your account is using a long, random password to stay secure.
        </p>

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <!-- Current Password -->
            <div class="mb-3">
                <label for="update_password_current_password" class="form-label fw-bold">Current Password</label>
                <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                @error('current_password')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Password -->
            <div class="mb-3">
                <label for="update_password_password" class="form-label fw-bold">New Password</label>
                <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                @error('password')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="update_password_password_confirmation" class="form-label fw-bold">Confirm Password</label>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                @error('password_confirmation')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Save Button -->
            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-lock me-1"></i> Update Password
                </button>

                @if (session('status') === 'password-updated')
                    <p class="text-success fw-bold mb-0">Password updated successfully!</p>
                @endif
            </div>
        </form>
    </div>
</section>
