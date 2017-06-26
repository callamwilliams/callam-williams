import Init from './Init';
import Util from './Util';
import Barba from 'barba.js';

class BarbaSetup {

    static runBarbaJs(propFuncs) {

        // Update wrapper classes
        Barba.Pjax.Dom.wrapperId = 'js-wrapper';
        Barba.Pjax.Dom.containerClass = 'js-container';

        // Set up prefetch and update the default 'don't prefetch' class
        Barba.Prefetch.ignoreClassLink = 'js-no-prefetch';
        Barba.Prefetch.init();
        Barba.BaseView.init();

        // Make sure to update Google analytics with page loads
        Barba.Dispatcher.on('initStateChange', () => {
            // delete propCore so we can reinitialise it for each page
            delete window.propCore;

            // Fire analytics object so we can see page navigations
            if (typeof ga !== 'function' || Barba.HistoryManager.history.length <= 1) {
                return;
            }
            ga('send', 'pageview', window.location.pathname);
        });

        Barba.Dispatcher.on('newPageReady', (currentStatus, oldStatus) => {
            // takes in url string and returns just the slug
            function returnPath(urlString) {
                let url = urlString.url;
                let urlParts = /^(?:\w+\:\/\/)?([^\/]+)(.*)$/.exec(url);
                let path = urlParts[2].replace(/\//g, '');

                return path;
            }

            // get the old/new pagenames, if blank it's the homepage
            let oldPage = returnPath(oldStatus) ? returnPath(oldStatus) : 'home';
            let newPage = returnPath(currentStatus) ? returnPath(currentStatus) : 'home';

            // custom class for homepage navigation, ok to remove this
            switch (newPage) {
                case 'home':
                    Util.removeClass(document.querySelector('.navigation'), `navigation--away`);
                    break;
                default:
                    Util.addClass(document.querySelector('.navigation'), `navigation--away`);
                    break;
            }

            // add/remove className to body
            Util.removeClass(document.querySelector('body'), `page-${oldPage}`);

            Util.addClass(document.querySelector('body'), `page-${newPage}`);

        });

        // Reinitialise PropCore when everything has finished
        Barba.Dispatcher.on('transitionCompleted', () => {

            window.propCore = new Init(propFuncs);

        });

        // Set the active class on navigation items
        Barba.Dispatcher.on('linkClicked', HTMLElement => {

            const activeNavElements = document.getElementsByClassName('navigation__list__item--active');
            const elementLink = HTMLElement.getAttribute('href');
            const nav = document.querySelector('.navigation');
            const navLinkToAddActive = nav.querySelector(`a[href="${elementLink}"]`).parentNode;

            for (let activeClass of activeNavElements) {
                Util.removeClass(activeClass, 'navigation__list__item--active');
            }

            Util.addClass(navLinkToAddActive, 'navigation__list__item--active');
        });

        // Define the page transition method
        Barba.Pjax.getTransition = () => pageTransition;

        const pageTransition = Barba.BaseTransition.extend({
            start() {
                Promise
                    .all([this.newContainerLoading, this.loading()])
                    .then(this.loaded.bind(this));
            },

            loading() {
                Util.addClass(document.querySelector('body'), 'page-is-changing');
                Util.addClass(this.oldContainer, 'page-is-changing');
                return new Promise((resolve, reject) => {
                    if (resolve) {
                        setTimeout(() => {
                            resolve();
                        }, 700);
                    } else {
                        reject(Error('Failed to fetch new page'));
                    }
                });
            },

            loaded() {
                Util.removeClass(document.querySelector('body'), 'page-is-changing');
                Util.removeClass(this.newContainer, 'page-is-changing');
                this.done();
            }
        });

        // Run Barba
        Barba.Pjax.start();

    };

}

export default BarbaSetup;