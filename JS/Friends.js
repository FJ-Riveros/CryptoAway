
let buttons = document.querySelectorAll("button");
console.log(buttons);

buttons.forEach((el) => {
  el.onclick = (e) => {
    // console.log(e.target.attributes.id.nodeValue);
    let id = e.target.attributes.id.nodeValue;
    let action = id.split(" ")[1];
    let userId = id.split(" ")[0];
    console.log(action + " " + userId);
    $.ajax({
      url: "Friends.php",    //the page containing php script
      type: "post",    //request type,
      dataType: 'json',
      data: { friendAction: action, friendIdAction: userId },
      success: function (result) {
        // location.reload();
      }
    });
    window.location.reload(true);
  }
})
