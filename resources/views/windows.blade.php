	<div class="sheetWindows sheetWindows--hidden">
		<article class="windows windows--delete">
			<p class="closeText"><i class="fa-solid fa-xmark"></i></p>
			<div class="windows__message">
				<h4 class="windows__title">¿Quieres eliminar el elemento?</h4>
				<ul class="header__bottons">
					<span class="windows__confirm">
						<li class="header__loginItem header__loginItem--contrast">
							Si, eliminar
						</li>
					</span>
					<span class="windows__cancel">
						<li class="header__loginItem">
							No, Cerrar
						</li>
					</span>
				</ul>
			</div>
		</article>
	</div>

@section('scripts')
	<script type="module" src="{{ asset('js/components/windows.js') }}"></script>
@endsection




<article class="descriptionCard">
		<nav class="descriptionCard__nav">
			<a href="#" class="descriptionCard__item descriptionCard__item--checked">Introducción</a>
			<a href="#" class="descriptionCard__item">Objetivos</a>
			<a href="#" class="descriptionCard__item">Metodología</a>
		</nav>
		<section class="introduction">
			<h3 class="introduction__title">Introducción</h3>
			<p class="introduction__description">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</section>
		<section class="smallInformation">
			<h4 class="smallInformation__title">Profesor:</h4>
			<p class="smallInformation__text">{{ $teacher->name }} {{ $teacher->lastname }}</p>
		</section>
	</article>