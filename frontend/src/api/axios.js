import axios from 'axios';

const apiClient = axios.create(
  {
    baseURL: import.meta.env.VITE_API_BASE_URL,
    headers: { 'Content-Type': 'application/json'}
    // withCredentials: true, // Important for using cookies with Laravel Sanctum
  }
);

// REQUEST INTERCEPTOR
apiClient.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem('token')
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  (error) => {
    console.log(error.message)
    return Promise.reject(error)
  }
);

// RESPONSE INTERCEPTOR
apiClient.interceptors.response.use(
  (response) => response,
  (error) => {
    if(error.response?.status === 401) {
      console.warn('Unauthorized - redirect to login')
      // router.push('/login')
    }
    console.error('API Error: ', error.response?.status, ', ', error.response?.data)
    return Promise.reject(error)
  }
)


export default apiClient;
