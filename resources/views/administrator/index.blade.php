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
					<p class="tab__description">En este bloque encontrarás a todas las personas que forman parte de nuestra aplicación. Desde los administradores, encargados de gestionar y dar acceso a los demás usuarios, hasta los profesores, responsables de crear cursos y transmitir conocimientos relevantes. También encontrarás a los estudiantes, quienes tienen la responsabilidad de aprender y pueden acceder a los cursos que deseen para obtener un certificado al finalizar.</p>
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
				Lista de <strong class="color-Text">Administradores</strong>
			</h2>
			<div class="containerTableUser">
			<table class="listUser" id="adminTable">
				<thead class="listUser__head">
					<tr class="listUser__trHead">
						<th class="listUser__thHead">
							Foto
						</th>
						<th class="listUser__thHead">
							Primer<span class="visibilityFalse">i</span>nombre
						</th>
						<th class="listUser__thHead">
							Primer<span class="visibilityFalse">i</span>apellido
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
						<th class="listUser__thHead listUser__thHead--actions">Acciones</th>
					</tr>
				</thead>
				<tbody class="listUser__head">
	        		@foreach ($administrators as $key => $item)
					<tr class="listUser__trBody">
						<td class="listUser__tdBody">
							<img class="imgTable" src="{{ $item->user->profileimg->url }}" alt="foto de perfil">
						</td>
						<td class="listUser__tdBody">{{ $item->user->firts_name }}</td>
						<td class="listUser__tdBody">{{ $item->user->lastname }}</td>
						<td class="listUser__tdBody">{{ $item->user->gender }}</td>
						<td class="listUser__tdBody">{{ $item->user->birthdate }}</td>
						<td class="listUser__tdBody">{{ $item->user->identification_card }}</td>
						<td class="listUser__tdBody">{{ $item->user->number_phone }}</td>
						<td class="listUser__tdBody">{{ $item->user->parishe->municipalitie->state->name }}</td>
						<td class="listUser__tdBody">{{ $item->user->parishe->municipalitie->name }}</td>
						<td class="listUser__tdBody">{{ $item->user->parishe->name }}</td>
						<td class="listUser__tdBody">{{ $item->user->email }}</td>
						<td class="listUser__tdBody">
							<ul class="list__actions">
			                    <a href="{{ route('administrator.edit', $item->user->id) }}" title="Editar" class="icon icon--edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
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


		<article class="article">
			<h2 class="tab__title--centered">
				Lista de <strong class="color-Text">Profesores</strong>
			</h2>
			<div class="containerTableUser">
			<table class="listUser" id="teacherTable">
				<thead class="listUser__head">
					<tr class="listUser__trHead">
						<th class="listUser__thHead">
							Foto
						</th>
						<th class="listUser__thHead">
							Primer<span class="visibilityFalse">i</span>nombre
						</th>
						<th class="listUser__thHead">
							Primer<span class="visibilityFalse">i</span>apellido
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
						<th class="listUser__thHead listUser__thHead--actions">Acciones</th>
					</tr>
				</thead>
				<tbody class="listUser__head">
	        		@foreach ($teachers as $key => $item)
					<tr class="listUser__trBody">
						<td class="listUser__tdBody">
							<img class="imgTable" src="{{ $item->user->profileimg->url }}" alt="foto de perfil">
						</td>
						<td class="listUser__tdBody">{{ $item->user->firts_name }}</td>
						<td class="listUser__tdBody">{{ $item->user->lastname }}</td>
						<td class="listUser__tdBody">{{ $item->user->gender }}</td>
						<td class="listUser__tdBody">{{ $item->user->birthdate }}</td>
						<td class="listUser__tdBody">{{ $item->user->identification_card }}</td>
						<td class="listUser__tdBody">{{ $item->user->number_phone }}</td>
						<td class="listUser__tdBody">{{ $item->user->parishe->municipalitie->state->name }}</td>
						<td class="listUser__tdBody">{{ $item->user->parishe->municipalitie->name }}</td>
						<td class="listUser__tdBody">{{ $item->user->parishe->name }}</td>
						<td class="listUser__tdBody">{{ $item->user->email }}</td>
						<td class="listUser__tdBody">
							<ul class="list__actions">
			                    <a href="{{ route('administrator.edit', $item->user->id) }}" title="Editar" class="icon icon--edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
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


		<article class="article">
			<h2 class="tab__title--centered">
				Lista de <strong class="color-Text">Estudiantes</strong>
			</h2>
			<div class="containerTableUser">
			<table class="listUser" id="studentTable">
				<thead class="listUser__head">
					<tr class="listUser__trHead">
						<th class="listUser__thHead">
							Foto
						</th>
						<th class="listUser__thHead">
							Primer<span class="visibilityFalse">i</span>nombre
						</th>
						<th class="listUser__thHead">
							Primer<span class="visibilityFalse">i</span>apellido
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
						<th class="listUser__thHead listUser__thHead--actions">Acciones</th>
					</tr>
				</thead>
				<tbody class="listUser__head">
	        		@foreach ($students as $key => $item)
					<tr class="listUser__trBody">
						<td class="listUser__tdBody">
							<img class="imgTable" src="{{ $item->user->profileimg->url }}" alt="foto de perfil">
						</td>
						<td class="listUser__tdBody">{{ $item->user->firts_name }}</td>
						<td class="listUser__tdBody">{{ $item->user->lastname }}</td>
						<td class="listUser__tdBody">{{ $item->user->gender }}</td>
						<td class="listUser__tdBody">{{ $item->user->birthdate }}</td>
						<td class="listUser__tdBody">{{ $item->user->identification_card }}</td>
						<td class="listUser__tdBody">{{ $item->user->number_phone }}</td>
						<td class="listUser__tdBody">{{ $item->user->parishe->municipalitie->state->name }}</td>
						<td class="listUser__tdBody">{{ $item->user->parishe->municipalitie->name }}</td>
						<td class="listUser__tdBody">{{ $item->user->parishe->name }}</td>
						<td class="listUser__tdBody">{{ $item->user->email }}</td>
						<td class="listUser__tdBody">
							<ul class="list__actions">
			                    <a href="{{ route('administrator.edit', $item->user->id) }}" title="Editar" class="icon icon--edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
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
		let tableAdmin = new DataTable('#adminTable', {
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
	<script type="text/javascript">
		let tableTeacher = new DataTable('#teacherTable', {
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
	<script type="text/javascript">
		let tableStudent = new DataTable('#studentTable', {
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