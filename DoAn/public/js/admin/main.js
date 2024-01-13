function ClickEventXacThuc(trigger,display)
{
  let click = document.getElementById(trigger);
  click.addEventListener("click", function() {
    if(document.getElementById(display).style.display==="none")
    {
      document.getElementById(display).style.display = "block";
    }
    else{
      document.getElementById(display).style.display = "none";
    }
  });
}