{{--@if ($errors->any())--}}
{{--    @foreach($errors->all() as $error)--}}
{{--        {{ $error }}--}}
{{--    @endforeach--}}
{{--@endif--}}


<div class="mt-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>