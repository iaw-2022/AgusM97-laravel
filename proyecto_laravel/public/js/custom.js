let userId;

function confirmUserDelete(id){
    userId = id;
}

function submitUserDelete(){
    document.getElementById("form"+userId).submit();
}