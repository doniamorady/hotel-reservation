import api from "./api";

export async function getSettings(){
    const res =await api.get('/settings');
    console.log(res.data)
    return res.data
}