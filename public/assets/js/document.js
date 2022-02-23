import { timeout, search, getCookie } from './functions/utils.js';
import { folder_api, defaultFolder } from './functions/request.js';


//Create Folder
const createFolder = async() => {
    let folderName = document.querySelector("#folder_name");
    const data = new FormData();
    const token = getCookie('auth');

    //Check the current value of the Parent Folder
    let parentfolder = JSON.parse(localStorage.getItem('folder'));
    
    if (folderName.value.length < 1) {
        return timeout(document.querySelector('.error'),'Folder Name Must not be Empty','');
    }

    // const parentFolderID = parentfolder.parentFolder;
    // let foldername = folderName.value;

    data.append('parent_folder', parentfolder.parentFolder);
    data.append('folderName', folderName.value);
    data.append('post_by',1);

    // console.log(token);

    let request = await folder_api(data,token);
    if (request.status == 200) {
        return timeout(document.querySelector('.error'),'Folder Created Successfully','');
    } else {
        return timeout(document.querySelector('.error'),'Error Could not Create Folder','');
    }
    // console.log(request);
}

document.getElementById("create_folder").addEventListener("click",createFolder);


document.addEventListener('DOMContentLoaded',()=>{
    // Clear Existing Object and Add New Object
    if (localStorage.getItem('folder')) {
        //Clear Storage
        localStorage.removeItem('folder');
        //Store Defaault Values
        const folderObj = {
            parentFolder:0,
            id:0       
        };
        //Set Storage
        let storeFolder = localStorage.setItem('folder',JSON.stringify(folderObj));
    } else {
        const folderObj = {
            parentFolder:0,
            id:0       
        };
        //Set Storage
        let storeFolder = localStorage.setItem('folder',JSON.stringify(folderObj));   
    }
    //Fetch the Default Folder that has a parentFoLDER Number of 0
    const fetchDefaultFolder = await defaultFolder(0,postById); 
    console.log(fetchDefaultFolder);
    
})