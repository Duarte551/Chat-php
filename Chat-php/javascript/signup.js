const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorTXT = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
  e.preventDefault();
}

continueBtn.onclick = ()=>{
   
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/signup.php" , true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        console.log(data);
       if(data == "success"){
          console.log(data);
          location.href = "users.php"
        } else {
          errorTXT.textContent = data;
          errorTXT.style.display = "block";
        }
      }
    }
  }
  // we have to send the form data trough ajax to php
  let formData = new FormData(form); // creating new formData object
  xhr.send(formData); // sending the form data to php
}