<html>
    @if(session()->has('success'))
        <p>
            {{ session('success') }}
        </p>
    @endif
    <h1>Hello there</h1>
    @guest
        <a href="/register">Register</a>
        <a href="/login">Login</a>
    @endguest
    @auth
        <h1>Hello there {{ auth()->user()->name }}</h1>
        <a href="/logout">Logout</a>
    @endauth
</html>
