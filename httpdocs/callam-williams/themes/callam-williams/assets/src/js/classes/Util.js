class Util {

	static addClass(elements = null, className) {
		if (elements === null) {
			return;
		}

		const add = function (element, className) {
			if (element.classList) {
				element.classList.add(className);
			} else {
				element.className += ` ${className}`;
			}
		};

		if (typeof elements.length === 'undefined') {
			add(elements, className);
		} else {
			for (let i = 0, l = elements.length; i < l; i++) {
				add(elements[i], className);
			}
		}
	}

	static removeClass(elements = null, className) {
		if (elements === null) {
			return;
		}

		const remove = function (element, className) {
			if (element.classList) {
				element.classList.remove(className);
			} else {
				element.className = elements.className.replace(new RegExp(`(^|\\b)${className.split(' ').join('|')}(\\b|$)`, 'gi'), ' ').trim();
			}
		};

		if (typeof elements.length === 'undefined') {
			remove(elements, className);
		} else {
			for (let i = 0, l = elements.length; i < l; i++) {
				remove(elements[i], className);
			}
		}
	}

	static hasClass(element, className) {
		if (!element) {
			return;
		}

		if (element.classList) {
			return element.classList.contains(className);
		}

		return new RegExp(`(^| )${className}( |$)`, 'gi').test(element.className);
	}

	static closest(element, tagName) {
		while (element.tagName !== tagName) {
			element = element.parentNode;
		}

		return element;
	}

	static debounce(callback, duration) {
		let timer;
		return function (event) {
			clearTimeout(timer);
			timer = setTimeout(() => {
				callback(event);
			}, duration);
		};
	}

	static animationFrames(target) {
		const eventList = ['load', 'scroll', 'resize', '...'];

		eventList.forEach((event) => {
			window.addEventListener(event, () => {
				window.requestAnimationFrame =
                    window.requestAnimationFrame ||
                    window.mozRequestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.msRequestAnimationFrame ||
                    function (f) {
	setTimeout(f, 1000 / 60);
};
				window.requestAnimationFrame(target);
			});
		});
	}

	static getScript(source, callback) {
		let script = document.createElement('script');
		const prior = document.getElementsByTagName('script')[0];
		script.async = 1;
		script.onload = script.onreadystatechange = function (_, isAbort) {
			if (isAbort || !script.readyState || /loaded|complete/.test(script.readyState)) {
				script.onload = script.onreadystatechange = null;
				script = undefined;

				if (!isAbort) {
					if (callback) callback();
				}
			}
		};

		script.src = source;
		prior.parentNode.insertBefore(script, prior);
	}


}

export default Util;
