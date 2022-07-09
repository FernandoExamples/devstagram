import Dropzone from "dropzone";
import axios from "axios";
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.withCredentials = true;

Dropzone.autoDiscover = true;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,
});

dropzone.on("success", (file, response) => {
    file.upload.image_path = response;
});

dropzone.on("removedfile", (file, xhr, formData) => {
    axios.delete(`/images`, { data: { image_path: file.upload.image_path } });
});
