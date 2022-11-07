
import ExampleComponent from './components/ExampleComponent.vue';
import App from './components/App.vue'
import CreateComponent from './components/CreateComponent.vue';
import TeacherList from './components/TeacherList.vue';
const routes = [
    {
        path: '/',
        component: App,

    },
    {
        path: '/ex',
        component: ExampleComponent,
        name: 'ex',
    },
    {
        path: '/create',
        component: CreateComponent,
        name: 'create',
    },
    {
        path: '/test',
        component: TeacherList,
        name: 'test',
    },


]

export default routes;