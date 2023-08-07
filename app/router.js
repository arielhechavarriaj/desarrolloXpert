import {createRouter, createWebHistory} from 'vue-router';
import TestsList from "./components/TestsList.vue";
import TestsForm from "./components/TestsForm.vue";
import TestItem from "./components/TestItem.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            name: 'tests',
            path: '/',
            component: TestsList,
        },
        {
            name: 'test-form',
            path: '/test/edit/:testId?',
            component: TestsForm,
            props: true,
            alias: '/test/add'
        },
        {
            name: 'test-item',
            path: '/test/:testId(\\d+)',
            component: TestItem,
            props: true
        },
    ],
});

export default router;
