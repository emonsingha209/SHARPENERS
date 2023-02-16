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