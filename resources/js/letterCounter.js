const inputTitle = document.getElementById("title");
const letterCounter = document.getElementById('letterCounter');
let maxCount = 60;
letterCounter.append(maxCount);

inputTitle.addEventListener('keyup', counter);
function counter(){
    let currentLength = inputTitle.value.length;
    document.getElementById('letterCounter').innerText = "Символів залишилось: " + (maxCount-currentLength);
}
