import Init from './classes/Init';
import Tracking from './classes/Tracking';

const pageFunctions = {

	tracking__ready() {
		Tracking.tracker();
	},

};

window.propCore = new Init(pageFunctions);

