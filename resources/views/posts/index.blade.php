@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row">
        <div class="col-6 offset-3">
            <a href="/profil/{{ $post->user->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100"  alt="une image de bière">
            </a>
        </div>
    </div><!--ajout fin de div-->
    <div class="row pt-6 pb-3"><!--ajout de cette div row je n'ai pas mis le /div ???-->
        <!--py-4 padding top and bottom-->
        <div class="col-4 offset-4">
            <div>

                <p>
                    <span class="font-weight-bold">
                        <a href="/profil/{{ $post->user->id }}" class="mr-3">
                        <span class="text-dark" >{{ $post->user->username }}</span>
                        </a>
                    </span>{{ $post->legende }}
                </p>
            </div>
        </div>
    </div>
@endforeach
<div class="card-header"> 
    <a href="#">Par ici</a>
    <p>trouver si profil sans aucun post à mettre le bon lien</p>
</div>

</div>

@endsection