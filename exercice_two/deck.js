
//the create deck and shuffle work well but I can't make the sort to work

const create_deck = () => {
    var nums = ["A","2","3","4","5","6","7","8","9","10","J","Q","K"];
    var suit = ['Hearts','Diamonds','Spades','Clubs'];
    var card_value = [1,2,3,4,5,6,7,8,9,10,11,12,13];
    var deck = []
    for(i=0; i<suit.length; i++){
        for(j = 0; j < nums.length; j++ ){
            deck.push(card_value[j]+','+nums[j] + suit[i])
        }
    }
    return deck;
}

const shuffle_deck = (deck) => {
    var flips = deck.length;
        while(flips-- >  0) {
            var rand_i = Math.floor(Math.random() * flips+1);
            var temp_card = deck[rand_i];
            deck[rand_i] = deck[flips];
            deck[flips] = temp_card;
        }
    return deck;
}

const sort_deck = (deck) => {
    
    var C = []
    var D = []
    var H = []
    var S = []
    
    //sort by suit
    var sortedDeck = [];
    for(i = 0; i < 52; i++){
        var card = deck[i];
        var num = card[0]
        if((card[2] == "C")^(card[3] == "C" )^(card[4] == "C" )^(card[5] == "C" )){
            
            C.push(card)

        } else if((card[2] == "D")^(card[3] == "D" )^(card[4] == "D" )^(card[5] == "D" )){
            
            D.push(card)

        } else if((card[2] == "H")^(card[3] == "H" )^(card[4] == "H" )^(card[5] == "H" )){
            
            H.push(card)

        }
        else if((card[2] == "S")^(card[3] == "S" )^(card[4] == "S" )^(card[5] == "S" )){

            S.push(card)

        }
    }
}

var hold = {deck:create_deck()};


function show_shuffled() {
    hold.deck = shuffle_deck(hold.deck)
    console.log(hold.deck)
  
}
function show_sorted() {
    hold.deck = sort_deck( hold.deck);
    
}
