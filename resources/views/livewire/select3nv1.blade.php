<div>
    {{-- bloque distrito --}}
    <div class="input-group mb-3">
        <div class="form-floating">
            <select wire:model="distrito" name="distrito" class="form-select" id="distrito">
                @foreach($distritos as $distrito)
                    <option value={{$distrito->id}}>{{$distrito->nombre}}</option>
                @endforeach
            </select>
            <label for="distrito">Selecciona región ...</label>
        </div>

        <button wire:click="boton_distrito" type="button" class="btn btn-primary btn-sm float-end">
            @if($ver_icono_mas_distrito)
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            @else
                <i class="fa fa-minus-circle" aria-hidden="true"></i>
            @endif
        </button>
        
        @if($ver_new_distrito)
            <div class="input-group mt-3">
                <input wire:ignore.self wire:model="new_distrito" type="text" class="form-control input-group-sm" placeholder="Nueva región" name="new_distrito">
                <button wire:click="agregar_distrito" class="btn btn-outline-primary" type="button">Guardar</button>                   
            </div>
            <small class="text-danger">@error('new_distrito') {{ $message }} @enderror</small>
        @endif   

    </div>
    <div class="input-group mb-3">
        <div class="form-floating">
            <select wire:model="provincia" name="provincia" class="form-select" id="provincia">
                @foreach($provincias as $provincia)
                    <option value={{$provincia->id}}>{{$provincia->nombre}}</option>
                @endforeach
            </select>
            <label for="provincia">Selecciona provincia ...</label>
        </div>

        <button wire:click="boton_provincia" type="button" class="btn btn-primary btn-sm float-end">
            @if($ver_icono_mas_provincia)
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            @else
                <i class="fa fa-minus-circle" aria-hidden="true"></i>
            @endif
        </button>

        @if($ver_new_provincia)
            <div class="input-group mt-3">
                <input wire:ignore.self wire:model="new_provincia" type="text" class="form-control input-group-sm" placeholder="Nueva provincia" name="new_provincia">
                <button wire:click="agregar_provincia" class="btn btn-outline-primary" type="button">Guardar</button>                   
            </div>
            <small class="text-danger">@error('new_provincia') {{ $message }} @enderror</small>
        @endif  

    </div>


</div>


@push('scripts')
    <script>
        Livewire.on('mensajear', mensaje => {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](mensaje)
        })
    </script>
@endpush