<!DOCTYPE html>
<html>
<head>
	<!--Meta-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--Title-->
	<title>Certificado - {{ $course->name }} - CENAMEC</title>

	<!--Estilos-->
	<link rel="stylesheet" type="text/css" href="{{ public_path('css/certificate/pdf.css') }}">
	<style>
		@page{
			margin: 0.2cm;
		}
	</style>

	<!--Fuentes-->

</head>
<body>
	<div class="title">
		<h1>CENAMEC</h1>	
		<h4>Certifica a:</h4>	
	</div>
	<div class="person">
		<h2>
			{{ $student->firts_name }}
			{{ $student->second_name }}
			{{ $student->lastname }}
			{{ $student->second_lastname }}
		</h2>
	</div>
	<div class="course">
		<h3>Por haber finalizado:</h3>
		<h2>{{ $course->name }}</h2>
	</div>
</body>
</html>