import Dropzone from 'dropzone'
import axios from 'axios'
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.withCredentials = true
Dropzone.autoDiscover = true

if (document.querySelector('#dropzone')) {
    const dropzone = new Dropzone('#dropzone', {
        dictDefaultMessage: 'Sube aquí tu imagen',
        acceptedFiles: '.png, .jpg, .jpeg, .gif',
        addRemoveLinks: true,
        dictRemoveFile: 'Borrar archivo',
        maxFiles: 1,
        uploadMultiple: false,

        init: function () {
            if (document.querySelector('#image_path').value) {
                const image_path = document.querySelector('#image_path').value
                const publishedImage = {
                    size: 1234,
                    name: image_path,
                    upload: { image_path },
                }
                this.options.addedfile.call(this, publishedImage)
                this.options.thumbnail.call(this, publishedImage, `/storage/${publishedImage.name}`)

                publishedImage.previewElement.classList.add('dz-success', 'dz-complete')
            }
        },
    })

    dropzone.on('success', (file, response) => {
        file.upload.image_path = response
        document.querySelector('#image_path').value = response
    })

    dropzone.on('removedfile', (file, xhr, formData) => {
        axios.delete(`/images`, {
            data: { image_path: file.upload.image_path },
        })

        document.querySelector('#image_path').value = ''
    })
}
