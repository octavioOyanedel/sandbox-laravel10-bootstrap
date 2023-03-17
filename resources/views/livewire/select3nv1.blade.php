<div>
    <div class="form-floating">
        <select wire:model="distrito" name="distrito" class="form-select" id="floatingSelect">
            @foreach($distritos as $distrito)
                <option value={{$distrito->id}}>{{$distrito->nombre}}</option>
            @endforeach
        </select>
        <label for="floatingSelect">Selecciona región ...</label>
    </div>
    {{-- <span class="mt-2 badge bg-success float-end">Success</span> --}}
    <button wire:click="boton_distrito" type="button" class="mt-2 mb-2 btn btn-primary btn-sm float-end">
        <i class="fa fa-copy"></i>  Nueva región
    </button>
    
    @if($ver_new_distrito)
        <div class="input-group mb-3">
            <input wire:ignore.self wire:model="new_distrito" type="text" class="form-control input-group-sm" placeholder="Nueva región" name="new_distrito">
            <button wire:click="agregar_distrito" class="btn btn-outline-primary" type="button">Guardar</button>                   
        </div>
        <small class="text-danger">@error('new_distrito') {{ $message }} @enderror</small>
    @endif    
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