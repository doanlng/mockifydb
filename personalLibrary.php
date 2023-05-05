<!DOCTYPE html>
<script>

    const btns = document.querySelectorAll('.navbar-third')
    let active = null;
    btns.forEach(button => {
        button.addEventListener('click', function(){
            if(active){
                active.classList.remove('active');
            }
            this.classList.add('active');
            active = this;
            var page = "";
            if(this.id==="albums"){
                page="personalLibrary/albums.php";
            }else if(this.id==="podcasts"){
                page="personalLibrary/podcasts.php";
            }else{
                page="personalLibrary/songs.php";
            }
            $("#main").load(page);
        });
    })


</script>

<html>
  <head>
    <title>My Library</title>
    <link rel="stylesheet" href="personalLibrary.css">
  </head>
  <body>
    <header>
      <h1>My Library</h1>
    </header>
        <nav class="navbar">
        <div class="navbar-third" id="songs">
            <a href="#">Songs</a>
        </div>
        <div class="navbar-third" id="albums">
            <a href="#">Albums</a>
        </div>
        <div class="navbar-third" id="podcasts">
            <a href="#">Podcasts</a>
        </div>
        </nav>
    <div class="main-content" id="main">

    </div>
  </body>
</html>
