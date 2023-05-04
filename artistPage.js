function loadPage(elem) {
  const elemId = elem.id;
  console.log("loadPage Called:\n\t elemId = " + elemId);
  var page = "";
  if (elemId === "uploadAlbum") {
    page = "Upload/uploadAlbum.html";
  }

  "#content-placeholder".load(page);
}
