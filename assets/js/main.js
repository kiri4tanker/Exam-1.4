document.addEventListener('DOMContentLoaded', () => {
   // Оповещение
   const alerts = document.querySelectorAll('.alert')

	alerts.forEach(alert => {
		const close = alert.querySelector('.alert__close')

		close.addEventListener('click', () => alert.classList.add('alert_closed'))
	})
})