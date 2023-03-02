
subnav2s = document.getElementsByClassName("nav-dropdown2")
for (const subnav2 of subnav2s) {
    subnav2.onmouseover = function() {
        let subnav_content2 = subnav2.getElementsByClassName("nav-dropdown-content2")[0]
        let w = window.innerWidth;
        if (w > 520) {
            subnav_content2.style.left = subnav2.parentElement.offsetWidth + "px";
            subnav_content2.style.marginTop = "";
        }
        else {
            subnav_content2.style.left = "40px";
            subnav_content2.style.marginTop = "32.5px";
        }

    };
}

function navBar_menu_button(){
    let navBar = document.getElementsByClassName("navbar")[0];
    if (navBar.style.display === "flex") {
        navBar.style.display = "";
    }
    else navBar.style.display = "flex";
}

