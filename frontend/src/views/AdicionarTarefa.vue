<template>
	<div class="container mt-3">
		<div class="row">
			<div class="col">
				<p class="h3 text-success fw-bold">Adicionar Tarefa</p>
			</div>
		</div>
	</div>
	<div class="container mt-3">
		<form @submit.prevent="submitCreate()">

			<div class="row-md-120">
				<div class="col-md-10">
					<textarea v-model="tarefa.descricao" class="form-control form-control-lg" rows="5" placeholder="Digite a descricao da tarefa"></textarea>
				</div>
			</div>


			<div class="container mt-3">

				<div class="mb-2">
					<input type="submit" class="btn btn-success" value="Criar" />
				</div>
			</div>
		</form>

	</div>
</template>

<script>
	import { TarefasService } from "../../services/TarefasService"

	export default {
		name: "AdicionarTarefa",
		data: function () {
			return {
				tarefa: {
					descricao: '',
					finalizado: 'nao',
				}
			};
		},
		methods: {
			submitCreate: async function () {

					let response = await TarefasService.criarTarefa(this.tarefa);
					if (response) {
						return this.$router.push('/');
					} else {
						return this.$router.push('/tarefas/adicionar');
					}


				
				
			}
		}
	}
</script>

<style scoped>
</style>
