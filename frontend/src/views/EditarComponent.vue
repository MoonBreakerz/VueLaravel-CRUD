<template>
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <p class="h3 text-success fw-bold">Editar Tarefa</p>
            </div>
        </div>
    </div>
    <form @submit.prevent="submitUpdate()">
        <div class="container mt-3">
            <div class="row-md-120">
                <div class="col-md-10">
                    <textarea v-model="this.tarefa.Descricao" class="form-control form-control-lg" rows="5" placeholder="Digite a descrição da tarefa"></textarea>
                </div>
            </div>

        </div>
        <div class="container mt-3">

            <div class="mb-2">
                <input type="submit" class="btn btn-success" value="Atualizar" />
            </div>
        </div>
    </form>
</template>

<script>
    import { TarefasService } from "../../services/TarefasService"

    export default {
        name: "EditarComponent",
        data: function () {
            return {
                tarefaId: this.$route.params.tarefaId,
                tarefa: {
                    Descricao: '',
                    Finalizado:'nao'
                }
            };
        },
        created: async function () {
            let response = await TarefasService.getTarefa(this.tarefaId);
            this.tarefa = response.data;
            this.descricao = response.data.descricao;
        },
        methods: {
            submitUpdate: async function () {
                let response = await TarefasService.atualizarTarefa(this.tarefa, this.tarefaId);
                if (response) {
                    return this.$router.push('/');
                } else {
                    return this.$router.push(`/tarefas//${this.tarefaId}`);
                }
            }
        }
    }
</script>


<style scoped>
</style>
