<div class="ml-4 md:ml-0">
    @if (Route::has('login'))
    <a href="{{ route('login') }}" class="action-btn mr-2">Log in</a>
    @endif
    
    @if (Route::has('register'))
        <a href="{{ route('register') }}" class="action-btn">Sign up</a>
    @endif
</div>