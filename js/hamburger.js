window.addEventListener('resize', function(event){
    var newWidth = window.innerWidth;
    // var newHeight = window.innerHeight
    if (newWidth > 800) {
      links = document.getElementById('navLinks');
  
      links.style.display = 'block';
    }
  });
  function openHamburgerMenu() {
    links = document.getElementById('navLinks');
    hamburgerImg = document.getElementById("hamburgerImage");
    if (links.style.display === 'block') {
      links.style.display = 'none';
      hamburgerImg.src = "media/icon/menu-bars.png";
    } else if (window.innerWidth < 800) {
      links.style.display = 'block';
      hamburgerImg.src = "media/icon/close.png";
    }
  }