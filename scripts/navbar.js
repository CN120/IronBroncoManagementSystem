document.getElementById('navopen').onclick = function() {
     document.getElementById('nav').style.left = '0';
     document.getElementById('navclose').style.left = '10px';
     document.getElementsByClassName('page_mask')[0].style.zIndex = '1';
     document.getElementsByClassName('page_mask')[0].style.backgroundColor = 'rgba(0,0,0,0.85)';
};

document.getElementById('navclose').onclick = function() {
     document.getElementById('nav').style.left = '-220px';
     document.getElementById('navclose').style.left = '-210px';
     document.getElementsByClassName('page_mask')[0].style.backgroundColor = 'rgba(0,0,0,0)';
     setTimeout(function(){document.getElementsByClassName('page_mask')[0].style.zIndex = '-1';}, 750);
};