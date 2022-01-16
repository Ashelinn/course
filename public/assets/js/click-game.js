const startBtn = document.querySelector('#start-click');
const screens = document.querySelectorAll('.screen');
const timeList = document.querySelector('#time-list');
const timeEl = document.querySelector('#time');
const scoreView = document.querySelector('#score-click');
const board = document.querySelector('#board-click');
const COLORS = [
				'#1E90FF','#00BFFF',
                '#00CED1','#66CDAA',
                '#F08080','#FFA07A',
                '#FFD700','black']; 
let time = 0;
let score = 0;

startBtn.addEventListener('click', (event)=> {
    event.preventDefault();
    screens[0].classList.add('up');
})

timeList.addEventListener('click', event => {
    if (event.target.classList.contains('time-btn')) {
        time = parseInt(event.target.getAttribute('data-time'));
        screens[1].classList.add('up');
        startGame();
    }
})

board.addEventListener('click', event => {
    if (event.target.classList.contains('circle')) {
    		if (event.target.style.background === 'black') {
	        score -= 20;
       	} else {
        	score += 10;
        }
        event.target.remove();
        scoreView.innerHTML = score;
    }
})

function startGame() {
    createCircle();
    setInterval(createCircle, 1000);
}

function decreaseTime() {
    if (time === 0) {
        finishGame();
    } else {
        let current = --time;
        if (current < 10) {
            current = `0${current}`;
        }
        setTime(current);
    }
}

function setTime(value) {
    timeEl.innerHTML = `00:${value}`;
}

function finishGame () {
    timeEl.parentNode.classList.add('hide');
    board.innerHTML = `<h1> Cчет: <span class="primary">${score}</span> </h1>`;
}

function createCircle () {
		let circles = document.querySelectorAll('.circle');
    if (circles.length) {
    	circles.forEach(element => element.remove());
    }
    
    const circle = document.createElement('div');
    const size = getNumber(10,60);
    const {width, height} = board.getBoundingClientRect();
    const x = getNumber(0, width-size);
    const y = getNumber(0, height-size);

    circle.classList.add('circle');
    let color = getColor();
    circle.style.background = color;

    circle.style.width = `${size}px`;
    circle.style.height = `${size}px`;

    circle.style.top = `${y}px`;
    circle.style.left = `${x}px`;
    board.append(circle);
    decreaseTime();
   	setTime(time); 
}

function getNumber(min, max) {
    return Math.round(Math.random()*(max-min)+min);
}

function getColor() {
    return COLORS[Math.floor(Math.random()*COLORS.length)];
}


const button_back = document.querySelector('#button_back');
button_back.addEventListener('click', () => {
    window.location.reload();
});
