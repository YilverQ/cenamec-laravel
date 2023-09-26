@extends('administrator.layout')


@section('title', 'Estadísticas') 
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/form.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/course.css') }}">

	<link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/table.css') }}">
@endsection



@section('content')
	<main class="container">
		<article class="article">
			<section class="tab">
				<img class="tab__img" 
						src="{{ asset('img/administrator/statistics.png') }}" 
						alt="Aprende con pequeños pasos">
				
				<div class="tab__information">
					<h2 class="tab__title">Observa <strong class="color-Text">los datos</strong> obtenidos por la aplicación</h2>
					<p class="tab__description">Obtén información sobre la utilización de la aplicación por parte de los usuarios. Utiliza estos datos para mejorar la experiencia y optimizar el contenido informativo.</p>
				</div>
			</section>

			<section class="secondContent">
				<div class="descriptionBanner">
					<h2 class="descriptionBanner__mainTitle">Datos de usuarios</h2>
					<nav class="descriptionBanner__nav">
						<p class="descriptionBanner__item descriptionBanner__item--checked">Número de usuarios</p>
						<p class="descriptionBanner__item">Usuarios por ubicación</p>
						<p class="descriptionBanner__item">Estadísticas demográficas</p>
						<p class="collapse__icon">
							<i class="collapse__text fa-solid fa-chevron-up"></i></i>
							<i class="collapse__text hidden fa-solid fa-chevron-down"></i></i>
						</p>
					</nav>
					<div class="descriptionInfo">

						<div class="descriptionCard">
							<h3 class="smallInformation__title">Número de usuarios</h3>
							<div class="boxContainerDescriptionCard">
								<div class="containerDescriptionCard">
									<div class="containerBoxData">
										<p class="boxData boxData--red">
											Cantidad de administradores: 
											<span class="dataNumber" id="userAdministrator">
												{{ count($administrators) }}
											</span>
										</p>
										<p class="boxData boxData--blue">
											Cantidad de profesores: 
											<span class="dataNumber" id="userTeacher">
												{{ count($teachers) }}
											</span>
										</p>
										<p class="boxData boxData--orange">
											Cantidad de estudiantes:
											<span class="dataNumber" id="userStudent">
												{{ count($students) }}
											</span>
										</p>
									</div>
									<div class="containerBoxData">
										<p class="boxData boxData--large">
											Cantidad de usuarios totales: 
											<span class="dataNumber" id="userTotal">
												{{ count($users) }}
											</span>
										</p>
									</div>
								</div>

								<div class="boxMyChart">
								  <canvas id="myChartUsers"></canvas>
								</div>
							</div>
						</div>

						<div class="descriptionCard hidden">
							<h3 class="smallInformation__title">Usuarios por estados</h3>
							<div class="hidden">
								<p class="boxData hidden">
									@foreach ($states as $key => $item)
									<span class="dataStates" id="{{ str_replace(' ', '_', $key); }}">
										{{ $item }}
									</span>
					        		@endforeach
								</p>
							</div>
							<div class="boxMyChart boxMyChart--complete">
								<canvas id="myChartStates"></canvas>
							</div>

							<h3 class="smallInformation__title">Municipios con más usuarios</h3>
							<div class="hidden">
								<p class="boxData hidden">
									@foreach ($municipalities as $key => $item)
									<span class="dataMunicipalities" 
										id="{{ str_replace(' ', '_', $item->name) }}">
										{{ $item->users_count }}
									</span>
					        		@endforeach
								</p>
							</div>
							<div class="boxMyChart boxMyChart--complete">
								<canvas id="myChartMunicipalities"></canvas>
							</div>

							<h3 class="smallInformation__title">Parroquias con más usuarios</h3>
							<div class="hidden">
								<p class="boxData hidden">
									@foreach ($parishes as $key => $item)
									<span class="dataParishes" 
										id="{{ str_replace(' ', '_', $item->name) }}">
										{{ $item->users_count }}
									</span>
					        		@endforeach
								</p>
							</div>
							<div class="boxMyChart boxMyChart--complete">
								<canvas id="myChartParishes"></canvas>
							</div>							
						</div>
						<div class="descriptionCard hidden">
							<h3 class="smallInformation__title">Promedio demográficas</h3>
							<div class="boxContainerDescriptionCard">
								<div class="containerDescriptionCard">
									<div class="containerBoxData">
										<p class="boxData boxData--red">
											Porcentaje de mujeres: 
											<span class="superContainerSpan">
												<span class="dataNumber" id="woman">
													{{ $genderPercentageWoman }}
												</span>
												<span class="spanPercentage">%</span>
											</span>
										</p>
										<p class="boxData boxData--blue">
											Porcentaje de hombres: 
											<span class="superContainerSpan">
												<span class="dataNumber" id="man">
														{{ $genderPercentageMen }}
												</span>
												<span class="spanPercentage">%</span>
											</span>
										</p>
									</div>
									<div class="containerBoxData">
										<p class="boxData boxData--large">
											Promedio de edad
											<span class="dataNumber" id="averageAge">
												{{ $averageAge }}
											</span>
										</p>
									</div>
								</div>

								<div class="boxMyChart">
								  <canvas id="myChartDemografico"></canvas>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
			</section>


			<article class="marginBanner"></article>
			

			<section class="secondContent">
				<div class="descriptionBanner">
					<h2 class="descriptionBanner__mainTitle">Estadísticas de los cursos</h2>
					<nav class="descriptionBanner__nav">
						<p class="description2Banner__item description2Banner__item--checked">Mejores cursos</p>
						<p class="description2Banner__item">
							Lista de cursos
						</p>
						<p class="description2Banner__item">Módulos educativos</p>
						<p class="collapse2__icon">
							<i class="collapse2__text fa-solid fa-chevron-up"></i></i>
							<i class="collapse2__text hidden fa-solid fa-chevron-down"></i></i>
						</p>
					</nav>
					<div class="description2Info">

						<div class="description2Card">
							<h3 class="smallInformation__title">Cursos con más estudiantes inscritos</h3>
							<div class="hidden">
								<p class="boxData hidden">
									@foreach ($bestCourses as $element)
									<span class="dataBestCourses" 
										id="{{ $element->name }}">
										{{ $element->students_count }}
									</span>
					        		@endforeach
								</p>
							</div>
							<div class="boxMyChart boxMyChart--complete">
								<canvas id="myChartBestCourses"></canvas>
							</div>
						</div>

						<div class="description2Card hidden">
							<h3 class="smallInformation__title">Lista de cursos</h3>
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
											Profesores asignados
										</th>
										<th class="listUser__thHead">
											Estudiantes inscritos
										</th>
										<th class="listUser__thHead">
											Estudiantes aprobados
										</th>
										<th class="listUser__thHead">
											Módulos educativos
										</th>
										<th class="listUser__thHead">
											Notas educativas
										</th>
										<th class="listUser__thHead">
											Cuestionarios educativos
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
										<td class="listUser__tdBody">{{ $item->teachers_count }}</td>
										<td class="listUser__tdBody">{{ $item->students_count }}</td>
										<td class="listUser__tdBody">{{ $item->approved_count }}</td>
										<td class="listUser__tdBody">{{ $item->modules_count }}</td>
										<td class="listUser__tdBody">{{ $item->notes_count }}</td>
										<td class="listUser__tdBody">{{ $item->questionnaires_count }}</td>
									</tr>
					        		@endforeach
								</tbody>
							</table>	        	
							</div>
						</div>

						<div class="description2Card hidden">
							<h3 class="smallInformation__title">Módulos educativos</h3>
							<div class="containerTableUser">
							<table class="listUser" id="modulesTable">
								<thead class="listUser__head">
									<tr class="listUser__trHead">
										<th class="listUser__thHead">
											Nombre del curso
										</th>
										<th class="listUser__thHead">
											Nombre<span class="visibilityFalse">t</span>del<span class="visibilityFalse">t</span>módulo
										</th>
										<th class="listUser__thHead">
											Estudiantes que aprobaron el módulo
										</th>
									</tr>
								</thead>
								<tbody class="listUser__head">
					        		@foreach ($modules as $key => $item)
									<tr class="listUser__trBody">
										<td class="listUser__tdBody">{{ $item->course->name }}</td>
										<td class="listUser__tdBody">{{ $item->name }}</td>
										<td class="listUser__tdBody">{{ $item->approved_count }}</td>
									</tr>
					        		@endforeach
								</tbody>
							</table>	        	
							</div>
						</div>
					</div>
				</div>
			</section>

			<div class="marginBanner"></div>

			<section class="secondContent">
				<div class="descriptionBanner">
					<h2 class="descriptionBanner__mainTitle">
						Estadísticas de profesores y  estudiantes
					</h2>
					<nav class="descriptionBanner__nav">
						<p class="description3Banner__item description3Banner__item--checked">
							Estadísticas de profesores
						</p>
						<p class="description3Banner__item">
							Estadísticas de estudiantes
						</p>
						<p class="collapse3__icon">
							<i class="collapse3__text fa-solid fa-chevron-up"></i></i>
							<i class="collapse3__text hidden fa-solid fa-chevron-down"></i></i>
						</p>
					</nav>
					<div class="description3Info">

						<div class="description3Card">
							<h3 class="smallInformation__title">Lista de profesores</h3>
							<div class="containerTableUser">
							<table class="listUser" id="teacherTable">
								<thead class="listUser__head">
									<tr class="listUser__trHead">
										<th class="listUser__thHead">
											Imagen
										</th>
										<th class="listUser__thHead">
											Cédula
										</th>
										<th class="listUser__thHead">
											Nombre
										</th>
										<th class="listUser__thHead">
											Cursos asignados
										</th>
										<th class="listUser__thHead">
											Módulos educativos
										</th>
										<th class="listUser__thHead">
											Notas educativas
										</th>
										<th class="listUser__thHead">
											Cuestionarios educativos
										</th>
									</tr>
								</thead>
								<tbody class="listUser__head">
					        		@foreach ($teachers as $key => $item)
									<tr class="listUser__trBody">
										<td class="listUser__tdBody">
											<img class="imgTable" src="{{ $item->user->profileimg->url }}" alt="foto de perfil">
										</td>
										<td class="listUser__tdBody">
											{{ $item->user->identification_card }}
										</td>
										<td class="listUser__tdBody">{{ $item->user->firts_name }}</td>
										<td class="listUser__tdBody">{{ $item->courses_count }}</td>
										<td class="listUser__tdBody">{{ $item->modules_count }}</td>
										<td class="listUser__tdBody">{{ $item->notes_count }}</td>
										<td class="listUser__tdBody">{{ $item->questionnaires_count }}</td>
									</tr>
					        		@endforeach
								</tbody>
							</table>	        	
							</div>
						</div>
					</div>
					<div class="description3Card hidden">
							<h3 class="smallInformation__title">Lista de estudiantes</h3>
							<div class="containerTableUser">
							<table class="listUser" id="studentTable">
								<thead class="listUser__head">
									<tr class="listUser__trHead">
										<th class="listUser__thHead">
											Imagen
										</th>
										<th class="listUser__thHead">
											Cédula
										</th>
										<th class="listUser__thHead">
											Nombre
										</th>
										<th class="listUser__thHead">
											Cursos inscritos
										</th>
										<th class="listUser__thHead">
											Cursos finalizados
										</th>
										<th class="listUser__thHead">
											Módulos aprobados
										</th>
										<th class="listUser__thHead">
											Notas vistas
										</th>
									</tr>
								</thead>
								<tbody class="listUser__head">
					        		@foreach ($students as $key => $item)
									<tr class="listUser__trBody">
										<td class="listUser__tdBody">
											<img class="imgTable" src="{{ $item->user->profileimg->url }}" alt="foto de perfil">
										</td>
										<td class="listUser__tdBody">
											{{ $item->user->identification_card }}
										</td>
										<td class="listUser__tdBody">{{ $item->user->firts_name }}</td>
										<td class="listUser__tdBody">{{ $item->courses_count }}</td>
										<td class="listUser__tdBody">{{ $item->courses_finished_count }}</td>
										<td class="listUser__tdBody">{{ $item->modules_count }}</td>
										<td class="listUser__tdBody">{{ $item->notes_count }}</td>
									</tr>
					        		@endforeach
								</tbody>
							</table>	        	
							</div>
						</div>
					</div>
				</div>
			</section>
		</article>
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/course/descriptionBanner.js') }}"></script>
	<script type="module" src="{{ asset('js/course/descriptionBannerSecond.js') }}"></script>
	<script type="module" src="{{ asset('js/course/descriptionBanner3.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script>
		let userStudent = document.getElementById('userStudent');
		userStudent = userStudent.textContent.trim();
		let userTeacher = document.getElementById('userTeacher');
		userTeacher = userTeacher.textContent.trim();
		let userAdministrator = document.getElementById('userAdministrator');
		userAdministrator = userAdministrator.textContent.trim();

		  const ctx = document.getElementById('myChartUsers');
		  const dataUsers = {
			  labels: [
			    'Administradores',
			    'Profesores',
			    'Estudiantes',
			  ],
			  datasets: [{
			    label: 'Usuarios',
			    data: [userAdministrator, userTeacher, userStudent],
			    backgroundColor: [
			      'rgb(255, 99, 132)',
			      'rgb(54, 162, 235)',
			      'rgb(255, 159, 64)'
			    ],
			    hoverOffset: 4
			  }]
			};


		  new Chart(ctx, {
		    type: 'doughnut',
		    data: dataUsers,
		    options: {
		      scales: {
		        y: {
		          beginAtZero: true
		        }
		      }
		    }
		  });
	</script>

	<script>
		  const ctx1 = document.getElementById('myChartStates');
		  const dataStates = document.querySelectorAll('.dataStates');
		  let state, people = null;
		  let labelsStates = [];
		  let dataValues = [];

		  dataStates.forEach( (item) => {
		  	state = item.id.replaceAll(/_/g, " ");
		  	people = item.textContent.trim();
		  	labelsStates.push(state);
		  	if (people == 0){
		  		dataValues.push(0.1);

		  	}else{
		  		dataValues.push(people);
		  	}
		  });


		  const dataUbication = {
			  labels: labelsStates,
			  datasets: [{
			    label: 'Estados',
			    data: dataValues,
			    backgroundColor: [
				  'rgb(255, 99, 132)',
				  'rgb(255, 159, 64)',
				  'rgb(255, 205, 86)',
				  'rgb(75, 192, 192)',
				  'rgb(54, 162, 235)',
				  'rgb(153, 102, 255)',
				  'rgb(201, 203, 207)',

				  '#ba2d2d', '#f42a55', '#96b5a6', '#027fe9', '#e63c80',
				  '#e19563', '#483078', '#ffad08', '#567ebb', '#adad8e',
				  '#de4c45', '#f5da7a', '#e35241', '#562155', '#53576b', 
				  '#14888b', '#e50e0e',
				],
			  }]
			};


		  new Chart(ctx1, {
		    type: 'bar',
		    data: dataUbication,
		    options: {
		      scales: {
		        y: {
		          beginAtZero: true
		        }
		      }
		    }
		  });
	</script>


	
	<script>
		  const ctx2 = document.getElementById('myChartMunicipalities');
		  const dataMunicipalities = document.querySelectorAll('.dataMunicipalities');
		  let municipalitie, peopleMunicipalitie = null;
		  let labelsMunicipalities = [];
		  let dataValuesMunicipalities = [];

		  dataMunicipalities.forEach( (item) => {
		  	municipalitie = item.id.replaceAll(/_/g, " ");
		  	peopleMunicipalitie = item.textContent.trim();
		  	labelsMunicipalities.push(municipalitie);
		  	if (peopleMunicipalitie == 0){
		  		dataValuesMunicipalities.push(0.1);

		  	}else{
		  		dataValuesMunicipalities.push(peopleMunicipalitie);
		  	}
		  });


		  const dataMunicipalitiesUbication = {
			  labels: labelsMunicipalities,
			  datasets: [{
			    label: 'Municipios',
			    data: dataValuesMunicipalities,
			    backgroundColor: [
				  'rgb(255, 99, 132)',
				  'rgb(255, 159, 64)',
				  'rgb(255, 205, 86)',
				  'rgb(75, 192, 192)',
				  'rgb(54, 162, 235)',
				  'rgb(153, 102, 255)',
				  'rgb(201, 203, 207)',

				  '#ba2d2d', '#f42a55', '#96b5a6', '#027fe9', '#e63c80',
				  '#e19563', '#483078', '#ffad08', '#567ebb', '#adad8e',
				  '#de4c45', '#f5da7a', '#e35241', '#562155', '#53576b', 
				  '#14888b', '#e50e0e',
				],
			  }]
			};


		  new Chart(ctx2, {
		    type: 'bar',
		    data: dataMunicipalitiesUbication,
		    options: {
		      scales: {
		        y: {
		          beginAtZero: true
		        }
		      }
		    }
		  });
	</script>

	<script>
		  const ctx3 = document.getElementById('myChartParishes');
		  const dataParishes = document.querySelectorAll('.dataParishes');
		  let parishe, peopleParishes = null;
		  let labelesParishes = [];
		  let dataValuesParishes = [];

		  dataParishes.forEach( (item) => {
		  	parishe = item.id;
		  	parishe = parishe.replaceAll(/_/g, " ");
		  	peopleParishes = item.textContent.trim();
		  	labelesParishes.push(parishe);
		  	if (peopleParishes == 0){
		  		dataValuesParishes.push(0.1);

		  	}else{
		  		dataValuesParishes.push(peopleParishes);
		  	}
		  });


		  const dataParishesUbication = {
			  labels: labelesParishes,
			  datasets: [{
			    label: 'Parroquias',
			    data: dataValuesParishes,
			    backgroundColor: [
				  'rgb(255, 99, 132)',
				  'rgb(255, 159, 64)',
				  'rgb(255, 205, 86)',
				  'rgb(75, 192, 192)',
				  'rgb(54, 162, 235)',
				  'rgb(153, 102, 255)',
				  'rgb(201, 203, 207)',

				  '#ba2d2d', '#f42a55', '#96b5a6', '#027fe9', '#e63c80',
				  '#e19563', '#483078', '#ffad08', '#567ebb', '#adad8e',
				  '#de4c45', '#f5da7a', '#e35241', '#562155', '#53576b', 
				  '#14888b', '#e50e0e',
				],
			  }]
			};


		  new Chart(ctx3, {
		    type: 'bar',
		    data: dataParishesUbication,
		    options: {
		      scales: {
		        y: {
		          beginAtZero: true
		        }
		      }
		    }
		  });
	</script>


	<script>
		  const ctx5 = document.getElementById('myChartBestCourses');
		  const dataBestCourses = document.querySelectorAll('.dataBestCourses');
		  let bestCourse, peopleBestCourse = null;
		  let labelsBestCourses = [];
		  let dataValuesBestCourses = [];

		  dataBestCourses.forEach( (item) => {
		  	bestCourse = item.id;
		  	bestCourse = bestCourse.replaceAll(/_/g, " ").slice(0, 30);
		  	bestCourse += "...";
		  	peopleBestCourse = item.textContent.trim();
		  	console.log(bestCourse);
		  	labelsBestCourses.push(bestCourse);
		  	if (peopleBestCourse == 0){
		  		dataValuesBestCourses.push(0.1);

		  	}else{
		  		dataValuesBestCourses.push(peopleBestCourse);
		  	}
		  });


		  const dataBestCoursesChart = {
			  labels: labelsBestCourses,
			  datasets: [{
			    label: 'Cursos con más estudiantes (lo más populares)',
			    data: dataValuesBestCourses,
			    backgroundColor: [
				  'rgb(255, 99, 132)',
				  'rgb(255, 159, 64)',
				  'rgb(255, 205, 86)',
				  'rgb(75, 192, 192)',
				  'rgb(54, 162, 235)',
				  'rgb(153, 102, 255)',
				  'rgb(201, 203, 207)',

				  '#ba2d2d', '#f42a55', '#96b5a6', '#027fe9', '#e63c80',
				  '#e19563', '#483078', '#ffad08', '#567ebb', '#adad8e',
				  '#de4c45', '#f5da7a', '#e35241', '#562155', '#53576b', 
				  '#14888b', '#e50e0e',
				],
			  }]
			};


		  new Chart(ctx5, {
		    type: 'bar',
		    data: dataBestCoursesChart,
		    options: {
		      scales: {
		        y: {
		          beginAtZero: true
		        }
		      }
		    }
		  });
	</script>



	<script>
		let woman = document.getElementById('woman');
		woman = woman.textContent.trim();
		let man = document.getElementById('man');
		man = man.textContent.trim();

		  const ctx4 = document.getElementById('myChartDemografico');
		  const dataGender = {
			  labels: [
			    'Mujeres',
			    'Hombres',
			  ],
			  datasets: [{
			    label: 'Porcentaje de genero',
			    data: [woman, man],
			    backgroundColor: [
			      'rgb(255, 99, 132)',
			      'rgb(54, 162, 235)',
			      'rgb(255, 159, 64)'
			    ],
			    hoverOffset: 4
			  }]
			};


		  new Chart(ctx4, {
		    type: 'doughnut',
		    data: dataGender,
		    options: {
		      scales: {
		        y: {
		          beginAtZero: true
		        }
		      }
		    }
		  });
	</script>


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
		let modulesTable = new DataTable('#modulesTable', {
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
		let teacherTable = new DataTable('#teacherTable', {
		    responsive: true,
		    autoWidth : false,
		    
		    "language": {
	            "lengthMenu": "Mostrar _MENU_ profesores",
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
		let studentTable = new DataTable('#studentTable', {
		    responsive: true,
		    autoWidth : false,
		    
		    "language": {
	            "lengthMenu": "Mostrar _MENU_ estudiantes",
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