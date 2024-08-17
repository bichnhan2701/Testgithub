// common-header
fetch('/3CEWEB/project/component/header/header.html')
.then(response => response.text()) 
.then(data => { 
  document.getElementById('common-header').innerHTML = data; 
}); 


// common-footer
fetch('/3CEWEB/project/component/footer/footer.html')
.then(response => response.text()) 
.then(data => { 
  document.getElementById('common-footer').innerHTML = data; 
});

