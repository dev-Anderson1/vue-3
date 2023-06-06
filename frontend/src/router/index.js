import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginView from '../views/LoginView.vue'
import DashboardView from '../components/DashboardView.vue'
import UserCreateView from '../views/UserCreateView.vue'
import * as VueRouter from 'vue-router';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: DashboardView
    },
    {
      path: '/user/create',
      name: 'user-create',
      component: UserCreateView
    },

   
  ]
})

router.beforeEach((to, from, next) => {
  if(from === VueRouter.START_LOCATION){
    localStorage.setItem('route', to.name)
    next()
  }
})

export default router
