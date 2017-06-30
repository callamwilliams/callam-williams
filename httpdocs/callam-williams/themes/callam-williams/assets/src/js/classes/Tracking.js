class Tracking {

	static tracker() {
		let ga;
		let gaKey;

		if (typeof ga === 'undefined' || ga === null) return;

		const selectors = document.querySelectorAll('[data-ga-category]');

		selectors.forEach((selector) => {
			selector.addEventListener('click', function () {
				const action = this.getAttribute('data-ga-action') ? this.getAttribute('data-ga-action') : 'click',
					category = this.getAttribute('data-ga-category'),
					label = this.getAttribute('data-ga-label') ? this.getAttribute('data-ga-label') : this.innerHTML.trim(),
					value = this.getAttribute('data-ga-value') ? parseInt(this.getAttribute('data-ga-value'), 10) : 0,
					interaction = this.getAttribute('data-ga-interaction') === 'false';

				gaKey.forEach((key) => {
					ga(`${key}.send`, 'event', category, action, label, value, {
						nonInteraction: interaction,
					});
				});
			});
		});
	}

}

export default Tracking;
