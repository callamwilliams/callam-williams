import Pikaday from 'pikaday';

class Booking {

    constructor(r: string = `js-book-restaurant-select`,
                g: string = `js-book-guests`,
                d: string = `js-book-date`,
                t: string = `js-book-time`,
                s: string = `js-book-submit`,
                m: string = `js-book-message`) {

        this.restaurantSelect = document.getElementById(r);
        this.guestSelect = document.getElementById(g);
        this.dateSelect = document.getElementById(d);
        this.timeSelect = document.getElementById(t);
        this.submit = document.getElementById(s);
        this.message = document.getElementById(m);

        this.restaurantSelect && this.setUpForm();

    }

    updateGuests(e) {

        for (let i = 0; i < this.guestSelect.length; i++) {

            this.guestSelect[i].disabled = false;

        }

    }

    timeOption(start, end, excluded) {

        let convertTime = (i) => {

            if (excluded && excluded.includes(i)) return;

            const option = document.createElement("option");

            if (i < 10) i = '0' + i;

            i = i.toString();

            if (i.length === 2) {

                option.text = i + ':00';
                this.timeSelect.add(option);
                return;

            }

            i = i.replace('.', ':');
            i = i + '0';

            option.text = i.replace('50', '30');
            this.timeSelect.add(option);

        };

        for (let i = start; i <= end; i += 0.5) {

            convertTime(i);

        }

    }

    resetAll() {

        const cont = document.getElementById('js-book-now-container').querySelectorAll('.is-failed');

        this.resetRestaurant();
        this.resetTime();
        this.resetDate();
        this.resetGuest();

        if (!cont) return;

        Array.from(cont).map(c => {

            c.classList.remove('is-failed');

        })

    }

    resetRestaurant() {

        this.restaurantSelect.options[0].selected = 'selected';

    }

    resetTime() {

        this.timeSelect.options.length = 1;

    }

    resetDate() {

        this.dateSelect.value = '';

    }

    resetGuest() {

        Array.from(this.guestSelect.children).map(c => {

            c.disabled = false;

        });

        this.guestSelect.value = '';

    }

    updateTime(date) {

        const day = date.getDay();

        this.resetTime();

        switch (this.restaurantSelect.value) {

            default:
                switch (day) {
                    case 0:
                        this.timeOption(10, 22);
                        break;
                    case 6:
                        this.timeOption(10, 22.5);
                        break;
                    default:
                        this.timeOption(12, 22.5, [15.5, 16, 16.5]);
                        break; //Parameters are (opening, closing, [optional excluded times])
                        break;
                }
                break;

        }

    }

    datePicker() {

        const picker = new Pikaday({
            field: this.dateSelect,
            format: 'DD/MM/YYYY',
            minDate: new Date(),
            onSelect: (e) => {

                this.updateTime(e);

            }
        })

    }


    submitForm() {

        const field = [this.restaurantSelect, this.guestSelect, this.dateSelect, this.timeSelect];
        let errorFields = [];

        field.map(elm => {

            elm.parentNode.classList.remove('is-failed');
            if (!elm.value) errorFields.push(elm);

        });

        try {

            if (errorFields.length) throw errorFields;

            switch (this.restaurantSelect.value) {

                default:
                    window.open('https://www.opentable.co.uk/?restref=138006&p=' + this.guestSelect.value + '&d=' + this.dateSelect.value + '%20' + this.timeSelect.value + '');
                    break;

            }

        }

        catch (e) {

            e.map(elm => {

                elm.parentNode.classList.add('is-failed');

            })

        }

    }

    setUpForm() {

        this.datePicker();

        this.restaurantSelect.addEventListener('change', e => {

            this.resetTime();
            this.resetDate();
            this.resetGuest();
            this.updateGuests(e.target.value);

        });

        this.submit.addEventListener('click', () => {

            this.submitForm();

        })

    }

}

export default Booking;