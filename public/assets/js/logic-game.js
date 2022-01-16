/* ------------------------------------------------------------
Функция генерации цветов. На выходе получаем массив строк
colors = ['pink', 'blue', 'red', 'violet']
-------------------------------------------------------------- */
function createColor() {
    let allcolors = ['red', 'orange', 'yellow', 'green', 'blue', 'violet', 'pink'];
    let colors = [];

    for (let i=0; i<4; i++) {
        let index = Math.floor(Math.random()*allcolors.length);
        colors[i]  = allcolors[index];
        allcolors.splice(index,1);
    }

    return colors;
};

/* ------------------------------------------------------------
Функция генерации линии для смены цветов. На выходе получаем массив 
кнопок с классом gray
-------------------------------------------------------------- */
function createBlank() {
    let colors = [];
    for (let i=0; i<4; i++) {
        colors[i]  = 'gray';
    }

    return colors;
};

/* ----------------------------------------------------------------------------------------
Функция Конец игры (при проигрыше или нажатии на кнопку Сдаться)
Функция выводит на игровое поле загаданные компьютером цвета и делает активной кнопку Старт
------------------------------------------------------------------------------------------- */
function stopGame() {
    //Выводим загаданные цвета в тег с id=hidden-colors
    let tag = document.getElementById('hidden-colors');

    for (let i=3; i>=0; i--) {
       tag.insertAdjacentHTML('afterbegin',`<button class="${hidden.colors[i]}"> </button>`);
    }
    
    //делаем активной кнопку старт
    document.getElementById('start').removeAttribute("disabled");

    //Блокируем кнопку Сдаться и кнопку отпавить
    document.getElementById('stop').setAttribute("disabled","disabled");
    let doneBtns = document.querySelectorAll('.done');
    doneBtns[0].setAttribute("disabled","disabled");
};

/* -------------------------------------------------------------
Функция замены цвета при клике. 
Возвращает следующее значение цвета или первое
---------------------------------------------------------------- */
function changeColor(value) {
    //если место без цвета 
    if(value == 'gray') {
        value = 'pink'; 
    }

    let allcolors = ['red', 'orange', 'yellow', 'green', 'blue', 'violet', 'pink'];
    let index = allcolors.indexOf(String(value));
    index = index+1;
    //если дошли до конца массива, начинаем перебор с начала
    if(index >= allcolors.length){
        index = 0;
    } 
    return allcolors[index];
};

/* -------------------------------------------------------------
Функция построения новой линии цветов
---------------------------------------------------------------- */
function newLine(order) {
    //Выводим на первую линию произвольные цвета
    let newline = createBlank();
    let newtag = document.getElementById(`line-${order}`);

    for (let i=3; i>=0; i--) {
    newtag.insertAdjacentHTML('afterbegin',`<button class="${newline[i]}"> </button>`);
    }

    //Добавляем кнопкам возможность менять цвет
    let btns = document.querySelectorAll(`#line-${order} > button`);
    btns.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            let val = changeColor(e.target.classList);
            e.target.classList.replace(e.target.classList, val);
        })
    });

    //добавляем кнопку Отправить
    let button_line = document.getElementById(`button-${order}`);
    button_line.insertAdjacentHTML('afterbegin',`<button id="${order}" class="done"> Отправить </button>`);

    //Нажатие на кнопку Отправить
    let bdone = document.getElementById(`${order}`);
    bdone.addEventListener('click', function(e){
        Done(`${order}`);
    });
}

/* ---------------------------------------------------------------------------------------------------------
Функция обрабатывает событие по клику на кнопку Отправить.
Проверяет сколько цветов угадано. В случае угадывания последовательности выводит сообщение о выигрыше.
В противном случае проверяет достигнут ли предел попыток и если да, выводит сообщение о проигрыше
и показывает загаданую последовательность. Если попытки еще есть, выводит новый ряд цветов для угадывания
------------------------------------------------------------------------------------------------------------ */
function Done(num) {     
    //получаем актуальное значение цветов
    let line_colors = document.querySelectorAll(`#line-${num}> button`);
        
    //Определяем сколько цветов угадано и сколько их на своих местах
        let rightColors = 0; //угадан только цвет
        let rightPlace = 0; //угадан цвет и место

        for (let i=0; i<4; i++) {
            for (let j=0; j<4; j++) {
                if (line_colors[i].classList == hidden.colors[j]) {
                    if (i == j) {
                        rightPlace++;
                    }
                    else {
                        rightColors++;
                    }
                }
            }
        }

        // Если все цвета угаданы, выводим сообщение о победе
        if(rightPlace == 4) {
            //Вывод сообщения игроку
            let mess = document.querySelector('.result-message');
            mess.textContent = 'Поздравляем, вы выиграли!';
            mess.style.display = "block";
            mess.style.background = "rgba(162, 191, 197, 0.8)";

            let button = document.querySelector(`#button-${num} > button`);
            button.setAttribute("disabled", "disabled");
            stopGame();
            return false;
        };
            
    // Выводим на экран подсказку для игрока
        let prompt_num = document.getElementById(`prompt-${num}`);
        
        if(rightColors) {
            for(let k=0; k<rightColors; k++){
                prompt_num.insertAdjacentHTML('afterbegin',`<img src='http://127.0.0.1:8000/assets/img/logic-img/smal_white.png' alt='right color'>`);
            }
        }

        if(rightPlace) {
            for(let k=0; k<rightPlace; k++){
                prompt_num.insertAdjacentHTML('afterbegin',`<img src='http://127.0.0.1:8000/assets/img/logic-img/smal_braun.png' alt='right color and place'>`);
            }
        }
        
    //все кнопки линии становятся неактивными
        let tags = document.querySelectorAll(`#line-${num} > button`);
            tags.forEach(element => {
                element.setAttribute("disabled", "disabled");
            });

        let button = document.querySelector(`#button-${num} > button`);
            button.setAttribute("disabled", "disabled");

    //получаем номер линии
        let allline = ['one','two','three','four','five','six','seven','eight','nine','ten'];
        let tr = allline.indexOf(num);
        num = allline[tr+1];

    //Если попытки закончились
        if(tr >= 9) {
            stopGame();
            //Вывод сообщения игроку
            let mess = document.querySelector('.result-message');
            mess.textContent = 'К сожалению, вы проиграли';
            mess.style.display = "block";
            mess.style.background = "rgba(162, 191, 197, 0.8)";
            return false;
        }

    //Создаем новую линию
        newLine(num);
        return true;
};


/* ---------------------------------------------------------------------------------------------------------
Функция СТАРТ игры.
------------------------------------------------------------------------------------------------------------ */
function startGame() {
    //очистить поле для новой игры
    let allTags = document.querySelectorAll('.red, .orange, .yellow, .green, .blue, .violet, .pink, .gray');
        allTags.forEach(element => {
            element.remove();
        });
    let allButtons = document.querySelectorAll('#one, #two, #three, #four, #five, #six, #seven, #eight, #nine, #ten');
        allButtons.forEach(element => {
            element.remove();
        });

    let allImages = document.querySelectorAll('#wrap-prompt img');
    allImages.forEach(element => {
            element.remove();
        });

    let mess = document.querySelector('.result-message');
    mess.style.display = "none";

    //скрыть кнопку старт
    document.getElementById('start').setAttribute("disabled", "disabled");
    //открыть кнопку сдаться
    document.getElementById('stop').removeAttribute("disabled");

    //Генерируем последовательность цветов            
    window.hidden = {
        colors: createColor()
    };

    //Выводим первую линию 
    let line = createBlank();
    //console.log('zagadano: '+hidden.colors);
    let tag = document.getElementById('line-one');

    for (let i=3; i>=0; i--) {
       tag.insertAdjacentHTML('afterbegin',`<button class="${line[i]}"> </button>`);
    }

    //Добавляем кнопкам возможность менять цвет
    let btns = document.querySelectorAll('#line-one > button');
    btns.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            let val = changeColor(e.target.classList);
            e.target.classList.replace(e.target.classList, val);
        })
    });

    //добавляем кнопку Отправить
    let button_one = document.getElementById('button-one');
    button_one.insertAdjacentHTML('afterbegin',`<button id="one" class="done"> Отправить </button>`);

    //Нажатие на кнопку Отправить
    let bdone = document.getElementById('one');
    bdone.addEventListener('click', function(e){
        Done('one');
    });
};

/* -------------------------------------
События для кнопок СТАРТ и СДАТЬСЯ
---------------------------------------- */
let bstart = document.getElementById('start');
bstart.addEventListener('click', startGame);

let bstop = document.getElementById('stop');
bstop.addEventListener('click', function() {
    stopGame();
});
