<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <p class="h3 text-sucess fw-bold">
                    Adicionar Tarefa
                    <router-link to="/tarefas/adicionar"
                                 class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Nova</router-link>
                </p>
            </div>
        </div>
    </div>
    <div class="container mt-3" v-if="tarefas.length > 0">
        <div class="row">
            <div class="col">
                <!---- <div class="card" v-for="tarefas of tarefas" :key="tarefas" > -->
                <div class="card mb-3" v-for="tarefa of tarefas" :key="tarefa.id"
                     :class="{ 'text-muted': tarefa.Finalizado === 'sim', 'bg-success': tarefa.Finalizado === 'sim' }">

                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <p class="card-text">{{tarefa.Descricao}}</p>
                        </div>

                        <div class="d-flex flex-row-reverse">
                            <router-link v-if="tarefa.Finalizado === 'nao'" :to="`/tarefas/editar/${tarefa.id}`" class="btn btn-primary mr-2">
                                <i class="fa fa-pen"></i>
                            </router-link>

                            <button class="btn btn-danger" @click="clickDeleteTarefa(tarefa.id)">
                                <i class="fa fa-trash"></i>
                            </button>

                            <button v-if="tarefa.Finalizado === 'nao'" class="btn btn-secondary ml-2" @click="finalizarTarefa(tarefa.id)">
                                <i class="fa fa-check"></i>
                            </button>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</template>

<script>
    import { TarefasService } from "../../services/TarefasService";
    import axios from 'axios';
    export default {
        name: "TarefasComponent",
        data() {
            return {
                tarefaId: this.$route.params.tarefaId,
                tarefas: [
                ],
            };
        },
        async created() {
            let response = await TarefasService.getAllTarefas();
            // let response = await axios.get('http://localhost:8000/api/lista');

            this.tarefas = response.data;
        },
        methods: {
            async clickDeleteTarefa(tarefaId) {
                let tarefa = this.tarefas.find(t => t.id === tarefaId);
                let response = await axios.delete(`http://localhost:8000/api/delete/${tarefaId}`, tarefa );

                if (response) {
                    let response = await axios.get('http://localhost:8000/api/lista');
                    this.tarefas = response.data;
                    return this.$router.push('/');
                } else {
                    return this.$router.push(`/tarefas/${tarefaId}`);
                }
            },
            async finalizarTarefa(tarefaId) {
                let tarefa = this.tarefas.find(t => t.id === tarefaId);
                tarefa.Finalizado = "sim";

                let response = await axios.put(`http://localhost:8000/api/update/${tarefaId}/true`, tarefa);

                if (response) {
                    let response = await axios.get('http://localhost:8000/api/lista');
                    this.tarefas = response.data;
                    return this.$router.push('/');
                } else {
                    return this.$router.push(`/tarefas/${tarefaId}`);
                }
            }
        },
    };
</script>

<style scoped>
    .card-text {
        color: #000000;
        font-weight: bold;
    }
</style>
