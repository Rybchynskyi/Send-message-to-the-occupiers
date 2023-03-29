let select = document.getElementById("selectMessage");
select.addEventListener("change", function(e) {
    let selectedOption = e.target.options[e.target.selectedIndex].text;
    document.getElementById('title').value = selectedOption;

    let input = document.getElementById('title');
    let event = new KeyboardEvent('keyup', { 'keyCode': 32 });
    input.dispatchEvent(event);
});
