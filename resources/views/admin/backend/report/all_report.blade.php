@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row mb-4">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-24 fw-semibold text-primary">📊 Reportes de Administrador</h4>
                </div>
            </div>
        </div>

        <div class="row g-4">

            {{-- Buscar por Fecha --}}
            <div class="col-md-4">
                <div class="card border-primary shadow-sm">
                    <div class="card-header bg-primary text-white fw-bold text-center">
                        Buscar por Fecha
                    </div>
                    <div class="card-body">
                        <form id="myForm" action="{{ route('admin.search.bydate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Seleccione una Fecha</label>
                                <input class="form-control" name="date" type="date">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-outline-primary btn-lg rounded-pill">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Buscar por Mes --}}
            <div class="col-md-4">
                <div class="card border-success shadow-sm">
                    <div class="card-header bg-success text-white fw-bold text-center">
                        Buscar por Mes
                    </div>
                    <div class="card-body">
                        <form id="myForm" action="{{ route('admin.search.bymonth') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Seleccione un Mes</label>
                                <select name="month" class="form-select">
                                    <option selected>-- Seleccione un Mes --</option>
                                    <option value="January">Enero</option>
                                    <option value="February">Febrero</option>
                                    <option value="March">Marzo</option>
                                    <option value="April">Abril</option>
                                    <option value="May">Mayo</option>
                                    <option value="June">Junio</option>
                                    <option value="July">Julio</option>
                                    <option value="August">Agosto</option>
                                    <option value="September">Septiembre</option>
                                    <option value="October">Octubre</option>
                                    <option value="November">Noviembre</option>
                                    <option value="December">Diciembre</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Seleccione el Año</label>
                                <select name="year_name" class="form-select">
                                    <option selected>-- Seleccione un Año --</option>
                                    @for ($year = 2025; $year <= 2030; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-outline-success btn-lg rounded-pill">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Buscar por Año --}}
            <div class="col-md-4">
                <div class="card border-warning shadow-sm">
                    <div class="card-header bg-warning text-dark fw-bold text-center">
                        Buscar por Año
                    </div>
                    <div class="card-body">
                        <form id="myForm" action="{{ route('admin.search.byyear') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Seleccione el Año</label>
                                <select name="year" class="form-select">
                                    <option selected>-- Seleccione un Año --</option>
                                    @for ($year = 2022; $year <= 2026; $year++)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-outline-warning btn-lg rounded-pill">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
