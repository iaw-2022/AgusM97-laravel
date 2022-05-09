let idToDelete;

function confirmDelete(id){
    idToDelete = id;
}

function submitDelete(){
    document.getElementById("form"+idToDelete).submit();
}