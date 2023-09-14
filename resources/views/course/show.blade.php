@extends('teacher.layout')


@section('title', 'Curso')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/course.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/headerBackground.css') }}">
	<link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/table.css') }}">
@endsection



@section('content')
	<!--Header-->
	<div class="containerHeader">
		<img src="{{ $course->img }}" alt="Imagen del curso {{ $course->name }}" class="headerBackground__img">
		<div class="sabana"></div>
		<header class="headerBackground">
			<div class="headerBackground__information">
				<div>
					<small class="descriptionContent">Título del curso:</small>
					<h2 class="headerBackground__title">{{ $course->name }}</h2>
				</div>
			</div>
			<ul class="headerBackground__buttons">
				<a href="{{ route('teacher.course.edit', $course) }}">
					<li class="header__loginItem header__loginItem--contrast">
						Editar curso
					</li>
				</a>
				<form 
	            	action="{{ route('teacher.course.destroy', $course) }}" 
	            	method="POST" 
	            	class="form__delete">
	                
	                @csrf
	                @method('DELETE')
	                <button type="submit" class="header__loginItem header__loginItem--delete">Eliminar curso</button>                
                </form>
			</ul>
		</header>
	</div>
	<div class="descriptionBanner">
		<nav class="descriptionBanner__nav">
			<p class="descriptionBanner__item descriptionBanner__item--checked">Propósito</p>
			<p class="descriptionBanner__item">Objetivos</p>
			<p class="descriptionBanner__item">Competencias a conseguir</p>
			<p class="descriptionBanner__item">Profesores</p>
			<p class="descriptionBanner__item">Estudiantes</p>
			<p class="descriptionBanner__item">Estadísticas</p>
			<p class="collapse__icon">
				<i class="collapse__text fa-solid fa-chevron-up"></i></i>
				<i class="collapse__text hidden fa-solid fa-chevron-down"></i></i>
			</p>
		</nav>
		<div class="descriptionInfo">
			<div class="descriptionCard">
				<h3 class="smallInformation__title">Propósito del curso</h3>
				<p class="smallInformation">{{ $course->purpose }}</p>
			</div>
			<div class="descriptionCard hidden">
				<h3 class="smallInformation__title">Objetivo General</h3>
				<p class="smallInformation">{{ $course->general_objetive }}</p>
				<h3 class="smallInformation__title smallInformation__title--second">Objetivos Especifícos</h3>
				<p class="smallInformation">{!! nl2br($course->specific_objetive) !!}</p>
			</div>
			<div class="descriptionCard hidden">
				<h3 class="smallInformation__title">Competencias a conseguir</h3>
				<p class="smallInformation">{!! nl2br($course->competence) !!}</p>
			</div>
			<div class="descriptionCard hidden">
				<h3 class="smallInformation__title">Profesores asignados al curso</h3>
				<div class="containerTableUser">
				<table class="listUser" id="teacherTable">
					<thead class="listUser__head">
						<tr class="listUser__trHead">
							<th class="listUser__thHead">
								Foto
							</th>
							<th class="listUser__thHead">
								Nombre
							</th>
							<th class="listUser__thHead">
								Apellido
							</th>
							<th class="listUser__thHead">
								Cédula
							</th>
							<th class="listUser__thHead">
								Número<span class="visibilityFalse">i</span>de<span class="visibilityFalse">i</span>teléfono
							</th>
							<th class="listUser__thHead">
								Correo<span class="visibilityFalse">i</span>electrónico
							</th>
						</tr>
					</thead>
					<tbody class="listUser__head">
		        		@foreach ($teachers as $key => $item)
						<tr class="listUser__trBody">
							<td class="listUser__tdBody">
								<img class="imgTable" src="{{ $item->user->profileImg->url }}" alt="foto de perfil">
							</td>
							<td class="listUser__tdBody">{{ $item->user->firts_name }}</td>
							<td class="listUser__tdBody">{{ $item->user->lastname }}</td>
							<td class="listUser__tdBody">{{ $item->user->identification_card }}</td>
							<td class="listUser__tdBody">{{ $item->user->number_phone }}</td>
							<td class="listUser__tdBody">{{ $item->user->email }}</td>
						</tr>
		        		@endforeach
					</tbody>
				</table>
				</div>
			</div>
			<div class="descriptionCard hidden">
				<h3 class="smallInformation__title">Estudiantes inscritos al curso</h3>
				<div class="containerTableUser">
				<table class="listUser" id="studentTable">
					<thead class="listUser__head">
						<tr class="listUser__trHead">
							<th class="listUser__thHead">
								Foto
							</th>
							<th class="listUser__thHead">
								Nombre
							</th>
							<th class="listUser__thHead">
								Apellido
							</th>
							<th class="listUser__thHead">
								Cédula
							</th>
							<th class="listUser__thHead">
								Número<span class="visibilityFalse">i</span>de<span class="visibilityFalse">i</span>teléfono
							</th>
							<th class="listUser__thHead">
								Correo<span class="visibilityFalse">i</span>electrónico
							</th>
							<th class="listUser__thHead">
								Estado
							</th>
						</tr>
					</thead>
					<tbody class="listUser__head">
						@if (empty($students[0]))
						<p>No hay estudiantes inscritos al curso</p>
						@endif
		        		@foreach ($students as $key => $item)
						<tr class="listUser__trBody">
							<td class="listUser__tdBody">
								<img class="imgTable" src="{{ $item->user->profileImg->url }}" alt="foto de perfil">
							</td>
							<td class="listUser__tdBody">{{ $item->user->firts_name }}</td>
							<td class="listUser__tdBody">{{ $item->user->lastname }}</td>
							<td class="listUser__tdBody">{{ $item->user->identification_card }}</td>
							<td class="listUser__tdBody">{{ $item->user->number_phone }}</td>
							<td class="listUser__tdBody">{{ $item->user->email }}</td>
							<td class="listUser__tdBody">{{ $item->levelComplete }}</td>
						</tr>
		        		@endforeach
					</tbody>
				</table>
				</div>
			</div>
			<div class="descriptionCard hidden">
				<h3 class="smallInformation__title">Estadísticas del curso</h3>
				<div class="boxContainerDescriptionCard">
					<div class="containerDescriptionCard">
						<div class="containerBoxData">
							<p class="boxData">
								Cantidad de módulos educativos: 
								<span class="dataNumber">{{ count($modules) }}</span>
							</p>
							<p class="boxData">
								Cantidad de cuestionarios educativos: 
								<span class="dataNumber">{{ $questionnaires_count }}</span>
							</p>
							<p class="boxData">
								Cantidad de notas educativas:
								<span class="dataNumber">{{ $notes_count }}</span>
							</p>
						</div>
						<div class="containerBoxData">
							<p class="boxData">
								Cantidad de profesores:
								<span class="dataNumber">{{ count($teachers) }}</span>
							</p>
							<p class="boxData">
								Cantidad de estudiantes:
								<span class="dataNumber">{{ count($students) }}</span>
							</p>
						</div>
					</div>
					<div class="hidden">
						<p class="boxData hidden">
							Cantidad de estudiantes aprobados: 
							<span id="studentsApproved">{{ $studentsApproved }}</span>
						</p>
						<p class="boxData hidden">
							Cantidad de estudiantes cursando:
							<span id="studentsTaking">{{ $studentsTaking }}</span>
						</p>
						<p class="boxData hidden">
							Cantidad de estudiantes que no han empezado aún:
							<span id="studentsNotStarted">{{ $studentsNotStarted }}</span>
						</p>	
					</div>
					

					<div class="boxMyChart">
					  <canvas id="myChart"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>

	<main class="container">
		<!--Information-->
		<article class="article">
			<h2 class="tab__title--centered">
				Módulos del <strong class="color-Text">curso</strong>
			</h2>
			@if (empty($modules[0]))
				<h3>No hay módulos</h3>
			@else
				<section class="containerModules">
				@foreach ($modules as $key => $item)
					<div class="cardModule">
						<span class="cardModule__number">{{ $item->level }}</span>
						<h3 class="cardModule__title">{{ $item->name }}</h3>
						<p class="cardModule__item cardModule__item--note">
							<i class="fa-solid fa-note-sticky"></i>
							Notas educativas: {{ $item->notes_count }}
						</p>
						<p class="cardModule__item cardModule__item--question">
							<i class="fa-solid fa-clipboard-question"></i>
							Preguntas: {{ $item->questionnaires_count }}
						</p>
						<ul class="list__actions list__actions--course">
							<a href="{{ route('teacher.module.show', $item) }}" title="Ver más" class="icon icon--show"><i class="fa-solid fa-eye"></i> Ver más</a> 
		                    <a href="{{ route('teacher.module.edit', $item) }}" title="Editar" class="icon icon--edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
							<form 
		                    	action="{{ route('teacher.module.destroy', $item) }}" 
		                    	method="POST" 
		                    	class="form__delete">
		                        
		                        @csrf
		                        @method('DELETE')
		                        <button type="submit" class="icon icon--delete"><i title="Eliminar" class="fa-solid fa-trash"></i> Eliminar</button>                
		                    </form> 
						</ul>
					</div>
					<div class="bar"></div>
				@endforeach
				</section>
			@endif
			<a href="{{ route('teacher.module.create') }}">
				<li class="header__loginItem header__loginItem--contrast">
					Crear un módulo educativo nuevo
				</li>
			</a>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/course/descriptionBanner.js') }}"></script>
	<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
	<script type="text/javascript">
		let table = new DataTable('#teacherTable', {
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
		let table2 = new DataTable('#studentTable', {
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

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script>
		let studentsApproved = document.getElementById('studentsApproved');
		studentsApproved = studentsApproved.textContent.trim();
		let studentsTaking = document.getElementById('studentsTaking');
		studentsTaking = studentsTaking.textContent.trim();
		let studentsNotStarted = document.getElementById('studentsNotStarted');
		studentsNotStarted = studentsNotStarted.textContent.trim();

		  const ctx = document.getElementById('myChart');
		  const data = {
			  labels: [
			    'Estudiantes que no han iniciado',
			    'Estudiantes cursando',
			    'Estudiantes aprobados',
			  ],
			  datasets: [{
			    label: 'Estudiantes',
			    data: [studentsNotStarted, studentsTaking, studentsApproved],
			    backgroundColor: [
			      'rgb(255, 99, 132)',
			      'rgb(54, 162, 235)',
			      'rgb(255, 205, 86)'
			    ],
			    hoverOffset: 4
			  }]
			};


		  new Chart(ctx, {
		    type: 'doughnut',
		    data: data,
		    options: {
		      scales: {
		        y: {
		          beginAtZero: true
		        }
		      }
		    }
		  });
	</script>
@endsection