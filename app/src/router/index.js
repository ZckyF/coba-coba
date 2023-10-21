import Vue from 'vue';
import VueRouter from 'vue-router';

import Login from '@/views/auth/Login.vue';
import ForgotPassword from '@/views/auth/ForgotPassword.vue';

import routeConfigAdmin from '@/helpers/baseRouteAdmin';

Vue.use(VueRouter);

const routes = [
  
  {
    path: '/',
    name: 'Login',
    component: Login,
  },
  {
    path: '/forgot-password',
    name: 'ForgotPassword',
    component: ForgotPassword,
  },

  routeConfigAdmin(['outlets', 'users', 'profile', 'business-categories', 'taxes', 'taxes-report', 'customers-report', 'cash-report', 'settings']),
];

const router = new VueRouter({
  mode: 'history',
  // base: process.env.BASE_URL,
  routes,
});

export default router;
