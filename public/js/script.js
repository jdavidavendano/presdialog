function showHideInsulin(element, id) {
    checked = element.checked;
    if (checked){
        document.getElementById(id).style.display = 'block';
    } else {
        document.getElementById(id).style.display = 'none';
    }
}