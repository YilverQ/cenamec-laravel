<form class="form__search" 
					method="POST" 
					action="">
				@csrf @method('PUT')
				<div class="search_container">
					<label for="name">Nombre:</label>
					<input class="form__input" 
							name="name" 
							type="text" 
							id="name" 
							placeholder="Yilver"
							minlength="3"
							maxlength="20"
							autocomplete="off">
				</div>
				<div class="search_container">
					<label for="lastname">Apellido:</label>
					<input class="form__input" 
							name="lastname" 
							type="text" 
							id="lastname" 
							placeholder="Quevedo"
							minlength="3"
							maxlength="20"
							autocomplete="off">
				</div>
				<div class="search_container">
					<label for="email">Correo Eléctronico:</label>
					<input class="form__input" 
							name="email" 
							type="email" 
							id="email" 
							placeholder="yilver@gmail.com"
							autocomplete="off">
				</div>
				<input class="button-search" 
						type="submit" 
						value="Buscar">
			</form>