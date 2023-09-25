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
	        size: A4 landscape;
		}
		@font-face{
			font-family: "Roboto-Bold";
			font-style:normal;
			font-weight:700;
			src: url("{{ storage_path('fonts/Roboto-Bold.ttf') }}") format('truetype');
		}
		@font-face{
			font-family: "Roboto-Regular";
			font-style:normal;
			font-weight:400;
			src: url("{{ storage_path('fonts/Roboto-Regular.ttf') }}") format('truetype');
		}
		@font-face{
			font-family: "DancingScript";
			font-style:normal;
			font-weight:500;
			src: url("{{ storage_path('fonts/DancingScript.ttf') }}") format('truetype');
		}

		.bold{
			font-family:"Roboto-Bold";
			font-weight: 700;
		}
		.regularTitle{
			font-family:"DancingScript";
			font-weight:500;
		}
		.Roboto-regular{
			font-family:"Roboto-Bold";
			font-weight: 400;
		}
	</style>

	<!--Fuentes-->

</head>
<body>
		<div class="title">
			<div class="imgBox">
				<img src="{{ public_path('img/certificate/cenamec.png') }}" class="imgLogoSmall imgLogoSmall--left">
				<img src="{{ public_path('img/certificate/accion.png') }}" class="imgLogoSmall imgLogoSmall--right">
			</div>
			<h1 class="bold principalH1">CENAMEC</h1>	
			<h4 class="bold">Certifica a:</h4>	
		</div>
		<div class="person">
			<h2 class="regularTitle">
				{{ $student->firts_name }}
				{{ $student->second_name }}
				{{ $student->lastname }}
				{{ $student->second_lastname }}
			</h2>
		</div>
		<div class="course">
			<h3 class="bold">Por haber finalizado:</h3>
			<h2 class="regularTitle">{{ $course->name }}</h2>
		</div>
		<footer class="footer">
			<h3 class="Roboto-regular">
				FECHA DE FINALIZACION: {{ $certificate->date_certificate }}
			</h3>
			<h3 class="Roboto-regular">
				CODIGO: CENAMEC-{{ $certificate->course_id }}-{{ $certificate->student_id }}
			</h3>
		</footer>
</body>
</html>	