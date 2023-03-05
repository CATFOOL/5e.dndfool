let PlainSidebarTemplate = undefined;

function OpenPlainSideBar(mdPath){

    GetSidebarTemplate(PlainSidebarTemplate, sidebarPath + "/plainSidebar/plainSidebarTemplate.php");

    GetSidebarDescription(mdPath);

    OpenSidebar();
}