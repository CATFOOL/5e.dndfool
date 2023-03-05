let speedSidebarTemplate = undefined;

function OpenSpeedSidebar(data=null) {

    let mdPath = dataPath + "/adventuring/speed.md"
    if (data == null){
        OpenPlainSideBar(mdPath);
        return;
    }

    GetSidebarTemplate(speedSidebarTemplate, sidebarPath + "/speedSidebar/speedSidebarTemplate.php");

    GetSidebarDescription(mdPath);

    if (data[speed.walking.en].base !== null)
        document.getElementById("sidebar-speed-factor-value-walking").textContent = data[speed.walking.en].speed + " 尺";
    else
        document.getElementById("sidebar-speed-factor-value-walking").parentElement.style.display = "none";

    if (data[speed.climbing.en].base !== null)
        document.getElementById("sidebar-speed-factor-value-climbing").textContent = data[speed.climbing.en].speed + " 尺";
    else
        document.getElementById("sidebar-speed-factor-value-climbing").parentElement.style.display = "none";

    if (data[speed.swimming.en].base !== null)
        document.getElementById("sidebar-speed-factor-value-swimming").textContent = data[speed.swimming.en].speed + " 尺";
    else
        document.getElementById("sidebar-speed-factor-value-swimming").parentElement.style.display = "none";

    if (data[speed.flying.en].base !== null)
        document.getElementById("sidebar-speed-factor-value-flying").textContent = data[speed.flying.en].speed + " 尺";
    else
        document.getElementById("sidebar-speed-factor-value-flying").parentElement.style.display = "none";

    if (data[speed.burrowing.en].base !== null)
        document.getElementById("sidebar-speed-factor-value-burrowing").textContent = data[speed.burrowing.en].speed + " 尺";
    else
        document.getElementById("sidebar-speed-factor-value-burrowing").parentElement.style.display = "none";

    let walking = document.getElementById("sidebar-speed-factor-value-walking-override");
    SetCustomise(walking, data[speed.walking.en], "override");
    let climbing = document.getElementById("sidebar-speed-factor-value-climbing-override");
    SetCustomise(climbing, data[speed.climbing.en], "override");
    let swimming = document.getElementById("sidebar-speed-factor-value-swimming-override");
    SetCustomise(swimming, data[speed.swimming.en], "override");
    let flying = document.getElementById("sidebar-speed-factor-value-flying-override");
    SetCustomise(flying, data[speed.flying.en], "override");
    let burrowing = document.getElementById("sidebar-speed-factor-value-burrowing-override");
    SetCustomise(burrowing, data[speed.burrowing.en], "override");

    let walkingNote = document.getElementById("sidebar-speed-factor-value-walking-notes");
    SetCustomise(walkingNote, data[speed.walking.en], "notes");
    let climbingNote = document.getElementById("sidebar-speed-factor-value-climbing-notes");
    SetCustomise(climbingNote, data[speed.climbing.en], "notes");
    let swimmingNote = document.getElementById("sidebar-speed-factor-value-swimming-notes");
    SetCustomise(swimmingNote, data[speed.swimming.en], "notes");
    let flyingNote = document.getElementById("sidebar-speed-factor-value-flying-notes");
    SetCustomise(flyingNote, data[speed.flying.en], "notes");
    let burrowingNote = document.getElementById("sidebar-speed-factor-value-burrowing-notes");
    SetCustomise(burrowingNote, data[speed.burrowing.en], "notes");

    let displaying = document.getElementById("displaying-speed")
    displaying.onchange = function(){
        if (displaying.value === "walking")
            data.speedDisplaying = speed.walking;
        else if (displaying.value === "climbing")
            data.speedDisplaying = speed.climbing;
        else if (displaying.value === "swimming")
            data.speedDisplaying = speed.swimming;
        else if (displaying.value === "flying")
            data.speedDisplaying = speed.flying;
        else if (displaying.value === "burrowing")
            data.speedDisplaying = speed.burrowing;
    }

    if (data.speedDisplaying === speed.walking){
        displaying.value = "walking";
    }
    else if (data.speedDisplaying === speed.climbing){
        displaying.value = "climbing";
    }
    else if (data.speedDisplaying === speed.swimming){
        displaying.value = "swimming";
    }
    else if (data.speedDisplaying === speed.flying){
        displaying.value = "flying";
    }
    else if (data.speedDisplaying === speed.burrowing){
        displaying.value = "burrowing";
    }

    OpenSidebar();
}