import axios from "axios";

export class TarefasService {
    static serverURL = 'http://localhost:8000/api';

    static getAllTarefas() {
        let dataURL = `${this.serverURL}/lista`;
        return axios.get(dataURL);
    }

    static getTarefa(tarefaId) {
        let dataURL = `${this.serverURL}/lista/${tarefaId}`;

        return axios.get(dataURL);
    }

    static criarTarefa(tarefa) {
        let dataURL = `${this.serverURL}/tarefas`;
        return axios.post(dataURL, tarefa);
    }

    static atualizarTarefa(tarefa, tarefaId) {
        let dataURL = `${this.serverURL}/editar/${tarefaId}`;
        return axios.put(dataURL, tarefa);
    }

    static finalizarTarefa(tarefa, tarefaId) {
        let dataURL = `${this.serverURL}/update/${tarefaId}/true`;
        return axios.put(dataURL, tarefa);
    }

    static deletarTarefa(tarefaId) {
        let dataURL = `${this.serverURL}/tarefas/${tarefaId}`;
        return axios.delete(dataURL);
    }

}
