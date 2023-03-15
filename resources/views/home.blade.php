@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>

                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                      <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                          <img src="" class="rounded me-2" alt="...">
                          <strong class="me-auto">Bootstrap</strong>
                          <small>11 mins ago</small>
                          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                          Hello, world! This is a toast message.
                        </div>
                      </div>
                    </div>
  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
