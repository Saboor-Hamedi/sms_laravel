<div class="logout-container">
    <h2>Log Out</h2>
    <p>Are you sure you want to log out?</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Yes, Log Out</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>