<div>

    {{-- bloque distrito --}}
    <div class="input-group mb-3">
        <div class="form-floating">
            <select wire:model="distrito" name="distrito" class="form-select" id="distrito">
                <option value="">...</option>
                @foreach($distritos as $distrito)
                    <option value={{$distrito->id}}>{{$distrito->nombre}}</option>
                @endforeach
            </select>
            <label for="distrito">Selecciona región ...</label>
        </div>
        <button wire:click="boton_add_distrito" type="button" class="btn btn-primary btn-sm float-end">
            @if($icono_add_distrito)
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            @else
                <i class="fa fa-minus-circle" aria-hidden="true"></i>
            @endif
        </button>
        @if($ver_new_distrito)
            <div class="input-group mt-3">
                <input wire:ignore.self wire:model="new_distrito" type="text" class="form-control input-group-sm" placeholder="Nueva región" name="new_distrito">
                <button wire:click="agregar_distrito" class="btn btn-primary" type="button">Guardar</button>                   
            </div>
            <small class="text-danger">@error('new_distrito') {{ $message }} @enderror</small>
        @endif   
    </div>

    {{-- bloque provincia --}}
    <div class="input-group mb-3">
        <div class="form-floating">
            <select wire:model="provincia" name="provincia" class="form-select" id="provincia">
                <option value="">...</option>
                @foreach($provincias as $provincia)
                    <option value={{$provincia->id}}>{{$provincia->nombre}}</option>
                @endforeach
            </select>
            <label for="provincia">Selecciona provincia ...</label>
        </div>
        <button wire:click="boton_add_provincia" type="button" class="btn btn-primary btn-sm float-end">
            @if($icono_add_provincia)
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            @else
                <i class="fa fa-minus-circle" aria-hidden="true"></i>
            @endif
        </button>
         @if($ver_new_provincia)
             <div class="input-group mt-3">
                 <input wire:ignore.self wire:model="new_provincia" type="text" class="form-control input-group-sm" placeholder="Nueva provincia" name="new_provincia">
                 <button wire:click="agregar_provincia" class="btn btn-primary" type="button">Guardar</button>                   
             </div>
             <small class="text-danger">@error('new_provincia') {{ $message }} @enderror</small>
         @endif
    </div> 

    {{-- bloque comuna --}}
    <div class="input-group mb-3">
        <div class="form-floating">
            <select wire:model="comuna" name="comuna" class="form-select" id="comuna">
                <option value="">...</option>
                @foreach($comunas as $comuna)
                    <option value={{$comuna->id}}>{{$comuna->nombre}}</option>
                @endforeach
            </select>
            <label for="comuna">Selecciona comuna ...</label>
        </div>
        <button wire:click="boton_add_comuna" type="button" class="btn btn-primary btn-sm float-end">
            @if($icono_add_comuna)
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            @else
                <i class="fa fa-minus-circle" aria-hidden="true"></i>
            @endif
        </button>
        @if($ver_new_comuna)
            <div class="input-group mt-3">
                <input wire:ignore.self wire:model="new_comuna" type="text" class="form-control input-group-sm" placeholder="Nueva comuna" name="new_comuna">
                <button wire:click="agregar_comuna" class="btn btn-primary" type="button">Guardar</button>                   
            </div>
            <small class="text-danger">@error('new_comuna') {{ $message }} @enderror</small>
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