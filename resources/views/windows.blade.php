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
	<script type="module" src="{{ asset('js/administrator/checkFormAdmin.js') }}"></script>
	<script type="module" src="{{ asset('js/components/windows.js') }}"></script>
@endsection


<i class="fa-solid fa-user-gear"></i>
<i class="fa-solid fa-book-open-reader"></i>
<i class="fa-solid fa-laptop-file"></i>
<i class="fa-solid fa-book"></i>