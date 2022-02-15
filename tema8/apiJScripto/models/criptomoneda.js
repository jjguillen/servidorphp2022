const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const CriptomonedaSchema = Schema({
    nombre: {
        type: String,
        require: true
    },
    simbolo: {
        type: String,
        require: true
    },
    descripcion: {
        type: String,
        require: true,
        default: false
    },
    precio: {
        type: Number,
        require: true,
        default: true
    },
    cambio: {
        type: Number,
        require: true,
        default: false
    },
    capitalizacion: {
        type: Number,
        require: true,
        default: false
    },
    created_at: {
        type: Date,
        require: true,
        default: Date.now
    }
});

module.exports = mongoose.model("Criptomoneda", CriptomonedaSchema);