@extends('layouts.app')

@section('content')
    <div class="content">
        <section class="custom-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Projekti</h2>
                        <a href="/profile">Atpakaļ</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="card">
                            <div class="card-header">Rediģēt projektu</div>
                            <div class="card-body">
                                {!! Form::open(['action' => ['UserController@editCustomProject', $project->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                                <div class="form-group row">
                                    {{Form::label('name', 'Nosaukums', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                    <div class="col-md-6">
                                        {{Form::text('name', $project->name, ['class' => 'form-control'])}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('desc', 'Apraksts', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                    <div class="col-md-6">
                                        {{Form::textarea('desc', $project->desc, ['class' => 'form-control'])}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('image', 'Rasējums', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                    <div class="col-md-6">
                                        {{Form::file('image')}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    {{Form::label('price', 'Budžets', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                    <div class="col-md-6">
                                        {{Form::text('price', $project->price, ['class' => 'form-control'])}}
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        {{Form::hidden('_method', 'PUT')}}
                                        {{Form::submit('Rediģēt', ['class' => 'btn btn-primary'])}}
                                        {!! Form::close() !!}
                                    </div>

                                    {{--<div class="col-md-6 offset-md-4">--}}
                                    {{--{!! Form::open(['action' => ['UserController@deleteCustomProject', $project->id], 'method' => 'POST']) !!}--}}
                                    {{--{{Form::submit('Dzēst', ['class' => 'btn btn-primary'])}}--}}
                                    {{--{!! Form::close() !!}--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

@endsection

