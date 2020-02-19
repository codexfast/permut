
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
