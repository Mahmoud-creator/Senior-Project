<html>
    <form action="/register" method="POST">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="password" name="password">
        <button type="submit">Submit</button>
    </form>
</html>
