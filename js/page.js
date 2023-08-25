function togglePassDiv(divflex_id, divnone_id){
    let div1 = document.getElementById(divflex_id);
    div1.style.display = "flex" ;

    let div2 = document.getElementById(divnone_id);
    div2.style.display = "none";
}

function togglePassDiv2(divnone_id){
    let div3 = document.getElementById(divnone_id);
    div3.style.display = (div3.style.display == "none")? "block" : "none"; 
}

function togglePassDiv3(divflex_id){
    let div5 = document.getElementById(divflex_id);
    div5.style.display = "block";
}

function togglePassDiv4(divnone_id){
    let div3 = document.getElementById(divnone_id);
    div3.style.display = (div3.style.display == "none")? "flex" : "none"; 
}

function check2(){
    let val = true;
    let input1 = document.getElementById("fullname");
    let input2 = document.getElementById("email");
    let input3 = document.getElementById("tel");
    let input4 = document.getElementById("evinsahesi");
    let input5 = document.getElementById("otaqsayi");
    let input6 = document.getElementById("qiymet");
    let input7 = document.getElementById("unvan");
    let input8 = document.getElementById("melumat");
    let input9 = document.getElementById("village");
    let input10 = document.getElementById("yard");
   
    
    if(input1.value == ""){
        input1.style.border = "0.2rem dashed red";
        val = false;
    }
    else{
        input1.style.border = "none";
        input1.style.borderBottom = "0.3rem solid rgb(248, 99, 25)";
    }

    if(input2.value == ""){
        input2.style.border = "0.2rem dashed red";
        val = false;
    }
    else{
        input2.style.border = "none";
        input2.style.borderBottom = "0.3rem solid rgb(248, 99, 25)";
    }

    if(input3.value == ""){
        input3.style.border = "0.2rem dashed red";
        val = false;
    }
    else{
        input3.style.border = "none";
        input3.style.borderBottom = "0.3rem solid rgb(248, 99, 25)";
    }

    if(input4.value == ""){
        input4.style.border = "0.2rem dashed red";
        val = false;
    }
    else{
        input4.style.border = "none";
        input4.style.borderBottom = "0.3rem solid rgb(248, 99, 25)";
    }

    if(input5.value == ""){
        input5.style.border = "0.2rem dashed red";
        val = false;
    }
    else{
        input5.style.border = "none";
        input5.style.borderBottom = "0.3rem solid rgb(248, 99, 25)";
    }

    if(input6.value == ""){
        input6.style.border = "0.2rem dashed red";
        val = false;
    }
    else{
        input6.style.border = "none";
        input6.style.borderBottom = "0.3rem solid rgb(248, 99, 25)";
    }

    if(input7.value == ""){
        input7.style.border = "0.2rem dashed red";
        val = false;
    }
    else{
        input7.style.border = "none";
        input7.style.borderBottom = "0.3rem solid rgb(248, 99, 25)";
    }

    if(input8.value == ""){
        input8.style.border = "0.2rem dashed red";
        val = false;
    }
    else{
        input8.style.border = "none";
        input8.style.borderBottom = "0.3rem solid rgb(248, 99, 25)";
    }
    if(input9.style.display != "none"){
        if(input9.value == ""){
            input9.style.border = "0.2rem dashed red";
            val = false;
        }
        else{
            input9.style.border = "none";
            input9.style.borderBottom = "0.3rem solid rgb(248, 99, 25)";
        }
    }

    if(input10.style.display != "none"){
        if(input10.value == ""){
            input10.style.border = "0.2rem dashed red";
            val = false;
        }
        else{
            input10.style.border = "none";
            input10.style.borderBottom = "0.3rem solid rgb(248, 99, 25)";
        }
    }
    return val;
}


function select(){
    let input11 = document.getElementById("baki-div"); 
    let input12 = document.getElementById("region");
    (input12.value == "Bakı") ? (input11.style.display = "block") : (input11.style.display = "none");
}

function select2(){
    let input11 = document.getElementById("baki-div"); 
    let input12 = document.getElementById("region");
    (input12.value == "Bakı") ? (input11.style.display = "flex") :  (input11.style.display = "none");
    
}

function select3(){
    let input11 = document.getElementById("sot"); 
    let input12 = document.getElementById("bina-heyet");
    (input12.value == "1") ? (input11.style.display = "block") : (input11.style.display = "none");
}
