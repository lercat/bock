@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center pb-3">
        <h1>Beers O'Clock</h1> 
    </div>
    <div class="img">
        <img src="../../assets/img/tictac.jpg" alt="">
    </div>
    <div class="text-center py-3">
        <h2>Quoi de mieux qu'une petite mousse pour se détendre</h2>
    </div>

    <div class="links">
        <a href="#" class="mr-3">Mentions Légales</a>
        <a href="/profils" class="mr-3">Voir les profils</a>
        <a href="/a-propos" class="mr-3">À propos</a>
        <a href="/contact"class="mr-3">Contactez-nous</a>
        <a href="/p">Card</a>
    </div>
</div>

@endsection