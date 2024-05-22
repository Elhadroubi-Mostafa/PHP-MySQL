const form = document.querySelector('form');

const signUp = document.getElementById('submit')

form.addEventListener("submit",(event)=>{
  event.preventDefault();
    })
signUp.onclick = () => {
  if(form.elements.check.checked){
var fullName = form.elements.fullName.value
var email = form.elements.email.value;
var username = form.elements.username.value;
var password = form.elements.password.value;
var rpassword = form.elements.rpassword.value;
var check = form.elements.check.checked;
  let xhr = new XMLHttpRequest();
  xhr.open('POST', "inscription.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
  xhr.send("fullName="+fullName + "&email=" + email + "&username=" + 
  username + "&password=" + password + "&rpassword=" + rpassword + "&check=" + check);
  xhr.onload = () => {
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.responseText;
        console.log(data);
      }
    }
  }
  // let formData = new formData(form);
  // xhr.send(formData);
console.log();
  }
  else{
    alert("Please check the box to agree the term of user!")
  }
}