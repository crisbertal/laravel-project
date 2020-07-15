<div>
    <div class="flex justify-center p-4">
        <h2 class="text-lg pb-4">Add steps for task</h2>
        <span wire:click="increment" class="fas fa-plus p-2 cursor-pointer" />
    </div>

    <div class="flex flex-col flex-justify-center px-24">
    @foreach ($steps as $step)
        <!-- Se ha puesto la wire:key para que livewire haga referencia al elemento que crea -->
        <div class="flex flex-row justify-center py-2" wire:key="{{$step}}">
            <!-- Para enviar un array de los inputs, se pone [] al final de la variable name. La variable se tiene que llamar igual -->
            <input type="text" name="steps[]" class="p-2 border rounded" placeholder="{{'Describe step ' . ($step + 1)}}">
            <!-- ahora se eliminara el componente step asociado a la key-->
            <span wire:click="remove({{$step}})" class="fas fa-times text-red-400 p-2" />
        </div>
    @endforeach
    </div>
</div>
