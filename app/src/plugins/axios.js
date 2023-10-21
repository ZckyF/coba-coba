import axios from 'axios';

const instance = axios.create({
  baseURL: import.meta.env.VITE_APP_API_KEY,
  timeout: 3000, // atur timeout sesuai kebutuhan Anda
});

export default instance;
