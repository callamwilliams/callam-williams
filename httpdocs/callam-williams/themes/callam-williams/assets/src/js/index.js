import Flickity from 'flickity';
import 'lazysizes';
import 'lazysizes/plugins/unveilhooks/ls.unveilhooks';
import BarbaSetup from './classes/BarbaSetup';
import Parallax from './classes/Parallax';
import Util from './classes/Util';

const pageFunctions = {
	lazyload__ready() {
		window.lazySizesConfig = window.lazySizesConfig || {};

		window.lazySizesConfig.lazyClass = 'js-img';

		lazySizesConfig.loadMode = 1;
	},
	lazySizes__ready() {
		document.addEventListener('lazybeforeunveil', (e) => {
			const bg = e.target.getAttribute('data-bg');
			const videoElement = e.target.getAttribute('data-player');

			if (bg) {
				e.target.style.backgroundImage = `url(${bg})`;
			}

			if (videoElement) {
				pageFunctions.YT.init();
			}
		});
	},
	sliders__ready() {
		const sliders = document.querySelectorAll('.js-slider');

		for (let i = 0; i < sliders.length; i++) {
			const slider = sliders[i];
			flkty = new Flickity(slider, {
				prevNextButtons: false,
				wrapAround: true,
				pageDots: false,
				autoPlay: 5000,
				pauseAutoPlayOnHover: true,
			});
		}
	},
	parallax__ready() {
		const parallaxItems = document.querySelectorAll('.js-parallax');

		if (parallaxItems.length > 0 && window.innerWidth > 1024) {
			const parallax = new Parallax(parallaxItems);
			const updateParallax = () => {
				parallax.setParallax();
			};

			Util.animationFrames(updateParallax);
		}
	},

};


window.addEventListener('load', BarbaSetup.runBarbaJs(pageFunctions));
