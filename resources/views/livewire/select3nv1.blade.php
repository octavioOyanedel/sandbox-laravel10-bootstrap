<div>
    {{-- select n1 --}}
    <p>N1 - {{ $distrito }} - {{ $distrito_actual }}</p>
    <div class="input-group mb-3">
        <button class="btn btn-outline-success" type="button">Nuevo</button>
        <select class="form-select" name="distrito" wire:model="distrito">
            <option value="" selected>Seleccione región...</option>
            @foreach($distritos as $key => $nombre)
                <option value="{{$key}}">{{$nombre}}</option>
            @endforeach
        </select>
    </div>
    {{-- select n2 --}}
    <p>N2 - {{ $provincia }}</p>
    <div class="input-group mb-3">
        <button class="btn btn-outline-success" type="button">Nuevo</button>
        <select class="form-select" name="provincia" wire:model="provincia">
            <option value="" selected>Seleccione provincia...</option>
            @foreach($provincias as $key => $nombre)
                <option value="{{$key}}">{{$nombre}}</option>
            @endforeach
        </select>
    </div>
    {{-- select n3 --}}
    <p>N3 - {{ $comuna }}</p>
    <div class="input-group mb-3">
        <button wire:click="toggle_nueva_comuna" class="btn btn-outline-success" type="button">Nuevo</button>
        <select wire:model="comuna" class="form-select" name="comuna">
            <option value="" selected>Seleccione comuna...</option>
            @foreach($comunas as $key => $nombre)
                <option value="{{$key}}">{{$nombre}}</option>
            @endforeach
        </select>
    </div>
    @if($mostrar_nueva_comuna)
        <div wire:ignore.self class="input-group mb-3">
            <input wire:model="new_comuna" type="text" class="form-control" placeholder="Nueva comuna" name="new_comuna">
            <button wire:click="agregar_nueva_comuna" class="btn btn-outline-primary" type="button">Guardar</button>                   
        </div>
        <small class="text-danger">@error('new_comuna') {{ $message }} @enderror</small>
    @endif
</div>