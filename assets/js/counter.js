document.addEventListener('DOMContentLoaded', () => {
	const counterValue = document.querySelector('.app-counter__value')

	// Утилиты

	const getCounter = async () => {
		return fetch('/api/counter.php')
			.then(res => res.json())
			.then(data => data)
	}

	const updateValue = async () => {
		const { counter } = await getCounter()

		const oldValue = parseInt(counterValue.textContent)
		const newValue = parseInt(counter)

		if (oldValue < newValue) {
			counterValue.classList.add('active')
	
			setTimeout(() => {
				counterValue.textContent = newValue
			}, 200)
		
			setTimeout(() => {
				counterValue.classList.remove('active')
			}, 400)
		}
	}

	// Перезагрузка каждые 5 секунд

	updateValue()

	setInterval(updateValue, 5000)
})