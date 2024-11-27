@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>APELLIDOS</th>
                            <th>CORREO</th>
                            <th>PAIS</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <form action="" method="GET">
                                <td><input type="search" value="{{ request()->get('id') }}" name="id" class="form-control form-control-sm"></td>
                                <td><input type="search" value="{{ request()->get('names') }}" name="names" class="form-control form-control-sm"></td>
                                <td><input type="search" name="lastnames" class="form-control form-control-sm"></td>
                                <td><input type="search" name="email" class="form-control form-control-sm"></td>
                                <td>
                                    <select name="country_id" id="" class="form-select form-select-sm">
                                        <option value="">Seleccionar...</option>
                                        @foreach($countries as $country)
                                            <option {{ request()->get('country_id') == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Buscar..</button>
                                </td>
                            </form>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id  }}</td>
                                <td>{{ $user->names  }}</td>
                                <td>{{ $user->lastnames}}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->country->name }}</td>
                            </tr>
                        @endforeach
                         <tr>
                             <td colspan="5" class="text-center">Resultados <strong>{{ count($users) }}</strong></td>
                         </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
