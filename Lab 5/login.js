function submit(){
var username = document.getElementById("username").value;
var password = document.getElementById("password").value;
var flag = 0;
document.getElementById("signin").innerHTML = "Welcome, Karthik";
if ( username == "karthikcm5329" && password == "pass1298"){
window.alert ("Login successfully");
window.location = "home.html";
flag = 1;
return false;
}
else{
window.alert("Incorrect username/password. Please try again.");
return false;
}
}