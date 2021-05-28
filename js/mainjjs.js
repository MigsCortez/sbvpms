function showSelect(){
    var myCharacters = document.getElementById("major_sanctions").value;
    myCharacters = myCharacters.charAt(0);
    console.log(myCharacters);
    var myDiv = document.getElementById("dropMajorSanctions");
    var myDiv2 = document.getElementById("dropMajorSanctionss");
    if(myCharacters == 'B'){
        myDiv.style.display = "flex";
        myDiv2.style.display = "flex";
    }
    else{
        myDiv.style.display = "none";
        myDiv2.style.display = "none";
    }
}
