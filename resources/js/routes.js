import CreateDonation from './components/CreateDonation.vue';
import RegisterComponent from './components/auth/RegisterComponent.vue';
import LoginComponent from './components/auth/LoginComponent.vue';

export const routes = [
    {
        path: '/',
        component: CreateDonation
    },
    {
        path: '/register',
        component: RegisterComponent
    },
     {
        path: '/login',
        component: LoginComponent
    },
];
