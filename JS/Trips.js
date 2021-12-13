let buyButtons = document.querySelectorAll(".buyButton");

buyButtons.forEach((el) => {
  el.onclick = (e) => {
    let id = e.target.attributes.id.nodeValue;
    $.ajax({
      url: "Trips.php",    //the page containing php script
      type: "post",    //request type,
      dataType: 'json',
      data: { idTripBuy: id },
      success: function (result) {
      }
    });
    window.location.reload(true);
  }
})
