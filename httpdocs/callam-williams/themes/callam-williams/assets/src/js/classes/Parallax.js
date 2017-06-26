class Parallax {

    constructor(elem, tolerance) {

        this.elem = elem;
        this.tolerance = tolerance || 30;

        if (!this.elem.length > 0) {
            throw new Error("Parallax - could not find any matching selectors");
        }

    }

    static getOffset(el) {
        el = el.getBoundingClientRect();
        return {
            left: el.left + window.scrollX || el.top + window.pageXOffset,
            top: el.top + window.scrollY || el.top + window.pageYOffset
        }
    }

    setParallax() {

        const elements = this.elem;
        let scroll = window.scrollY + window.outerHeight;

        for (let element of elements) {

            let offset = Parallax.getOffset(element).top;

            if ((offset <= scroll) && ((offset + element.clientHeight) >= window.scrollY)) {

                let tolerance = this.tolerance;
                let percentScrolled = window.outerHeight + element.clientHeight;

                percentScrolled = (100 / percentScrolled) * (scroll - offset);

                let percentScrolledScale = (percentScrolled / 100);
                let activeMovement = (percentScrolledScale * (tolerance * 2)) - tolerance;

                element.style.transform = 'translate3d(0, ' + activeMovement + '%, 0)';

            }
        }
    }

}
export default Parallax;