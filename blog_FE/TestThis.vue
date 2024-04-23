<script>
import { defineStore } from 'pinia'
import axios from 'axios'

export default {
  setup() {
    const email = ref('')
    const password = ref('')
    const authStore = useAuthStore()

    const handleLogin = async () => {
      try {
        const credentials = { email: email.value, password: password.value }
        const success = await authStore.login(credentials)

        if (success) {
          // Handle successful login, e.g., redirect to admin panel
          console.log('Redirecting to admin panel...')
        } else {
          // Handle unsuccessful login
          console.log('Login failed')
        }
      } catch (error) {
        console.error('An error occurred during login:', error)
      }
    }

    return { email, password, authStore, handleLogin }
  },
}

  
</script>