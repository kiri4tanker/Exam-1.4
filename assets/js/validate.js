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

	const error = (text, elem) => {
		alert.classList.remove('alert_closed')
		alertText.textContent = text

		if (elem) elem.classList.add('input_danger')
	}

	const restore = elem => {
		alert.classList.add('alert_closed')
		elem.classList.remove('input_danger')
	}

	const getloginUnique = async login => {
		return fetch('/api/loginUnique.php', {
			method: 'POST',
			body: JSON.stringify({ login })
		})
			.then(res => res.json())
			.then(data => data)
	}

	const register = async (name, login, email, password) => {
		return fetch('/actions/register.php', {
			method: 'POST',
			body: JSON.stringify({
				name,
				login,
				email,
				password
			})
		})
	}

	// Валидация

	const validate = async e => {
		e.preventDefault()

		// ФИО

		const isNameCorrect = /[а-яА-ЯЁё]+[\s-]+[а-яА-ЯЁё]+[\s-]+[а-яА-ЯЁё]/.test(name.value)

		if (!isNameCorrect) {
			error('ФИО заполнено некорректно! ФИО должны быть заполнено на кириллице и разделяться пробелами или дефисами!', name)
			return
		} else {
			restore(name)
		}

		// Логин

		const isLoginLatin = /^[a-zA-Z0-9]+$/.test(login.value)
		const { isLoginUnique } = await getloginUnique(login.value)
		
		if (!isLoginLatin) {
			error('Логин заполнен некорректно! Логин должн быть заполнен только с помощью латинских символов!', login)
			return
		} else if (!isLoginUnique) {
			error('Этот логин занят! Введите другой!', login)
			return
		} else {
			restore(login)
		}

		// Почта

		const isEmailCorrect = /\S+@\S+\.\S+/.test(email.value)

		if (!isEmailCorrect) {
			error('Почта введена некорректно! Проверьте правильность написания!', email)
			return
		} else {
			restore(email)
		}

		// Пароль

		if (!password.value) {
			error('Поле пароля должно быть заполнено!', password)
			return
		} else {
			restore(password)
		}

		// Повтор пароля

		const passwordsMatch = password.value === passwordRepeat.value

		if (!passwordsMatch) {
			error('Пароли не совпадают! Проверьте правильность написания!', passwordRepeat)
			return
		} else {
			restore(passwordRepeat)
		}

		// Согласие

		if (!privacy.checked) {
			error('Примите соглашение на обработку Ваших данных!')
			return
		}

		// Отправка

		register(name.value, login.value, email.value, password.value)
		window.location.href = '/login.php'
	}

	form.addEventListener('submit', e => {
		validate(e)
	})
})
