// Loading //
function loadPage(elem) {
  const elemId = $(elem).attr("id");
  console.log("loadPage Called:\n\t elemId = " + elemId);
  var page = "";
  if (elemId === "adminLoadArtist") {
    page = "adminAction/adminLoadArtist.php";
  } else if (elemId === "adminLoadSong") {
    page = "adminAction/adminLoadSong.php";
  } else if (elemId === "adminLoadAccount") {
    page = "adminAction/adminLoadAccount.php";
  } else if (elemId === "adminLoadPlaylist") {
    page = "adminAction/adminLoadPlaylist.php";
  }

  if (elemId === "logo" || elemId == "home") {
    $(".arrow").hide();
  } else {
    $(".arrow").show();
  }

  $("#content-body").load(page);
}
