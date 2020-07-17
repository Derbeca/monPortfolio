console.log('code js chargé');

var btnMenu = document.querySelector('#btnMenu');
var btnFermer = document.querySelector('#btnFermer');


btnMenu.addEventListener('click', function() {
    var menu = document.querySelector('.menuDepliant');
    menu.style.display = 'block';
  });

btnFermer.addEventListener('click', function() {
    var menu = document.querySelector('.menuDepliant');
    menu.style.display = 'none';
  });