let addOrderButtons = document.getElementsByClassName('addOrderButton');

function fetchOrderList(selectedId){
    const usersUrl = 'https://www.all4ukraine.org/sync/get.php';
    fetch(usersUrl)
        .then((response) => response.json())
        .then((data) => renderList(data, selectedId))
        .catch((err) => console.log(err));
}

function renderList(data, selectedId){
    let selectLists = document.getElementsByClassName("send_to");

    for (let selectList of selectLists) {
        selectList.innerHTML = "";
        for (let item of data) {
            if(+item.id === selectedId){
                let newOption = new Option(item.name, item.id, true, true);
                selectList.append(newOption);
            }
            else {
                let newOption = new Option(item.name, item.id);
                selectList.append(newOption);
            }
        }
    }
}

for (let k=0; k<addOrderButtons.length; k++){
    addOrderButtons[k].addEventListener("click", e=>{
        let purchaseId = e.target.parentNode.dataset.id;

        // for right action
        let form = document.getElementById('addOrderForm').action;
        let formWithoutId = form.substring(0, form.lastIndexOf('/') + 1);
        let formNewId = formWithoutId.concat(purchaseId);
        document.getElementById('addOrderForm').action = formNewId;

        fetchOrderList(1);
    })
}

// start fetch from settings page
let thisLink = document.location.href;
let res = /[^/]*$/.exec(thisLink)[0];
if(res === "settings"){
    let selecterOrder = document.querySelector('#selectedOrder').value;
    fetchOrderList(+selecterOrder);
}





