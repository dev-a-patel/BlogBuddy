
  let uname=document.getElementById("u-name");
  let uemail=document.getElementById("u-email");
  let upass=document.getElementById("u-password");
  let boolArray=[0,0,0];

  uname.addEventListener('input',()=>{
    let unameVal=uname.value;
    // uname.style.visibility="hidden";
      let regExUname=/^[a-zA-Z0-9\s\._]{5,}$/;
      console.log(regExUname.test(unameVal));
      validation(uname,0,regExUname.test(unameVal));
      // uname.style.borderColor="lightgreen";
  });

  uemail.addEventListener('input',()=>{
    let uemailVal=uemail.value;
      let regExUemail=/^[a-zA-Z0-9]([\$#\-\._a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.[a-zA-Z]{2,7}$/;
      validation(uemail,1,regExUemail.test(uemailVal));
  });
  
  upass.addEventListener('input',()=>{
    let upassVal=upass.value;
      let regExUpass=/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/
      validation(upass,2,regExUpass.test(upassVal));
  });

function validation(selector, num, validated){
  let invalidWarn=document.getElementsByClassName("invalid")[num];
  if(validated){
    selector.style.borderColor="green";
    invalidWarn.style.visibility="hidden";
    boolArray[num]=1;
  }
  else{
    selector.style.borderColor="red";
  invalidWarn.style.visibility="visible";
  boolArray[num]=0;
  }
}

// let form=document.forms['Register'];
// let btnVal=document.getElementById("reg-btn");
// form.addEventListener('submit',()=>{
//   if(check(boolArray)){
//     alert("Form submitted!");
//   }
//   else{
//     return false;
//   }
// });


function check(boolArray){
  boolArray.forEach(element => {
    if(element==0)
      return false;
    });
    // return true;
};

