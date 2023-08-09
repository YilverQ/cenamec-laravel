@extends('administrator.layout')


@section('title', 'Lista de usuarios')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
	<link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/table.css') }}">
@endsection



@section('content')
	<!--Contenedor-->
	<main class="container">
		<!--Information-->
		<article class="article">
			<section class="tab">
				<img class="tab__img" 
						src="{{ asset('img/administrator/users.png') }}" 
						alt="Grupo de usuarios">

				<div class="tab__information">
					<h2 class="tab__title">
						Gestiona a otros <strong class="color-Text">usuarios</strong>
					</h2>
					<p class="tab__description">El administrador es una persona capacitada para gestionar a los usuarios de la aplicación. Cuando hablamos de gestionar, nos referimos a crear, actualizar y eliminar. A continuación, encontrarás una tabla con una lista de usuarios y dispondrás de unos botones que te permitirán llevar a cabo estas funcionalidades mencionadas previamente.</p>
					<ul class="header__bottons">
						<a href="{{ route('administrator.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear un nuevo usuario
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>

		<article class="article">
			<h2 class="tab__title--centered">
				Lista de <strong class="color-Text">usuarios</strong>
			</h2>
			<div class="containerTableUser">
			<table class="listUser" id="usersTable">
				<thead class="listUser__head">
					<tr class="listUser__trHead">
						<th class="listUser__thHead">
							Foto
						</th>
						<th class="listUser__thHead">
							Primer<span class="visibilityFalse">i</span>nombre
						</th>
						<th class="listUser__thHead">
							Segundo<span class="visibilityFalse">i</span>nombre
						</th>
						<th class="listUser__thHead">
							Primer<span class="visibilityFalse">i</span>apellido
						</th>
						<th class="listUser__thHead">
							Segundo<span class="visibilityFalse">i</span>apellido
						</th>
						<th class="listUser__thHead">
							Genero
						</th>
						<th class="listUser__thHead">
							Fecha<span class="visibilityFalse">i</span>de<span class="visibilityFalse">i</span>nacimiento
						</th>
						<th class="listUser__thHead">
							Cédula
						</th>
						<th class="listUser__thHead">
							Número<span class="visibilityFalse">i</span>de<span class="visibilityFalse">i</span>teléfono
						</th>
						<th class="listUser__thHead">
							Estado
						</th>
						<th class="listUser__thHead">
							Municipio
						</th>
						<th class="listUser__thHead">
							Parroquia
						</th>
						<th class="listUser__thHead">
							Correo<span class="visibilityFalse">i</span>electrónico
						</th>
						<th class="listUser__thHead">
							Admin
						</th>
						<th class="listUser__thHead">
							Profesor
						</th>
						<th class="listUser__thHead">
							Estudiante
						</th>
						<th class="listUser__thHead listUser__thHead--actions">Acciones</th>
					</tr>
				</thead>
				<tbody class="listUser__head">
	        		@foreach ($administrators as $key => $item)
					<tr class="listUser__trBody">
						<td class="listUser__tdBody">
							<img class="imgTable" src="{{ $item->profileimg->url }}" alt="foto de perfil">
						</td>
						<td class="listUser__tdBody">{{ $item->firts_name }}</td>
						<td class="listUser__tdBody">{{ $item->second_name }}</td>
						<td class="listUser__tdBody">{{ $item->lastname }}</td>
						<td class="listUser__tdBody">{{ $item->second_lastname }}</td>
						<td class="listUser__tdBody">{{ $item->gender }}</td>
						<td class="listUser__tdBody">{{ $item->birthdate }}</td>
						<td class="listUser__tdBody">{{ $item->identification_card }}</td>
						<td class="listUser__tdBody">{{ $item->number_phone }}</td>
						<td class="listUser__tdBody">{{ $item->parishe->municipalitie->state->name }}</td>
						<td class="listUser__tdBody">{{ $item->parishe->municipalitie->name }}</td>
						<td class="listUser__tdBody">{{ $item->parishe->name }}</td>
						<td class="listUser__tdBody">{{ $item->email }}</td>
						<td class="listUser__tdBody">
							@if ($item->administrator)
							<i class="td__value td__value--true fa-solid fa-circle-check"></i>
							<p>Si</p>
							@else
							<i class="td__value td__value--false fa-solid fa-circle-xmark"></i>No
							@endif
						</td>
						<td class="listUser__tdBody">
							@if ($item->teacher)
							<i class="td__value td__value--true fa-solid fa-circle-check"></i>Si
							@else
							<i class="td__value td__value--false fa-solid fa-circle-xmark"></i>No
							@endif
						</td>
						<td class="listUser__tdBody">
							@if ($item->student)
							<i class="td__value td__value--true fa-solid fa-circle-check"></i>Si
							@else
							<i class="td__value td__value--false fa-solid fa-circle-xmark"></i>No
							@endif
						</td>
						<td class="listUser__tdBody">
							<ul class="list__actions">
			                    <a href="{{ route('administrator.edit', $item) }}" title="Editar" class="icon icon--edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
								<form 
			                    	action="{{ route('administrator.destroy', $item) }}" 
			                    	method="POST" 
			                    	class="form__delete">
			                        
			                        @csrf
			                        @method('DELETE')
			                        <button type="submit" class="icon icon--delete"><i title="Eliminar" class="fa-solid fa-trash"></i> Eliminar</button>                
			                    </form> 
							</ul>
						</td>
					</tr>
	        		@endforeach
				</tbody>
			</table>	        	
			</div>
		</article>
	</main>
@endsection

@section('scripts')
	<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
	<script type="text/javascript">
		let table = new DataTable('#usersTable', {
		    responsive: true,
		    autoWidth : false,
		    
		    "language": {
	            "lengthMenu": "Mostrar _MENU_ usuarios",
	            "zeroRecords": "No se encontró nada - Disculpa",
	            "info": "Mostrando la página _PAGE_ de _PAGES_",
	            "infoEmpty": "No hay registros disponibles",
	            "infoFiltered": "(filtrado de _MAX_ registros totales)",
	            "search": "Buscar:",
	            "paginate": {
	            	"next": "Siguiente",
	            	"previous": "Anterior"
	            }
	        }
		});
	</script>
@endsection