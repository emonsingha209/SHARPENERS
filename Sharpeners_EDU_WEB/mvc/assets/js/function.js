function openAdminNav()
{
    let adminnav = document.getElementById("adminLinkNav");
    if(adminnav.style.display === "block")
    {
        adminnav.style.display = "none";
    }
    else
    {
        adminnav.style.display = "block";
    }
}
function openManagerNav()
{
    let managernav = document.getElementById("managerLinkNav");
    if(managernav.style.display === "block")
    {
        managernav.style.display = "none";
    }
    else
    {
        managernav.style.display = "block";
    }
}
function openTopNav()
{
    let topnav = document.getElementById("topnav");
    if (topnav.className === "topnav") 
    {
        topnav.className += " responsive";
    } 
    else 
    {
        topnav.className = "topnav";
    }
}
function openSideNav()
{
    let sidenav = document.getElementById("sidenav");
    if (sidenav.className === "sidenavs") 
    {
        sidenav.className += " responsive";
    } 
    else 
    {
        sidenav.className = "sidenavs";
    }
}