class Tracking {

	static tracker() {
		if (typeof window.ga === 'undefined' || window.ga === null) {
			return;
		}

		if (typeof window.gaKey === 'undefined' || window.gaKey === null) {
			return;
		}

		const selectors = document.querySelectorAll('[data-ga-category]');

		selectors.forEach((selector) => {
			selector.addEventListener('click', function () {
				const action = this.getAttribute('data-ga-action') ? this.getAttribute('data-ga-action') : 'click';
				const category = this.getAttribute('data-ga-category');
				const label = this.getAttribute('data-ga-label') ? this.getAttribute('data-ga-label') : this.innerHTML.trim();
				const value = this.getAttribute('data-ga-value') ? parseInt(this.getAttribute('data-ga-value'), 10) : 0;
				const interaction = this.getAttribute('data-ga-interaction') === 'false';

				window.gaKey.forEach((key) => {
					window.ga(`${key}.send`, 'event', category, action, label, value, {
						nonInteraction: interaction,
					});
				});
			});
		});
	}

}

export default Tracking;