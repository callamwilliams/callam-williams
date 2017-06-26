'use strict';

import Util from './Util';

class Overlays {

	constructor() {

		this.activeContent = null;
		this.status = 'closed';

		this.createOverlay();
		this.bindEvents();

	}

	createOverlay() {

		this.overlay = document.createElement('div');
		this.overlay.className = 'overlay';

		document.body.appendChild(this.overlay);

	}

	open(content = null) {

		this.status = 'open';

		Util.addClass(this.overlay, 'is-active');

		if(this.activeContent !== content) {

			Util.removeClass(this.activeContent, 'is-active');

		}

		if(content) {

			Util.addClass(content, 'is-active');

			if('ontouchstart' in document.documentElement || content.clientHeight >= document.documentElement.clientHeight) {

				content.style.position = 'absolute';
				content.style.top = `${window.pageYOffset + 100}px`;
				content.style.transform = 'translateY(0%)';

			} else {

				content.style.position = null;
				content.style.top = null;
				content.style.transform = null;

			}

			this.activeContent = content;

		}

	}

	close() {

		this.status = 'closed';

		Util.removeClass(this.overlay, 'is-active');

		if(this.activeContent !== null) {

			Util.removeClass(this.activeContent, 'is-active');

			this.activeContent = null;

		}

	}

	bindEvents() {

		this.overlay.addEventListener('click', () => {

			this.close();

		});

		window.addEventListener('keyup', (e) => {

			if(this.status === 'open') {

				if(e.which === 27) {

					this.close();

				}

			}

		});

	}

}

export default Overlays;