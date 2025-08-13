import api from './api/axios';

class AuthService {
    /**
     * @param {string} email
     * @param {string} password
     * @returns {Promise<object>} The API response with user and token data.
     */
    login(email, password) {
        // Logic:
        // 1. POST to '/api/login' with { email, password }.
        // 2. Return the full `response.data`.
        return api.post('/login', { email, password });
    }

    /**
     * @returns {Promise<void>}
     */
    logout() {
        // Logic:
        // 1. POST to '/api/logout'.
        // 2. The token will be sent automatically by the Axios interceptor.
        return api.post('/logout');
    }

    /**
     * @param {object} userData { first_name, email, password, password_confirmation }
     * @returns {Promise<void>}
     */
    register(userData) {
        // Logic:
        // 1. POST to '/api/register' with the userData object.
        return api.post('/register', userData);
    }
}

export default new AuthService();
