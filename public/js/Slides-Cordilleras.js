// script.js
const moveLeftBtn = document.getElementById('moveLeft');
const moveRightBtn = document.getElementById('moveRight');
const cardsContainer = document.querySelector('.cards');
const cardWidth = document.querySelector('.card').offsetWidth;
let currentPosition = 0;

moveLeftBtn.addEventListener('click', () => moveCards('left'));
moveRightBtn.addEventListener('click', () => moveCards('right'));

function moveCards(direction) {
    const maxScrollPosition = cardsContainer.scrollWidth - cardsContainer.offsetWidth;

    if (direction === 'left') {
        currentPosition -= cardWidth;
        if (currentPosition < 0) currentPosition = 0;
    } else if (direction === 'right') {
        currentPosition += cardWidth;
        if (currentPosition > maxScrollPosition) currentPosition = maxScrollPosition;
    }

    cardsContainer.style.transform = `translateX(-${currentPosition}px)`;
}
