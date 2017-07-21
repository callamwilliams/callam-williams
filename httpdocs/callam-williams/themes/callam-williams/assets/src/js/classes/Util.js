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