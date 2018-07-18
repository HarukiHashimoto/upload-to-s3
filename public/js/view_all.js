axios
.get('/api/viewAll')
.then(function(res){
    viewAll(res.data);
    console.log(res);
})
.catch(function(err){
    console.log(err);
});

function viewAll(images){
    new Vue({
        el: '#view-all',
        data() {
            return {
                images: images
            }
        }
    });
};
