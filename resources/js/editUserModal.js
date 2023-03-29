let editButtons = document.getElementsByClassName('editUserButton');
for (let i=0; i<editButtons.length; i++){
    editButtons[i].addEventListener("click", e=>{
        let userId = e.target.parentNode.dataset.id;

        // for right action
        let form = document.getElementById('userUpdateForm').action;
        let formWithoutId = form.substring(0, form.lastIndexOf('/') + 1);
        let formNewId = formWithoutId.concat(userId);
        document.getElementById('userUpdateForm').action = formNewId;

        // Add previous inputs
        document.getElementById('editUserName').value = users.find(elId => elId.id === +userId).name;
        document.getElementById('editUserEmail').value = users.find(elId => elId.id === +userId).email;
    })
}
