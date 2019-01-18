@extends('layout')

@section('title')
Liste des courses
@stop

@section('content')
	<div class="listeArticles">
		<table>
			<thead>
				<tr>
					<th>Nom</th>
					<th>Description</th>
					<th>Nombre d'element</th>
					<th>Prix unitaire</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($articles as $a)
					<tr>
						<td>{{ $a->name }}</td>
						<td>{{ $a->description }}</td>
						<td><span class="a-action minus"><a href="/produit/{{ strtolower($a->id) }}/remove">-</a></span> {{ number_format($a->numberOfArticle,0,'','\'') }} <span class="a-action plus"><a href="/produit/{{ strtolower($a->id) }}/add">+</a></span></td>
						<td>{{ number_format($a->price,2,'.','\'') }} frs</td>
					</tr>
				@endforeach
				@if (empty($articles))
					<tr>
						<td colspan="4">Aucun element dans la liste</td>
					</tr>
				@endif
			</tbody>
		</table>
		<table class="total">
			<tr>
				<td class="total-t">Total</td>
				<td class="total-p">{{ number_format($price, 2, '.', '\'') }} frs</td>
			</tr>
		</table>
	</div>
@stop