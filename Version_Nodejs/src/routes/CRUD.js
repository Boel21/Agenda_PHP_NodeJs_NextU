var User = require('../model/users.js')
var Events = require('../model/events.js')

var db = "mi_agenda_db"

module.exports.insertarUsuario = function(callback) {
    let Joel = new User ({
            email: "joelvergara@gmail.com",
            nombre: "Joel Vergara",
            fecha_nac: "1988-09-21",
            password: "12345"
    })
    Joel.save((error) => {
        if (error) callback(error)
        callback(null, "Registro guardado")
    })
    let Andrea = new User ({
            email: "andrea@gmail.com",
            nombre: "Andrea Gonzalez",
            fecha_nac: "1986-02-18",
            password: "54321"
    })
    Andrea.save((error) => {
        if (error) callback(error)
        callback(null, "Registro guardado")
    })
}

module.exports.createCollection = function(callback) {
    Events.createCollection({})
    callback(null, "Se creo la coleccion")
    
}


