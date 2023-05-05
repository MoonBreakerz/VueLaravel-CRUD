import { createRouter, createWebHistory } from 'vue-router'
import AdicionarTarefa from '../views/AdicionarTarefa.vue'
import EditarComponent from '../views/EditarComponent.vue'
import HomeViewVue from '../views/HomeView.vue'
import PageNotFoundVue from '../views/PageNotFound.vue'
import TarefasComponent from '../views/TarefasComponent.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    redirect: "/tarefas",
    component: HomeViewVue
   },
    {
        path: '/tarefas',
        name: 'TarefasComponent',
        component: TarefasComponent
    },
  {
    path: '/tarefas/adicionar',
      name: 'AdicionarTarefa',
      component: AdicionarTarefa
  },
  {
    path: '/tarefas/editar/:tarefaId', 
    name: 'EditarComponent',
    component: EditarComponent
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'PageNotFound',
        component: PageNotFoundVue
    }
   
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
