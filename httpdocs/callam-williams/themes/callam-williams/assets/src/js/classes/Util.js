class Util {

	static debounce(callback, duration) {
		let timer;
		return function (event) {
			clearTimeout(timer);
			timer = setTimeout(() => {
				callback(event);
			}, duration);
		};
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

	static animationFrames(target) {
		const eventList = ['load', 'scroll', 'resize', '...'];

		for (let i = 0; i < eventList.length; i += 1) {
			window.addEventListener(eventList[i], () => {
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
		}
	}

}

export default Util;