class Parallax {

	constructor(elem, tolerance) {
		this.elem = elem;
		this.tolerance = tolerance || 30;

		if (!this.elem.length > 0) {
			throw new Error('Parallax - could not find any matching selectors');
		}
	}

	static getOffset(el) {
		el = el.getBoundingClientRect();
		return {
			left: el.left + window.scrollX || el.top + window.pageXOffset,
			top: el.top + window.scrollY || el.top + window.pageYOffset,
		};
	}

	setParallax() {
		const elements = this.elem;
		const scroll = window.scrollY + window.outerHeight;

		for (let i = 0; i < elements.length; i += 1) {
			const offset = Parallax.getOffset(elements[i]).top;

			if ((offset <= scroll) && ((offset + elements[i].clientHeight) >= window.scrollY)) {
				const tolerance = this.tolerance;
				let percentScrolled = window.outerHeight + elements[i].clientHeight;

				percentScrolled = (100 / percentScrolled) * (scroll - offset);

				const percentScrolledScale = (percentScrolled / 100);
				const activeMovement = (percentScrolledScale * (tolerance * 2)) - tolerance;

				elements[i].style.transform = `translate3d(0, ${activeMovement}%, 0)`;
			}
		}
	}

}

export default Parallax;