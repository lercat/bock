@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p/{{ $post->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
          <div class="row">
              <div class="col-8 offset-2">
  
                  <div class="row">
                      <h2 class="pt-4">Modifier le Post</h2 >
                  </div>
                  <div class="form-group row">
                      <label for="legende" class="col-md-4 col-form-label">Légende du post</label>
                              
                      <input id="legende" 
                          type="text" 
                          class="form-control @error('legende') is-invalid @enderror" 
                          name="legende"
                          value="{{ old('legende') ?? $post->legende }}" 
                          autocomplete="legende" autofocus>
                          
                      @error('legende')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>  
  
                  <div class="row">
                      <label for="description" class="col-md-4 col-form-label">Description du post</label>
                      <input id="description" 
                              type="text" 
                              class="form-control @error('description') is-invalid @enderror" 
                              name="description"
                              value="{{ old('description')  ?? $post->description }}"
                              autocomplete="description" autofocus>
                              
                      @error('description')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                      @enderror
                  </div>
  
                  <div class="row">
                      <label for="image" class="col-md-4 col-form-label">Image du post</label>
                      <input id="image"
                              type="file" 
                              class="form-control-file @error('image') is-invalid @enderror"  
                              name="image"
                              value="{{ old('image')  ?? $post->image}}"
                              autocomplete="image" autofocus>
                      @error('image')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                      @enderror
                  </div>
  
                  <div class="row pt-4">
                      <button class="btn btn-dark">Enregistrer les modifs
                      </button>
                  </div>
  
              </div>
          </div>
     </form>
</div>
@endsection
