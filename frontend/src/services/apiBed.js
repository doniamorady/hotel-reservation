import api from "./api";

export async function getBeds(){
    const res = await api.get('/beds');
    return res.data;
}