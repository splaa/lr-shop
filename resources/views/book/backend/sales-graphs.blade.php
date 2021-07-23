@inject('analytics','App\Services\Analytics )

<div class="finances-display">
    {{ $analytics->getBalance() }} / {{ $analytics->getBudget() }}
</div>

@if (app('context')->isPublic())
    &copy; Copyright {{ app('context')->client->name }}
@endif

@ifPublic
&copy; Copyright MyApp LLC
@else
    &copy; Copyright {{ app('context')->client->name }}
@endif