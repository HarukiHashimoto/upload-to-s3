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
            this.createImage(files[0]);
            this.noImage = !this.noImage;
        },
        // アップロードした画像を表示
        createImage(file) {
            let reader = new FileReader();
            reader.onload = (e) => {
                this.uploadedImage = e.target.result;
            };
            reader.readAsDataURL(file);
        },
    },
});
