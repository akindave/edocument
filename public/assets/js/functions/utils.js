
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return false;
  }

const timeout = (html,value,defaultValue)=>{
    html.innerHTML = `<span style = "color:red"> ${value} </span>`;
    let timer = setTimeout(()=>{
        html.innerHTML = defaultValue;
    }, 4000);
} 

//Get URL PARAMETERSfoldername
const search = (parentfolder)=>{
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const folder = urlParams.get(`${parentfolder}`);
  return folder;
}

export { setCookie, getCookie, timeout, search };