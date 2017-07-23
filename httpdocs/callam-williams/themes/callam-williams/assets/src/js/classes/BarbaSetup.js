import Barba from 'barba.js';
import Init from './Init';

class BarbaSetup {

	static runBarbaJs(pageFunctions) {
		// Update wrapper classes
		Barba.Pjax.Dom.wrapperId = 'js-wrapper';
		Barba.Pjax.Dom.containerClass = 'js-container';

		// Set up prefetch and update the default 'don't prefetch' class
		Barba.Prefetch.ignoreClassLink = 'js-no-prefetch';
		Barba.Prefetch.init();
		Barba.BaseView.init();

		// Make sure to update Google analytics with page loads
		Barba.Dispatcher.on('initStateChange', () => {
			// delete propCore so we can reinitialise it for each page
			delete window.propCore;

			// Fire analytics object so we can see page navigations
			if (typeof ga !== 'function' || Barba.HistoryManager.history.length <= 1) {
				return;
			}
			ga('send', 'pageview', window.location.pathname);
		});

		Barba.Dispatcher.on('newPageReady', (currentStatus, oldStatus) => {
			// takes in url string and returns just the slug
			function returnPath(urlString) {
				const url = urlString.url;
				const urlParts = /^(?:\w+:\/\/)?([^/]+)(.*)$/.exec(url);
				const path = urlParts[2].replace(/\//g, '');

				return path;
			}

			// get the old/new pagenames, if blank it's the homepage
			const oldPage = returnPath(oldStatus) ? returnPath(oldStatus) : 'home';
			const newPage = returnPath(currentStatus) ? returnPath(currentStatus) : 'home';

			// custom class for homepage navigation, ok to remove this
			switch (newPage) {
			case 'home':
				document.querySelector('.navigation').classList.remove('navigation--away');
				break;
			default:
				document.querySelector('.navigation').classList.add('navigation--away');
				break;
			}

			// add/remove className to body

			document.querySelector('body').classList.remove(`page-${oldPage}`);
			document.querySelector('body').classList.add(`page-${newPage}`);
		});

		// Reinitialise PropCore when everything has finished
		Barba.Dispatcher.on('transitionCompleted', () => {
			window.propCore = new Init(pageFunctions);
		});

		const pageTransition = Barba.BaseTransition.extend({
			start() {
				Promise
					.all([this.newContainerLoading, this.loading()])
					.then(this.loaded.bind(this));
			},

			loading() {
				document.querySelector('body').classList.add('page-is-changing');
				this.oldContainer.classList.add('page-is-changing');
				return new Promise((resolve, reject) => {
					if (resolve) {
						setTimeout(() => {
							resolve();
						}, 700);
					} else {
						reject(Error('Failed to fetch new page'));
					}
				});
			},

			loaded() {
				document.querySelector('body').classList.remove('page-is-changing');
				this.oldContainer.classList.remove('page-is-changing');
				this.done();
			},

		});

		// Define the page transition method
		Barba.Pjax.getTransition = () => pageTransition;

		// Run Barba
		Barba.Pjax.start();
	}

}

export default BarbaSetup;