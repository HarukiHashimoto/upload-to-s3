<div class="wrapper">
    <div class="gallery-header">
        <h1 class="ui header">Lab Gallery</h1>
    </div>
    <div class="gallery-body">
        <div class="drag-and-drop-area drag-and-drop-area-out" id="upload">
            <span>
                <i class="file image icon"></i>
                Drag and drop your files
            </span>
        </div>

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
<script type="text/javascript" src="js/dropzone.js"></script>
<script type="text/javascript"> // ファイルアップロード
    Dropzone.options.dragAndDropArea = {
      parallelUploads: 1, // 何ファイルずつアップロードするか
      acceptedFiles: "image/*,text/*", // 許可 MEME TYPE
      maxFiles: 1, // 1度にアップロードできるファイルの数
      // maxFilesize: 0.5, // 1つのファイルの最大サイズ(メガ)
      autoProcessQueue: false, // 登録ボタンを押すまでアップロードをストップ
    };
  var dz = new Dropzone("#upload",{url:"img"});
</script>
<script type="text/javascript" src="js/vue.js"></script>
