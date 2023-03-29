window.onload = function() {
    let idMassive = [];
    let targetIds = document.getElementsByClassName("sendToTitle");
    for (let i=0; i<targetIds.length; i++){
        idMassive.push(targetIds[i].dataset.send_to_id);
    }
    fetch('https://all4ukraine.org/sync/getid.php', {
        method: 'POST',
        body: JSON.stringify(idMassive)
    })
        .then((response) => response.json())
        .then((data) => renderContent(data))
        .catch((err) => console.log(err));

    function renderContent(data){
        let lang = document.getElementsByTagName("html")[0].getAttribute("lang");
        for (let key in data) {
            let targetIds = document.getElementsByClassName("sendToTitle");
            for (let i=0; i<targetIds.length; i++){
                let name = (lang === 'ua')?data[i].name_ua:data[i].name_en;
                let descr = (lang === 'ua')?data[i].descr_ua:data[i].descr_en;
                targetIds[i].innerHTML = '<strong>'+name+'<a href="https://all4ukraine.org/view/ua/view_order.php?id='+data[i].id+'" target="_blank"><i class="ms-2 fa-solid fa-arrow-up-right-from-square"></i></a></strong><p class="mb-0 pb-0">'+descr+'</p>'
            }
        }
    }
};
