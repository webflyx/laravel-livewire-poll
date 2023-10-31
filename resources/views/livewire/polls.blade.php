<div class="mt-6">
    <h2 class="text-2xl mb-3">Polls</h2>

    @forelse ($polls as $poll)
        <div class="mb-6">
            <h3 class="text-xl mb-2">{{ $poll->title }}</h3>
            @foreach ($poll->options as $option)
            <div class="flex gap-2 items-center mb-2">
                <button class="btn" wire:click.prevent="vote({{ $option->id }})">Vote</button>
                <div>{{ $option->name }}</div>
                <div>({{ $option->votes->count() }})</div>
            </div>
            @endforeach
        </div>
    @empty
        <div>Polls not available</div>
    @endforelse
</div>
