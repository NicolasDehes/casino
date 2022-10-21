const mdpForm = document.getElementById('mdp-form');
mdpForm.addEventListener('submit', sendForgetPassword);

async function sendForgetPassword(event){
    event.preventDefault();
    
    const inputValue= document.getElementById("inputPassword1").value;

    const alertSpan = document.getElementById("alertSpan");
    
    const formData = new FormData();
    formData.append("mail",inputValue);
    
    dir = window.location.href; 
    dir = dir.split('/vue'); 

    fetch("../api/forgetPassword.php?action=create",{
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(res => {
        alertSpan.textContent = "Un mail a été envoyé à votre adresse si celui-ci est bien enregistré chez nous."
        if(res.hash != false){
            var data = {
                user_id: 'ZJ3F5PScJtAMOhBN_',   
                service_id: 'service_w9cfqdh',
                template_id: 'template_q49rmrj',
                template_params: {
                    "forgetEmail":res.mail,
                    "link": `${dir[0]}/vue/resetPwd.php?hash=${res.hash}`
                }
        
            };  
        
            fetch("https://api.emailjs.com/api/v1.0/email/send",{
                method: 'POST',
                headers:{"Content-Type":"application/json"},
                body: JSON.stringify(data),
            });
        }
    })
    .catch(error => {
        console.error("BIG ERROR : ",error);
        return;
    })

}