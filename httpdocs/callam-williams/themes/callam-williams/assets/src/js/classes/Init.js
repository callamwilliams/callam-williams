class Init {

	constructor(functions) {
		this.core = {};
		this.functions = functions;
		this.events = {};

		console.log(document.readyState);
		if (document.readyState === 'complete' || document.readyState === 'interactive') {
			this.init();
		} else {
			document.addEventListener('readystatechange', this.init.bind(this), false);
		}
		return this.core;
	}

	static tidy(operation, task) {
		let result = operation.split('__');
		if (task === true) {
			result = result[0];
		} else {
			result.shift();
		}
		return result;
	}

	static presentError(operation, error) {
		if (console.groupCollapsed) {
			console.groupCollapsed(`%c [${operation} error] - ${error.message}. Expand for details:`, 'color: #ff5a5a');
			console.log(error.stack);
			console.groupEnd();
		} else {
			console.log(error.stack);
		}
	}

	init() {
		if (document.readyState !== 'interactive') {
			return;
		}

		const operations = Object.keys(this.functions);

		for (let i = 0, l = operations.length; i < l; i++) {
			const operation = operations[i];
			const clean = Init.tidy(operation, true);
			this.events[clean] = Init.tidy(operation);
			this.bindEvents(this.events[clean], operation);
		}
	}

	bindEvents(events, operation) {
		const clean = Init.tidy(operation, true);

		try {
			this.core[clean] = new this.functions[operation]();

			for (let i = 0, l = events.length; i < l; i++) {
				if (events[i] !== 'scroll' && events[i] !== 'resize') {
					continue;
				}

				if (typeof this.core[clean][events[i]] === 'undefined') {
					Init.presentError(operation, new Error(`Missing this.${events[i]} function`));
					continue;
				}

				window.addEventListener(events[i], (e) => {
					if (window.requestAnimationFrame) {
						window.requestAnimationFrame(this.core[clean][events[i]]);
					} else {
						try {
							this.core[clean][events[i]](e);
						} catch (error) {
							Init.presentError(operation, error);
						}
					}
				});
			}
		} catch (error) {
			Init.presentError(operation, error);
		}
	}
}

export default Init;
