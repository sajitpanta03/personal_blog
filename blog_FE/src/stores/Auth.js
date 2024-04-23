import { defineStore } from 'pinia'
import axios from 'axios'
import { ref, computed } from 'vue'
import config from '../config'

export const useAuthStore = defineStore('auth', () => {
  const authToken = ref(localStorage.getItem('authToken') || null);

  const isAuthenticated = computed(() => authToken.value !== null);

  const api = `${config.API}/auth/login`;

  async function login(credentials) {
    try {
      const response = await axios.post(`${api}`, credentials, {
        headers: { 'Content-Type': 'application/json' }
      });

      const token = response.data.accessToken

      if (token) {
        localStorage.setItem('authToken', token);
        authToken.value = token;
        console.log('Login Successfully');
        return true;
      } else {
        console.error('Token not found in the response');
        return false;
      }
    } catch (error) {
      console.error(error);
      throw error;
    }
  }

  function logout() {
    localStorage.removeItem('authToken');
    authToken.value = null;
  }

  return {
    authToken,
    isAuthenticated,
    login,
    logout
  }
})
