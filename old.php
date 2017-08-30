<?php
include_once('/app/utils/class.utils.inc.php');
?>

<!DOCTYPE html>
<html class="no-js" lang="en-GB">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vue</title>

	<meta property="og:title" content="">
	<meta property="og:description" content="">
	<meta property="og:url" content="">
	<meta property="og:site_name" content="">
	<meta property="og:image" content="">

	<link rel="stylesheet" href="/app/theme/css/<?= Utils::getAssetRevision( "master.min.css", "styles" ) ?>" type="text/css" />
</head>
<body id="body">



<?php /*
<div id="exercise5">
  <!-- 1) Hook up the button to toggle the display of the two paragraphs. Use both v-if and v-show and inspect the elements to see the difference -->
  <div>
    <button @click="show = !show">Toggle</button>
    <p v-if="show">You either see me ...</p>
    <p v-show="show">...or me</p>
    <p>You either see me ...</p>
    <p>...or me</p>
  </div>
  <!-- 2) Output an <ul> of array elements of your choice. Also print the index of each element. -->
  <ul>
    <li v-for="(name, i) in array">{{ name }}: {{ (i) }}</li>
  </ul>
  <!-- 3) Print all key-value pairs of the following object: {title: 'Lord of the Rings', author: 'J.R.R. Tolkiens', books: '3'}. Also print the index of each item. -->
  <ul>
    <li v-for="(value, key, index) in myObject">{{ key }}: {{ value }} - {{ (index) }}</li>
  </ul>
  <!-- 4) Print the following object (only the values) and also create a nested loop for the array: {name: 'TESTOBJECT', data: [1.67, 1.33, 0.98, 2.21]} (hint: use v-for and v-if to achieve this) -->
  <ul>
    <li v-for="(data, i) in testData">
    	{{ data }} : {{ (i) }}
    	
    		<div v-if="i == 'data'" v-for="(value, key) in data">
    			{{ value }}: {{ key }}
    		</div>

    </li>
  </ul>

</div>



<div id="app">

	<ul>
		<li v-for="(ingredient, i) in ingredients" :key="ingredient">{{ ingredient }} ({{ i }})</li>
	</ul>

	<button @click="ingredients.push('spices')">Add new</button>

	<hr>
		<ul>
			<li v-for="person in persons">
			<div v-for="(value, key, index) in person">{{ (index) + " - " +  key + ": " + value }}</div>
				
			</li>
		</ul>
	<hr>
	
	<!--<template v-for="(ingredient, index) in ingredients">
		<h1>{{ ingredient }}</h1>
		<p>{{ index }}</p>
	</template>-->

	<span v-for="n in 10">{{ n }}</span>
	
	
</div>


<div id="app">
	<p v-if="show">You can see me!<span>Hello!</span></p>
	<p v-else>Now you see me</p>
	<template v-if="show">
		<h1>Heading</h1>
		<p>Inside a template</p>
	</template>
	<p v-show="show">Do you also see me?</p>
	<button @click="show = !show">Switch</button>
</div>




<div id="exercise4">
  <!-- 1) Start the Effect with the Button. The Effect should alternate the "highlight" or "shrink" class on each new setInterval tick (attach respective class to the div with id "effect" below) -->
  <div>
    <button @click="startEffect">Start Effect</button>
    <div class="effect" :class="effectClasses"></div>
  </div>
  <!-- 2) Create a couple of CSS classes and attach them via the array syntax -->
  <div :class="[width, 'height', 'color']">I got no class :(</div>
  <!-- 3) Let the user enter a class (create some example classes) and attach it -->
 <div>
    <input type="text" v-model="userClass">
    <div v-bind:class="[{visible: true}, userClass]"></div>
  </div>
  <!-- 4) Let the user enter a class and enter true/ false for another class (create some example classes) and attach the classes -->
  <div>
    <input type="text" v-model="userClass">
    <input type="text" v-model="isVisible">
    <div :class="[{visible: isVisible}, userClass]"></div>
  </div>
  <!-- 5) Repeat 3) but now with values for styles (instead of class names). Attach the respective styles.  -->
  <div>
    <input type="text" v-model="myStyle.backgroundColor">
    <div :style="myStyle"></div>
  </div>
  <!-- 6) Create a simple progress bar with setInterval and style bindings. Start it by hitting the below button. -->
  <div>
    <button v-on:click="startProgress">Start Progress</button>
    <div :style="progressBar"></div>
  </div>
</div>

<!--
<div id="demo2">
	<div class="demo" :style="{backgroundColor: color}"></div>
	<div class="demo" :style="myStyle"></div>
	<div class="demo" :style="[myStyle, {height: width + 'px'}]"></div>
	<hr>

	<input type="text" v-model="color" />
	<input type="text" v-model="width" />
</div>



<div id="demo1">
	<div class="demo" @click="attachRed = !attachRed" :class="divClasses"></div>
	<div class="demo" :class="{red: attachRed}"></div>
	<div class="demo" :class="[color, {red: attachRed}]"></div>
	<hr>

	<input type="text" v-model="color" />
</div>


<div id="exercise3">
    <div>
        <p>Current Value: {{ value }}</p>
        <button @click="value += 5">Add 5</button>
        <button @click="value += 1">Add 1</button>
        <p>{{ result }}</p>
    </div>
    <div>
        <input @keydown.enter="resetTime = $event.target.value" placeholder="Number of miliseconds to reset after" type="text">
        <p>{{ value }}</p>
    </div>
</div>

	<div id="counter2">
		<button @click="counter++">Increase</button>
		<button v-on:click="counter--">Decrease</button>
		<button v-on:click="secondCounter++">Increase Second</button>
		<p>Counter {{ counter }} | {{ secondCounter }}</p>
		<p>Result {{ result() }} | {{ output }} </p>
	</div>

	<div id="app2">
		<input type="text" v-model="name">
		<p>{{name}}</p>
	</div>



	<div id="counter">
		<button v-on:click="increase(2, $event)">Click me</button>
		<p>{{ counter }}</p>
		<p v-on:mousemove="updateCoordinates">Coordinates: {{ x + "/" + y }}
		- <span v-on:mousemove.stop="">DEAD SPOT</span></p>

		<input type="text" v-on:keyup.enter.space="alertMe" />
	</div>


<div id="exercise2">
		<div>
			<button v-on:click="alert">Show Alert</button>
		</div>
		<div>
		<input v-on:keydown="value = $event.target.value" type="text">
			<p>{{ value }}</p>
		</div>
		<div>
			<input v-on:keydown.enter="updateValue($event)" type="text">
			<p>{{ value }}</p>
		</div>
	</div>

	
	<div id="exercise">

		<p>VueJS is pretty cool - {{ name + " " + surname + " " + age }}</p>

		<p>{{ getMultiplied(age, multiplier) }}</p>

		<p>{{ randomNum() }}</p>

		<div>
			<img v-bind:src="link" style="width:100px;height:100px">
		</div>

		<div>
			<input v-bind:value="name" type="text">
		</div>
	</div>

	<div id="app">
		<h1 v-once>{{ title }}</h1>
		<input type="text" v-on:input="changeTitle">
		<p>  {{ sayHello() }} - <a v-bind:href="link">Google</a></p>
		<hr>
		<p v-html="finishedLink"></p>
	</div>

-->*/

/*

new Vue({
  el: '#exercise5',
  data: {
    show: true,
    array: ['Max', 'Anna', 'Chris', 'Manu'],
    myObject: {
      title: 'Lord of the Rings',
      author: 'J.R.R. Tolkiens',
      books: '3'
    },
    testData: {
      name: 'TESTOBJECT', 
      id: 10,
      data: [1.67, 1.33, 0.98, 2.21]
    }
  }
});




  new Vue({
    el: '#app',
    data: {
      ingredients: ['meat', 'fruit', 'cookies'],
      persons: [
        {name: 'Max', age: 27, color: 'red'},
        {name: 'Anna', age: 'unknown', color: 'blue'},
      ]
    }
  });

  

  new Vue({
    el: '#app',
    data: {
      show: true
    }
  });

new Vue({
  el: '#exercise4',
  data: {
  	
    effectClasses: {
      highlight: false,
      shrink: true,
    },    
  	background: 'red',
  	width: 'width',
    userClass: '',
    isVisible: true,
    myStyle: {
      backgroundColor: 'red',
      height: '200px',
      width: '100px'
    },
    progressBar: {
      backgroundColor: 'yellow',
      height: '50px',
      width: '0px'
    }
  },
  watch: {
    newClass: function() {
    	//console.log(this.newClass);
    }
  },
  methods: {
  	startEffect: function() {
		let vm = this;
  		setInterval(function() {

    		vm.effectClasses.highlight = !vm.effectClasses.highlight;
        vm.effectClasses.shrink = !vm.effectClasses.shrink;
    	}, 500);
  	},
    startProgress: function() {
      let vm = this;
      let width = 0;

      setInterval(function() {
        width += 10;
        width = width + 10;
      vm.progressBar.width = width + 'px';
      }, 1000);
    }
  }
});



	const demo2 = new Vue({
        el: '#demo2',
        data: {
            color: 'grey',
            width: 100
        },
        computed: {
        	myStyle: function() {
        		return {
        			backgroundColor: this.color,
        			width: this.width + 'px',
        		};
        	}
        },
        methods: {

        }
    });

	const demo = new Vue({
        el: '#demo1',
        data: {
            attachRed: false,
            color: 'green'
        },
        computed: {
        	divClasses: function() {
        		return {
        			red: this.attachRed,
        			blue: !this.attachRed,
        		};
        	}
        },
        methods: {

        }
    });

	
	new Vue({
        el: '#exercise3',
        data: {
            value: 0,
            resetTime: 5000
        },
        computed: {
        	result: function() {
        		return this.value < 37 ? 'Not there yet' : 'done';
        	}
        },
        watch: {
        	result: function() {
        		var self = this;
        		setTimeout(function(value) {
        			self.value = 0;
        		}, self.resetTime);
        	}
        }
    });


    
	new Vue({
		el: '#counter2',
		data: {
			counter: 0,
			secondCounter: 0,
		},
		computed: {
			output() {
				console.log('Computed');
				//return this.counter > 5 ? 'Greater than 5' : 'Smaller than 5';
				return this.secondCounter > 5 ? 'Greater than 5' : 'Smaller than 5';
			}
		},
		watch: {
			counter: function(value) {
				var vm = this;
				setTimeout(function() {
					vm.counter = 0;
				}, 2000);
			}
		},
		methods: {
			increase: function(n, event) {
				this.counter++;
				this.result = this.counter > 5 ? 'Greater than 5' : 'Smaller than 5';
			},
			decrease: function(n, event) {
				this.counter--;
				this.result = this.counter > 5 ? 'Greater than 5' : 'Smaller than 5';
			},
			result() {
				console.log('Method');
				return this.counter > 5 ? 'Greater than 5' : 'Smaller than 5';
			}
		}
	});


	
	new Vue({
        el: '#app2',
        data: {
            value: '',
            name: "Thomas"
        },
        methods: {
        	alert: function() {
        		
        	}

        }
    });


	new Vue({
        el: '#exercise2',
        data: {
            value: ''
        },
        methods: {
        	alert: function() {
        		alert("Alert");
        	},
        	updateValue: function(e) {
        		this.value = e.target.value;
        	}

        }
    });


	
	new Vue({
		el: '#counter',
		data: {
			counter: 0,
			y: 0,
			x: 0
		},
		methods: {
			increase: function(n, event) {
				this.counter += n;
			},
			updateCoordinates: function (e) {
				this.x = e.clientX;
				this.y = e.clientY;
			},
			alertMe: function() {
				alert("clicked");
			}
		}
	});

	

	let app = new Vue({
		el: '#app',
		data: {
			title: "Hello world 2",
			link: "http://google.com",
			finishedLink: '<a href="http://google.com">Google</a>'
		},
		methods: {
			changeTitle: function(e) {
				this.title = e.target.value;
			},
			sayHello: function() {
				this.title = "Hello!";
				return this.title;
			}
		},
	});

	let exercise = new Vue({
		el: '#exercise',
		data: {
			name: 'Thomas',
			surname: 'Kotowicz',
			age: '23',
			link: 'https://images2.onionstatic.com/clickhole/3564/7/original/600.jpg',
			multiplier: 3
		},
		methods: {
			getMultiplied: (obj, n) => {
				return obj * n;
			},
			randomNum: () => {
				return Math.random();
			}
		}	
	});*/
?>


<script src="/app/theme/js/<?= Utils::getAssetRevision( "plugins.min.js", "plugin-scripts" ) ?>"></script>
<script src="/app/theme/js/<?= Utils::getAssetRevision( "app.min.js", "scripts" ) ?>"></script>
</body>
</html>