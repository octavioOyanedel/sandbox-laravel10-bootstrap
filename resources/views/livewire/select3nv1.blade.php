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