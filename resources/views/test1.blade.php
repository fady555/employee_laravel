

@if ($errors->any())
    <div class="input-group mb-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




<form method="post" action="{{route('login')}}">
    @csrf

    <input type="text" name="username" value="AAM1234">
    <input type="text" name="password" value="fady1234">
    <input type="submit">
</form>
