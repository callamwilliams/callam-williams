class Init {

	constructor(functions) {

		this.core = {};
		this.functions = functions;
		this.events = {};

		for(let operation in functions) {

			let clean;

			if(functions.hasOwnProperty(operation)) {

				clean = Init.tidy(operation, true);

				this.events[clean] = Init.tidy(operation);

				this.bindEvents(this.events[clean], operation);

			}

		}

		return this.core;

	}

	static tidy(operation, task) {

		let result = operation.split('__');

		if(task === true) {

			result = result[0];

		} else {

			result.shift();

		}

		return result;

	}

	bindEvents(events, operation) {

		let clean = Init.tidy(operation, true);

		for(let i = 0, l = events.length; i < l; i++) {

			try {

				this.core[clean] = new this.functions[operation]();

				if(events[i] === 'scroll' || events[i] === 'resize') {

					let action = events[i];

					window.addEventListener(events[i], (e) => {

						let event = e;

						if(window.requestAnimationFrame) {

							window.requestAnimationFrame(() => {

								this.core[clean][action](event);

							});

						} else {

							this.core[clean][action](event);

						}

					});
				}

			} catch(error) {

				if(console.groupCollapsed) {

					console.groupCollapsed('%c [' + operation + ' error] - ' + error.message + '. Expand for details:', 'color: #ff5a5a')
						.info('%c ' + error.stack, 'color: #ff5a5a')
						.groupEnd();

				}

			}

		}

	}

}

export default Init;