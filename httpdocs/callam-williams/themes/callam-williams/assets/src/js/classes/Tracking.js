class Tracking {

    static tracker() {

        if (typeof ga === 'undefined' || ga === null) return;

        const selector = document.querySelectorAll('[data-ga-category]');

        for (let s = selector.length - 1; s >= 0; s--) {

            selector[s].addEventListener('click', function(){

                let action = this.getAttribute('data-ga-action') ? this.getAttribute('data-ga-action') : 'click',
                    category = this.getAttribute('data-ga-category'),
                    label = this.getAttribute('data-ga-label') ? this.getAttribute('data-ga-label') : this.innerHTML.trim(),
                    value = this.getAttribute('data-ga-value') ? parseInt(this.getAttribute('data-ga-value')) : 0,
                    interaction = this.getAttribute('data-ga-interaction') === "false" ? true : false;

                for (let i = 0; i < gaKey.length; i++) {

                    ga(gaKey[i] + '.send', 'event', category, action, label, value, {

                        nonInteraction: interaction

                    })

                }

            })

        }

    }

}

export default Tracking;