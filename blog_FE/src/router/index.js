import { createRouter, createWebHistory } from 'vue-router'
import RegisterView from '../views/RegisterView.vue'
import LoginView from '../views/LoginView.vue'
import BlogView from '@/views/BlogView.vue'
import AboutView from '@/views/AboutView.vue'
import BlogPostView from '@/views/BlogPostView.vue'
import AdminBlogView from '@/views/Admin/AdminBlogView.vue'
import AdminAuthView from '@/views/Admin/AdminAuthView.vue'
import AlertView from '@/views/AlertView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'blog',
      component: BlogView
    },
    {
      path: '/alert',
      name: 'alert',
      component: AlertView
    },
    {
      path: '/blog/:id',
      name: 'blogPost',
      component: BlogPostView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView
    },
    {
      path: '/admin',
      name: 'admin',
      component: AdminAuthView
    },
    {
      path: '/adminBlog',
      name: 'adminBlog',
      component: AdminBlogView
    }
  ]
})

export default router
