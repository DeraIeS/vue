import Test from './components/test';


const TK = (() => {
	'use strict';

	const DEV_MODE = true;

	function init() {
		Test.init();
	}

	return {
		init,
		DEV_MODE
	};

})();

$(document).ready(() => {

	window.TK = TK;

	TK.init();
});

export default TK;