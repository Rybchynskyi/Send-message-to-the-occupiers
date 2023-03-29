let boxes = document.getElementsByClassName('step');
var height = 0;
//Определяем максимальную высоту блока
for(let k = 0; k < boxes.length; k++ ){
    let current_height = boxes[k].offsetHeight;
    if(current_height > height) {
        height = current_height;
    }
}

//Задаем максимальную высоту блока всем элементам
for( var i = 0; i < boxes.length; i++ ){
    boxes[i].style.height = height + 'px';
}
