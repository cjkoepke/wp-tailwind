export default () => {
	const toggles = document.querySelectorAll('.toggle')
	const menu   = document.querySelector('.nav-mobile')

	if ( ! toggles || ! menu ) {
		return;
	}

	let active = false

	toggles.forEach(toggle => {
		toggle.addEventListener( 'click', () => {
			if ( active ) {
				open();
			} else {
				close();
			}
		})
	})

	function open() {
		menu.classList.remove('active')
		active = false
	}

	function close() {
		menu.classList.add('active')
		active = true
	}
}