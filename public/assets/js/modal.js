let subscribe = document.querySelector('.subscribe-button');
let send = document.querySelector('#send');
console.log(send);

/* Показать окно */
subscribe.addEventListener('click', (event)=> {
    event.preventDefault();
    let modal = document.querySelector('#modal');
    modal.className = 'modal_show';
});

send.addEventListener('click', (event)=> {
    event.preventDefault();
    let modal = document.querySelector('#modal');
    modal.className = 'modal_show';
});
    
/* Скрыть окно */
let closeBtn = document.getElementById('close');

closeBtn.addEventListener('click', () => {
    let modal = document.querySelector('#modal');
    modal.classList.add('modal_close');
});

