function ClickEvent(trigger,display)
{
  let click = document.getElementById(trigger);
  click.addEventListener("click", function() {

    if(document.getElementById(display).style.display==="none")
    {
      document.getElementById(trigger).style.color = "black";
      document.getElementById(display).style.display = "block";
    }
    else{
        document.getElementById(trigger).style.color = "rgb(83, 82, 82)";
      document.getElementById(display).style.display = "none";
    }
  });
}