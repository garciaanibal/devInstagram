import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,
});

dropzone.on('sending', function(file,xhr,formDate){
    console.log(formDate);
});

dropzone.on('success', function(file,respose){
    console.log(respose);
});

dropzone.on('error',function(file,message){
    console.log(message);
});





