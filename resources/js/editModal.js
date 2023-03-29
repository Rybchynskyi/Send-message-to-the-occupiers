let editButtons = document.getElementsByClassName('editButton');
for (let i=0; i<editButtons.length; i++){
    editButtons[i].addEventListener("click", e=>{
        let purchaseId = e.target.parentNode.dataset.id;

        // for right action
        let form = document.getElementById('UpdateForm').action;
        let formWithoutId = form.substring(0, form.lastIndexOf('/') + 1);
        let formNewId = formWithoutId.concat(purchaseId);
        document.getElementById('UpdateForm').action = formNewId;

        // Add previous inputs
        document.getElementById('editTitle').value = purchases.find(elId => elId.id === +purchaseId).title;
        document.getElementById('editFullName').value = purchases.find(elId => elId.id === +purchaseId).full_name;

        // Add sum (for admin)
        if (document.getElementById("editSum") !== null) {
            document.getElementById('editSum').value = purchases.find(elId => elId.id === +purchaseId).sum;
        }
    })
}
