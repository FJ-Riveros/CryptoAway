
let deletePost = document.querySelectorAll(".deletePost");
// console.log(deletePost);

deletePost.forEach((el) => {
  el.onclick = (e) => {
    let id = e.path[1].id == "" ? e.target.id : e.path[1].id;
    console.log(id);
    $.ajax({
      url: "../Modules/PostSection.php",    //the page containing php script
      type: "post",    //request type,
      dataType: 'json',
      data: { postAction: "deletePost", idPost: id },
      success: function (result) {
      }
    });
    window.location.reload(true);
  }

})
