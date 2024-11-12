<form wire:submit="form.login">
    <div>
        <label class="block" for="email">Email Address</label>
        <input type="text" wire:model.live="form.email" id="email" name="email">
        @error('form.email')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label class="block" for="password">Password</label>
        <input type="password" wire:model.live="form.password" id="password">
        @error('form.password')
        <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
</form>
