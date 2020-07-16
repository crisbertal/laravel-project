<div>
    <div class="flex justify-center p-4">
        <h2 class="text-lg pb-4">Add steps for task</h2>
        <span wire:click="increment" class="fas fa-plus p-2 cursor-pointer" />
    </div>

    <div class="flex flex-col flex-justify-center px-24">
    @foreach ($steps as $step)
        <!-- Ahora se usa loop index porque mount requiere un int -->
        <div class="flex flex-row justify-center py-2" wire:key="{{$loop->index}}">
            <input type="text" name="steps[]" class="p-2 border rounded" placeholder="{{'Describe step ' . ($loop->index + 1)}}" value="{{$step['name']}}">
            <span wire:click="remove({{$loop->index}})" class="fas fa-times text-red-400 p-2" />
        </div>
    @endforeach
    </div>
</div>

