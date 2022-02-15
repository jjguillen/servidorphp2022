const Cripto = require("../models/criptomoneda");


//Obtener todas las criptomonedas
async function getCriptos( req, res) {
    try {
        const criptos = await Cripto.find().sort({ created_at: -1 });

        if(!criptos)
            res.status(400).send({ msg: "Error al obtener las criptomonedas" });
        else
            res.status(200).send(criptos);

    } catch (error) {
        res.status(500).send(error);
    }
}

//Crear criptomoneda a partir de json
async function createCripto( req, res) {
    const cripto = new Cripto();
    const params = req.body;
    //nombre, simbolo, descripcion, precio, cambio, capitalizacion
    cripto.nombre = params.nombre;
    cripto.simbolo = params.simbolo;
    cripto.descripcion = params.descripcion;
    cripto.precio = params.precio;
    cripto.cambio = params.cambio;
    cripto.capitalizacion = params.capitalizacion;

    try {
        //Hay que esperar a que guarde para seguir
        const criptoStore = await cripto.save();

        if (!criptoStore)
            res.status(400).send({ msg: "No se ha guardado la criptomoneda" });
        else
            res.status(200).send({ cripto: criptoStore });
    } catch (error) {
        res.status(500).send(error);
    }
}


//Obtener criptomoneda por id
async function getCripto( req, res) {
    const idCripto = req.params.id;

    try {
        const cripto = await Cripto.findById(idCripto);

        if(!cripto)
            res.status(400).send({ msg: "Error al obtener la criptomoneda" });
        else
            res.status(200).send(cripto);

    } catch (error) {
        res.status(500).send(error);
    }
}  

//Obtener criptomonedas con más valor
async function getCriptosTopValue( req, res) {
    try {
        const criptos = await Cripto.find().sort({ precio: -1 }).limit(10);

        if(!criptos)
            res.status(400).send({ msg: "Error al obtener las criptomonedas" });
        else
            res.status(200).send(criptos);

    } catch (error) {
        res.status(500).send(error);
    }
}

//Eliminar criptomoneda por id
async function deleteCripto( req, res) {
    const idCripto = req.params.id;

    try {
        const cripto = await Cripto.findByIdAndDelete(idCripto);
        if(!cripto)
            res.status(400).send({ msg: "Error al eliminar la criptomoneda" });
        else
            res.status(200).send({ msg: "Eliminación correcta" });

    } catch (error) {
        res.status(500).send(error);
    }
} 

//Actualizar criptomoneda por id
async function updateCripto( req, res) {
    const idCripto = req.params.id;
    const params = req.body;

    try {
        const cripto = await Cripto.findByIdAndUpdate(idCripto, params);

        if(!cripto)
            res.status(400).send({ msg: "Error al actualizar la criptomoneda" });
        else
            res.status(200).send({ msg: "Actualización correcta" });

    } catch (error) {
        res.status(500).send(error);
    }
}  

//Actualizar criptomoneda por id, aumentando en 1 su valor
async function updateCriptoUp( req, res) {
    const idCripto = req.params.id;

    try {
        let cripto = await Cripto.findById(idCripto);
        cripto.precio = cripto.precio + 1;

        const criptoUp = await cripto.save();

        if(!criptoUp)
            res.status(400).send({ msg: "Error al actualizar la criptomoneda" });
        else
            res.status(200).send({ msg: "Actualización correcta" });

    } catch (error) {
        res.status(500).send(error);
    }
} 

//Actualizar criptomoneda por id decrementando en 1 su valor
async function updateCriptoDown( req, res) {
    const idCripto = req.params.id;

    try {
        let cripto = await Cripto.findById(idCripto);
        cripto.precio = cripto.precio - 1;

        const criptoUp = await cripto.save();

        if(!criptoUp)
            res.status(400).send({ msg: "Error al actualizar la criptomoneda" });
        else
            res.status(200).send({ msg: "Actualización correcta" });

    } catch (error) {
        res.status(500).send(error);
    }
}


module.exports = {
    getCriptos, 
    createCripto, 
    getCripto, 
    getCriptosTopValue, 
    deleteCripto, 
    updateCripto, 
    updateCriptoUp, 
    updateCriptoDown
}