document.addEventListener('DOMContentLoaded', () => {
	// modal

	const modalTriggers = document.querySelectorAll('[data-modal-open]')

	modalTriggers.forEach(modalTrigger => {
		const modalId = modalTrigger.getAttribute('data-modal-open')

		modalTrigger.addEventListener('click', e => {
			e.preventDefault()

			const modal = document.getElementById(modalId)
			const modalCloseTriggers = modal.querySelectorAll('[data-modal-close]')

			modal.classList.add('active')

			modalCloseTriggers.forEach(trigger => {
				const removeActiveClass = e => {
					e.preventDefault()

					modal.classList.remove('active')
					trigger.removeEventListener('click', removeActiveClass)
				}

				trigger.addEventListener('click', removeActiveClass)
			})
		})
	})

	// utils

	const passData = (triggers, attrToPass, InputToPass) => {

		triggers.forEach(trigger => {
			const id = trigger.getAttribute(attrToPass)
	
			trigger.addEventListener('click', e => {
				e.preventDefault()
	
				InputToPass.value = id
			})
		})
	}

	// app cancel form

	const appCancelTriggers = document.querySelectorAll('[data-modal-open="app-cancel"]')
	const appCancelInput = document.getElementById('app-cancel-id')

	passData(appCancelTriggers, 'data-app-id', appCancelInput)

	// app cancel form

	const appApproveTriggers = document.querySelectorAll('[data-modal-open="app-approve"]')
	const appApproveInput = document.getElementById('app-approve-id')

	passData(appApproveTriggers, 'data-app-id', appApproveInput)

	// app category delete form

	const appCategoryDeleteTriggers = document.querySelectorAll('[data-modal-open="app-category-delete"]')
	const appCategoryDeleteInput = document.getElementById('app-category-delete-id')

	passData(appCategoryDeleteTriggers, 'data-app-id', appCategoryDeleteInput)

	// app delete form

	const appDeleteTriggers = document.querySelectorAll('[data-modal-open="app-delete"]')
	const appDeleteInput = document.getElementById('app-delete-id')

	passData(appDeleteTriggers, 'data-app-id', appDeleteInput)
})