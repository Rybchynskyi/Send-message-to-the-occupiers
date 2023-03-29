let uploadButtons = document.getElementsByClassName('uploadButton');
for (let i=0; i<uploadButtons.length; i++){
    uploadButtons[i].addEventListener("click", e=>{
        let purchaseId = e.target.dataset.id;

        // for right action
        let form = document.getElementById('uploadForm').action;
        let formWithoutId = form.substring(0, form.lastIndexOf('/') + 1);
        let formNewId = formWithoutId.concat(purchaseId);
        console.log(formNewId);
        document.getElementById('uploadForm').action = formNewId;
    })
}
