let deleteBTN=document.getElementsByClassName("deleteBTN");
let restoreBTN=document.getElementsByClassName("restoreBTN");
let chkBox=document.getElementsByClassName("chkBox");

for (let i = 0; i < deleteBTN.length; i++) {
    deleteBTN[i].addEventListener('click', (e) =>{
        e.preventDefault();
        let r=confirm("Vai vēlīeties izdzēst uzdevumu");
        if(r==true){
            e.target.form.submit()
        }

    });
}
for (let i = 0; i < restoreBTN.length; i++) {
    restoreBTN[i].addEventListener('click', (e) =>{
        e.preventDefault();
        let r=confirm("Vai vēlieties atjaunot uzdevumu?");
        if(r==true){
            e.target.form.submit()
        }


    });

}


for(let i=0; i<chkBox.length; i++){
    chkBox[i].addEventListener('change', (e) =>{
        e.target.form.submit()
    })

}