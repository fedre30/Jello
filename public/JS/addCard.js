var cardArea_wrapper = document.querySelectorAll('.cardArea_wrapper');
var cardArea_container = document.querySelectorAll('.cardArea_container');
var cardArea_addCard = document.querySelectorAll('.cardArea_addCard');
var tabContainer = document.querySelector('.tabContainer');
var cardArea_addList = document.querySelector('.cardArea_addList');

console.log(cardArea_wrapper)

var cardArea_card = document.createElement('div');
var cardArea_filter = document.createElement('div');
var cardArea_title = document.createElement('p');

cardArea_title.classList.add('cardArea_title');
cardArea_filter.classList.add('cardArea_filter');
cardArea_card.classList.add('cardArea_card');

cardArea_filter.textContent = 'TITLE CARD';
cardArea_title.textContent = 'color';

var counters = cardArea_container.length

var addList = () => {
    var cardContainer = document.createElement('div');

    cardContainer.classList.add('cardArea_container')

    cardContainer.innerHTML = `<h4 class="cardArea_container_title">TITLE TAB</h4>

        <div class="cardArea_wrapper">
        </div>

        <img class="cardArea_addCard" src="/imgs/iconPlus.png" alt="addCard" numero="0">`
    tabContainer.appendChild(cardContainer)

    cardArea_container = document.querySelectorAll('.cardArea_container');
    cardArea_wrapper = document.querySelectorAll('.cardArea_wrapper');
    cardArea_addCard = document.querySelectorAll('.cardArea_addCard');

    cardArea_addCard[cardArea_addCard.length-1].setAttribute('numero', cardArea_addCard.length-1);

    listenerFunction(cardArea_addCard[cardArea_addCard.length-1])
}

var addCard = (numero) => {
    var cardArea_card = document.createElement('div');
    var cardArea_filter = document.createElement('div');
    var cardArea_title = document.createElement('p');

    cardArea_title.classList.add('cardArea_title');
    cardArea_filter.classList.add('cardArea_filter');
    cardArea_card.classList.add('cardArea_card');

    cardArea_filter.textContent = 'TITLE CARD';
    cardArea_title.textContent = 'color';

    if (cardArea_wrapper[numero].lastElementChild !== null) {
        var numberOfCards = cardArea_wrapper[numero].querySelectorAll('.cardArea_card')

        var containerWidth = (numberOfCards.length + 1) * 190 + 280
    } else {
        var containerWidth = 190 + 280
    }

    cardArea_container[numero].style.width = containerWidth + 'px';
    cardArea_wrapper[numero].style.width = (containerWidth - 280) + 'px';

    cardArea_card.appendChild(cardArea_title);
    cardArea_card.appendChild(cardArea_filter);
    cardArea_wrapper[numero].appendChild(cardArea_card);
}

var listenerFunction = (addedCard) => {
    addedCard.addEventListener('click', function() {
        var numero = this.getAttribute('numero');
        addCard(numero)
    })
}

cardArea_addList.addEventListener('click', function() {
    addList();
})