@php
    use Carbon\Carbon;
@endphp

@extends('student.layout')


@section('title', '¡Bienvenido!')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">

	<link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/table.css') }}">
@endsection



@section('content')
	<!--Header-->
	<div class="header__background header__background--student">
		<header class="header">
			<img class="header__img" 
					src="{{ asset($student->profileimg->url) }}" 
					alt="Imagen de una profesora">

			<div class="header__information">
				<h2 class="header__title">
					¡Bienvenido {{ $student->firts_name }}!
				</h2>
				<ul class="header__bottons">
					<a href="{{ route('student.course.index') }}">
						<li class="header__loginItem header__loginItem--contrast">
							Ver cursos
						</li>
					</a>
				</ul>
			</div>
		</header>
	</div>


	<!--Contenedor-->
	<main class="container">
		<!--Information-->
		<article class="article">
			<section class="cuadricula">
				<img class="cuadricula__img" 
						src="{{ asset('img/student/certificate.png') }}" 
						alt="Profesor enseñando una materia">
				<div class="cuadricula-description">
					<h2 class="cuadricula-description__title">Observa tus resultados</h2>
					<h4 class="cuadricula-description__subtitle">¡Continúa enriqueciendo tus conocimientos con nuestro apoyo!</h4>
				</div>
				<div class="cuadricula-box cuadricula-topLeft">
					<h2 class="cuadricula__title">
						Cursos activos:
						<strong class="color-Text">
							{{ ($student->courses_count - $student->certificates_count) }}
						</strong>
					</h2>
				</div>
				<div class="cuadricula-box cuadricula-topRight">
					<h2 class="cuadricula__title">
						Cursos terminados: 
						<strong class="color-Text">
							{{ $student->certificates_count }}
						</strong>
					</h2>
				</div>
				<div class="cuadricula-box cuadricula-buttomLeft">
					<h2 class="cuadricula__title">
						Módulos aprobados: 
						<strong class="color-Text">
							{{ $student->modules_count}}
						</strong>
					</h2>
				</div>
				<div class="cuadricula-box cuadricula-buttomRight">
					<h2 class="cuadricula__title">
						Notas educativas vistas: 
						<strong class="color-Text">
							{{ $student->notes_count}}
						</strong>
					</h2>
				</div>
			</section>
		</article>


		<article class="article">
			<h2 class="tab__title--centered">
				Lista de <strong class="color-Text">cursos</strong>
			</h2>
			<div class="containerTableUser">
			<table class="listUser" id="coursesTable">
				<thead class="listUser__head">
					<tr class="listUser__trHead">
						<th class="listUser__thHead">
							Imagen
						</th>
						<th class="listUser__thHead">
							Nombre<span class="visibilityFalse">t</span>del<span class="visibilityFalse">t</span>curso
						</th>
						<th class="listUser__thHead">
							Fecha de inicio
						</th>
						<th class="listUser__thHead">
							Progreso
						</th>
						<th class="listUser__thHead">
							Calificación
						</th>
						<th class="listUser__thHead">
							Fecha de finalización
						</th>
						<th class="listUser__thHead">
							Acción
						</th>
					</tr>
				</thead>
				<tbody class="listUser__head">
	        		@foreach ($courses as $key => $item)
					<tr class="listUser__trBody">
						<td class="listUser__tdBody">
							<img class="imgTable" src="{{ $item->img }}" alt="foto de perfil">
						</td>
						<td class="listUser__tdBody">{{ $item->name }}</td>
						<td class="listUser__tdBody">{{ $item->dateStart }}</td>
						<td class="listUser__tdBody">{{ $item->progress }}%</td>
						<td class="listUser__tdBody">{{ $item->percentage }}pts</td>
						<td class="listUser__tdBody">{{ $item->dateFinished }}</td>
						<td class="listUser__tdBody">
							<a href="{{ route('student.course.display', $item) }}" 
		                    	class="bton bton--edit">
		                    	<i class="fa-solid fa-eye"></i>
		                    	Estudiar
		                    </a> 
							@if ($item->certificate)
							<a href="{{ route('certificate.show', $item->certificate) }}" 
		                    	class="bton bton--edit">
		                    	<i class="fa-solid fa-star"></i>
		                    	Obtener certificado
		                    </a> 
							@endif
		                </td>
					</tr>
	        		@endforeach
				</tbody>
			</table>	        	
			</div>
		</article>


		<article class="article">
			<h2 class="tab__title--centered">
				Lista de <strong class="color-Text">Módulos educativos</strong>
			</h2>
			<div class="containerTableUser">
			<table class="listUser" id="modulesTable">
				<thead class="listUser__head">
					<tr class="listUser__trHead">
						<th class="listUser__thHead">
							Nombre<span class="visibilityFalse">t</span>del<span class="visibilityFalse">t</span>módulo
						</th>
						<th class="listUser__thHead">
							Nombre<span class="visibilityFalse">t</span>del<span class="visibilityFalse">t</span>curso
						</th>
						<th class="listUser__thHead">
							Desempeño
						</th>
						<th class="listUser__thHead">
							Ir al módulo
						</th>
					</tr>
				</thead>
				<tbody class="listUser__head">
	        		@foreach ($modules as $key => $item)
					<tr class="listUser__trBody">
						<td class="listUser__tdBody">{{ $item->name }}</td>
						<td class="listUser__tdBody">{{ $item->course->name }}</td>
						<td class="listUser__tdBody">{{ $item->percentage }}%</td>
						<td class="listUser__tdBody">
							<a href="{{ route('student.module.study', $item) }}" 
		                    	class="bton bton--edit">
		                    	<i class="fa-solid fa-arrow-trend-up"></i> 
		                    	Mejorar desempeño
		                    </a> 
						</td>
					</tr>
	        		@endforeach
				</tbody>
			</table>	        	
			</div>
		</article>

		<article class="article">
			<h2 class="tab__title--centered">
				Lista de <strong class="color-Text">notas educativas</strong>
			</h2>
			<div class="containerTableUser">
			<table class="listUser" id="notesTable">
				<thead class="listUser__head">
					<tr class="listUser__trHead">
						<th class="listUser__thHead">
							Imagen
						</th>
						<th class="listUser__thHead">
							Título<span class="visibilityFalse">t</span>de la<span class="visibilityFalse">t</span>nota
						</th>
						<th class="listUser__thHead">
							Nombre<span class="visibilityFalse">t</span>del<span class="visibilityFalse">t</span>módulo
						</th>
						<th class="listUser__thHead">
							Nombre<span class="visibilityFalse">t</span>del<span class="visibilityFalse">t</span>curso
						</th>
					</tr>
				</thead>
				<tbody class="listUser__head">
	        		@foreach ($notes as $key => $item)
					<tr class="listUser__trBody">
						<td class="listUser__tdBody">
							<img class="imgTable imgTable--big" src="{{ $item->img }}" alt="foto de perfil">
						</td>
						<td class="listUser__tdBody">{{ $item->title }}</td>
						<td class="listUser__tdBody">{{ $item->module->name }}</td>
						<td class="listUser__tdBody">{{ $item->module->course->name }}</td>
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
		let table = new DataTable('#coursesTable', {
		    responsive: true,
		    autoWidth : false,
		    
		    "language": {
	            "lengthMenu": "Mostrar _MENU_ cursos",
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
		let tableModules = new DataTable('#modulesTable', {
		    responsive: true,
		    autoWidth : false,
		    
		    "language": {
	            "lengthMenu": "Mostrar _MENU_ módulos",
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
		let tableNotes = new DataTable('#notesTable', {
		    responsive: true,
		    autoWidth : false,
		    
		    "language": {
	            "lengthMenu": "Mostrar _MENU_ notas",
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