import Init from './classes/Init';
import Tracking from './classes/Tracking';

const propFuncs = {

	tracking__ready() {
		Tracking.tracker();
	},

};

window.propCore = new Init(propFuncs);

