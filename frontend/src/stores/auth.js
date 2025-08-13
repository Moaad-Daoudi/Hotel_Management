import { defineStore } from "pinia";

export const UseAuthStore = defineStore('auth', {
  state: () => {
    // user: JSON.parse(localStorage.getItem('user')) || null,
    // token: localStorage.getItem('token') || null,
  },
  getters: {
    // isAuthenticated: (state) => !!state.token && !!state.user,
    // userRoles: (state) => (state.user ? state.user.roles : []),

    // state
    // - user (id, name, email, role)
    // - token
    // - isAuthenticated
  },
  actions: {
    // async handleLogin(credentials) {
        // Logic:
        // 1. Call `AuthService.login(credentials.email, credentials.password)`.
        // 2. In a `then()` block:
        //    a. Get the response data.
        //    b. Set the state: `this.user = response.data.user;` and `this.token = response.data.token;`.
        //    c. Persist to localStorage: `localStorage.setItem('user', JSON.stringify(this.user));` and `localStorage.setItem('token', this.token);`.
        //    d. Set the default authorization header for all future API calls: `api.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;`.
        //    e. Resolve the promise.
        // 3. In a `catch()` block, throw the error so the component can handle it.
    // },

    async handleLogout() {
        // Logic:
        // 1. Call `AuthService.logout()`. This might fail if the token is expired, but we don't care.
        // 2. In a `finally` block to ensure it always runs:
        //    a. Clear the state: `this.user = null;` and `this.token = null;`.
        //    b. Remove from localStorage: `localStorage.removeItem('user');` and `localStorage.removeItem('token');`.
        //    c. Remove the default authorization header: `delete api.defaults.headers.common['Authorization'];`.
    },

    // async handleRegistration(userData) {
        // Logic:
        // 1. Call `AuthService.register(userData)`.
        // 2. This action simply passes the request through. The component will handle success/error (e.g., redirecting to login).
    // },

    /**
     * Action to check and set the auth header on app startup.
     */
    checkAuth() {
        // Logic:
        // 1. If `this.token` exists (from localStorage on init):
        //    a. Set the default auth header: `api.defaults.headers.common['Authorization'] = 'Bearer ' + this.token;`.
    },
    refreshToken() {}
  }
})
