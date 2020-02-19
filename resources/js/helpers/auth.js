import { setAuthorizationUser } from "./general_user";
import { setAuthorizationAdmin } from "./general_admin";


export function loginUser(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/user/login', credentials)
            .then((response) => {
                setAuthorizationUser(response.data.token);
                res(response.data);
            })
            .catch((err, response) =>{
                rej("E-mail ou senha errada");
            })
    })
}
export function loginAdmin(credentials) {
    return new Promise((res, rej) => {
        axios.post('/api/admin/login', credentials)
            .then((response) => {
                setAuthorizationAdmin(response.data.token);
                res(response.data);
            })
            .catch((err, response) =>{
                rej("E-mail ou senha errada");
            })
    })
}



export function getLocalUser() {
    const userStr = localStorage.getItem("user");

    if(!userStr) {
        return null;
    }

    return JSON.parse(userStr);
}

export function getLocalAdmin() {
    const adminStr = localStorage.getItem("admin");

    if(!adminStr) {
        return null;
    }

    return JSON.parse(adminStr);
}
