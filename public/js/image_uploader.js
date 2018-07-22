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
            console.log(files);
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
            var image = this.uploadedImage;
            var name = this.fileName;

            // この辺↓参考にしたよー
            // https://github.com/axios/axios/issues/1195
            let params = new URLSearchParams();
            params.append('name', name);
            params.append('image', image);
            axios
            .post('/api/upload', params)
            .then(function(res){
                console.log(res);
            })
            .catch(function(err){
                console.log(err);
            });
        }
    },
});
