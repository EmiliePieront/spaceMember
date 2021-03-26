//To switch connection modale from display none to display grid.

// const modaleButton = document.querySelector(".sectionConnectionLogin");
// const modaleButton2 = document.querySelector(".sectionConnectionSignin"); 

// const modaleSignin = document.querySelector("#btnSignin");
// const modaleLogin = document.querySelector("#btnLogin") 
// const modaleLogin2 = document.querySelector("#btnLogin2");

// modaleSignin.addEventListener( "click", e => {
//     modaleButton2.style.display = "grid";
//     modaleButton.style.display = "none";

// })
// modaleLogin.addEventListener( "click", e => {
//     modaleButton.style.display = "grid";
//     modaleButton2.style.display = "none";

// })
// modaleLogin2.addEventListener( "click", e => {
//     modaleButton.style.display = "grid";
//     modaleButton2.style.display = "none";

// })



//Check same password 


document.getElementById("password2").addEventListener("keyup",() => {
    const pass1 = document.getElementById("password1").value;
    const pass2 = document.getElementById("password2").value;
    [... document.getElementsByClassName("passwords")].forEach(
      elt =>
        elt.style.border =
          pass1 !== pass2 ? "red 1px solid" : "silver 1px solid"
    );
  });