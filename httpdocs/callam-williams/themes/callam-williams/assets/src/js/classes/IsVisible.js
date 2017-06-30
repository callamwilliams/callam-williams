

class IsVisible {

	static check(element, tolerance) {
		if (!element || element.nodeType !== 1) return false;

		tolerance = tolerance || 0;

		const html = document.documentElement,
			r = element.getBoundingClientRect(),
			h = html.clientHeight,
			w = html.clientWidth;

		if (!!r && (r.bottom - tolerance) >= 0 && r.right >= 0 && (r.top - tolerance) <= h && r.left <= w) return true;
	}

}

export default IsVisible;
