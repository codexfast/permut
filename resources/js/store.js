import { getLocalUser, getLocalAdmin } from "./helpers/auth";

const user = getLocalUser();
const admin = getLocalAdmin();

export default {
    state: {
        currentUser: user,
        currentAdmin: admin,
    },
    getters: {
        currentUser(state) {
            return state.currentUser;
        },
        currentAdmin(state) {
            return state.currentAdmin;
        },


    },
    mutations: {
        loginUserSuccess(state, payload) {
            state.currentUser = Object.assign({}, payload.user, { token: payload.token });
            localStorage.setItem("user", JSON.stringify(state.currentUser));
        },
        logoutUser(state) {
            localStorage.removeItem("user");
            state.currentUser = null;
        },
        loginAdminSuccess(state, payload) {
            state.currentAdmin = Object.assign({}, payload.admin, { token: payload.token });
            localStorage.setItem("admin", JSON.stringify(state.currentAdmin));
        },
        logoutUser(state) {
            localStorage.removeItem("admin");
            state.currentAdmin = null;
        },

    },
    actions: {
        
    }
};