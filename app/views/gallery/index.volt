<div class="wrapper">
    <div class="gallery-header">
        <h1>Lab Gallery</h1>
    </div>
    <div class="gallery-body">
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
