import api from "./api";

export async function getSettings(){
    const res =await api.get('/settings');
    return res.data
}