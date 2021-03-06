<div class="wrapper">
    <div class="gallery-header">
        <h1 class="ui header">Lab Gallery</h1>
    </div>
    <div class="gallery-body">
        {# 画像アップロードエリア #}
        <div id="upload">
            <div id="img-area">
                <img v-show="uploadedImage" :src="uploadedImage" />
                <p v-if='noImage'>No Image</p>
            </div>
            <form id="upload-image">
                <input type="file" v-on:change="onFileChange" name='upload-image'  />
                <br>
                <button v-if="noImage == false" type="button" @click="uploadLocal" class="ui primary button upload-btn">
                    Upload
                </button>
            </form>
        </div>

        {#
        画像の一覧表示部
        ここ，Ajaxで画像取得して表示するように変更
        #}
        <div class="grid" id="view-all" data-packery='{ "itemSelector": ".grid-item", "gutter": 10 }'>
            <div class="grid-sizer"></div>
            <div v-for='image in images' class="grid-item" style="position: relative;">
                <img :src="'img/' + image.s3_key" />
            </div>
        </div>
    </div>
    <div class="gallery-footer">

    </div>

</div>

<!-- include JS -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/vue.js"></script>
<script type="text/javascript" src="js/axios.min.js"></script>
<script type="text/javascript" src="js/view_all.js"></script>
<script type="text/javascript" src="js/image_uploader.js"></script>
<script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="js/mymasonry.js"></script>