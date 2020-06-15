@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-75"> <!--modif à 75 -->
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <!-- ici on aura toujours une img soit la N/A du model Profil soit une imgreelle-->
                        <img src="{{ $post->user->profil->profilImage() }}" class=" rounded-circle w-100" style="max-width: 50px">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profil/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                            <img src="../assets/img/coeur.png" alt="" class="pl-3">
                            <a href="#" class="pl-3">Follow</a>
                        </div>
                    </div>
                </div>

                <hr>
                <p> <span class="font-weight-bold mr-3"><a href="/profil/{{ $post->user->id }}"><span class="text-dark">{{ $post->user->username }}</span></a></span>{{ $post->legende }}</p>
                <p>{{ $post->description }}</p>
            </div>
            <div class="row pt-5">
                <form action="/p/{{ $post->id }}" method="post" class="ml-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection