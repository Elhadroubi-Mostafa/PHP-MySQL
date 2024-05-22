const lien = document.querySelector('lien');

lien.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open('POST', '', true);
  xhr.send();
  xhr.onload = () => {
if(xhr.readyState === XMLHttpRequest.DONE){
  if(xhr.status === 200) {
    let data = xhr.response;
    console.log(data);
  }
}
  }
}