import 'core-js/es6/array'
import 'lazysizes';
import 'lazysizes/plugins/unveilhooks/ls.unveilhooks';
import Headroom from 'headroom.js';
import Flickity from 'flickity';
import slickForms from './lib/slick';
import Util from './classes/Util';
import Map from './classes/Map';
import Booking from './classes/Booking';
import Tracking from './classes/Tracking';
import Parallax from './classes/Parallax';
import IsVisible from './classes/IsVisible';
import BarbaSetup from './classes/BarbaSetup';
import scrollToWithAnimation from 'scrollto-with-animation'
import {PropForms} from './classes/PropForms/index';

const propFuncs = {

    map__ready() {

        const googleMap = document.getElementById('google-map');

        if (!googleMap) return;

        this.getMapsApi = () => {
            Map.downloadScript({
                key: 'AIzaSyAN6D0hV3c0Wr4saK352AVhZ26HRAFhA3s',
                callback: 'propCore.map.setUp',
                v: '3'
            });
        };

        this.setUp = function () {

            if (typeof(window.google) !== 'object' && typeof(window.google) === 'undefined') {

                this.getMapsApi();

            } else {

                this.map = new Map('google-map',
                    {
                        zoom: 14,
                        panControl: false,
                        zoomControl: true,
                        scaleControl: false,
                        mapTypeControl: false,
                        streetViewControl: false,
                        scrollwheel: false,
                        draggable: true
                    },
                    [{
                        lat: googleMap.dataset.lat,
                        lng: googleMap.dataset.lng,
                        image: '/vie-verbier/themes/vie-verbier/assets/img/map-icon.png'
                    }]);

            }

        };

        this.setUp();

    },

    tracking__ready() {
        Tracking.tracker();
    },

    YT__ready() {

        const container = 'player';
        const video_selector = document.getElementById('js-video');

        this.init = function () {

            let video_src = video_selector.dataset.src;
            let autoplay = video_selector.dataset.autoplay;

            let player = {
                playVideo: function (container, video_src, autoplay) {
                    if (typeof(YT) === 'undefined' || typeof(YT.Player) === 'undefined') {

                        window.onYouTubePlayerAPIReady = function () {
                            player.loadPlayer(container, video_src, autoplay);
                        };

                        Util.getScript('//www.youtube.com/iframe_api');
                    } else {
                        player.loadPlayer(container, video_src, autoplay);
                    }
                },

                loadPlayer: function (container, video_src, autoplay) {
                    new YT.Player(container, {
                        height: '100%',
                        width: '100%',
                        playerVars: {
                            controls: 0,
                            hd: 1,
                            autohide: 1,
                            autoplay: autoplay,
                            loop: 1,
                            playlist: video_src,
                            modestbranding: 1,
                            playsinline: 1,
                            showinfo: 0,
                            vq: 'hd1080',
                            wmode: 'opaque'
                        },
                        videoId: video_src,
                        events: {
                            'onReady': player.onPlayerReady,
                            'onStateChange': function (e) {
                                if (e.data === YT.PlayerState.ENDED) {
                                    player.playVideo();
                                }
                            }
                        }
                    });
                },
                onPlayerReady: function (event) {
                    event.target.mute();
                }
            };

            if (video_selector) {
                player.playVideo(container, video_src, autoplay);
            }

        };

    },

    lazySizes__ready() {

        document.addEventListener('lazybeforeunveil', (e) => {

            const bg = e.target.getAttribute('data-bg');
            const videoElement = e.target.getAttribute('data-player');

            if (bg) {
                e.target.style.backgroundImage = 'url(' + bg + ')';
            }

            if (videoElement) {
                propCore.YT.init();
            }

        });

    },

    lazyload__ready() {

        window.lazySizesConfig = window.lazySizesConfig || {};

        window.lazySizesConfig.lazyClass = 'js-img';

        lazySizesConfig.loadMode = 1;

    },

    sliders__ready() {

        let sliders = document.querySelectorAll('.js-slider');
        let ctrls = document.querySelectorAll('.js-menu_control');
        let flkty;


        for (let i = 0; i < sliders.length; i++) {
            const slider = sliders[i];
            flkty = new Flickity(slider, {
                "prevNextButtons": false,
                wrapAround: true,
                pageDots: false,
                autoPlay: 5000,
                pauseAutoPlayOnHover: true
            });

        }

        const jumpToSlide = () => {

            flkty.stopPlayer();

            [].forEach.call(ctrls, (el, i, ctrls) => {
                let active = 'is-active';
                ctrls[0].classList.add(active);

                el.addEventListener('click', function (e) {
                    e.preventDefault();

                    [].forEach.call(ctrls, function (el) {
                        if (el !== this) {
                            el.classList.remove(active);
                        } else {
                            this.classList.add(active);
                        }
                    }, this);

                    // Go to the corresponding slide
                    let goToslide = el.getAttribute('data-goto-slide');

                    flkty.selectCell(goToslide)

                });
            });
        };


        if (ctrls.length > 0) {
            jumpToSlide();
        }

    },

    parallax__ready() {

        let parallaxItems = document.querySelectorAll('.js-parallax');

        if (parallaxItems.length > 0) {

            const parallax = new Parallax(parallaxItems);
            let updateParallax = () => {
                parallax.setParallax();
            };

            Util.animationFrames(updateParallax);

        }

    },

    booking__ready() {

        const pikaday = document.querySelector('.pika-single');

        if (pikaday !== null) {
            pikaday.remove();
        }

        let book = new Booking('js-rest-book', 'js-rest-book-guests', 'js-rest-book-date', 'js-rest-book-time', 'js-rest-book-submit');

    },

    header__ready() {

        const header = document.querySelector(".js-header");
        const navOffset = document.querySelector('.js-banner-nav');

        const headroom = new Headroom(header, {
            offset: navOffset ? navOffset.getBoundingClientRect().top : 0,
            classes: {
                initial: "navigation",
                pinned: "navigation--pinned",
                unpinned: "navigation--unpinned",
                top: "navigation--top",
                notTop: "navigation--fixed",
                bottom: "navigation--bottom",
                notBottom: "navigation--notBottom"
            }
        });

        headroom.init();

    },

    visible__ready() {

        let getVisibility = document.querySelectorAll('.js-visible');

        if (getVisibility.length > 0) {

            let checkVisibility = () => {

                for (let i = 0; i < getVisibility.length; i++) {

                    let visible = IsVisible.check(getVisibility[i], -200);

                    if (visible === true) {
                        Util.addClass(getVisibility[i], 'is-active');
                    } else {
                        Util.removeClass(getVisibility[i], 'is-active');
                    }
                }
            };

            window.addEventListener('scroll', Util.debounce(checkVisibility, 16));

        }

    },

    teaser__ready() {

        let teaser = document.querySelectorAll('.js-teaser');
        let runOnce = true;

        if (teaser.length > 0) {

            let teaserRun = () => {

                if (runOnce) {

                    for (let [i, item] of teaser.entries()) {

                        let visible = IsVisible.check(item, -300);

                        if (visible === true) {
                            setTimeout(() => Util.addClass(item, 'is-active'), `${i}` * 500);
                            setTimeout(() => Util.removeClass(item, 'is-active'), `${i}` * 500 + 1000);
                        } else {
                            Util.removeClass(item, 'is-active')
                        }

                    }

                    runOnce = false;

                }
            };

            window.addEventListener('scroll', Util.debounce(teaserRun, 16));

        }

    },

    forms__ready() {

        window.slick = new slickForms({

            select: true,
            //checkbox: true,
            radio: true,
            file: true

        });


        let forms = document.querySelectorAll('.js-propform');


        window.forms = new PropForms(forms, {

            parent: 'js-propform-field',
            errorClass: 'is-error',
            messages: {
                success: 'Thank you, we\`ll be in touch soon!'
            },
            validation: {}

        });

        for (let field of forms) {

            field.addEventListener('success', e => {

                e.target.querySelector('.js-propform-text').innerHTML = e.detail.message;
                e.target.classList.add('is-success');

            });

            field.addEventListener('error', function (e) {
                //console.log(e.detail);
            });

            field.addEventListener('fieldError', e => {
                // console.log(e.detail);
                // console.log(e);
            });

            field.addEventListener('send', e => {
                console.log(e.detail.data);
            });

        }

    },

    clickScroll__ready() {
        const scroll_btn = document.querySelector('.js-contact a');
        const target = document.getElementById('footer');

        scroll_btn.addEventListener('click', (e) => {
            e.preventDefault();
            scrollToWithAnimation(
                document.body,
                'scrollTop',
                target.getBoundingClientRect().top,
                5000,
                'easeInSine',
                function () {
                    //console.log('done!')
                }
            )
        });
    }


};

window.addEventListener('load', BarbaSetup.runBarbaJs(propFuncs));

