function verificationRegister(){
    var notvide=document.getElementsByClassName('notvide');
    var cp=0
    for(i=0;i<notvide.length;i++){
        if(notvide[i].value==''){
            cp++ 
        }
    }
    if(cp!=0){
        creatAlert()
    }
    
}
function creatAlert(){
    var prent=document.getElementById('espas');
    var div=document.createElement('div');
    var msg=document.createElement('h1');
    var btn=document.createElement('button');
    msg.innerHTML="Veuillez entrer toutes les informations sont correctes";
    msg.style.color="red";
    btn.innerHTML="D'ACCORD";
    div.className='alert';
    div.append(msg);
    div.append(btn);
    prent.append(div);
    btn.addEventListener('click',function(){
        prent.removeChild(document.getElementsByClassName('alert')[0])
    })
}
function verificationPassword(){
    var pass=document.getElementsByClassName('Password');
    if(pass[0].value==pass[1].value){
        pass[1].style.backgroundColor="rgba(128, 128, 128, 0.329)";
    }else{
        pass[1].style.backgroundColor="rgba(255, 0, 0, 0.404)";
    }
}
function panair(){
    var panai=document.getElementById('panier');
    panai.innerHTML++
}