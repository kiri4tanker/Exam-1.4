document.addEventListener('DOMContentLoaded', () => {

	const form = document.getElementById('register-form')
	const name = document.getElementById('name')
	const login = document.getElementById('login')
	const email = document.getElementById('email')
	const password = document.getElementById('password')
	const passwordRepeat = document.getElementById('password-repeat')
	const privacy = document.getElementById('privacy')
	const alert = document.querySelector('.alert')
	const alertText = alert.querySelector('.alert__text')

	// Утилиты
	
	const error = (e, text, elem) => {
		e.preventDefault()

		alert.classList.remove('alert_closed')
		alertText.textContent = text

		if (elem) elem.classList.add('input_danger')
	}

	const restore = elem => {
		alert.classList.add('alert_closed')
		elem.classList.remove('input_danger')
	}

	// Валидация

	form.addEventListener('submit', e => {

		// ФИО

		const isNameCorrect = /[а-яА-ЯЁё]+[\s-]+[а-яА-ЯЁё]+[\s-]+[а-яА-ЯЁё]/.test(name.value)

		if (!isNameCorrect) {
			error(e, 'ФИО заполнено некорректно. ФИО должны быть на кириллице и разделяться пробелами или дефисами.', name)
			return
		} else {
			restore(name)
		}

		// Логин

		const isLoginLatin = /^[a-zA-Z0-9]+$/.test(login.value);
		const isLoginUnique = true; // давайте представим что тут обращение к серверу

		if (!isLoginLatin) {
			error(e, 'Логин заполнен некорректно. У логина должны использоваться только латинские символы.', login)
			return
		} else if (!isLoginUnique) {
			error(e, 'Логин должен быть уникальным. Попробуйте ввести что-то другое.', login)
			return
		} else {
			restore(login)
		}

		// Почта

		const isEmailCorrect = /\S+@\S+\.\S+/.test(email.value)

		if (!isEmailCorrect) {
			error(e, 'Почта введена некорректно. Проверьте правильность написания.', email)
			return
		} else {
			restore(email)
		}

		// Пароль

		if (!password.value) {
			error(e, 'Пароль не может быть пустым...', password)
			return
		} else {
			restore(password)
		}

		// Повторение пароля

		const passwordsMatch = password.value === passwordRepeat.value

		if (!passwordsMatch) {
			error(e, 'Пароли не совпадают. Проверьте правильность их написания.', passwordRepeat)
			return
		} else {
			restore(passwordRepeat)
		}

		// Обработка персональных данных

		if (!privacy.checked) {
			error(e, 'Пожалуйста, согласитесь на продажу ваших данных.')
			return
		}
	})
})