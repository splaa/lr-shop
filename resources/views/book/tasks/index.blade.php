<h1>Hello Tasks</h1>
{{ $hello }} , Blade <br>
<p>
    @{{ $hello }} , Blade
</p>
@{{ hello }} , Blade
<p>
    @verbatim
        {{ $hello }} , Blade
    @endverbatim
</p>
<p>
    @unless($helloWorld)
        Hello, World!!!
    @endunless
</p>
<p>
    @for ($i = 0; $i < 9; $i++)
        The number is {{ $i }} <br>
    @endfor
</p>
