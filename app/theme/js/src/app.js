/* global Vue */

import Test from './components/test';
import MonsterSlayer from './components/monsterSlayer';


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

  MonsterSlayer.init();

  (function() {

    var data = { status: 'Critical' };

    Vue.component('my-cmp', {
      data: function() {
        return data;
      },  
      template: '<p>Server Status: {{ status }} (<button @click="changeStatus">Change</button>)</p>',
      methods: {
        changeStatus: function() {
          this.status = 'Normal'
        }
      }
    });

    new Vue({
      el: '#app',

    });

/*
    new Vue({
      el: '#app',
      data: {
        title: 'The VuewJS Instance'
      },
      beforeCreate: function() {
        console.log('beforeCreate()');
      },
      created: function() {
        console.log('created()');
      },
      beforeMount: function() {
        console.log('beforeMount()');
      },
      mounted: function() {
        console.log('mounted()');
      },
      beforeUpdate: function() {
        console.log('beforeUpdate()');
      },
      updated: function() {
        console.log('updated()');
      },
      beforeDestroy: function() {
        console.log('beforeDestroy()');
      },
      destroyed: function() {
        console.log('destroyed()');
      },
      methods: {
        destroy: function() {
          this.$destroy();
        }
      }
    });


    let vm1 = new Vue({
      el: '#app1',
      data: {
        title: 'The VueJS Instance',
        showParagraph: false
      },
      methods: {
        show: function() {
          this.showParagraph = true;
          this.updateTitle('The VueJS Instance (Updated)');
          this.$refs.myButton.innerText = 'test';
        },
        updateTitle: function(title) {
          this.title = title;
        },
        test: function() {
          console.log('test');
        }
      },
      computed: {
        lowercaseTitle: function() {
          return this.title.toLowerCase();
        }
      },
      watch: {
        title: function(value) {
          alert('Title changed, new value: ' + value);
        }
      }
    });

    console.log(vm1);

    vm1.$refs.heading.innerText = 'Something else';

    let vm2 = new Vue({
      el: '#app2',
      data: {
        title: 'The second instance'
      },
      methods: {
        onChange: function() {
          vm1.title = 'Changed!';
        }
      }
    });

    let vm3 = new Vue({
      //el: 'hello',
      template: '<h1>Hello!</h1>'
    });

    vm3.$mount();

    document.getElementById('app3').appendChild(vm3.$el);

    setTimeout(function() {
      vm1.title = 'Changed by Timer';
      vm1.show();
    }, 3000);*/
  })();
});
export default TK;