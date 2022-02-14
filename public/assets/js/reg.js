import { login } from './functions/registration.js'
import { setCookie,timeout } from './functions/utils.js'

const form = document.getElementById('form');


form.addEventListener("submit",async(e)=>{
    e.preventDefault();
    form.signin.innerHTML = `<i class = "fa fa-spin fa-spinner fa-2x"></i>`;
    const data = new FormData();

    data.append('email',form.email.value);
    data.append('password',form.password.value);

    //check Password Length
    if (form.password.value.length < 7) {
        timeout(document.getElementById('error'), 'Password must be more than 7 Characters long', 'Welcome Back!!!');
        return form.signin.innerHTML = `Sign in`;
    }

    const request = await login(data);
    // console.log(request);
    if ( request.error) {
        timeout(document.getElementById('error'), 'Username or Password Not correct', 'Welcome Back!!!');
        form.email.value = '';
        form.password.value = '';
        form.signin.innerHTML = `Sign in`;
        return ;
    }
    //Store Token
    const token = request.access_token;
    //Activate Client Side Cookies with Stored JWT
    setCookie('auth',token,5);
    location.href = '/file-manager.html'
    // console.log(getCookie('auth'));
});
