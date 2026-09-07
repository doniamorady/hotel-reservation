import api from "./api";

export async function getRooms(){
    const {data} = await api.get('/rooms');
    
    return data.data;
}