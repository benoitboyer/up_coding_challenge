
function card( name, suit){
	this.name = name;
	this.suit = suit;
}


class Deck
{
	constructor(){
		this.deck = [];
	};

	create_deck(){

		this.names = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
		this.suits = ['Hearts','Diamonds','Spades','Clubs'];
		//create an ordred deck
    	for( var s = 0; s < this.suits.length; s++ ) {
        	for( var n = 0; n < this.names.length; n++ ) {
            	this.deck.push( new card( this.names[n], this.suits[s] ) );
        	}
    	}
    	//return this.deck;

    	var max_flips = this.deck.length;
		while(max_flips-- >  0) {

			//random the card names
			var rand_i = Math.floor(Math.random() * max_flips+1);
			//var rand_j = Math.floor(Math.random() * this.deck.length);
			var temp_card = this.deck[rand_i];
			this.deck[rand_i] = this.deck[max_flips];
			this.deck[max_flips] = temp_card;
		}

		return this.deck;

	};
	shuffle_cards(){

		var max_flips = this.deck.length;
		while(max_flips-- >  0) {

			//random the card names
			var rand_i = Math.floor(Math.random() * max_flips+1);
			//var rand_j = Math.floor(Math.random() * this.deck.length);
			var temp_card = this.deck[rand_i];
			this.deck[rand_i] = this.deck[max_flips];
			this.deck[max_flips] = temp_card;
		}

		return this.deck;
	};

	sort_cards() {

		var deck=this.create_deck();
		deck.sort();
		console.log(deck);



	}
};





