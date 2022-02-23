//Ascrynous fetch

const folder_api = async(data,token) => {
    const request = await fetch('/api/createfolder',{
        method:'POST',
        body:data,
        headers: {
            'Authorization':`Bearer ${token}`
        }
    });
    return request.json(); 
}

const defaultFolder = async (parentFolder, post_by) => {
    const request = await fetch('/api/createfolder',{
        method:'POST',
        body:data,
        headers: {
            'Authorization':`Bearer ${token}`
        }
    });
    return request.json();
}

export { folder_api };
