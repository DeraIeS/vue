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

	new Vue({
		el: '#app',
		data: {
			title: "Hello world 2",
			link: "http://google.com"
		},
		methods: {
			changeTitle: function(e) {
				this.title = e.target.value;
			},
			sayHello: function() {
				return this.title;
			}
		},
	});


});

export default TK;