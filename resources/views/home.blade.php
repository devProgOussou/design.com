@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-dark text-light text-center">{{ __('Panneau d\'administration') }}</div>

                    <div class="card-body text-light" style="background-color: #06111c;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="justify-content-center align-items-right">
                                        <form method="POST" enctype="multipart/form-data"
                                              action="{{ route('addImage') }}">
                                            @csrf
                                            <div class="form-group">
                                                <br>
                                                <div class="col-md-12">
                                                    <label for="name">Le nom de l'affiche : </label>
                                                    <input type="text" name="name"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           placeholder="Le nom de l'affiche" value={{ old('name') }}>
                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <input type="text" name="fname"
                                                           class="form-control @error('fname') is-invalid @enderror"
                                                           placeholder="Votre prénom" value={{ old('fname') }}>
                                                    @error('fname')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <input type="file" name="image"
                                                           class="form-control-file @error('image') is-invalid @enderror"
                                                           value={{ old('image') }}>
                                                    @error('image')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <label for="description">Description : </label>
                                                    <textarea name="description" rows="3"
                                                              class="form-control @error('description') is-invalid @enderror"
                                                              placeholder="du texte">{{ old('description') }}</textarea>
                                                    @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="user_id">
                                                        <input type="hidden" name="user_id"
                                                               value="{{Auth::user()->id}}">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button class="btn btn-outline-success">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-1">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
