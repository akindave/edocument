import { login } from './functions/registration.js'

const form = document.getElementById('form');


form.addEventListener("submit",async(e)=>{
    e.preventDefault();
    const password = form.password.value;
    const staff_id = form.staff_id.value;
    const request = await login(staff_id,password);
    //Request status code
})

