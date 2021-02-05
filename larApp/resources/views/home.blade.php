@extends('layouts.app')

@section('title', 'Usuario')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bienvenid@, {{ Auth::user()->name }}!</div>
                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <div class="card-body">

                        <div class="card mb-3" style="max-width: 540px;">

                            <h4 class="card-header" style="max-height: 79px; min-height: 79px;">{{ Auth::user()->name }}
                            </h4>
                            <div class="alert alert-danger" role="alert">
                                Tu ultimo acceso fue el {{ Auth::user()->last_login }}
                            </div>
                            <div class="card-body" style="height: 75px;">
                                <h5 class="card-title">Correo:</h5>
                                <h6 class="card-subtitle text-muted">{{ Auth::user()->email }}</h6>
                            </div>
                            <img src="{{ Auth::user()->photo }}" class="img-thumbnail center"
                                style="max-height: 177px; min-height: 177px;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Teléfono: {{ Auth::user()->phone }}</li>
                                <li class="list-group-item">{{ Auth::user()->type_number }} {{ Auth::user()->dnumber }}
                                </li>
                                <li class="list-group-item">Dirección: {{ Auth::user()->address }}</li>
                                <li class="list-group-item">Rol:
                                    @if (Auth::user()->role == 'Admin')
                                        Administrador <i class="fas fa-user-ninja"></i>
                                    @elseif(Auth::user()->role == 'Editor')
                                        Editor <i class="fas fa-user-edit"></i>
                                    @else
                                        Cliente <i class="fas fa-user"></i>
                                    @endif
                                </li>
                                <li class="list-group-item">
                                    @if (Auth::user()->active == 1)
                                        <button class="btn btn-success btn-sm">
                                            <i class="fa fa-check"></i> Activo
                                        </button>
                                    @else
                                        <button class="btn btn-danger">
                                            <i class="fas fa-skull-crossbones"></i> Inactivo
                                        </button>
                                    @endif
                                </li>
                                <li class="list-group-item">Género:
                                    @if (Auth::user()->gender == 'Female')
                                        Mujer <i class="fas fa-venus"></i>
                                    @else
                                        Hombre <i class="fas fa-mars"></i>
                                    @endif
                                </li>
                            </ul>
                            <div class="card-footer text-muted">
                                @php
                                    $td = \Carbon\Carbon::now();
                                    $dt = \Carbon\Carbon::parse(Auth::user()->birthdate);
                                @endphp
                                <small class="text-muted">
                                    <strong>Edad: </strong> {{ $td->diffForHumans($dt, 1) }} <i
                                        class="fas fa-birthday-cake"></i>
                                </small>
                            </div>
                            <div class="card-body">
                                <a href="{{ url('users/' . Auth::user()->id . '/edit') }}" class="btn btn-warning"><i
                                        class="fas fa-user-edit"></i>
                                    </i> Editar</a>
                                <form action="{{ url('users/' . Auth::user()->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-delete"><i class="far fa-trash-alt"></i>
                                        Borrar</button>
                                </form>
                            </div>
                        </div>

                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
