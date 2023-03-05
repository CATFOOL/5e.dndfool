
document.body.onclick = function(e){

    let target = e.target;
    while (target !== null){
        if (target !== this && target.onclick !== null){
            return;
        }
        target = target.parentElement;
    }

    if (e.target.classList.contains("dontCloseSidebar")) return;
    const sidebar = document.getElementById("sidebar")
    if (sidebar.contains(e.target)) return;
    CloseSidebar();
}

const sidebar = document.getElementById('sidebar');
const sidebar_blank = document.getElementById("sidebar-blank-smallScreen")
let mc = new Hammer(sidebar);
mc.get('swipe').set({ direction: Hammer.DIRECTION_RIGHT });
mc.on("swiperight", function(e) {
    if (window.innerWidth > 520) return;
    if (e.deltaX > 60) CloseSidebar2();
});

function OpenSidebar(){
    sidebar.style.display = "flex";
    sidebar.classList.remove("animate__slideOutRight");
    sidebar_blank.classList.add("sidebar-blank-smallScreen-open");
    new Hammer(document.getElementById("sidebar-content"));
}

function CloseSidebar(){
    sidebar.style.display = "none";
    sidebar_blank.classList.remove("sidebar-blank-smallScreen-open");
}

function CloseSidebar2(){
    sidebar.classList.add("animate__slideOutRight");
    sidebar_blank.classList.remove("sidebar-blank-smallScreen-open");
}

function GetSidebarTemplate(template, path){
    const sidebar_content = document.getElementById("sidebar-content");
    if (template === undefined) {
        let template = readTextFile(path);
        template =  new DOMParser().parseFromString(template, "text/html");
        template = template.getElementById("sidebar-content");
        sidebar_content.innerHTML = template.innerHTML;
        return template;
    }
    sidebar_content.innerHTML = template.innerHTML;
    return template;
}

function GetSidebarDescription(mdPath){
    const sidebar_describe = document.getElementById("sidebar-description");
    let description = readTextFile(mdPath);

    showdown.setFlavor('github');
    let converter = new showdown.Converter();
    sidebar_describe.innerHTML = converter.makeHtml(description);
    let tables = sidebar_describe.getElementsByTagName("table");
    for (const table of tables) {
        let div = document.createElement("div");
        let parent = table.parentNode;
        parent.insertBefore(div, table);
        div.appendChild(table);
        div.classList.add("table-container");
    }
}


function SwitchCustomise(){
    let content = document.getElementById("sidebar-customise-content");
    if (content.style.display === "none"){
        content.style.display = "flex";
        document.getElementById("sidebar-customise-button-icon").className = "fa fa-caret-up";
    }
    else{
        content.style.display = "none";
        document.getElementById("sidebar-customise-button-icon").className = "fa fa-caret-down";
    }
}

function SetCustomise(elm, data, name, ignoreZero=false){
    elm.onblur = function(){
        if (this.value === "" || (parseInt(this.value) === 0 && ignoreZero)){
            data[name] = null;
            this.parentElement.parentElement.getElementsByClassName("sidebar-customise-factor-label")[0].classList.remove("customised");
        }
        else{
            data[name] = parseInt(this.value);
            this.parentElement.parentElement.getElementsByClassName("sidebar-customise-factor-label")[0].classList.add("customised");
        }
    }
    if (data[name] != null && data[name] !== ""){
        elm.parentElement.parentElement.getElementsByClassName("sidebar-customise-factor-label")[0].classList.add("customised");
        if (data[name] === 0 && ignoreZero){
            data[name] = null;
            elm.parentElement.parentElement.getElementsByClassName("sidebar-customise-factor-label")[0].classList.remove("customised");
        }
    }
    elm.value = data[name];
}


function readTextFile(file)
{
    let rawFile = new XMLHttpRequest();
    let allText;
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status === 0)
            {
                allText = rawFile.responseText;
            }
        }
    }
    rawFile.send(null);
    return allText;
}