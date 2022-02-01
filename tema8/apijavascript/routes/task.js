const { application } = require("express");
const express = require("express");
const TaskController = require("../controllers/task");

const api = express.Router();

//Crear tarea con POST
api.post('/task', TaskController.createTask);

//Obtener todas las tareas
api.get('/task', TaskController.getTasks);

//Obtener ruta por id
api.get('/task/:id', TaskController.getTask);

//Actualizar ruta por id
api.put('/task/:id', TaskController.updateTask);

//Eliminar ruta por id
api.delete('/task/:id', TaskController.deleteTask);


module.exports = api;