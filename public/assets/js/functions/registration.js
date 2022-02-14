//Ascrynous fetch

export const login = async(data) => {
    const request = await fetch('/api/login',{
        method:'POST',
        body:data
    });
    return request.json(); 
}



