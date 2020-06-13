@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profil/{{ $user->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
          <div class="row">
              <div class="col-8 offset-2">

                <!--Modification sur le profil -->
                <div class="row">
                    <h2 class="pt-4">Modifier mon Profil</h2 >
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Titre</label>
                            
                    <input id="title" 
                        type="text" 
                        class="form-control @error('title') is-invalid @enderror" 
                        name="title"
                        value="{{ old('title') ?? $user->profil->title }}" 
                        required autocomplete="title" autofocus>
                        
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>  
  
                <div class="row">
                    <label for="presentation" class="col-md-4 col-form-label">Présentez-vous</label>
                    <input id="presentation" 
                            type="text" 
                            class="form-control @error('presentation') is-invalid @enderror" 
                            name="presentation"
                            value="{{ old('presentation') ?? $user->profil->presentation }}"
                            required autocomplete="presentation" autofocus>
                            
                    @error('presentation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="url" class="col-md-4 col-form-label">URL de votre site</label>
                    <input id="url"
                            type="text" 
                            class="form-control @error('url') is-invalid @enderror"  
                            name="url"
                            value="{{ old('url') ?? $user->profil->url }}"
                            required autocomplete="url" autofocus>
                    @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Image du Profil</label>
                    <input id="image"
                            type="file" 
                            class="form-control-file @error('image') is-invalid @enderror"  
                            name="image">
                    @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                
                <div class="row pt-4">
                    <button class="btn btn-dark">Enregistrer les modifications
                    </button>
                </div>
  
              </div>
          </div>
     </form>
</div>
@endsection
