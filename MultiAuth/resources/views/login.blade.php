<html>
@if(session()->has('fail'))
    <p>
        {{ session('fail') }}
    </p>
@endif
<form action="/login" method="POST">
    @csrf
    <input type="text" name="name" placeholder="name">
    <input type="password" name="password">
    <button type="submit">Login</button>
</form>

<h1>New Code added here</h1>

</html>
