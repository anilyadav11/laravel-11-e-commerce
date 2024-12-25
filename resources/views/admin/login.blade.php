<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    @if (session('error'))
    <div class="error">{{ session('error') }}</div>
    @endif
</div>