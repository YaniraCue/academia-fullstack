import axios from 'axios';

const api = axios.create({
    baseURL: 'https://academia-backend-7j5n.onrender.com/api', // La URL de tu Laravel en WSL
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    }
});

export default api;