'use strict';

import Util from './Util';

class SnackBar {

	constructor() {

		this.status = 'closed';
		this.content = '';
		this.autoClose = 3000;

		this.createElement();

	}


	createElement() {

		this.snackbar = document.createElement('div');
		this.snackbar.className = 'snackbar';
		this.swapContent();

		document.body.appendChild(this.snackbar);

	}

	swapContent() {

		this.snackbar.innerHTML = this.content;

	}

	open(content = '', autoClose = null) {

		this.status = 'open';

		autoClose = autoClose ? this.autoClose : autoClose;

		this.content = content;
		this.swapContent();

		Util.addClass(this.snackbar, 'is-active');

		clearTimeout(this.timer);

		this.timer = setTimeout(() => {

			this.close();

		}, autoClose);


	}

	close() {
		
		this.status = 'closed';

		Util.removeClass(this.snackbar, 'is-active');

	}

}

export default SnackBar;