/* global TK */
/* global Vue */

const MonsterSlayer = (() => {

	let options = {
		
	};

	function init() {

		if ($('#monsterSlayer').length) {
			let monsterSlayer = new Vue({
			el: "#monsterSlayer",
			data: {
				gameStarted: false,
				gameOver: false,
				playerHealth: 100,
				monsterHealth: 100,
				playerActionText: '',
				monsterActionText: '',
				playerWon: false,
				monsterWon: false,
				turns: [],
				actions: [
					'attack', 'specialAttack', 'heal'
				],
				playerHealthBar: {
					width: this.playerHealth + '%'
				},
				monsterHealthBar: {
					width: this.monsterHealth + '%'
				}
			},
			watch: {
				playerHealth: function() {
					if (this.playerHealth <= 0) {
						this.gameOver = true;
						this.monsterWon = true;
					} else {
						this.playerHealthBar.width = this.playerHealth + '%';
					}		
				},
				monsterHealth: function() {
					if (this.monsterHealth <= 0) {
						this.gameOver = true;
						this.playerWon = true;
					} else {
						this.monsterHealthBar.width = this.monsterHealth + '%';
					}	
				},
				gameOver: function() {
					if (this.gameOver) {
						let msg = "Game Over";
						if (this.playerWon) {
							msg += " Player has won!";
						} else {
							msg += " Monster has won!";
						}
						alert(msg);
						this.reset();
					}					
				}
			},
			methods: {
				giveUp: function() {
					this.monsterWon = true;
					this.playerHealth = 0;
				},
				test: function(e, action) {
					console.log(action);
				},
				reset: function() {
					this.playerHealth = 100;
					this.monsterHealth = 100;
					this.playerHealthBar.width = 100 + '%';
					this.monsterHealthBar.width = 100 + '%';
					this.gameStarted = false;
					this.playerWon = false;
					this.monsterWon = false;
					this.gameOver = false;
					this.playerActionText = '';
					this.monsterActionText = '';
				},
				attack: function() {
					let hit = this.getRandomNumber(5, 10);
					this.playerActionText = `Player attack for ${hit}`;
					this.monsterHealth -= hit;
					this.monsterAction();
				},
				specialAttack: function() {
					let specialHit = this.getRandomNumber(5, 10, 2);
					this.playerActionText = `Player used a Special Attack for ${specialHit}`;
					this.monsterAction();
					this.monsterHealth -= specialHit;
					this.log();
				},
				heal: function() {
					let healPoints = 0;

					if (this.playerHealth < 50) {
						healPoints = this.getRandomNumber(5, 10, 2);
					} else {
						healPoints = this.getRandomNumber(5, 10);
					}
					this.playerActionText = `Player Heal for ${healPoints}`;
					this.monsterAction();
					let hp = this.playerHealth + healPoints;
					if (hp > 100) {
						this.playerHealth = 100;
					} else {
						this.playerHealth = hp;
					}
				},
				monsterAction: function() {
					let n = this.getRandomNumber(1, 3);
					let action = this.actions[n - 1];

					if (action == 'attack') {
						n = this.getRandomNumber(5, 10);
						this.monsterActionText = `Monster attack for ${n}`;
						this.playerHealth -= n;
					} else if (action == 'specialAttack') {
						n = this.getRandomNumber(5, 10, 2);
						this.monsterActionText = `Monster used a Special Attack for ${n}`;
						this.playerHealth -= n;
					} else if (action == 'heal') {
						n = this.getRandomNumber(5, 10);

						let hp = this.playerHealth + n;

						if (hp > 100) {
							this.monsterHealth = 100;
						} else {
							this.monsterHealth = hp;
						}
							this.monsterActionText = `Monster Heal for ${n}`;
						}

						this.onRoundEnd();
				},
				onRoundEnd: function() {

					
					this.turns.unshift({
							isPlayer: false,
							text: this.monsterActionText
						});
					this.turns.unshift({
							isPlayer: true,
							text: this.playerActionText,
						});

				},
				getRandomNumber: function(min, max, multiply) {
					if (typeof multiply !== 'undefined' && Number.isInteger(multiply)) {
						min = min * multiply;
						max = max * multiply;
					}

					return Math.floor(Math.random() * (max - min + 1)) + min;
				},
				log: function() {
					console.log('Player Health: ' + this.playerHealth);
					console.log('Monster Health: ' + this.monsterHealth);
				}

			}
		});
	};

		}
		
	return {
		init
	}
})();

export default MonsterSlayer;