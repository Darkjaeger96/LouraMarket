@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique su dirección de Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de Email.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, verifique su Email para obtener un enlace de verificación.') }}
                    {{ __('Si no recibiste el Email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('haga clic aquí para solicitar otra') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
