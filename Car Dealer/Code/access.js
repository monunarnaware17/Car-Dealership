var objLogin=[
    {
        u: "123456",
        p: "123456"
    },
    {
        u: "654321",
        p: "123456"
    },
    {
        u: "654321",
        p: "654321"
    },
    {
        u: "123456",
        p: "654321"
    },
]

function getInfo(){
    var UID = document.forms['form']['uid'].value;
    var Password = document.forms['form']['pass'].value;
    for(i=0;i<objLogin.length;i++){
        if(UID==objLogin[i].u && Password==objLogin[i].p){
            console.log(UID+" logged in")
            return true;
        }
    }
    alert("Wrong UID or Password");
    console.log("Incorrect username/password")
    return false;
}
getInfo();