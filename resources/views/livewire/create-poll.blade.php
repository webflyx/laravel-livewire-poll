<div>
    <form>
        <div>
            <label>Poll Title</label>
            <input type="text" wire:model.live="title" />
            <div class="mt-2">Current title: {{ $title }}</div>
        </div>

        <div class="mt-4">
            <button wire:click.prevent="addOption" class="btn">Add option</button>
        </div>


        <div class="mt-6">
            @foreach ($options as $index => $option)
                <div class="mb-4 ">
                    <label for="">Option {{ $index }}</label>
                    <div class="flex gap-3">
                        <input type="text" wire:model="options.{{ $index }}" />
                        <button wire:click.prevent="removeOption({{ $index }})" class="btn">Remove</button>
                    </div>
                </div>
            @endforeach
        </div>

        <button wire:click.prevent="createPoll" class="btn">Create Pool</button>
    </form>
</div>
