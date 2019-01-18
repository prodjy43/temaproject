@extends('layout')

@section('title')
Produits
@stop

@section('content')
<div class="produit">
	<div class="produit-image">
		<img src="{{ asset('images/'.$article->images) }}" alt="{{ asset('images/'.$article->images) }}">
			<h2>{{ $article->name }}</h2>
		</img>
	</div>
	<p><i>{{ $article->description }}</i></p>
	<p><b>{{ number_format($article->price, 2, '.', '\'') }} frs</b></p>
	<form action="/produit/{{ $id }}" class="produit-form" method="POST">
		<label>Nombre d'élements :</label>
		@csrf
		<input name="numberOfArticle" type="number" value="1" min="1">
		<button type="submit">Ajouter à la liste</button>
	</form>
</div>
@stop