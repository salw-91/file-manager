<h1>{{ $theme == 'dark' ? 'dark' : 'light' }}</h1>

<form action="{{ route('create') }}" method="post">
    @csrf
    <input type="radio" id="theme" name="theme" value="dark" onchange="this.form.submit()">
    <label for="theme">
        <i>Mode</i>
    </label>
</form>
