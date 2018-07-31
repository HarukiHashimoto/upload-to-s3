new Vue({
    el: '#upload',
    data() {
        return {
            uploadedImage: '',
            noImage: true
        };
    },
    methods: {
        onFileChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            this.uploadedFile = files[0];
            this.createImage(this.uploadedFile);
            this.noImage = !this.noImage;
        },
        // アップロードした画像を表示
        createImage(file) {
            this.fileName = file.name;
            let reader = new FileReader();
            reader.onload = (e) => {
                this.uploadedImage = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        uploadLocal(){
            let formData = new FormData();
            formData.append('image', this.uploadedFile);

            let config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            };
            axios
            .post('/api/upload', formData, config)
            .then(function(res){
                console.log(res.data);
		swal("Good job!", "You clicked the button!", "success");
            })
            .catch(function(err){
                console.log(err);
            });
        }
    },
});
