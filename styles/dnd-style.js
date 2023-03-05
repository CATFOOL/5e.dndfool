function GroupCheckboxes(element){
    element.checked = !element.checked;
    let checkboxes = element.parentElement.getElementsByClassName("checkbox");
    let checkboxes_array = Array.prototype.slice.call(checkboxes);
    let onclickIndex = checkboxes_array.indexOf(element) + 1;
    let totalChecked = 0;
    for (const checkbox of checkboxes) {
        if (checkbox.checked){
            totalChecked++;
        }
    }
    if (onclickIndex > totalChecked){
        CheckFirst(element.parentElement);
    }
    else{
        UncheckLast(element.parentElement);
    }
}

function SetGroupCheckboxes(element, num){
    let checkboxes = element.getElementsByClassName("checkbox");
    for (let i = 0; i < num; i++) {
        checkboxes[i].checked = true;
    }
}


function CheckFirst(element){
    let checkboxes = element.getElementsByClassName("checkbox");
    for (const checkbox of checkboxes) {
        if (!checkbox.checked){
            checkbox.checked = true;
            break;
        }
    }
}

function UncheckLast(element){
    let checkboxes = element.getElementsByClassName("checkbox");
    for (let i = checkboxes.length-1; i >= 0; i--) {
        if (checkboxes[i].checked){
            checkboxes[i].checked = false;
            break;
        }
    }
}