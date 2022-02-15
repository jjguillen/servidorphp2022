const { application } = require("express");
const express = require("express");
const CriptoController = require("../controllers/cripto");

const api = express.Router();

//Importamos middleware
const md_auth = require("../middlewares/authenticated");


//Obtener todas las tareas
api.get('/criptoc', [md_auth.ensureAuth], CriptoController.getCriptos);

//Crear criptomoneda con POST
api.post('/criptoc',  [md_auth.ensureAuth], CriptoController.createCripto);

//Obtener las criptomonedas ordenadas por valor, solo las 10 primeras. 
//ESTA RUTA DEBE ESTAR ANTES QUE LA DE ABAJO
api.get('/criptoc/topvalue', [md_auth.ensureAuth], CriptoController.getCriptosTopValue);

//Obtener criptomoneda por id
api.get('/criptoc/:id',  [md_auth.ensureAuth], CriptoController.getCripto);

//Eliminar criptomoneda
api.delete('/criptoc/:id', [md_auth.ensureAuth], CriptoController.deleteCripto);

//Actualizar criptomoneda por id, aumentando en 1 su valor
api.put('/criptoc/up/:id', [md_auth.ensureAuth], CriptoController.updateCriptoUp);

//Actualizar criptomoneda por id, decrementando en 1 su valor
api.put('/criptoc/down/:id', [md_auth.ensureAuth], CriptoController.updateCriptoDown);

//Actualizar criptomoneda por id
api.put('/criptoc/:id', [md_auth.ensureAuth], CriptoController.updateCripto);

module.exports = api;