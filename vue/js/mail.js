const mdpForm = document.getElementById('mdp-form');
mdpForm.addEventListener('submit', sendForgetPassword);

function sendForgetPassword(event){
    const inputValue= document.getElementById("inputPassword1").value;

    event.preventDefault();
    console.log("hello");
    var data = {
        user_id: 'ZJ3F5PScJtAMOhBN_',   
        service_id: 'service_w9cfqdh',
        template_id: 'template_q49rmrj',
        template_params: {
            "forgetEmail":inputValue,
            "link": "abc"
        }

    };  
    fetch("https://api.emailjs.com/api/v1.0/email/send",{
        method: 'POST',
        headers:{"Content-Type":"application/json"},
        body: JSON.stringify(data),
    }).then(data=>console.log(data)).catch(err=>console.log(err));
    
}