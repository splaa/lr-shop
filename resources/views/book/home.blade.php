<div class="content" data-page-name=" {{ $pageName }}">
    <p>Herre's why you should sign up for our app: <strong>It,s Great.</strong></p>

    @include('book.partials.sign-up-button', ['text' => 'See just how great it is'])
</div>
@component('book.partials.modal', ['class' => 'danger'])
    @slot('title')
        Password validation failure
    @endslot
    <p>
        The password you have provided is not valid.
        Here are the rules for valid passwords: [...]
    </p>

    <p><a href="#">some link</a></p>
@endcomponent
