import 'lazysizes';
import 'lazysizes/plugins/unveilhooks/ls.unveilhooks';
import Init from './classes/Init';
import Parallax from './classes/Parallax';
import Util from './classes/Util';

const pageFunctions = {
	YT__ready() {
		const container = 'player';
		const videoSelector = document.getElementById('js-video');

		this.init = function () {
			const videoSrc = videoSelector.getAttribute('data-src');
			const autoplay = videoSelector.getAttribute('data-autoplay');

			const player = {
				playVideo(container, videoSrc, autoplay) {
					if (typeof (YT) === 'undefined' || typeof (YT.Player) === 'undefined') {
						window.onYouTubePlayerAPIReady = function () {
							player.loadPlayer(container, videoSrc, autoplay);
						};

						Util.getScript('//www.youtube.com/iframe_api');
					} else {
						player.loadPlayer(container, videoSrc, autoplay);
					}
				},

				loadPlayer(container, videoSrc, autoplay) {
					new YT.Player(container, {
						height: '100%',
						width: '100%',
						playerVars: {
							controls: 0,
							hd: 1,
							autohide: 1,
							autoplay,
							loop: 1,
							playlist: videoSrc,
							modestbranding: 1,
							playsinline: 1,
							showinfo: 0,
							vq: 'hd1080',
							wmode: 'opaque',
						},
						videoId: videoSrc,
						events: {
							onReady: player.onPlayerReady,
							onStateChange(e) {
								if (e.data === YT.PlayerState.ENDED) {
									player.playVideo();
								}
							},
						},
					});
				},
				onPlayerReady(event) {
					event.target.mute();
				},
			};

			if (videoSelector) {
				player.playVideo(container, videoSrc, autoplay);
			}
		};
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
				functionCore.YT.init();
			}
		});
	},

};


window.functionCore = new Init(pageFunctions);
