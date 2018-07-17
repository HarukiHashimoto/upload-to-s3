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
            <input type="file" v-on:change="onFileChange"   />
            <br>
            <button v-if="noImage == false" type="button" name="" class="ui primary button upload-btn">
                Upload
            </button>
        </div>

        {#
        画像の一覧表示部
        ここ，Ajaxで画像取得して表示するように変更
        #}
        <div class="grid">
            <div class="grid-sizer"></div>
            <div class="grid-item">
                <img src="img/fd400828.jpg"/>
            </div>
            <div class="grid-item">
                <img src="img/fd400828.jpg" />
            </div>
            <div class="grid-item">
                <img src="img/fd400828.jpg" />
            </div>
            <div class="grid-item">
                <img src="img/fd400828.jpg" />
            </div>
        </div>

    </div>
    <div class="gallery-footer">

    </div>

</div>

<!-- include JS -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
<script>
$('.grid').masonry({
    columnWidth: '.grid-sizer',
    itemSelector: '.grid-item',
    percentPosition: true,
    gutter: 10,
    horizontalOrder: true
});
</script>
{# <script type="text/javascript" src="js/dropzone.js"></script> #}
{# <script type="text/javascript"> // ファイルアップロード
    Dropzone.options.upload = {
      parallelUploads: 1, // 何ファイルずつアップロードするか
      acceptedFiles: "image/*,text/*", // 許可 MEME TYPE
      maxFiles: 1, // 1度にアップロードできるファイルの数
      // maxFilesize: 0.5, // 1つのファイルの最大サイズ(メガ)
      autoProcessQueue: false, // 登録ボタンを押すまでアップロードをストップ
    };
  var dz = new Dropzone("#upload",{url:"img"});
</script> #}
<script type="text/javascript" src="js/vue.js"></script>
<script type="text/javascript" src="js/image_uploader.js"></script>
